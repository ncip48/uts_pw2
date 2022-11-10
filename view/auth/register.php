    <div class="container-fluid bg-success vh-100 align-items-center justify-content-center row p-5">
        <div class="card p-4">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <img src="./assets/login.png" alt="login" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 align-items-center justify-content-center row">
                    <h2 class="pb-3">Register</h2>
                    <?php
                    if (isset($_GET['app'])) {
                        if ($_GET['app'] == 'gagal') {
                            echo "<div class='alert alert-danger mt-0 mb-0' role='alert'>" .
                                "Register Gagal" .
                                "</div>";
                        }
                    }
                    ?>
                    <form action="./controller/auth/ctrl_register.php" method="POST">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-4">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-4">
                            <label>NIM</label>
                            <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-4">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>