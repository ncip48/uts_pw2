<?php
session_start();
include("../../config/config.php");

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    $sql = "DELETE FROM tb_matkul WHERE kode_matkul='$kode'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses hapus matkul";
        header('Location: ../../index.php?page=matkul&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal hapus matkul";
        header('Location: ../../index.php?page=matkul&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
