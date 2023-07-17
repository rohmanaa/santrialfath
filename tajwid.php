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
<title>Materi Tajwid</title>
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
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<div class="header header-fixed header-logo-center">
        <a href="<?=$base_url?>index.php" class="header-title">Tajwid</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>

<div class="page-title-clear" style="margin-bottom:-20px"></div>



<?php
$tampil ="SELECT * FROM base_tajwid ORDER BY id_tajwid";
$rew = mysqli_query($conn, $tampil);
if (mysqli_num_rows($rew) > 0) {
	while($re = mysqli_fetch_assoc($rew)) {
		setlocale(LC_ALL, 'id-ID', 'id_ID');
?>
        
		<div class="content mb-0 mt-0">
		<a href="<?=$base_url?>tajwiddetail.php?id_tajwid=<?=$re['id_tajwid']?>" class="card card-style py-3 mx-0 mb-2 shadow-sm doaharian">
				<div class="d-flex px-3">
					<div class="align-self-center">
					<i class="gradient-blue color-white rounded-s" style="padding:5px 10px 5px 10px;"></i>
					</div>
					<div class="ps-3 align-self-center">
						<h5 class="mb-n0"><?=$re['nama']?></h5>
					</div>
					<div class="ms-auto align-self-center">
						<i class="fa fa-arrow-right opacity-30 color-theme"></i>
					</div>
				</div>
			</a>
			</div>
       
      
            <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>
   

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

