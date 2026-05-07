<?php 
    include 'koneksi.php';
    $id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$item = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit user_santri</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdf2f4; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 350px;
        }

        h1 {
            text-align: center;
            color: #d81b60;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #880e4f;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #f8bbd0;
            border-radius: 10px;
            box-sizing: border-box;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #f06292;
            box-shadow: 0 0 8px rgba(240, 98, 146, 0.2);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #f06292;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #d81b60;
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ad1457;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>
<body>
     <h1>ubah data_pengguna</h1>
    <form method="post">
        nama: <input type="text" name="nama" value="<?= $item['nama']; ?>"><br><br>
        email: <input type="text" name="email"  value="<?= $item['email']; ?>"><br><br>
        password: <input type="password" name="password"  value="<?= $item['password']; ?>"><br><br>
        <button type="submit" name="update">update</button>
  </form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE user SET 
    nama='$_POST[nama]',
    email='$_POST[email]',
    password='$_POST[password]'
    WHERE id='$id' 
    ");
    
    header("location: data_user.php");
}
?>