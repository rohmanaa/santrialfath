
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
<title>App Fath</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

<div class="header header-fixed header-logo-center">
   
   <a href="<?=$base_url?>index.php" class="header-title">Santri Alfath</a>
   <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
   <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
   <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
   <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
</div>
    <div class="page-title-clear" style="margin-bottom:-20px"></div>

    <?php

if(isset($_GET['id_karyawan'])){
    $id_karyawan  =$_GET['id_karyawan'];
}
else {
    die ("Error. No id_karyawan Selected!");    
}
include 'php/config.php';
$hadirsemi  = mysqli_query($conn, "SELECT count(*) as jum FROM hafallapor WHERE id_karyawan='$_GET[id_karyawan]' ");
$hadir = mysqli_fetch_array($hadirsemi);
$tot=$hadir['jum'];

$query    =mysqli_query($conn, "SELECT * FROM capaian WHERE  id_karyawan='$id_karyawan' ORDER BY id_capai DESC LIMIT 1");
$bc    =mysqli_fetch_array($query);

$query    =mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'");
$ky    =mysqli_fetch_array($query);
?>
    <div class="page-content">

<style>
    .bg-pr {
  background-image: url(images/pictures/pr.svg);
}
</style>
        <div class="card card-style">
            <div class="card mx-0 mb-2 bg-pr card-style default-link" data-card-height="150">
            <div class="card-bottom ps-3 ms-1 mb-3">
            <?php 
            if ($ky['foto']!=''){ echo"
               
                <img src='images/avatars/$ky[foto]' class='img-fluid shadow-xl' style='width: 100px; height: 100px;  border-radius:100%;border:3px solid white'>
             
                ";
             }else{
            echo "<img src='images/icons/default.svg' width='100px' height='100px' border-radius:'100%' border:'3px solid white'/>";
            }
            ?>                
                </div>
            </div>
            <div class="content">
                
                <h5 class="font-20 font-800"><?= $ky['nama_karyawan']?> <img src='images/icons/veri.svg' width='20' class='rounded-sm me-2'></h5>
                <p class="font-14 mb-3">
                        <?= $ky['pesan']?>                </p>
                <p class="opacity-80">

                  <div class="d-flex  mb-3">
                    <div>
					<i class="fa icon-30 text-center fa-star pe-2 color-yellow-dark"></i>
					</div>
					<div class="ps-2">
						<span class="badge bg-blue-dark font-12"><?= $bc['ketbaca']?></span>
					</div>
					<div class="ms-auto align-self-center text-center">				
						<span class="badge bg-blue-dark font-10">UPDATED <?= $bc['tglbaca']?> </span>
					</div>
				    </div> 
         
              <div class="divider mb-0 mt-n"></div>
          Hafalan : 
                  	<span class="badge bg-transparent border border-blue-dark color-blue-dark ms-2  mb-3  mt-3"><?= $tot ?></span>
<?php
$query="SELECT * FROM hafallapor INNER JOIN hafalan ON hafallapor.id_hafal=hafalan.id_hafal WHERE id_karyawan='$id_karyawan'";
$re = mysqli_query($conn, $query);
if (mysqli_num_rows($re) > 0) {
while($res = mysqli_fetch_assoc($re)) {
?>

                    <div class="d-flex">
                    <div>
					<i class="fa icon-20 text-center fa-trophy pe-2"></i>
					</div>
					<div class="ps-2">
						<span class="mb-3 font-12"><?= $res['bankhafalan']?></span>
					</div>
					<div class="ms-auto align-self-center text-center">				
						<span class="badge bg-red-dark font-10"><?= $res['nilaihafal']?> </span>
					</div>
				    </div>
           
                    <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>

                </p>
        </div>
    </div>
    <!-- Page content ends here-->


    

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>

    <!-- Share Menu-->

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
