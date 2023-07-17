
<?php 
ob_start();
session_start();
error_reporting(0);
include 'php/config.php';
$sesi_hafallaporname    = isset($_SESSION['id_karyawan']) ? $_SESSION['id_karyawan'] : NULL ;
if ($sesi_hafallaporname == NULL || empty($sesi_hafallaporname) )
{
    session_destroy();
    header('Location:login.php');
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Data Kelas</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">


<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

<div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>halaman.php" class="header-title"></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-20px"></div>
     <div class="card card-style">
        <div class="content mb-0 mt-0">
        <?php
        $tampil ="SELECT * FROM shift ORDER BY nama_shift";
        $re = mysqli_query($conn, $tampil);
        if (mysqli_num_rows($re) > 0) {
        while($r = mysqli_fetch_assoc($re)) {
        ?>
     
                <div class="list-group list-custom-large list-icon-0 check-visited">
                    <a href="<?=$base_url?>datasantri.php?id_shift=<?=$r['id_shift']?>" class="no-border">
                        <i class="fa fa-user font-14 bg-blue-dark color-white rounded-sm shadow-xl"></i>
                        <span><?=$r['nama_shift']?></span>
                        <strong><?=$r['ketkelas']?> Guru : <?=$r['walikelas']?></strong>
                        <i class="fa fa-angle-right"></i>
                    </a>  
                </div>
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

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome" data-menu-load="menu-main.php"></div>
    <div id="menu-share" class="menu menu-box-bottom rounded-m"  data-menu-load="menu-share.php" data-menu-height="370"> </div>
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>