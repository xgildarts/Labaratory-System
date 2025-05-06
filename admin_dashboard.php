<?php
session_start();
if(!$_SESSION['admin']) {
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin File Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
            position: relative;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout a {
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .logout a:hover {
            background-color: #c0392b;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        ul {
            list-style-type: none;
            padding: 0;
            width: 500px;
            margin: 0 auto;
        }

        li {
            background: #ffffff;
            margin-bottom: 10px;
            padding: 12px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a.download {
            text-decoration: none;
            color: #27ae60;
            font-weight: bold;
        }

        a.download:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>

    <h2>📁 Admin File Dashboard</h2>

    <ul>
        <?php
        $files = array_diff(scandir('uploads'), array('.', '..'));
        foreach ($files as $file) {
            echo "<li>$file <a class='download' href='download.php?file=" . urlencode($file) . "'>Download</a></li>";
        }
        ?>
    </ul>

</body>
</html>
