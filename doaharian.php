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
<title>Doa</title>
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
        <a href="<?=$base_url?>doaharian.php" class="header-title">Doa Harian</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>
<!-- <a href="<?=$base_url?>doahariandetail.php?id_doa=<?=$re['id_doa']?>" class="card card-style mx-0" data-filter-item data-filter-name="all demo smartphone apple iphone ios">
				 -->
<div class="page-title-clear" style="margin-bottom:-20px"></div>
            <div class="content mt-0 ">
           
            <div class="search-box search-dark shadow-xl border-0 bg-theme rounded-sm bottom-0 mb-5 header-fixed">
                <i class="fa fa-search"></i>
                <input type="text" id="myInput" class="border-0" onkeyup="myFunction()" placeholder="Search here..">
            </div>

            

    <ul id="myUL" style="list-style-type: none;  padding: 0;
  margin: 0;" >

    <?php
			$tampil ="SELECT * FROM base_doa ORDER BY id_doa";
			$rew = mysqli_query($conn, $tampil);
			$nomor=1;
			if (mysqli_num_rows($rew) > 0) {
				while($re = mysqli_fetch_assoc($rew)) {
			?>

    <li>
    <a href="<?=$base_url?>doahariandetail.php?id_doa=<?=$re['id_doa']?>" class="card card-full mt-n4 rounded-sm">
    <div class="content">
    <?= $re['judul']?> 
   </div>
    </a>
    </li>
                 <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                }
                  mysqli_close($conn);
                  ?>

               
 </ul>
                        
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

