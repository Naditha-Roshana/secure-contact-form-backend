<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: index.html");
    exit;
}

$host = "localhost";
$dbname = "contact_messages";
$username = "root";
$password = "Nadu@06&13";

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

    .top-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.logout-btn {
  text-decoration: none;
  background: #ef4444;
  color: white;
  padding: 8px 14px;
  border-radius: 8px;
  font-size: 14px;
  transition: 0.2s ease;
}

.logout-btn:hover {
  background: #dc2626;
  transform: translateY(-2px);
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

<div class="top-bar">
  <h1>📩 Contact Messages</h1>
  <a href="logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
</div>


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