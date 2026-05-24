<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';

header('Content-Type: text/plain; charset=utf-8');

$testMode = isset($_GET['test']);

if ($testMode) {
  $name = 'Test User';
  $email = 'test@example.com';
  $subject = 'PHPMailer test email from Craftivo';
  $message = 'This is a sample test email sent by PHPMailer from your Craftivo contact form. It is only a test.';
} else {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Only POST requests are accepted.';
    exit;
  }

  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $message = trim($_POST['message'] ?? '');
}

if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  echo 'Please fill out all fields with a valid email address.';
  exit;
}

$receiving_email_address = 'your-personal-email@example.com'; // CHANGE THIS to your personal email address

// SMTP configuration
$smtpHost = 'smtp.example.com';
$smtpUsername = 'smtp-user@example.com';
$smtpPassword = 'smtp-password';
$smtpPort = 587;
$smtpSecure = 'tls'; // use 'tls' or 'ssl'

$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host = $smtpHost;
  $mail->SMTPAuth = true;
  $mail->Username = $smtpUsername;
  $mail->Password = $smtpPassword;
  $mail->SMTPSecure = $smtpSecure;
  $mail->Port = $smtpPort;
  $mail->CharSet = 'UTF-8';

  $mail->setFrom($smtpUsername, 'Website Contact Form');
  $mail->addAddress($receiving_email_address);
  $mail->addReplyTo($email, $name);

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = sprintf(
    '<p><strong>Name:</strong> %s</p><p><strong>Email:</strong> %s</p><p><strong>Subject:</strong> %s</p><p><strong>Message:</strong><br>%s</p>',
    htmlentities($name, ENT_QUOTES, 'UTF-8'),
    htmlentities($email, ENT_QUOTES, 'UTF-8'),
    htmlentities($subject, ENT_QUOTES, 'UTF-8'),
    nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8'))
  );
  $mail->AltBody = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

  $mail->send();
  echo 'OK';
} catch (Exception $e) {
  http_response_code(500);
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
