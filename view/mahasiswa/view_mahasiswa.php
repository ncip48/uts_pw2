<?php
session_start();
include('./config/config.php');
?>

<?php include('./view/template/navbar.php'); ?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h4 class="section-title">List Mahasiswa</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="">
                                                    <a class="btn btn-icon icon-left btn-sm btn-ungu" href="./index.php?page=tambah_mahasiswa">Tambah</a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-md-4 ms-auto">
                                                <form id="search" method="GET" action="">
                                                    <div class="form-group">
                                                        <input type="hidden" name="page" value="mahasiswa">
                                                        <input type="text" name="query" class="form-control" id="query" placeholder="cari..." autocomplete="off" value="<?= @$_GET['query'] ?>">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['status']) && isset($_SESSION['sukses'])) {
                                        if ($_GET['status'] == 'sukses') {
                                            echo "<div class='alert alert-warning my-3' role='alert'>" .
                                                $_SESSION['sukses'] .
                                                "</div>";
                                        }
                                    }
                                    if (isset($_GET['status']) && isset($_SESSION['error'])) {
                                        if ($_GET['status'] == 'gagal') {
                                            echo "<div class='alert alert-danger my-3' role='alert'>" .
                                                $_SESSION['error'] .
                                                "</div>";
                                        }
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="tr">
                                                    <th class="satu">No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Skill</th>
                                                    <th>Mau Diapain</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['query'])) {
                                                    $sql = "SELECT * FROM tb_mahasiswa WHERE nama_mhs LIKE '%" . $_GET['query'] . "%' OR nik_mhs LIKE '%" . $_GET['query'] . "%'";
                                                } else {
                                                    $sql = "SELECT * FROM tb_mahasiswa";
                                                }
                                                $query = mysqli_query($sambung, $sql);
                                                $jumlah = mysqli_num_rows($query);
                                                $nomor = 1;
                                                while ($mhs = mysqli_fetch_array($query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $nomor . "</td>";
                                                    echo "<td>" . $mhs['nik_mhs'] . "</td>";
                                                    echo "<td>" . $mhs['nama_mhs'] . "</td>";
                                                    echo "<td>" . $mhs['alamat_mhs'] . "</td>";
                                                    echo "<td>" . $mhs['jk_mhs'] . "</td>";
                                                    echo "<td>" . $mhs['skill_mhs'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='./index.php?page=edit_mahasiswa&nik=" . $mhs['nik_mhs'] . "'>Edit</a> | ";
                                                    echo "<a href='./controller/mahasiswa/ctrl_hapus_mhs.php?nik=" . $mhs['nik_mhs'] . "'>Hapus</a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    $nomor++;
                                                }
                                                if ($jumlah == 0) {
                                                    echo "<tr>";
                                                    echo "<td colspan='7' class='text-center'>Data tidak ditemukan</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>