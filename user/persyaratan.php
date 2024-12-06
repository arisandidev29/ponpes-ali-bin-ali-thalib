<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>User page</title>
</head>

<body>
    <div class="row gx-0">
        <div class="  col-2 d-none d-md-block bg-dark min-vh-100 py-4 px-2  ">
            <div id="userprofile">
                <img src="../asset/logo.jpeg" alt="user image"
                    class="mx-auto d-block  rounded-circle bg-primary  img-thumbnail" style="
                    width: 50px;
                    height: 50px;
                    ">
                <p class="text-center text-white mt-2">Username </p>
                <hr class="text-primary ">
                <nav>
                    <ul class=" nav  flex-column gap-3  ">
                        <li class="nav-item rounded-3">
                            <a class=" nav-link d-flex  justify-content-between " aria-current="page" href="/user">
                                Home
                                <i class="bi bi-house"></i>


                            </a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link d-flex justify-content-between" href="persyaratan.php">
                                Persyaratan

                                <i class="bi bi-info-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link d-flex justify-content-between" href="pendaftaran.php">
                                Pendaftaran
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link d-flex justify-content-between Logout" href="/logout.php">
                                Logout
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>


        </div>
        <div class="col-12 col-md-10">
            <div>

                 <div class="row align-items-center px-1 mx-2 ">
                    <!-- hamburger menu -->
                    <div class="col-2 d-sm-none">
                        <button class="btn btn-primary " type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                                class="bi bi-list"></i></button>

                        <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" data-bs-backdrop="false"
                            tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                            <div class="offcanvas-header">
                                <h5 class="text-white offcanvas-title" id="offcanvasScrollingLabel">
                                    Menu
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <nav class="w-100 px-4">
                                    <ul class=" nav  flex-column gap-3  ">
                                        <li class="nav-item rounded-3">
                                            <a class=" nav-link " aria-current="page" href="/user">Home</a>
                                        </li>
                                        <li class="nav-item rounded-3">
                                            <a class="nav-link" href="/user/persyaratan.php">Persyaratan</a>
                                        </li>
                                        <li class="nav-item rounded-3">
                                            <a class="nav-link" href="/user/pendaftaran.php">Pendaftaran</a>
                                        </li>
                                        <li class="nav-item rounded-3">
                                            <a class="nav-link Logout" href="/logout.php">Logout </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 py-2 ">
                        <img src="../asset/logo.jpeg" alt="logo" class="w-100 img-fluid  mx-auto d-block  ">
                    </div>
                    <div class="col-6 ">
                        <p class="fs-6  fw-bold text-dark ">Pondok Pesantren Ali Bin Ali Thalib</p>
                        <small class="address">
                            JL. Mayor Daud Umar, Dowora, Kec Tidore Timur
                        </small>
                    </div>
                </div>
                <!-- end hamburger menu --> 
                <hr>

                <div class="p-5 ">

                    <h1 class="text-primary">Persyaratan</h1>

                    <hr class="text-primary ">

                    <h3>Syarat Pendaftaran</h3>
                    <ul>
                        <li>Scan Akta Kelahiran & KK</li>
                        <li>Scan Hasil cek kesehatan dati Rumah Sakit Setempat</li>
                        <li>Pas Foto 3x4</li>
                        <li>scan Raport 5 semester terakhir</li>
                    </ul>
                </div>



            </div>


        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>