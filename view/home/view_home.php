<?php
include('./config/config.php');

$sql_matkul = "SELECT * FROM tb_matkul";
$query_matkul = mysqli_query($sambung, $sql_matkul);
$jumlah_matkul = mysqli_num_rows($query_matkul);

$sql_materi = "SELECT * FROM tb_materi";
$query_materi = mysqli_query($sambung, $sql_materi);
$jumlah_materi = mysqli_num_rows($query_materi);
?>

<?php include('./view/template/navbar.php'); ?>
<div class="container-fluid">
    <div class="row">
        <?php include('./view/template/sidebar.php'); ?>
        <div class="col-md-9 bg-bg p-4">
            <section class="section">
                <div class="section-body">
                    <h4 class="section-title">Dashboard</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-4 py-3 px-5 row-cols-1 row-cols-lg-3">
                                        <div class="feature col">
                                            <div class="feature-icon bg-ungu2 bg-gradient">
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <h4><?= $jumlah_matkul ?> Mata Kuliah</h4>
                                            <a href="./index.php?page=matkul" class="icon-link text-decoration-none">
                                                Lihat Data
                                                <i class="ms-2 fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="feature col">
                                            <div class="feature-icon bg-ungu2 bg-gradient">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <h4><?= $jumlah_materi ?> Materi Kuliah</h4>
                                            <a href="./index.php?page=materi" class="icon-link text-decoration-none">
                                                Lihat Data
                                                <i class="ms-2 fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="feature col">
                                            <div class="feature-icon bg-ungu2 bg-gradient">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <h4>Data Lain</h4>
                                            <a href="http://google.com" class="icon-link text-decoration-none">
                                                Gatau...
                                                <i class="ms-2 fa fa-chevron-right"></i>
                                            </a>
                                        </div>
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