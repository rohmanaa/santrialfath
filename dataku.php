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

<html lang="en">

<head>
<style>
            .bg-br {
                background-image: url(images/pictures/pr.svg);
            }
            </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>App</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>


    <div id="page">

        <div class="header header-auto-show header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title">App</a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
            <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
        </div>

        <div id="footer-bar" class="footer-bar-6">
            <a href="<?=$base_url?>dataku.php" class="active-nav circle-nav"><i
                    class="fa fa-graduation-cap"></i><span>Dataku</span></a>
            <a href="<?=$base_url?>halaman.php "><i class="fa fa-university"></i><span>Umum</span></a>
            <a href="<?=$base_url?>index.php"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=$base_url?>profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
            <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
        </div>



        <!--    <div class="page-content-bg gradient-menu"><div></div></div>-->
        <div class="page-content">

            <div class="page-title page-title-fixed">
                <h1>Dataku</h1>
                <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light"
                    data-toggle-theme><i class="fa fa-moon"></i></a>
                <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark"
                    data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
                <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i
                        class="fa fa-bars"></i></a>
            </div>
            <div class="page-title-clear"></div>

            <div class="card card-style">
                <div class="card rounded-0 mb-0 bg-br" data-card-height="10" style="height:10px;">
                    <div class="card-top pe-3 pt-3">

                    </div>
                </div>

                <div class="content">
                    <div class="d-flex">
                        <div class="me-auto">
                            <div class="list-group list-custom-large mt-n3">
                                <a href="#" class="border-0">
                                    <img src="images/icons/masjid.svg" class="rounded-sm">
                                    <span>Data Pribadi <?php echo$_SESSION['nama_karyawan']; ?> </span>
                                    <strong>Hanya Kamu yang bisa melihat data halaman ini</strong>
                                </a>

                            </div>
                        </div>
                        <div>

                        </div>
                    </div>


                </div>
            </div>

            <div class="card card-style">
                <div class="content mt-0 mb-0">
                    <div class="list-group list-custom-large check-visited">


                        <a href="<?=$base_url?>bacaanku.php">
                            <i class="fa fa-server font-14 bg-magenta-dark color-white rounded-sm shadow-xl"></i>
                            <span>Bacaanku</span>
                            <strong>Histori Bacaanmu perbulan</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>

                        <a href="<?=$base_url?>hafalanku.php">
                            <i class="fa fa-lightbulb font-14 bg-red-dark color-white rounded-sm shadow-xl"></i>
                            <span>Hafalanku</span>
                            <strong>Capaian Hafalanmu</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>

                        <a href="<?=$base_url?>hadir.php">
                            <i class="fa fa-star rounded-sm gradient-blue color-white"></i>
                            <span>Kehadiran</span>
                            <strong>Status kehadiranmu</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>

                        <a href="<?=$base_url?>transaksiku.php"><i
                                class="fa fa-wallet rounded-sm gradient-green color-white"></i>
                            <span>Transaksi</span>
                            <strong>Iuran Ngajimu</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>

   



                    </div>
                </div>
            </div>


        </div>
        <!-- Page content ends here-->

        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
            data-menu-load="menu-main.php"></div>
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>

    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>