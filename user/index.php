<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
    header("location: login.php");
    exit();
}


?>
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
        <div class=" col-2 d-none d-md-block bg-dark min-vh-100 py-4 px-2  ">
            <div id="userprofile">
                <img src="../asset/logo.jpeg" alt="user image"
                    class="mx-auto d-block  rounded-circle bg-primary  img-thumbnail" style="
                    width: 50px;
                    height: 50px;
                    ">
                <?php
                ?>
                <p class="text-center text-white mt-2"><?= $_SESSION['user']['Username'] ?></p>
                <hr class="text-primary ">
                <nav>
                    <ul class=" nav  flex-column gap-3  ">
                        <li class="nav-item rounded-3">
                            <a class=" nav-link " aria-current="page" href="/user/">Home</a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link" href="user/persyaratan.php">Persyaratan</a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link" href="user/pendaftaran.php">Pendaftaran</a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link Logout" href="/logout.php">Logout </a>
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
                        <img src="../asset/logo.jpeg" alt="logo" class="img-hero   mx-auto d-block  ">
                    </div>
                    <div class="col-6 ">
                        <p class="fs-4  fw-bold text-dark ">Pondok Pesantren Ali Bin Ali Thalib</p>
                        <small class="address">
                            JL. Mayor Daud Umar, Dowora, Kec Tidore Timur
                        </small>
                    </div>
                </div>
                <!-- end hamburger menu -->
                <hr>

                <div class="p-5 ">

                    <h1 class="text-primary fw-bold">Selamat Datang <?= $_SESSION['user']['Username'] ?></h1>

                    <p class="text-center mx-auto mt-4 fw-bolder fs-4  " style="max-width: 800px;">Selamat Datang di
                        Webstie Pendaftaran santri, pondok pesantren Ali Bin Ali Thalib, Wabsite ini
                        Memeerikan layanan pendaftaraan online bagi calon santri yang inin memasuki pondok pesantren ali
                        bin ali thalib</p>

                    <div class="my-5 ">

                        <h2 class="text-primary"># Cara Mendaftar </h2>

                        <p>
                            Bagaiaman cara untuk melakukan pendaftaran melewati Website ini , beriku caranya :

                        </p>
                        <ol>
                            <li>
                                Sebelum melakukan Pendaftaran di Menu <a href="">Pendaftaran</a>, Terlebih dahulu buka
                                Menu
                                <a href="">Persyaratan</a> untuk memastikan calon santri sudah memenuhi semua
                                Persyaratan
                            </li>
                            <li>
                                Buka menu <a href="">Persyaratan</a> isi semua data yang di perlukan untuk pendaftaran,
                                isi
                                secara lengkpa
                            </li>
                            <li>
                                Setelah mengisi pendaftaran, admin akan memverifikasi dana kan mengirim informasi lebih
                                lanjut melalui nomor yang telah di berikan di pendaftaraan.
                            </li>
                        </ol>

                    </div>


                    <div class="my-5 ">

                        <h2 class="text-primary mt-4 d-block "># info Lebih lanjut </h2>
                        <a href="" class=" d-flex gap-4 align-items-center text-center ">
                            <img src="../asset/whatsapp.png" alt="whatsapp" style="width: 5rem;" class="">
                            <span>Admin</span>
                        </a>
                    </div>
                </div>


            </div>


        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>