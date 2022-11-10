<?php
session_start();
//require_once("../auth.php"); 
include("./config/config.php");
// if( !isset($_POST['nik']) ){
// // kalau tidak ada nik di query string
// header('Location: ../view/dosen.php');
// }
//deklarasikan variabel $nik dari nik
$id = $_GET['kode'];
// buat query untuk ambil data dari database
$sql = mysqli_query($sambung, "SELECT * FROM tb_matkul WHERE kode_matkul='$id'");
// $query = mysqli_query($sambung, $sql);
$matkul = mysqli_fetch_assoc($sql);
// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($sql) < 1) {
    die("data tidak ditemukan...");
}
include('./view/template/navbar.php');
?>

<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Edit Matkul <?= $matkul['nama_matkul'] ?></h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Data Matkul <?= $matkul['nama_matkul'] ?></h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['status']) && isset($_SESSION['error'])) {
                                if ($_GET['status'] == 'gagal') {
                                    echo "<div class='alert alert-danger mb-3' role='alert'>" .
                                        $_SESSION['error'] .
                                        "</div>";
                                }
                            }
                            ?>
                            <form action="./controller/matkul/ctrl_edit_matkul.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr hidden>
                                            <td class="w-20"><label for="kode">Kode</label></td>
                                            <td class="d-flex align-items-center">:
                                                <input type="text" name="kode_matkul" value="<?php echo $matkul['kode_matkul'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_matkul">Nama Matkul</label></td>
                                            <td class="d-flex align-items-center">:
                                                <input class="ms-2 form-control type=" text" name="nama_matkul" placeholder="Nama Matkul" value="<?php echo $matkul['nama_matkul'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="deskripsi_matkul">Deskripsi Matkul</label></td>
                                            <td class="d-flex align-items-center">:
                                                <textarea class="ms-2 form-control" name="deskripsi_matkul"><?php echo $matkul['deskripsi_matkul'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Save" name="edit" />
                                                <input class="btn btn-sm btn-oren" type="button" value="Gak Jadi" onclick="window.location.href='./index.php?page=matkul'" />
                                            </td>
                                            <!--bikin tombol kembali-->
                                            <td></td>
                                        </tr>
                                    </fieldset>
                                </table>
                            </form>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>