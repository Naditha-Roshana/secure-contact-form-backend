<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: index.html");
    exit;
}

$host = "localhost";
$dbname = "contact_messages";
$username = "***";
$password = "***";

try {
    $pdo = new PDO (
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$STMT = $pdo->query("SELECT * FROM contact ORDER BY created_at DESC");
$MESSAGE = $STMT->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel – Messages</title>
  <style>
    body {
      font-family: Segoe UI, sans-serif;
      background: #020617;
      color: #e5e7eb;
      padding: 40px;
    }

    h1 {
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #020617;
      border: 1px solid #1e293b;
    }

    th, td {
      padding: 14px;
      border-bottom: 1px solid #1e293b;
      text-align: left;
    }

    th {
      background: #020617;
      color: #38bdf8;
    }

    tr:hover {
      background: #020617;
    }
  </style>
</head>
<body>

<h1>📩 Contact Messages</h1>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
  </tr>

<?php if (count($MESSAGE) === 0): ?>
    <tr>
        <td colspan="5">No messages found</td>
    </tr>
<?php endif; ?>

<?php foreach ($MESSAGE as $msg): ?>
    <tr>
        <td><?= $msg["id"] ?></td>
        <td><?=  htmlspecialchars($msg["name"]) ?></td>
        <td><?=  htmlspecialchars($msg["email"]) ?></td>
        <td><?=  htmlspecialchars($msg["message"]) ?></td>
        <td><?=  ($msg["created_at"]) ?></td>
    </tr>
<?php endforeach; ?>
</table>
</body>
</html>