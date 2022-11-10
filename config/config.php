<?php

$server = '103.121.122.247';
$user = 'pw2_uts';
$password = 'mbahcip123';
$nama_database = 'pw2_uts';

const AUTHOR = 'HERLY CHAHYA PUTRA';

$sambung = mysqli_connect($server, $user, $password, $nama_database);
if (!$sambung) {
    die('Ada masalah koneksi ke database: ' . mysqli_connect_error());
}
