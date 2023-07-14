<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="assets/img/favicon-96x96.png" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon-96x96.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>SIMAHAS</title>
</head>
<body>
    <!--Navigasi-->
    <nav class="navbar navbar-expand-lg text-light">
        <div class="container">
            <a class="navbar-brand" href="#">SIMAHAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto gap-lg-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Akhir Navigasi-->

    <!--Hero Section-->
        <div class="container" id="beranda">
            <div class="row hero">
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="lh-lg display-3 fw-bolder">SELAMAT DATANG</h1>
                        <h3 class="lh-lg display-5 fw-bold">DI WEBSITE</h3>
                        <h1 class="lh-lg display-6 fw-bolder">SIMAHAS</h1>
                        <h3 class="lh-lg fw-bolder">UNIVERSITAS KATOLIK SANTO THOMAS</h3>
                        <a href="#" class="lh-lg btn btn-secondary">Profile</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-md-3 d-flex align-items-center hero-image">
                    <img src="assets/img/hero.svg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    <!--End Hero Section-->

    <!--Kegiatan-->
        <div class="container" id="kegiatan">
            <div class="kegiatan d-flex gap-5 gap-md-3 justify-content-center flex-wrap">
                <div class="card p-3" style="width: 20rem;">
                    <img src="assets/img/kegiatan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Kunjungan Asrama</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22-05-2023</h6>
                        <p class="card-text">Pada Hari Senin, 22-05-2023 telah dilaksanakan kunjungan asrama di lingkungan Santo Thomas Medan.</p>
                        <a href="#" class="btn btn-secondary">Detail . . .</a>
                    </div>
                </div>
                <div class="card p-3" style="width: 20rem;">
                    <img src="assets/img/kegiatan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Kunjungan Asrama</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22-05-2023</h6>
                        <p class="card-text">Pada Hari Senin, 22-05-2023 telah dilaksanakan kunjungan asrama di lingkungan Santo Thomas Medan.</p>
                        <a href="#" class="btn btn-secondary">Detail . . .</a>
                    </div>
                </div>
                <div class="card p-3" style="width: 20rem;">
                    <img src="assets/img/kegiatan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Kunjungan Asrama</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22-05-2023</h6>
                        <p class="card-text">Pada Hari Senin, 22-05-2023 telah dilaksanakan kunjungan asrama di lingkungan Santo Thomas Medan.</p>
                        <a href="#" class="btn btn-secondary">Detail . . .</a>
                    </div>
                </div>
            </div>
        </div>
    <!--Akhir Kegiatan-->

    <!--Login-->
        <div class="container mt-5" id="login">
            <div class="login">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-md-7 card rounded-4 p-4">
                        <h3 class="mb-4 text-center fw-bolder text-light">Login Simahas</h3>
                        <form action="page/_login.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="kunci" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating d-flex flex-column justify-content-center align-items-center">
                                <button class="btn btn-dark" type="submit">LOGIN</button>
                                <p class="mt-3 text-light">Belum punya akun? <a href="page/_registrasi.php" class="fw-bolder text-decoration-none text-dark">Daftar</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Akhir Login-->

    <!--Footer-->
    <div class="blockcode mt-4">
        <footer class="shadow">
            <div
                class="d-flex justify-content-between align-items-center mx-auto py-4 flex-wrap text-center"
                style="width: 80%"
            >
                <small>&copy; Henry Jr, 2023. Sistem Informasi - Unika Santo Thomas.</small>
            </div>
        </footer>
    </div>
    <!--Akhir Footer-->

    <script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>