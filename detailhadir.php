<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Detail Kehadiran</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


    <div id="page">

    <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>kehadiranku.php" class="header-title"></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-20px"></div>
        <?php
    if(isset($_GET['id_absen'])){
        $id_absen  =$_GET['id_absen'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include 'php/config.php';
    $query    =mysqli_query($conn, "SELECT * FROM presensi INNER JOIN stts ON presensi.id_status=stts.id_status INNER JOIN kehadiran ON presensi.id_khd=kehadiran.id_khd WHERE id_absen='$id_absen'");
    $result    =mysqli_fetch_array($query);
 
    $tglmasuk=strftime("%A, %d %B %Y",strtotime($result['tgl']));
?>
        <div class="page-content">

            <div class="card card-style mb-2">
                <div class="content">
                    <div class="d-flex">
                        <div>
                            <img src="images/icons/cal.svg" class="rounded-sm" width="100">
                        </div>
                        <div class="w-100 ms-3 pt-1">
                            <h6 class="font-500 font-14 pb-4"><?=$tglmasuk?></h6>
                            <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                    class="fa fa-check-circle icon-20 color-green-dark"></i>Jam Masuk
                                <?=$result['jam_msk']?></p>
                            <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                    class="fa fa-clock icon-20 color-blue-dark"></i>Jam Keluar<?=$result['jam_klr']?>
                            </p>
                            <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                    class="fa fa-heart icon-20 color-red-dark"></i>Status <?=$result['nama_khd']?></p>
                            <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                    class="fa fa-list icon-20 color-red-dark"></i>Ket <?=$result['ket']?></p>

                        </div>
                    </div>
                    <div class="divider mt-3 mb-0"></div>
                    <h6 class="font-500 font-14 pt-3"></h6>
                </div>
            </div>



        </div>
        <!-- Page content ends here-->



        <!-- Main Menu-->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280"
            data-menu-active="nav-pages"></div>
        <!-- Colors Menu-->
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>