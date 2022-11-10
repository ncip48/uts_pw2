<div class="container-fluid bg-success vh-100 align-items-center justify-content-center row p-5">
    <div class="card p-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="./assets/login.png" alt="login" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 align-items-center justify-content-center row">
                <h2>Login</h2>
                <?php
                session_start();
                if (isset($_GET['app'])) {
                    if ($_GET['app'] == 'gagal' || $_GET['app'] == 'error') {
                        echo "<div class='alert alert-danger mt-0 mb-0' role='alert'>" .
                            $_SESSION['error'] .
                            "</div>";
                    }
                }
                ?>
                <form action="./controller/auth/ctrl_login.php" method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-4">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>