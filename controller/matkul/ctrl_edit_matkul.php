<?php
session_start();
include("../../config/config.php");

if (isset($_POST['edit'])) {
    $kode = $_POST['kode_matkul'];
    $nama = $_POST['nama_matkul'];
    $deskripsi = $_POST['deskripsi_matkul'];

    $sql = "UPDATE tb_matkul SET nama_matkul='$nama', deskripsi_matkul='$deskripsi' WHERE kode_matkul='$kode'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses edit matkul";
        header('Location: ../../index.php?page=matkul&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal edit matkul";
        header('Location: ../../index.php?page=edit_matkul&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
