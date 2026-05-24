<?php
$host = 'localhost';
$db   = 'associations_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Database connection failed: ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: sugestion.php');
    exit;
}

$firstName  = trim($_POST['firstname'] ?? '');
$lastName   = trim($_POST['lastname'] ?? '');
$email      = trim($_POST['email'] ?? '');
$phone      = trim($_POST['phone'] ?? '');
$category   = trim($_POST['category'] ?? '');
$suggestion = trim($_POST['suggestion'] ?? '');
$comments   = trim($_POST['comments'] ?? '');

if (empty($firstName) || empty($lastName) || empty($email) || empty($suggestion)) {
    header('Location: sugestion.php?status=error&message=required');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: sugestion.php?status=error&message=invalid_email');
    exit;
}

$sql = "INSERT INTO suggestions
    (first_name, last_name, email, phone, category, suggestion, comments)
    VALUES (:first_name, :last_name, :email, :phone, :category, :suggestion, :comments)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':first_name' => $firstName,
    ':last_name'  => $lastName,
    ':email'      => $email,
    ':phone'      => $phone,
    ':category'   => $category,
    ':suggestion' => $suggestion,
    ':comments'   => $comments,
]);

header('Location: sugestion.php?status=success');
exit;
