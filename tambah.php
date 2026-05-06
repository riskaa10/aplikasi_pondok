<?php  include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah santri</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #fff0f3;
        background-image: radial-gradient(#ffccd5 0.5px, transparent 0.5px);
        background-size: 20px 20px; 
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background: rgba(255, 255, 255, 0.9); 
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(255, 179, 193, 0.3);
        width: 320px;
        border: 1px solid #ffccd5;
    }

    form {
        color: #ff758f;
        font-weight: bold;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 8px 0 20px 0;
        border: 1px solid #ffe5ec;
        border-radius: 10px;
        box-sizing: border-box;
        outline: none;
        background-color: #fff9fa;
        transition: 0.3s;
    }

    input:focus {
        border-color: #ff8fa3;
        box-shadow: 0 0 8px rgba(255, 143, 163, 0.2);
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #ffb3c1, #ff8fa3);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        letter-spacing: 1px;
        transition: 0.3s;
    }

    button:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }
    </style>
</head>
<body>
    <form method="post">
    nama:<input type="text" name="nama" required><br><br>
    alamat:<input type="text" name="alamat" required><br><br>
    email:<input type="email" name="email" required><br><br>


    <button type="submit" name="simpan">Tambah Data</button>

</body>
</html>

<?php
if(isset($_POST['simpan'])){
    mysqli_query($conn, "INSERT INTO santri (nama, alamat, email) VALUES(
    '$_POST[nama]',
    '$_POST[alamat]',
    '$_POST[email]'
    )");

    header("location: index.php");
}