<?php
session_start();


$host = 'localhost';
$db = 'labaratory';
$user = 'root';
$pass = '';


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', sans-serif;
            padding: 50px;
        }
        .login-box {
            width: 300px;
            margin: auto;
            background: white;
            padding-right: 40px;
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; margin-bottom: 20px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px;
        }
        input[type="submit"] {
            width: 107%; padding: 10px; background: #3498db; color: white; font-weight: bold; border: none; border-radius: 6px; cursor: pointer; margin-top: 20px;
        }
        input[type="submit"]:hover { background: #2980b9; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
