<?php 
    include 'koneksi.php';
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM user_santri WHERE id='$id'");

    header("Location: data_user.php");
?>