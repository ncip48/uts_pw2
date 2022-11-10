<?php
session_start();
include("../../config/config.php");

if (isset($_POST['daftar'])) {
    $kode = $_POST['kode_matkul'];
    $nama = $_POST['nama_matkul'];
    $deskripsi = $_POST['deskripsi_matkul'];

    // validasi
    if (empty($kode)) {
        $_SESSION['error'] = "Kode Matkul tidak boleh kosong";
        header("Location: ./index.php?page=tambah_matkul&status=gagal");
    }
    if (empty($nama)) {
        $_SESSION['error'] = "Gagal tambah matkul. Nama matkul tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_matkul&status=gagal');
        return;
    }
    if (empty($deskripsi)) {
        $_SESSION['error'] = "Gagal tambah matkul. Deskripsi matkul tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_matkul&status=gagal');
        return;
    }

    //cek kode matkul
    $sql_kode = "SELECT * FROM tb_matkul WHERE kode_matkul='$kode'";
    $query_kode = mysqli_query($sambung, $sql_kode);
    $cek = mysqli_num_rows($query_kode);

    if ($cek != 0) {
        $_SESSION['error'] = "Gagal tambah matkul. Kode sudah digunakan";
        header('Location: ../../index.php?page=tambah_matkul&status=gagal');
    } else {

        $sql = "INSERT INTO tb_matkul (kode_matkul, nama_matkul, deskripsi_matkul) VALUE ('$kode', '$nama', '$deskripsi')";
        $query = mysqli_query($sambung, $sql);

        if ($query) {
            $_SESSION['sukses'] = "Sukses tambah mata kuliah";
            header('Location: ../../index.php?page=matkul&status=sukses');
        } else {
            $_SESSION['error'] = "Gagal tambah mata kuliah";
            header('Location: ../../index.php?page=tambah_matkul&status=gagal');
        }
    }
} else {
    die('Akses dilarang...');
}
