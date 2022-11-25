<?php
// if (!headers_sent()) {
//     session_start();
// }
//require_once("../auth.php"); 
include("./config/config.php");
// if( !isset($_POST['nik']) ){
// // kalau tidak ada nik di query string
// header('Location: ../view/dosen.php');
// }
//deklarasikan variabel $nik dari nik
$id = $_GET['nik'];
// buat query untuk ambil data dari database
$sql = mysqli_query($sambung, "SELECT * FROM tb_mahasiswa WHERE nik_mhs=$id");
// $query = mysqli_query($sambung, $sql);
$mhs = mysqli_fetch_assoc($sql);
// jika data yang di-edit tidak ditemukan
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
                    <h2 class="section-title">Edit Mahasiswa <?= $mhs['nama_mhs'] ?></h2>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Data Mahasiswa <?= $mhs['nama_mhs'] ?></h4>
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
                            <form action="./controller/mahasiswa/ctrl_edit_mhs.php" method="POST">
                                <table class="table table-borderless">
                                    <fieldset>
                                        <tr hidden>
                                            <td class="w-20"><label for=" nik">NIK</label></td>
                                            <td class="d-flex align-items-center">:
                                                <input type="text" name="nik" value="<?php echo $mhs['nik_mhs'] ?>" />
                                            </td>
                                            <td rowspan="5">
                                                <img src="../bootstrap/images/image-not.png" class="dosenwanita" alt="Firman Asharudin">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="nama_mhs">Nama Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">:
                                                <input class="ms-2 form-control type=" text" name="nama_mhs" placeholder="nama lengkap" value="<?php echo $mhs['nama_mhs'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="alamat_mhs">Alamat Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">:
                                                <textarea class="ms-2 form-control" name="alamat_mhs"><?php echo $mhs['alamat_mhs'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                                            <td class="d-flex align-items-center">:
                                                <?php $jk = $mhs['jk_mhs']; ?>
                                                <label>
                                                    <input class="ms-2 form-check-input" type="radio" name="jk_mhs" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki
                                                </label>
                                                <label>
                                                    <input class="ms-2 form-check-input" type="radio" name="jk_mhs" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="skill_mhs">Skill Mahasiswa</label></td>
                                            <td class="d-flex align-items-center">:
                                                <?php $skill = $mhs['skill_mhs']; ?>
                                                <select class="ms-2 form-select" name="skill_mhs">
                                                    <option <?php echo ($skill == 'Nyuntik Pasta Prosesor') ? "selected" : ""
                                                            ?>>Nyuntik Pasta Prosesor</option>
                                                    <option <?php echo ($skill == 'Ngerawat Virus') ? "selected" : ""
                                                            ?>>Ngerawat Virus</option>
                                                    <option <?php echo ($skill == 'Operasi Casing') ? "selected" : ""
                                                            ?>>Operasi Casing</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--bikin tombol daftar-->
                                            <td colspan="2">
                                                <input class="btn btn-sm btn-ungu" type="submit" value="Save" name="edit" />
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