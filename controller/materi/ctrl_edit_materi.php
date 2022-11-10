<?php
session_start();
include("../../config/config.php");

if (isset($_POST['edit'])) {
    $materi = $_POST['materi'];
    $matkul = $_POST['matkul'];
    $nama_materi = $_POST['nama_materi'];
    $pertemuan = $_POST['pertemuan'];
    $tanggal = $_POST['tanggal_materi'];

    $sql = "UPDATE tb_materi SET nama_materi='$nama_materi', pertemuan='$pertemuan', tanggal_materi='$tanggal' WHERE id='$materi'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses edit materi";
        header('Location: ../../index.php?page=materi&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal edit materi";
        header('Location: ../../index.php?page=edit_materi&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
