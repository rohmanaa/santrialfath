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
<title>Asmaul Husna</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<link href="plugins/DataTables/datatables.min.css" rel="stylesheet"/>
<script src="plugins/DataTables/datatables.min.js"></script>
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

</style>
</head>


<body>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<div class="header header-fixed header-logo-center">
        <a href="<?=$base_url?>index.php" class="header-title">Asmaul Husna</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>

<div class="page-title-clear" style="margin-bottom:-20px"></div>

<div class="card card-style">
            <div class="card rounded-0 mb-0 bg-br" data-card-height="10" style="height: 10px;">
                <div class="card-top pe-3 pt-3">
                    <h1 class="color-white text-end"><sup></sup></h1>
                    <p class="color-white opacity-50 text-end font-10 mt-n3"></p>
                </div>
            </div>

            <div class="content">



                <div class="d-flex">
                    <div class="me-auto">
                        <div class="list-group list-custom-large mt-n3">
                            <a href="#" class="border-0">
                                <img src="images/pictures/sholat.svg" class="rounded-sm">
                                <span>ASMAUL HUSNA</span>
                                <strong>99 Nama Baik Allah</strong>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="list-group list-custom-large mt-2">

                    <audio controls loop autoplay style="width:100%">
                        <source src="app/asma.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>

                </div>
            </div>
        </div>

		<div class="row me-0 ms-0 mb-0">
<?php
$tampil ="SELECT * FROM asmaulhusna ORDER BY id ASC";
$rew = mysqli_query($conn, $tampil);
if (mysqli_num_rows($rew) > 0) {
	while($re = mysqli_fetch_assoc($rew)) {
		setlocale(LC_ALL, 'id-ID', 'id_ID');
?>
        

            
			<div dir="rtl" class="col-12 ps-0 pe-0">
				<div class="card card-style">
                    <div  class="content pb-0 text-center">
                        <p class="mb-n1 color-highlight font-600"><?= $re['latin'] ?></p>
                        <div class="arab" lang="ar" ><?= $re['arab'];?></div>
                        <p class="mb-0"><?= $re['arti'];?></p>
                    </div>            
                </div>  
            </div>
            
			<?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>

        </div>
       
      
           
   

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

