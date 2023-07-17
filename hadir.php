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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Hadir</title>
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
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="<?=$base_url?>dataku.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-20px"></div>

  
    <?php
date_default_timezone_set("Asia/Jakarta");
$batas = 10;
$halaman = $_GET['halaman'] ?? 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn,"select * from capaian");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$baca ="SELECT * FROM capaian WHERE id_karyawan='$_SESSION[id_karyawan]' ORDER BY tglbaca DESC limit $halaman_awal, $batas";
$nomor = $halaman_awal+1;
$re = mysqli_query($conn, $baca);
if (mysqli_num_rows($re) > 0) {
while($bc = mysqli_fetch_assoc($re)) {
setlocale(LC_ALL, 'id-ID', 'id_ID');
$tglmasuk=date_format(date_create_from_format("Y-m-d",$bc['tglbaca']),"d F Y");
}
}
?>
        <div class="card card-style pb-2">
			<div class="content mt-4">
				<span class="color-highlight font-700 font-12 d-block mb-n1">PRESENSI</span>
				<h3 class="mb-0">TPA Al-Fath Pabuaran</h3>
			</div>
        </div>
      
        <div class="content mt-0">
                <div class="row mb-0">
                    <div class="col-6 pe-2 text-center">
                        <a href="kehadiranku.php"  class="card card-style mx-0 mb-3 px-3 pt-4">
                            <i class="fa fa-list color-green-dark font-40"></i>
                            <h4 class="pt-3 mb-0">Data Absensiku</h4>
                            <span class="color-red-dark font-11"><?php echo$_SESSION['nama_karyawan']; ?></span>
                            <strong class="color-theme font-10 opacity-30 pt-3">Tap to View</strong>
                        </a>
                    </div>
                    
                    
                    <?php 
                date_default_timezone_set("Asia/Jakarta");
                $akhirabsen =date('H:i');
                if ($akhirabsen > '15:00' && $akhirabsen < '19:00') { 
                echo" 
                <div class='col-6 ps-2 text-center'>
<a href=absen.php class='card card-style mx-0 mb-3 px-3 pt-4'>
<i class='fa fa-envelope color-blue-dark font-40'></i>
<h4 class='pt-3 mb-0'>Izin</h4>
<span class='color-green-dark font-11'>Absen jika tidak masuk</i></span>
<strong class='color-theme font-10 opacity-30 pt-3'>Tap to View</strong>
</a>
</div>    
                ";} 
                else{ echo "<div class='col-6 ps-2 text-center'>
                    <a href='#' class='card card-style mx-0 mb-3 px-3 pt-4'>
                    <i class='fa fa-times color-red-dark font-40'></i>
                    <h4 class='pt-3 mb-0'>Izin</h4>
                    <span class='color-green-dark font-11'>Absen dari 15:00 - 19.00</i></span>
                    <strong class='color-theme font-10 opacity-30 pt-3'>Tap to View</strong>
                    </a>
                    </div> ";}
                
                ?>
                        

            </div>
         </div>


    


    </div>

    <!-- Page content ends here-->

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome" data-menu-load="menu-main.php"></div>
   <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php" data-menu-height="480"></div>

    

</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>