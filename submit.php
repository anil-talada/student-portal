<?php

require 'vendor/autoload.php';

include 'database.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Dompdf\Dompdf;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$job_title = $_POST['job_title'];
$quantity = $_POST['quantity'];
$dietary = $_POST['dietary'];
$special_requests = $_POST['special_requests'];
$ticket_type = $_POST['ticket_type'];
$total_amount = $_POST['total_amount'];
$ticket_id = "Udbhav" . rand(100000, 999999);

$qr = new QrCode(data: $ticket_id);
$writer = new PngWriter();

$result = $writer->write($qr);

$qrPath = 'qrcodes/' . $ticket_id . '.png';

$result->saveToFile($qrPath);

$absoluteQrPath = realpath($qrPath);

$imageData = base64_encode(file_get_contents($absoluteQrPath));

$qrBase64 = 'data:image/png;base64,' . $imageData;

ob_start();

include 'ticket-template.php';

$html = ob_get_clean();

$options = new \Dompdf\Options();

$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$pdfOutput = $dompdf->output();

$pdfPath = 'tickets/' . $ticket_id . '.pdf';

file_put_contents($pdfPath, $pdfOutput);

$sql = "INSERT INTO registrations (

first_name,
last_name,
email,
phone,
company,
job_title,
quantity,
dietary,
special_requests,
ticket_type,
total_amount,
ticket_id


)

VALUES (

'$first_name',
'$last_name',
'$email',
'$phone',
'$company',
'$job_title',
'$quantity',
'$dietary',
'$special_requests',
'$ticket_type',
'$total_amount',
'$ticket_id'

)";

if ($conn->query($sql) === TRUE) {
    header('Location: paymentporta.php?success=1');
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'anilkumartalada86@gmail.com';

        $mail->Password = 'vnapurbtaqjqmydy';

        $mail->SMTPSecure = 'tls';

        $mail->Port = 587;

        $mail->setFrom('YOUR_GMAIL@gmail.com', 'ABSA TECH FEST');

        $mail->addAddress($email, $first_name);

        $mail->Subject = 'Your Event Ticket';

        $mail->Body = "

    Hello $first_name,

    Thank you for registering.

    Your Ticket ID is:

    $ticket_id

    Please find your ticket attached.

    ";

        $mail->addAttachment($pdfPath);

        $mail->send();
    } catch (Exception $e) {

        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    exit;
} else {

    echo 'Error: ' . $conn->error;
}

$conn->close();
