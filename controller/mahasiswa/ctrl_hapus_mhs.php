<?php
session_start();
include("../../config/config.php");

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    $sql = "DELETE FROM tb_mahasiswa WHERE nik_mhs='$nik'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses hapus mahasiswa";
        header('Location: ../../index.php?page=mahasiswa&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal hapus mahasiswa";
        header('Location: ../../index.php?page=mahasiswa&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
