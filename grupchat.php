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
}?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Grup Chat</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light">

<style>
    .btn-submit{
        right: 5px;
        border-radius: 100%;
        width: 40px;
        height: 40px; 
        position: fixed !important;
        bottom: 13px
    }
</style>
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
     <div class="header header-fixed header-logo-center">
        <a href="halaman.php" class="header-title">Chat</a>
        <a href="halaman.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
    </div>

    <div class="page-title-clear"></div>  

    <div class="page-content">
        <div class="content mt-0 mb-n5">

        <?php 
    date_default_timezone_set("Asia/Jakarta");
        $tgl=date("Y-m-d h:i:sa");
        ?>

<div id="footer-bar" class="d-flex">
<div class="flex-fill speach-input">

    <form action="php/grupchatsend.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="pesan" placeholder="Masukan Pesan" required>
    <input type="text" name="nama" value="<?php echo$_SESSION['nama_karyawan']; ?>">
    <input type="text" name="sebagai" value="santri">
    <input type="text" name="waktu" value="<?=$tgl?>">
    <button type="submit" class="btn bg-highlight btn-submit"><i class="fa fa-arrow-up pt-2"></i></button>

</div>
</form>
</div>

        <?php
        
        $tampil ="SELECT * FROM grupchat ORDER BY id_grup DESC";
        $re = mysqli_query($conn, $tampil);
        if (mysqli_num_rows($re) > 0) {
        while($r = mysqli_fetch_assoc($re)) {
        ?>
          <?php 
        if ($r[sebagai]=="guru"){ 
        echo"<div class='clearfix'></div>
        <div class='speech-bubble speech-left bg-highlight'><p class='font-8 color-white'>$r[nama]</p> $r[pesan] </div>	";}
        elseif ($r[sebagai]=="santri"){ 
        echo"<div class='clearfix'></div>
        <div class='speech-bubble speech-right color-black'><p class='font-8'>$r[nama]</p>$r[pesan] </div>
        <div class='clearfix'></div>
        <p class='font-8'>$r[waktu]</p>
        ";}  ?> 
                

        <?php }
                } else {
        echo "Tidak ada Pesan.";
        }
        mysqli_close($conn);
        ?>
        

           
        </div>
    </div>
    <!-- Page content ends here-->
    

    <?php
  include "config.php";

// memasukkan data ke dalam tabel MySQL
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];
$sebagai = $_POST['sebagai'];
$waktu= $_POST['waktu'];
$sql = "INSERT INTO grupchat (nama,pesan,sebagai,waktu) VALUES ('$nama', '$pesan','$sebagai','$waktu')";
if (mysqli_query($conn, $sql)) {
  echo "<script>window.alert()
  window.location='../grupchat.php'</script>";
} else {
  echo 'Terjadi kesalahan: ' . mysqli_error($conn);
}

// menutup koneksi ke database MySQL
mysqli_close($conn);
?>



   

</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>
