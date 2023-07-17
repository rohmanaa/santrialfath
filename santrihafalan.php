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

$tots = mysqli_query($conn,"SELECT count(*) as jum FROM karyawan where statussantri='aktif'");
$sn = mysqli_fetch_array($tots);
$tot=$sn['jum'];


?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>List Hafal</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">

</head>

<style>
.bg-br {
    background-image: url(images/pictures/pr.svg);
}
</style>

<body>

    <div id="page">
        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title"></a>
            <a href="<?=$base_url?>halaman.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        <style>
        .bg-qt {
            background-image: url(images/pictures/pr.svg);
        }
        </style>
        <div class="card card-fixed bg-qt mb-n5" data-card-height="150">
            <div class="card-center text-center">
                <h1 class="color-white font-24 mb-n2">CAPAIAN HAFALAN</h1>

            </div>
        </div>
        <div class="card card-clear" data-card-height="150"></div>

        <div class="page-content pb-3">

            <!-- card in this page format must have the class card-full to avoid seeing behind it-->
            <div class="card card-full rounded-l">

                <div class="content">
                    <div class="d-flex">
                        <div class="align-self-center">
                            <img src="images/icons/tro.svg" width="45" class="rounded-sm me-2">
                        </div>
                        <div class="align-self-center">
                            <h1 class="font-15 mb-0">Data Seluruh Santri dan Hafalannya</h1>
                            <p class="mb-0 mt-n2 font-10 opacity-50"><i class="fa fa-map-marker pe-1"></i>Tpa Al-fath
                            </p>
                        </div>
                        <div class="ms-auto align-self-center">
                            <span class="badge bg-green-dark  bottom-0 font-12 font-600 rounded-1 py-1"><?= $tot ?>
                                Santri</span>
                        </div>
                    </div>

                    </div>


</div>
</div>
                

                <div class="content mt-n4">
                <div class="row mb-0">
                <?php
$sql ="SELECT * FROM karyawan";
$result = mysqli_query($conn, $sql);
                                    
if (mysqli_num_rows($result) > 0) {
    foreach($result as $row) { 

    $sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Quran' AND hl.id_karyawan = '{$row['id_karyawan']}'";
    $result1 = mysqli_query($conn, $sql);
    $count_Qur = mysqli_fetch_array($result1);
                                    
    $sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Doa' AND hl.id_karyawan = '{$row['id_karyawan']}'";
    $result1 = mysqli_query($conn, $sql);
    $count_Doa = mysqli_fetch_array($result1);

    $sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Ayat' AND hl.id_karyawan = '{$row['id_karyawan']}'";
    $result1 = mysqli_query($conn, $sql);
    $count_Ayat = mysqli_fetch_array($result1);

    $sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Hadist' AND hl.id_karyawan = '{$row['id_karyawan']}'";
    $result1 = mysqli_query($conn, $sql);
    $count_Hadist = mysqli_fetch_array($result1);


    $totalhafal=$count_Qur['jml']+$count_Doa['jml']+$count_Ayat['jml']+$count_Hadist['jml'];
?>

                    <a href="<?=$base_url?>detailsantri.php?id_karyawan=<?=$row['id_karyawan']?>" class="col-6 text-center ">
                        <div class="card card mx-0 mb-3 px-3 pt-1 pb-2 rounded-sm">
                            <h4 class="pt-3 color-blue mb-0"><?= $row['nama_karyawan']?></h4>
                            <span class="font-11">
                                 <?= $count_Qur['jml']?> Quran  &#10070;
                                 <?= $count_Doa['jml']?> Doa  &#10070;
                                 <?= $count_Ayat['jml']?> Ayat  &#10070;
                                 <?= $count_Hadist['jml']?> hadist
                          <br>       <strong class="font-10 pt-4">
                            <?= $totalhafal ?> Total Hafalan
                            </strong>
                                </span>
                       
                        </div>
                    </a>

                    <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>

                 </div>
                 </div>



 

    </div>
    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>