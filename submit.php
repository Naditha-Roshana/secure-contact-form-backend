<?php

header("Content-Type: application/json");

// 1. Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed"]);
    exit;
}

// 2. Database connection
$host = "localhost";
$dbname = "contact_messages";
$username = "root";
$password = "Nadu@06&13";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// 3. Get & sanitize input
$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

// 4. Validation
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Invalid email format"]);
    exit;
}

// 5. Insert into database (Prepared Statement)
$sql = "INSERT INTO contact_messages (name, email, message)
        VALUES (:name, :email, :message)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ":name" => htmlspecialchars($name),
    ":email" => htmlspecialchars($email),
    ":message" => htmlspecialchars($message)
]);

// 6. Success response
echo json_encode([
    "success" => true,
    "message" => "Message sent successfully"
]);

