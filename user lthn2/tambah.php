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
    mysqli_query($conn, "INSERT INTO data_santri (nama, email, password) VALUES (
    '$_POST[nama]',
    '$_POST[email]',
    '$_POST[password]'
    )");

    header("location: index.php");
}
?>