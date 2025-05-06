<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload & Download System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h2, h3 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto 30px auto;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="file"] {
            margin-top: 10px;
            padding: 6px;
            width: 100%;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
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

    <h2>Dashboard</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select file to upload:</label><br>
        <input type="file" name="fileToUpload" required><br><br>
        <input type="submit" value="Upload File">
    </form>

    <h3>Uploaded Files</h3>
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
