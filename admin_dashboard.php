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

        a {
            text-decoration: none;
            color: #27ae60;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>📁 Admin File Dashboard</h2>

    <ul>
        <?php
        $files = array_diff(scandir('uploads'), array('.', '..'));
        foreach ($files as $file) {
            echo "<li>$file <a href='download.php?file=" . urlencode($file) . "'>Download</a></li>";
        }
        ?>
    </ul>

</body>
</html>
