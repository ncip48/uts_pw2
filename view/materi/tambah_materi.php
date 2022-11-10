<?php
include('./view/template/navbar.php');
include('./config/config.php');
session_start();
?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Tambah Materi</h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Materi</h4>
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
                            <form action="./controller/materi/ctrl_tambah_materi.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr>
                                            <td><label for="matkul">Matkul</label></td>
                                            <td class="d-flex align-items-center">:
                                                <select class="ms-2 form-select" name="matkul">
                                                    <?php
                                                    $sql = "SELECT * FROM tb_matkul";
                                                    $query = mysqli_query($sambung, $sql);
                                                    while ($matkul = mysqli_fetch_array($query)) {
                                                        echo "<option value='" . $matkul['id'] . "'>" . $matkul['nama_matkul'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_materi">Nama Materi</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="nama_materi" placeholder="Nama Materi" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="pertemuan">Pertemuan ke</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="number" name="pertemuan" placeholder="Pertemuan" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="tanggal_materi">Tanggal</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="datetime-local" name="tanggal_materi" placeholder="Tanggal" value="<?php echo date('Y-m-d\TH:i:s'); ?>" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Tambah" name="daftar" />
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