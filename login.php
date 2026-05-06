<?php 
    include "koneksi.php";
    session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fff5f7; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; 
    margin: 0;
}

.login-container {
    text-align: center;
}

h2 {
    color: #ff8fa3;
    margin-bottom: 20px; 
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(255, 143, 163, 0.2);
    width: 300px;
}

input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ffe5ec;
    border-radius: 8px;
    box-sizing: border-box; 
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #ffb3c1;
    box-shadow: 0 0 5px rgba(255, 179, 193, 0.5);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #ffb3c1;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #ff8fa3;
    transform: translateY(-2px); 
}
</style>
</head>
<body>
    <h2>login</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="isi nama mu"> <br><br>
        <input type="email" name="email" placeholder="isi email mu"> <br><br>
        <input type="password" name="password" placeholder="isi password mu"> <br><br>
        <button type="submit">login</button>
    </form>
</body>
</html>

<?php
    if ($_POST) {
        $nama = $_POST['nama'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $query = mysqli_query($conn, "SELECT * FROM user WHERE nama='$nama'");
        $user = mysqli_fetch_assoc($query);

        if ($user) {
            if ($email == $user['email']) {
               ($password == $user['password']);
                $_SESSION['user'] = $user['nama'];
                $_SESSION['id'] = $user['id'];

            header("Location: index.php");
            exit;
        } else {
            echo "email salah";
         }
        } else {
            echo "nama tidak valid";
        }
    }
?>