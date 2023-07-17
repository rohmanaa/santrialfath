<?php
ob_start();
session_start();
error_reporting(0);
include 'php/config.php';
$sesi_username = $_SESSION['id_karyawan'] ?? null;
if ($sesi_username == null || empty($sesi_username)) {
    session_destroy();
    header('Location:login.php');
 mysqli_set_charset('utf-8',$conn);
}


if(isset($_GET['id_doa'])){
    $id_doa  =$_GET['id_doa'];
}
else {
    die ("Error. No id_doa Selected!");    
}
$query    =mysqli_query($conn, "SELECT * FROM base_doa WHERE id_doa='$id_doa'");
$ky    =mysqli_fetch_array($query);

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Doa Harian</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <style>
    @font-face {
        font-family: arabfont;
        src: url(fonts5/scheherazade.bold.ttf);
    }

    .arab {
        font-family: 'arabfont';
        font-size: 25pt;
        font-variant: inherit;
        line-height: 2;
    }

    .bg-br {
        background-image: url(images/pictures/pr.svg);
    }
    </style>
</head>


<body>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

    <div id="page">
        <div class="header header-fixed header-logo-center">
          
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-20px"></div>

        <div class="card card-style">
            <div class="card rounded-0 mb-0 bg-br" data-card-height="30px" style="height: 30px;">
                <div class="card-top p-1">
                    <center><p class="color-white">                     
                    <span><?= $ky['judul'];?></span>
</p></center>
                
                </div>
            </div>

            <div class="content">



                <div class="d-flex">
                    <div class="me-auto">
                        <div class="list-group list-custom-large mt-n3">
                        <audio controls mute loop style="width:100%">
                        <source src="#" type="audio/wav">
                        Your browser does not support the audio element.
                    </audio>

                        </div>
                    </div>

                </div>

                <div class="list-group list-custom-large mt-1">

                </div>
            </div>
        </div>

        <div class="card card-style">


            <div class="content">
                <div class="d-flex">

                    <div class="ms-auto align-self-center text-right">
                    <div dir="rtl" lang="ar" class="arab mb-3 pt-3">
		<p><?=$ky['arab'];?></p>
	</div>
                    </div>

                </div>
            
                <div class="d-flex">
                    <div class="align-self-center">
                        <span class="color-blue-dark font-12 font-500 ps-1"><?=$ky['id_doa'];?>. <?=$ky['latin']?></span><br>
                        <span class="color-theme font-12 font-500 ps-1"><?=$ky['id_doa'];?>. <?=$ky['arti'];?></span>
                    </div>

                </div>
                <div class="divider mb-2 mt-2 bg-gray-dark"></div>
            <?=$ky['informasi'];?>
            </div>
          
        </div>


        <li></li>



        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>