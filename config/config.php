<?php

$server = 'db';
$user = 'root';
$password = '';
$nama_database = 'db_bljr';

const AUTHOR = 'Dwi Elok Nuraini';
const NIM = '2041720177';

$sambung = mysqli_connect($server, $user, $password, $nama_database);
if (!$sambung) {
    die('Ada masalah koneksi ke database: ' . mysqli_connect_error());
}
