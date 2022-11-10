<?php
include('./view/template/navbar.php');
session_start();
?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Tambah Matkul</h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Matkul</h4>
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
                            <form action="./controller/matkul/ctrl_tambah_matkul.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr>
                                            <td><label for="kode_matkul">Kode Matkul</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="kode_matkul" placeholder="Kode Matkul" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_matkul">Nama Matkul</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="nama_matkul" placeholder="Nama Matkul" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="deskripsi_matkul">Deskripsi Matkul</label></td>
                                            <td class="d-flex align-items-center">:<textarea class="ms-2 form-control" name="deskripsi_matkul"></textarea></td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Tambah" name="daftar" />
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