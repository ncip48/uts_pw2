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
                    <h4 class="section-title">List Materi</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="">
                                                    <a class="btn btn-icon icon-left btn-sm btn-ungu" href="./index.php?page=tambah_materi">Tambah</a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-md-4 ms-auto">
                                                <form id="search" method="GET" action="">
                                                    <div class="form-group">
                                                        <input type="hidden" name="page" value="materi">
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
                                                    <th>Nama Matkul</th>
                                                    <th>Nama Materi</th>
                                                    <th>Pertemuan ke</th>
                                                    <!-- <th>Tanggal</th> -->
                                                    <th>Mau Diapain</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['query'])) {
                                                    $sql = "SELECT a.*, b.nama_matkul FROM tb_materi a LEFT JOIN tb_matkul b ON a.id_matkul = b.id WHERE a.nama_materi LIKE '%" . $_GET['query'] . "%'";
                                                } else {
                                                    $sql = "SELECT a.*, b.nama_matkul FROM tb_materi a LEFT JOIN tb_matkul b ON a.id_matkul = b.id";
                                                }
                                                $query = mysqli_query($sambung, $sql);
                                                $jumlah = mysqli_num_rows($query);
                                                $nomor = 1;
                                                while ($mhs = mysqli_fetch_array($query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $nomor . "</td>";
                                                    echo ($mhs['nama_matkul']) ? "<td>" . $mhs['nama_matkul'] . "</td>" : '<td>-</td>';
                                                    echo "<td>" . $mhs['nama_materi'] . "</td>";
                                                    echo "<td>" . $mhs['pertemuan'] . "</td>";
                                                    // echo "<td>" . $mhs['tanggal_materi'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='./index.php?page=edit_materi&id=" . $mhs['id'] . "'>Edit</a> | ";
                                                    echo "<a href='./controller/materi/ctrl_hapus_materi.php?id=" . $mhs['id'] . "'>Hapus</a>";
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