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


 // persiapkan curl
 $ch = curl_init(); 

 // set url 
 curl_setopt($ch, CURLOPT_URL, "https://equran.id/api/surat");

 // return the transfer as a string 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

 // $output contains the output string 
 $output = curl_exec($ch); 

 // tutup curl 
 curl_close($ch);      

 // menampilkan hasil curl
 $data = json_decode($output); 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Quran</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
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

<div id="page">
<div class="header header-fixed header-logo-center">
        <a href="<?=$base_url?>quranid.php" class="header-title">Quran</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>

<div class="page-title-clear" style="margin-bottom:-20px"></div>
           
<div class="content mt-0 "> 
		   <div class="search-box search-dark shadow-xl border-0 bg-theme rounded-sm bottom-0 mb-5 header-fixed">
			   <i class="fa fa-search"></i>
			   <input type="text" id="myInput" class="border-0" onkeyup="myFunction()" placeholder="Search here..">
		   </div>


<div class="card card-style mt-n3">
<ul id="myUL" style="list-style-type: none;  padding: 10px;" >

  
    <?php foreach($data as $row){?>
        

	<li>

	<a href="<?=$base_url?>qurandetail.php?id=<?=$row->nomor?>" class="content hover">
				<div class="d-flex">
					<div>
						<img src="images/icons/nomorquran.svg" width="35" class="rounded-sm me-2">
					</div>
					<div class="ps-1">
                        <h5 class="mb-1"><?=$row->nama_latin?></h5>
						<h6 class="font-600 font-12 opacity-50 mb-0"><?=$row->arti?> (<?=$row->jumlah_ayat?>)</h6>
						
					</div>
					<div class="ms-auto align-self-center text-center">
				
						<p class="font-500 color-green-dark arab"><?=$row->nama?></p>
					</div>
				</div>
			</a>
            <div class="divider mb-0 mt-n2"></div>

    </li>


      
			
      
        
    <?php } ?>

	</ul>
    </div>
  
</div>
</div>
</div>

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

