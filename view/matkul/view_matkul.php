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
                    <h4 class="section-title">List Matkul</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="">
                                                    <a class="btn btn-icon icon-left btn-sm btn-ungu" href="./index.php?page=tambah_matkul">Tambah</a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-md-4 ms-auto">
                                                <form id="search" method="GET" action="">
                                                    <div class="form-group">
                                                        <input type="hidden" name="page" value="matkul">
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
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Mau Diapain</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['query'])) {
                                                    $sql = "SELECT * FROM tb_matkul WHERE nama_matkul LIKE '%" . $_GET['query'] . "%'";
                                                } else {
                                                    $sql = "SELECT * FROM tb_matkul";
                                                }
                                                $query = mysqli_query($sambung, $sql);
                                                $jumlah = mysqli_num_rows($query);
                                                $nomor = 1;
                                                while ($matkul = mysqli_fetch_array($query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $nomor . "</td>";
                                                    echo "<td>" . $matkul['kode_matkul'] . "</td>";
                                                    echo "<td>" . $matkul['nama_matkul'] . "</td>";
                                                    echo "<td>" . $matkul['deskripsi_matkul'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='./index.php?page=edit_matkul&kode=" . $matkul['kode_matkul'] . "'>Edit</a> | ";
                                                    echo "<a href='./controller/matkul/ctrl_hapus_matkul.php?kode=" . $matkul['kode_matkul'] . "'>Hapus</a>";
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