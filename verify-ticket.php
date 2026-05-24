<?php

include 'database.php';

header('Content-Type: application/json');

$ticket = $_POST['ticket'];

$sql = "SELECT * FROM registrations WHERE ticket_id='$ticket'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if ($row['checked_in'] == 0) {

        $update = "UPDATE registrations 
        SET checked_in=1 
        WHERE ticket_id='$ticket'";

        $conn->query($update);

        echo json_encode([
            "status" => "success",
            "message" => "ENTRY ALLOWED",
            "name" => $row['first_name'] . " " . $row['last_name']
        ]);
    } else {

        echo json_encode([
            "status" => "used",
            "message" => "TICKET ALREADY VERIFIED"
        ]);
    }
} else {

    echo json_encode([
        "status" => "invalid",
        "message" => "INVALID TICKET"
    ]);
}
