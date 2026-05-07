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
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff0f3; 
            color: #444;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-links {
            margin-bottom: 20px;
            width: 80%;
            display: flex;
            justify-content: space-between;
        }

        a {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
            font-weight: bold;
        }

        a[href="logout.php"] {
            background-color: #ff85a2;
            color: white;
        }

        a[href="tambah.php"] {
            background-color: #92beff; 
            color: white;
        }

        a:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }

        table {
            width: 85%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden; 
            border: none;
        }

        th {
            background-color: #ffb3c1; 
            color: #590d22;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        td {
            text-align: center;
            border-bottom: 1px solid #ffe5ec;
        }

        tr:hover {
            background-color: #fffafb;
        }

        td a {
            font-size: 13px;
            margin: 0 3px;
            padding: 5px 10px;
        }

        a[href*="hapus.php"] {
            background-color: #ff4d6d;
            color: white;
        }

        a[href*="edit.php"] {
            background-color: #ffb3c1;
            color: #590d22;
            border: 1px solid #ff85a2;
        }

    </style>
</head>
<body>

    <a href="../logout.php">logout</a>
    <br>
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
    $data = mysqli_query($conn, "SELECT * FROM user");
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