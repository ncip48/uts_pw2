<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'login':
        include "view/auth/login.php";
        break;
    case 'register':
        include "view/auth/register.php";
        break;
        //home
    case 'home':
        include "view/home/view_home.php";
        break;
    case 'dashboard':
        include "view/home/view_home.php";
        break;
        //mahasiswa
    case 'mahasiswa':
        include "view/mahasiswa/view_mahasiswa.php";
        break;
    case 'tambah_mahasiswa':
        include "view/mahasiswa/tambah_mahasiswa.php";
        break;
    case 'edit_mahasiswa':
        include "view/mahasiswa/edit_mahasiswa.php";
        break;

    case 'matkul':
        include "view/matkul/view_matkul.php";
        break;
    case 'tambah_matkul':
        include "view/matkul/tambah_matkul.php";
        break;
    case 'edit_matkul':
        include "view/matkul/edit_matkul.php";
        break;

    case 'materi':
        include "view/materi/view_materi.php";
        break;
    case 'tambah_materi':
        include "view/materi/tambah_materi.php";
        break;
    case 'edit_materi':
        include "view/materi/edit_materi.php";
        break;

    default:
        include "view/other/not_found.php";
}
