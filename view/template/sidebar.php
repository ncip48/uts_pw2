<?php
$page = $_GET['page'];
?>
<div class="col-md-3 ps-0 pe-0 bg-ungu2 min-vh-100">
    <div class="d-flex flex-column flex-shrink-0 p-4 bg-ungu2 sidebar-new text-white">
        <div class="d-flex flex-row align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
            <img src="./assets/images/profile.png" class="rounded-circle img-thumbnail h-25 w-25 me-4" alt="profile">
            <div class="d-flex flex-column align-items-start mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
                <span class="fs-5 fw-bold">Halo, <?= AUTHOR ?></span>
                <span>(<?= NIM ?>)</span>
            </div>
        </div>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
            <li>

                <a href="./index.php?page=dashboard" class="btn btn-toggle align-items-center rounded <?php echo ($page) == 'home' || ($page) == 'dashboard' ? 'active' : '' ?>">
                    <i class="fa fa-tachometer me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>

                <a href="./index.php?page=matkul" class="btn btn-toggle align-items-center rounded <?php echo ($page) == 'matkul' ? 'active' : '' ?>">
                    <i class="fa fa-book me-2"></i>
                    Mata Kuliah
                </a>
            </li>
            <li>

                <a href="./index.php?page=materi" class="btn btn-toggle align-items-center rounded <?php echo ($page) == 'materi' ? 'active' : '' ?>">
                    <i class="fa fa-calendar me-2"></i>
                    Materi Kuliah
                </a>
            </li>
        </ul>
    </div>
</div>