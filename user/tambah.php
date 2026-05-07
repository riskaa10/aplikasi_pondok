<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    exit;
    }
?>

<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah user_santri</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fce4ec; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #d81b60; 
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #f8bbd0;
            border-radius: 8px;
            box-sizing: border-box; 
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border: 1px solid #d81b60;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #f06292; 
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #d81b60;
        }

        label {
            color: #880e4f;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="post">
        nama:<input type="text" name="nama" required><br><br>
        email:<input type="text" name="email" required><br><br>
        password:<input type="password" name="password" required><br><br>

        <button type="submit" name="simpan">simpan</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['simpan'])){
    mysqli_query($conn, "INSERT INTO user (nama, email, `password`) VALUES (
    '$_POST[nama]',
    '$_POST[email]',
    '$_POST[password]'
    )");

    header("location: data_user.php");
}
?>