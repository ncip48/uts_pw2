<?php
session_start();
include("../../config/config.php");

if (isset($_POST['edit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama_mhs'];
    $alamat = $_POST['alamat_mhs'];
    $jk = $_POST['jk_mhs'];
    $skill = $_POST['skill_mhs'];

    $sql = "UPDATE tb_mahasiswa SET nik_mhs='$nik', nama_mhs='$nama', alamat_mhs='$alamat', jk_mhs='$jk', skill_mhs='$skill' WHERE nik_mhs='$nik'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        $_SESSION['sukses'] = "Sukses edit mahasiswa";
        header('Location: ../../index.php?page=mahasiswa&status=sukses');
    } else {
        $_SESSION['error'] = "Gagal edit mahasiswa";
        header('Location: ../../index.php?page=edit_mahasiswa&status=gagal');
    }
} else {
    die('Akses dilarang...');
}
