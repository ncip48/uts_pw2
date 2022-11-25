<?php
include('./view/template/navbar.php');
// if (!headers_sent()) {
//     session_start();
// }
?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Tambah Mahasiswa</h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Mahasiswa</h4>
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
                            <form action="./controller/mahasiswa/ctrl_tambah_mhs.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr>
                                            <td class="w-20"><label for=" nik">NIK</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="nik" placeholder="Masukan Nik" />
                                            </td>
                                            <td rowspan="5">
                                                <img src="../bootstrap/images/image-not.png" class="dosenwanita" alt="Firman Asharudin">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_mhs">Nama Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">: <input class="ms-2 form-control" type="text" name="nama_mhs" placeholder="Nama lengkap" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="alamat_mhs">Alamat Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">:<textarea class="ms-2 form-control" name="alamat_mhs"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                                            <td class="d-flex align-items-center">:
                                                <label>
                                                    <input class="ms-2 form-check-input" type="radio" name="jk_mhs" value="laki-laki"> Laki-laki
                                                </label>
                                                <label>
                                                    <input class="ms-2 form-check-input" type="radio" name="jk_mhs" value="perempuan">
                                                    Perempuan
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="skill_mhs">Skill Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">: <select class="ms-2 form-select" name="skill_mhs">
                                                    <option>Nyuntik Pasta Prosesor</option>
                                                    <option>Ngerawat Virus</option>
                                                    <option>Operasi Casing</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Tambah" name="daftar" />
                                                <input class="btn btn-sm btn-oren" type="button" value="Gak Jadi" onclick="window.location.href='./index.php?page=mahasiswa'" />
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