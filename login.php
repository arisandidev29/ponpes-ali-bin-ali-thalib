
<?php
    session_start();
    require_once "db/getConn.php";

    if(isset($_SESSION['user'])) {
        header("location: /admin/");
        exit();
    }

    if(isset($_POST['login']) ) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if(!empty($username) && !empty($password)) {
            $sql = "SELECT * FROM users WHERE Username = ? AND Password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username,$password]);
            if($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['user'] = $result;
                header("Location: /admin/");
                exit();
            }else {
                $error = 'Password atau Username Salah ';
            }
        } else {
            $error = 'password dan username wajib di isi ';
        }

    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>login | aplikasi pendaftaran santri baru ponpes ali bin ali thalib</title>
</head>

<body class="">
    <div class="row">
        <div class="col-md-8  min-vh-100 display-1 text-white d-none  d-md-flex flex-column justify-content-center align-items-center "
            style="
            background-image: url('asset/2022-07-14.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; 
            ">
            <p class="fw-bold">Pondok Pesantren</p>
            <p>Ali Bin Ali thalib</p>
        </div>

        <div class="col-md-4 col-sm-12 py-4  ">
            <img src="asset/logo.jpeg" alt="logo" class="w-25 m-auto d-block ">

            <p class="text-center fs-5 fs-md-2 text-dark">Website Pendaftaran Santri Baru Ponpes Ali Bin ali Thalib</p>

            <p class="text-center text-primary fs-2 ">Login</p>

            
            <form class="w-75 mx-auto" method="post" action="">
                <?php if(isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="" class="form-label text-primary fs-md-5 ">Username</label>
                    <input type="text" class="form-control bg- rounded-pill py-md-3  fs-md-5 text-dark px-4 " name="username" id="" aria-describedby="helpId" placeholder="" />
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-primary fs-md-5 ">Password</label>
                    <input
                        type="password"
                        class="form-control rounded-pill py-md-3 fs-md-4  text-dark px-4"
                        name="password"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>

                <button
                    type="submit"
                    name="login"
                    class="w-100 rounded-pill py-md-3 fs-md-4  btn btn-primary"
                >
                Login
                </button>

                <small class="d-block mt-1  text-center">Belum punya akun ? <a href="" class="text-dark  fst-italic text-decoration-none">Daftar disini </a></small>
                
                

            </form>

            
            
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>