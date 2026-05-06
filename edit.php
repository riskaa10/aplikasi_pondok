<?php 
    include 'koneksi.php';
    $id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM santri WHERE id='$id'");
$item = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data santri</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #fff0f3; 
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    h1 {
        color: #ff8fa3;
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .container {
        width: 350px;
    }

    form {
        background: #ffffff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(255, 179, 193, 0.4);
        border: 1px solid #ffe5ec;
    }

    form {
        color: #ff758f;
        font-weight: 600;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 8px 0 20px 0;
        border: 1.5px solid #ffe5ec;
        border-radius: 12px;
        box-sizing: border-box;
        outline: none;
        transition: 0.3s;
        background-color: #fff9fa;
    }

    input:focus {
        border-color: #ff8fa3;
        background-color: #fff;
        box-shadow: 0 0 8px rgba(255, 143, 163, 0.2);
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #ffb3c1, #ff8fa3);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.4s;
        box-shadow: 0 4px 15px rgba(255, 143, 163, 0.3);
    }

    button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 143, 163, 0.5);
        opacity: 0.9;
    }
</style>
</head>
<body>
     <h1>ubah data santri</h1>
    <form method="post">
        nama: <input type="text" name="nama" value="<?= $item['nama']; ?>"><br><br>
        alamat: <input type="text" name="alamat"  value="<?= $item['alamat']; ?>"><br><br>
        email: <input type="email" name="email" value="<?= $item['email']; ?>"><br><br>

        <button type="submit" name="update">update</button>
  </form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE santri SET
        nama='$_POST[nama]',
        alamat='$_POST[alamat]',
        email='$_POST[email]'
        WHERE id='$id'
        ");
    
    header("location: index.php");
}
?>