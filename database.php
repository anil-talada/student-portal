<?php

$host = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS event_registration";

$conn->query($sql);

$conn->select_db("event_registration");

$table = "CREATE TABLE IF NOT EXISTS registrations (

    id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(150),
    phone VARCHAR(20),

    company VARCHAR(150),
    job_title VARCHAR(150),

    quantity INT,

    dietary TEXT,
    special_requests TEXT,

    ticket_type VARCHAR(100),

    total_amount VARCHAR(50),

    ticket_id VARCHAR(100),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($table);
