<?php
session_start();
require_once "../db/getConn.php";

if (isset($_POST['daftar'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $jenis_kel = htmlspecialchars($_POST['jenis_kel']);
    $tingkatan = htmlspecialchars($_POST['tingkatan']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tempat_lhr = htmlspecialchars($_POST['tempat_lhr']);
    $tanggal_lhr = htmlspecialchars($_POST['tanggal_lhr']);
    $sekolah = htmlspecialchars($_POST['sekolah']);
    $no_pendaftaraan = htmlspecialchars($_POST['no_pendaftaraan']);

    $sql = "INSERT INTO daftar_peserta (nama,email,tingkatan,no_hp,jenis_kel,alamat,tempat_lhr,tanggal_lhr, no_pendaftaraan, id_user) VALUE (?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$nama, $email, $tingkatan, $no_hp, $jenis_kel, $alamat, $tempat_lhr, $tanggal_lhr, $no_pendaftaraan, $_SESSION['user']['id']]);

    if ($stmt->rowCount() > 0) {
        $id = $_SESSION['user']['id'];
        $is_register = $conn->exec("UPDATE users SET is_register = 1 WHERE id = '$id'");
        $user = $conn->query("SELECT * FROM users where id = '$id'", PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user->fetch(PDO::FETCH_ASSOC);
        $message = 'Pendaftaran Berhasil ';
    }
}

if ($_SESSION['user']['is_register']) {
    $no_pendaftaraan = "pp-abab-2024-000" . $_SESSION['user']['id'];
    $sql = "SELECT * FROM daftar_peserta WHERE no_pendaftaraan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$no_pendaftaraan]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                            <a class=" nav-link " aria-current="page" href="/user">Home</a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link" href="persyaratan.php">Persyaratan</a>
                        </li>
                        <li class="nav-item rounded-3">
                            <a class="nav-link" href="pendaftaran.php">Pendaftaran</a>
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

                    <h1 class="text-primary">Pendaftaran Santri</h1>

                    <hr class="text-primary ">

                    <?php if ($_SESSION['user']['is_register']): ?>
                        <?php if (isset($message)):       ?>
                            <div class="alert alert-info">
                                <?= $message ?>
                            </div>

                        <?php endif;  ?>
                        <h3 class="text-dark ">Kamu Sudah Melakukan Pendaftaran </h3>
                        detail Pendaftaran


                        <table class="table">
                            <tr>
                                <th>Nomor Pendaftaran</th>
                                <td><?= $result['no_pendaftaraan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $result['nama'] ?></td>
                            </tr>    
                            <tr>
                                <th>Email</th>
                                <td><?= $result['email'] ?></td>
                            </tr>
                            <tr>
                                <th>tingkatan</th>
                                <td><?= $result['tingkatan'] ?></td>
                            </tr>
                            <tr>
                                <th>jenis kelamin</th>
                                <td><?= $result['jenis_kel'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $result['alamat'] ?></td>
                            </tr>
                            <tr>
                                <th>tempat lahir</th>
                                <td><?= $result['tempat_lhr'] ?></td>
                            </tr>
                            <tr>
                                <th>tanggal lahir</th>
                                <td><?= $result['tanggal_lhr'] ?></td>
                            </tr>
                            <tr>

                            </tr>
                        </table>

                    <?php else: ?>


                        <form method="post" action="" class="container-md">
                            <div class=" row">
                                <div class="mb-3 col-12">
                                    <label for="" class="form-label text-primary fs-5">nomor Pendaftaran</label>
                                    <input type="text" class="form-control" name="no_pendaftaraan" id="" aria-describedby="helpId"
                                        placeholder="" value="<?php
                                                                echo "pp-abab-2024-000" . $_SESSION['user']['id']
                                                                ?>" required readonly />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label text-primary fs-5">Name</label>
                                    <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId"
                                        placeholder="" required />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label text-primary fs-5">Email</label>
                                    <input type="email" class="form-control" name="email" id="" aria-describedby="helpId"
                                        placeholder="" required />
                                </div>

                                <div class="my-2 ">
                                    <p class="text-primary fs-5">Daftar Sebagai </p>
                                    <select class="form-select" aria-label="Default select example" name="tingkatan" required>
                                        <option value="wustha" selected>Wustha / Setara SMP</option>
                                        <option value="ulya">Ulya / Setara SMA</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label text-primary fs-5">No.HP</label>
                                    <input type="text" class="form-control" name="no_hp" id=""
                                        aria-describedby="helpId" placeholder="No.Hp " required />
                                </div>

                                <div class="col-md-6">
                                    <p class="text-primary fs-5  ">Jenis Kelamin</p>
                                    <div class="d-flex gap-5  ">
                                        <div class="form-check">
                                            <input class="form-check-input bg-dark" type="radio" name="jenis_kel"
                                                id="exampleRadios0" value="laki-laki" checked>
                                            <label class="form-check-label" for="exampleRadios0">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kel"
                                                id="exampleRadios1" value="perempuan">
                                            <label class="form-check-label" for="exampleRadios1">Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fs-5 text-primary">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="" rows="3" required></textarea>
                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label text-primary fs-5">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lhr" id=""
                                        aria-describedby="helpId" placeholder="" required />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label text-primary fs-5">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lhr" id=""
                                        aria-describedby="helpId" placeholder="" required />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="" class="form-label text-primary fs-5">Sekolah Sebelumnya </label>
                                    <input type="text" class="form-control" name="sekolah" id=""
                                        aria-describedby="helpId" placeholder="" required />
                                </div>
                                <div>

                                    <span class="text-bold my-2 d-block text-primary fs-5 ">Upload Scan File</span>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" class="form-control" id="inputGroupFile01">
                                    </div>

                                    <ul>
                                        <li>Scan Akta Kelahiran dan KK, hasil cek kesehatan , pas foto 3x4, dan fotokopi
                                            Raport 5 Semester Terakhir <span class="text-bold">Gabung jadi Satu</span></li>
                                        <li>Format File Berupa PDF</li>
                                        <li>Ukuran Maximal 2mb</li>
                                    </ul>

                                </div>
                                <input name="daftar" id="" class="btn btn-primary fs-5  " type="submit" value="Kirim" />
                            </div>
                        </form>

                    <?php endif; ?>


                </div>


            </div>


        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>