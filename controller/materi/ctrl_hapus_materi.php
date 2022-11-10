<?php
session_start();
include("../../config/config.php");

if (isset($_GET['id'])) {
    $kode = $_GET['id'];

    $sql = "DELETE FROM tb_materi WHERE id='$kode'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses hapus materi";
        header('Location: ../../index.php?page=materi&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal hapus materi";
        header('Location: ../../index.php?page=materi&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
