<?php
include('./view/template/navbar.php');
include('./config/config.php');
session_start();

$query = "SELECT a.*, b.nama_matkul, b.id as id_matkul FROM tb_materi a JOIN tb_matkul b ON a.id_matkul = b.id WHERE a.id='$_GET[id]'";
$sql = mysqli_query($sambung, $query);
$materi = mysqli_fetch_assoc($sql);
if (mysqli_num_rows($sql) < 1) {
    die("data tidak ditemukan...");
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Edit Materi</h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Data Materi</h4>
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
                            <form action="./controller/materi/ctrl_edit_materi.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr>
                                            <td><label for="matkul">Matkul</label></td>
                                            <td class="d-flex align-items-center">:
                                                <input class="ms-2 form-control" type="text" placeholder="Nama Materi" value="<?= $materi['nama_matkul'] ?>" readonly />
                                                <input class="ms-2 form-control" type="hidden" name="matkul" placeholder="Nama Materi" value="<?= $materi['id_matkul'] ?>" />
                                                <input class="ms-2 form-control" type="hidden" name="materi" placeholder="Nama Materi" value="<?= $materi['id'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_materi">Nama Materi</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="nama_materi" placeholder="Nama Materi" value="<?= $materi['nama_materi'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="pertemuan">Pertemuan ke</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="number" name="pertemuan" placeholder="Pertemuan" value="<?= $materi['pertemuan'] ?>" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="tanggal_materi">Tanggal</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="datetime-local" name="tanggal_materi" placeholder="Tanggal" value="<?= $materi['tanggal_materi'] ?>" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Save" name="edit" />
                                                <input class="btn btn-sm btn-oren" type="button" value="Gak Jadi" onclick="window.location.href='./index.php?page=materi'" />
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