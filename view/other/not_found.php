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
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <div class="error mx-auto" data-text="404">
                                    404
                                </div>
                                <p class="lead text-gray-800 mb-5">Page Not Found</p>
                                <p class="text-gray-500 mb-0">
                                    It looks like you found a glitch in the matrix...
                                </p>
                                <a href="./index.php?page=home">
                                    &larr; Back to main
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>