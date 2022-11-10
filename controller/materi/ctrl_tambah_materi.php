<?php
session_start();
include("../../config/config.php");

if (isset($_POST['daftar'])) {
    $matkul = $_POST['matkul'];
    $nama_materi = $_POST['nama_materi'];
    $pertemuan = $_POST['pertemuan'];
    $tanggal = $_POST['tanggal_materi'];

    // validasi
    if (empty($matkul)) {
        $_SESSION['error'] = "Mata kuliah tidak boleh kosong";
        header("Location: ./index.php?page=tambah_materi&status=gagal");
    }
    if (empty($nama_materi)) {
        $_SESSION['error'] = "Gagal tambah materi. Nama materi tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_materi&status=gagal');
        return;
    }
    if (empty($pertemuan)) {
        $_SESSION['error'] = "Gagal tambah materi. Pertemuan tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_materi&status=gagal');
        return;
    }
    if (empty($tanggal)) {
        $_SESSION['error'] = "Gagal tambah materi. Tanggal tidak boleh kosong";
        header('Location: ../../index.php?page=tambah_materi&status=gagal');
        return;
    }

    //cek kode matkul
    $sql_kode = "SELECT * FROM tb_materi WHERE id_matkul='$matkul' AND pertemuan='$pertemuan'";
    $query_kode = mysqli_query($sambung, $sql_kode);
    $cek = mysqli_num_rows($query_kode);

    if ($cek != 0) {
        $_SESSION['error'] = "Gagal tambah materi. Pertemuan sudah digunakan";
        header('Location: ../../index.php?page=tambah_materi&status=gagal');
    } else {

        $sql = "INSERT INTO tb_materi (id_matkul, nama_materi, pertemuan, tanggal_materi) VALUE ('$matkul', '$nama_materi', '$pertemuan', '$tanggal')";
        $query = mysqli_query($sambung, $sql);

        if ($query) {
            $_SESSION['sukses'] = "Sukses tambah materi";
            header('Location: ../../index.php?page=materi&status=sukses');
        } else {
            $_SESSION['error'] = "Gagal tambah materi";
            header('Location: ../../index.php?page=tambah_materi&status=gagal');
        }
    }
} else {
    die('Akses dilarang...');
}
