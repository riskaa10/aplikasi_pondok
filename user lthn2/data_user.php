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
    <title>user_santri</title>
</head>
<body>
    <a href="logout.php">logout</a>
    <a href="tambah.php"> tambah data</a>
    <br>
    <table border="1" cellpadding="10">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>email</th>
        <th>password</th>
        <th>aksi</th>
    </tr>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM user_santri");
    while($item = mysqli_fetch_array($data)) {
    ?>

    <tr>
        <td><?= $item['id']; ?></td>
        <td><?= $item['nama']; ?></td>
        <td><?= $item['email']; ?></td>
        <td><?= $item['password']; ?></td> 
         <td>
            <a href="hapus.php?id=<?=$item['id']; ?>">hapus</a>
            <a href="edit.php?id=<?=$item['id']; ?>">edit</a>
        </td>
    </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>