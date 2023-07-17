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
<title>Media Photo</title>
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
        
        <div class="page-title-clear" style="margin-bottom:-40px"></div>
        
        <div class="card card-full">
            <div class="content mb-0 mt-3">
                <div class="row row-cols-3 px-1 mb-0">

<?php
include 'php/config.php';
$foto ="SELECT * FROM galeri";
$res = mysqli_query($conn, $foto);
if (mysqli_num_rows($res) > 0) {
while($peg = mysqli_fetch_assoc($res)) {
?>

                <a href="<?= 'https://admin.keluargaalfath.com/uploads/media/'.$peg['nama_foto']?>" title="<?=$peg['ktr']?>" data-gallery="gallery-1" class="col p-2">
                    <img src="<?= 'https://admin.keluargaalfath.com/uploads/media/'.$peg['nama_foto']?>" data-src="<?='https://admin.keluargaalfath.com/uploads/media/'.$peg['nama_foto']?>" class="preload-img shadow-m" style="width:100%" alt="Foto">
                </a>

                <?php }
                } else {
                    echo "Tidak ada foto.";
                  }
                  mysqli_close($conn);
                  ?>						
                </div>
            </div>
        </div>
     
 
    </div>
    <!-- Page content ends here-->
    

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
