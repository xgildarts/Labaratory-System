<?php
session_start();


if (isset($_POST['confirm_logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}


if (isset($_POST['cancel'])) {
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Logout</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            padding: 50px;
            text-align: center;
        }

        .box {
            background: white;
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin: 0 10px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .yes {
            background-color: #e74c3c;
            color: white;
        }

        .no {
            background-color: #2ecc71;
            color: white;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Are you sure you want to logout?</h2>
    <form method="post">
        <input type="submit" name="confirm_logout" value="Yes, Logout" class="yes">
        <input type="submit" name="cancel" value="Cancel" class="no">
    </form>
</div>

</body>
</html>
