<?php
ob_start();
session_start();
error_reporting(0);
include 'php/config.php';

$sesi_username = $_SESSION['id_karyawan'] ?? null;
if (!isset($sesi_username) || empty($sesi_username)) {
    session_destroy();
    header('Location:login.php');
    exit;
}

$id_shift = $_GET['id_shift'] ?? null;
if (!isset($id_shift)) {
    die("Error. No ID Selected!");
}

$hadirsemi = mysqli_query($conn, "SELECT count(*) as jum FROM karyawan WHERE statussantri='aktif' AND id_shift='$id_shift'");
$hadir = mysqli_fetch_array($hadirsemi);
$total = $hadir['jum'];

$query2 = "SELECT * FROM shift WHERE id_shift='$id_shift'";
$rese1 = mysqli_query($conn, $query2);
$rese = mysqli_fetch_assoc($rese1);

$query = "SELECT * FROM karyawan WHERE id_shift='$id_shift'";
$rew = mysqli_query($conn, $query);
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Data Santri</title>
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


        <div class="header header-fixed header-logo-center">

            <a href="<?=$base_url?>index.php" class="header-title">Santri Alfath</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-20px"></div>


        <div class="card card-style">
            <div class="divider mb-0 mt-n2"></div>
            <div class="drag-line"></div>
            <div class="content">
                <p class="font-600 mb-n1 color-highlight">Full Santri Amazing</p>
                <h1> <?=$rese['nama_shift'] ?></h1>
                <span class="mt-3 badge border color-blue-dark border-blue-dark">Jumlah Santri : <?=$total?>
                    Santri</span>
            </div>

            <?php

    if (mysqli_num_rows($rew) > 0) {
        while($re = mysqli_fetch_assoc($rew)) {
            setlocale(LC_ALL, 'id-ID', 'id_ID');
            $tglmasuk=strftime("%A, %d %B %Y",strtotime($re['tgl']));
            $tgllahir=strftime("%A, %d %B %Y",strtotime($re['tgl_lahir']));

?>
            <a href="<?=$base_url?>detailsantri.php?id_karyawan=<?=$re['id_karyawan']?>" class="content my-3">
                <div class="d-flex">
                    <div>
                        <?php 
                   
            if ($re['foto']!=''){ echo"
                <img src='images/avatars/$re[foto]'class='img-fluid shadow-xl' style='width: 35px; height: 35px;  border-radius:100%;border:3px solid white'>
              
                ";
             }else{
            echo " <img src='images/icons/default.svg' width='30px' height='30px' border-radius:'100%' border:'3px solid white' >
                ";
            }
            ?>
                    </div>
                    <div class="ps-1">

                        <h5 class="mb-0"><?= $re['nama_karyawan'] ?> <img src='images/icons/veri.svg' width='19'
                                class='rounded-sm me-2'></h5>
                        <h6 class="font-600 font-12 opacity-50 mb-0"><?= $tgllahir ?></h6>

                    </div>
                    <div class="ms-auto align-self-center text-center">
                        Klik Detail
                    </div>
                </div>
            </a>

            <div class="divider mb-1 mt-n2"></div>

            <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>
        </div>
 
        </div>
    </div>




    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
        data-menu-load="menu-main.php"></div>
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
        data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>