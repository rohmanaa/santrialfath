<?php 
ob_start();
session_start();
error_reporting(0);
include 'php/config.php';
$sesi_username = $_SESSION['id_karyawan'] ?? null;
if ($sesi_username == null || empty($sesi_username)) {
    session_destroy();
    header('Location:login.php');
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Alfath App</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-highlight="highlight-red">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


    <div id="page">

        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="<?=$base_url?>index.php" class="header-title">Profile </a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
        </div>


        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>profile.php" class="header-title"></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        

        <div class="page-title-clear mt-n3"></div>
        <?php
$tampilPeg = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='{$_SESSION['id_karyawan']}'");
$peg = mysqli_fetch_array($tampilPeg);
setlocale(LC_ALL, 'id-ID', 'id_ID');
$tgllahir = strftime("%d %B %Y", strtotime($peg['tgl_lahir']));
?>

        <div class="page-content">

            <style>
            .bg-br {
                background-image: url(images/pictures/pr.svg);
            }
            </style>
            <div class="card card-style">
                <div class="card mx-0 mb-2 bg-br card-style default-link" data-card-height="130">
                    <div class="card-bottom ps-3 ms-1 mb-3">
                        <a href="<?= 'images/avatars/'.$peg['foto']?>" title="<?= $ky['nama_karyawan']?>"
                            class="default-link" data-gallery="gallery-3">
                            <img src="<?= 'images/avatars/'.$peg['foto']?>" class="img-fluid shadow-xl"
                                style="width: 100px; height: 100px;  border-radius:100%;border:3px solid white"
                                alt="Belum Ada foto">
                        </a>

                    </div>
                </div>
                <div class="content">

                    <h3><?=$peg['nama_karyawan']?> <img src='images/icons/veri.svg' width='20' class='rounded-sm me-2'>
                    </h3>
                    <p class="font-14 mb-3">
                        "<?= $peg['pesan']?>" </p>
                    <div class="divider mb-0 mt-n"></div>
                    <p class="opacity-80">

                    <div class="row">

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">NIS</p>
                        </div>
                        <div class="col-8">
                            <p><?=$peg['id_karyawan']?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">TTL</p>
                        </div>
                        <div class="col-8">
                            <p><?=$peg['tempat_lahir']?>, <?= $tgllahir ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">Jenis Kelamin</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['jeniskelamin'] ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">Alamat</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['alamat'] ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">No Wa</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['nohp'] ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">Ayah</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['ayah'] ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">Ibu</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['ibu'] ?></p>
                        </div>

                        <div class="mb-2 w-100"></div>
                        <div class="col-4">
                            <p class="font-600 mb-n1 color-highlight">No Wa Ortu</p>
                        </div>
                        <div class="col-8">
                            <p><?= $peg['nowa'] ?></p>
                        </div>

                    </div>



                    
                </div>

            </div>




        </div>
        <!-- Page content ends here-->

        <!-- Menu Share -->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
            data-menu-load="menu-main.php"></div>
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>



        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>