<?php 
ob_start();
session_start();
error_reporting(0);
include 'php/config.php';
$sesi_username    = isset($_SESSION['id_karyawan']) ? $_SESSION['id_karyawan'] : NULL ;
if ($sesi_username == NULL || empty($sesi_username) )
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
<title>Detail</title>
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

    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="<?=$base_url?>index.php" class="header-title">Detail</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div class="page-title page-title-fixed">
    <a href="<?=$base_url?>hafalanku.php" class="page-title-icon shadow-xl bg-theme color-theme me-0 ms-3"><i class="fa fa-arrow-left"></i></a>
        
        <h1>Detail</h1>
       <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

<?php
    if(isset($_GET['id_hafal'])){
        $id_hafal  =$_GET['id_hafal'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include 'php/config.php';
    $query    =mysqli_query($conn, "SELECT * FROM hafalan WHERE id_hafal='$id_hafal'");
    $result    =mysqli_fetch_array($query);
?>
        <div class="card card-style">
            <div class="content">
           
                <h3> <img src="images/icons/book.svg" class="rounded-sm" width="50"> Detail hafalan</h3>
                
               <hr>
                                
                <div class="row">
                    <div class="col-4">
                        <p class="font-600 mb-n1 color-highlight">Nama Hafalan</p>
                    </div>
                    <div class="col-8">
                        <p><?=$result['bankhafalan']?></p>
                    </div>
                    <div class="mb-2 w-100"></div>
                    <div class="col-4">
                        <p class="font-600 mb-n1 color-highlight">Jumlah</p>
                    </div>
                    <div class="col-8">
                        <p><?=$result['jumlahayat']?></p>
                    </div>

                    <div class="mb-2 w-100"></div>
                    <div class="col-4">
                        <p class="font-600 mb-n1 color-highlight">Tentang/Arti</p>
                    </div>
                    <div class="col-8">
                        <p><?=$result['tentangayat']?></p>
                    </div>

                    <div class="mb-2 w-100"></div>
                    <div class="col-4">
                        <p class="font-600 mb-n1 color-highlight">Keterangan</p>
                    </div>
                    <div class="col-8">
                    <p><?=$result['keteranganayat']?></p>
                    </div>

                    
                    <div class="mb-2 w-100"></div>
                    <div class="col-4">
                        <p class="font-600 mb-n1 color-highlight">Kategori</p>
                    </div>
                    <div class="col-8">
                    <p><?=$result['id_kategori']?></p>
                    </div>

                </div>
                
                
                
          
                 
         
                
         
                
                
            </div>
        </div>
        

    
       
        <!-- footer and footer card-->
        
    </div>    
    <!-- end of page content-->
    
   

    
</div>    



<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>