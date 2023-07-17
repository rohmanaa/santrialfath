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
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Prestasi</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>


    <div id="page">

        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title">Prestasi Santri</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        </div>



        <div class="card card-fixed mt-4" style="background-image:url(images/pictures/pr.svg)" data-card-height="220">
            <div class="card-center text-center">
                <h1 class="color-white font-20 mb-n2">PRESTASI SANTRI AL-FATH</h1>
                <p class="color-white opacity-90 font-11 mb-0">
                    Juara, Harapan, dan Apresiasi<br>
                </p>

            </div>
        </div>
        <div class="card card-clear" data-card-height="220"></div>


        <!-- card in this page format must have the class card-full to avoid seeing behind it-->
        <div class="card card-style rounded-l">
            <div class="content mt-2">
                <div class="d-flex mb-0">
                    <div class="align-self-center">
                        <img src="images/icons/tro.svg" width="45" class="rounded-sm me-2">
                    </div>
                    <div class="align-self-center">
                        <h1 class="font-15 mb-0">Data List Prestasi Santri</h1>
                        <p class="mb-0 mt-n2 font-10 opacity-50"><i class="fa fa-map-marker pe-1"></i>Semoga menjadi
                            motivasi</p>
                    </div>
                    <div class="ms-auto align-self-center">
                        <img src='images/icons/veri.svg' width='20' class='rounded-sm me-2'>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="card card-style mb-2">
                <div class="content">

                    <?php        
date_default_timezone_set("Asia/Jakarta");
$sql ="SELECT * FROM prestasi INNER JOIN karyawan ON prestasi.id_karyawan=karyawan.id_karyawan";
$re = mysqli_query($conn, $sql);
if (mysqli_num_rows($re) > 0) {
while($row = mysqli_fetch_assoc($re)) {
$tgllomba=date_format(date_create_from_format("Y-m-d", $row['tgllomba']), "l, d F Y");
?>
                    <a href="<?=$base_url?>detailsantri.php?id_karyawan=<?=$row['id_karyawan']?>">


                        <div class="d-flex">
                            <div>
                                <?php 
            if ($row['foto']!=''){ echo"
                <img src='images/avatars/$row[foto]'class=' rounded-xl' style='width: 100px ;height: 100px ;border:3px solid white'>
              
                ";
             }else{
            echo " <img src='images/icons/default.svg' class=' rounded-sm' style='width: 100px; height: 100px ;border:3px solid white' >
                ";
            }
            ?> </div>
                            <div class="w-100 ms-3 pt-1">
                                <h6 class="font-500 font-14 pb-4"><?=$row['nama_karyawan']?></h6>
                                <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                        class="fa fa-star icon-20 color-yellow-dark"></i>Peringkat :<?=$row['juara']?>
                                </p>
                                <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                        class="fa fa-heart icon-20 color-blue-dark"></i>Jenis :<?=$row['jenislomba']?>
                                </p>
                                <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                        class="fa fa-clock icon-20 color-red-dark"></i>Tgl :<?=$tgllomba?><br></p>
                                <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                        class="fa fa-list icon-20 color-red-dark"></i>Ket:<?=$row['ketlomba']?></p>
                                <p class="mb-0 font-11 mb-3 mt-n3 line-height-s"><i
                                        class="fa fa-user icon-20 color-red-dark"></i>Penyelenggara :
                                    <?=$row['penyelenggara']?></p>
                            </div>
                        </div>
                        <div class="divider mt-3 mb-0"></div>
                        <h6 class="font-500 font-14 pt-3"></h6>

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
</body>

</html>