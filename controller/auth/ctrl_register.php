<?php
include '../../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$no_hp = $_POST['no_hp'];

$cek = mysqli_query($sambung, "select * from tb_user where username='$username' and email='$email'");
$result_cek = mysqli_num_rows($cek);

if ($result_cek > 0) {
    header("location:.../../index.php?page=register&app=gagal");
} else {
    $sql = "INSERT INTO tb_user (username, password, email, nama, nim, no_hp) VALUES ('$username', '$password', '$email', '$nama', '$nim', '$no_hp')";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        header("location:../../index.php?page=login&app=register");
    } else {
        header("location:../../index.php?page=register&app=error");
    }
}
