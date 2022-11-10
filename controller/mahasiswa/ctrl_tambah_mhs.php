<?php
session_start();
include("../../config/config.php");

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama_mhs'];
    $alamat = $_POST['alamat_mhs'];
    $jk = $_POST['jk_mhs'];
    $skill = $_POST['skill_mhs'];

    // validasi
    if (empty($nik)) {
        $_SESSION['error'] = "Gagal tambah mahasiswa. NIK tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
        return;
    }
    if (empty($nama)) {
        $_SESSION['error'] = "Gagal tambah mahasiswa. Nama tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
        return;
    }
    if (empty($alamat)) {
        $_SESSION['error'] = "Gagal tambah mahasiswa. Alamat tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
        return;
    }
    if (empty($jk)) {
        $_SESSION['error'] = "Gagal tambah mahasiswa. JK harus dipilih";
        header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
        return;
    }

    //cek NIK
    $sql_nik = "SELECT * FROM tb_mahasiswa WHERE nik_mhs='$nik'";
    $query_nik = mysqli_query($sambung, $sql_nik);
    $cek = mysqli_num_rows($query_nik);

    if ($cek != 0) {
        $_SESSION['error'] = "Gagal tambah mahasiswa. NIK sudah digunakan";
        header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
    } else {
        $sql = "INSERT INTO tb_mahasiswa (nik_mhs, nama_mhs, alamat_mhs, jk_mhs, skill_mhs) VALUE ('$nik', '$nama', '$alamat', '$jk', '$skill')";
        $query = mysqli_query($sambung, $sql);

        if ($query) {
            $_SESSION['sukses'] = "Sukses tambah mahasiswa";
            header('Location: ../../index.php?page=mahasiswa&status=sukses');
        } else {
            $_SESSION['error'] = "Gagal tambah mahasiswa";
            header('Location: ../../index.php?page=tambah_mahasiswa&status=gagal');
        }
    }
} else {
    die('Akses dilarang...');
}
