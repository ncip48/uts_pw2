<?php
include '../../config/config.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $query = mysqli_query($sambung, "select * from tb_user where username='$username' and password='$password'");
    $result = mysqli_num_rows($query);

    if ($result > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        header("location:../../index.php?page=home");
    } else {
        $_SESSION['error'] = "Username dan password salah";
        header("location:../../index.php?page=login&app=gagal");
    }
} else {
    $_SESSION['error'] = "Username dan password tidak boleh kosong";
    header("location:../../index.php?page=login&app=error");
}
