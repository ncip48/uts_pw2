<nav class="navbar navbar-expand-lg navbar-dark bg-ungu" aria-label="Fifth navbar example">
    <div class="container-fluid py-1">
        <div class="d-flex flex-column">
            <a class="navbar-brand" href="./index.php?page=home">Dashboard</a>
            <h6 class="text-white">(UTS Perancangan Web 2)</h6>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer" aria-current="page" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out me-0"></i> Logout</a>
                </li>
                <form id="logout-form" action="#" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>