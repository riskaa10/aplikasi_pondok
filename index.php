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
    <title>data santri</title>
    <style>

body {
    font-family: 'Poppins', sans-serif;
    background-color: #fff0f3; 
    color: #5d5d5d;
    margin: 20px;
    background-size: 150px;
}

h1 {
    color: #ff8fa3;
    text-align: center;
}

a {
    text-decoration: none;
    color: #ff758f;
    font-weight: bold;
}

a:hover {
    color: #c9184a;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #ffb3c1;
}

th {
    background-color: #ffc2d1;
    color: #c9184a;
    padding: 12px;
}

td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ffe5ec;
}

tr:hover {
    background-color: #fff5f7;
}

td a {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
}

td a[href*="edit"] { background-color: #c8e7ff; color: #0077b6; }
td a[href*="hapus"] { background-color: #ffd6d6; color: #d00000; }
</style>
</head>
<body>
    <a href="logout.php">logout</a>
    <br><br>
    <a href="user/data_user.php"> DATA USER </a>
    <h1>DATA_SANTRII(PPRU)</h1>

    <a href="tambah.php">+ tambah data</a>
    <br>
    <table border="1" cellpadding="10">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>alamat</th>
        <th>email</th>
        <th>aksi</th>
    </tr>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM santri");
    while($item = mysqli_fetch_array($data)) {
    ?>

    <tr>
        <td><?= $item['id']; ?></td>
        <td><?= $item['nama']; ?></td>
        <td><?= $item['alamat']; ?></td>
        <td><?= $item['email']; ?></td>
        <td>
            <a href="edit.php?id=<?= $item['id']; ?>">edit</a>
            <a href="hapus.php?id=<?=$item['id']; ?>">hapus</a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>