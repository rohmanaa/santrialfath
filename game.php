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


$json_data = file_get_contents('jadwalsholat/kota.json');

// Mengubah data JSON menjadi format PHP
$data = json_decode($json_data, true);

// Menampilkan data PHP
print_r($data);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Game</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<style>
  .imagen {
width :50%;  
    position:relative;
  }
	@font-face {
        font-family: arabfont;
        src: url(fonts5/amiri.ttf);
}

.arab{
	font-family: 'arabfont';
	font-size: 18pt;
	font-variant: inherit;
}

</style>
</head>


<body>

<div id="page">
<div class="header header-fixed header-logo-center">

        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>
<div class="page-title-clear" style="margin-bottom:-40px"></div>


  <iframe src="https://html5games.com/"  height="1000px" width="100%" title="description"></iframe>
             
    

  
  
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

