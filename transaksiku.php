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
    <title>Transaksiku</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


    <div id="page">

    <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-20px"></div>

        <div class="card card-style">

            <div class="content mb-2">
                <h4>HISTORI IURAN <span style="text-transform: uppercase"
                        class="color-highlight uppercase"><?php echo$_SESSION['nama_karyawan']; ?></span></h4>
                <p>
                    <span style="text-transform: uppercase" class="color-highlight uppercase">KAMI UCAPKAN TERIMA KASIH,
                        SEMOGA ALLAH MEMBALASNYA</span>
                </p>
            </div>
        </div>

        <div class="page-content">
            <div class="card card-style p-3">
                <?php

date_default_timezone_set("Asia/Jakarta");
$batas = 10;
$halaman = $_GET['halaman'] ?? 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn, "SELECT * FROM bayaran");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$bayar = "SELECT * FROM bayaran WHERE id_karyawan='$_SESSION[id_karyawan]' ORDER BY id_bayar ASC limit $halaman_awal, $batas";
$nomor = $halaman_awal + 1;
$re = mysqli_query($conn, $bayar);
if (mysqli_num_rows($re) > 0) {
    while ($rt = mysqli_fetch_assoc($re)) {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tglmasuk = date("d F Y", strtotime($rt['tglbayar']));
        $tglmasuk1 = date("F Y", strtotime($rt['tglbayar']));
        $jumlahbayar = number_format($rt['jmlbyr']);

?>

                <a href="#" data-menu="menu-invoice" class="d-flex">
                    <div class="align-self-center">
                        <span class="icon icon-s gradient-green color-white rounded-sm shadow-xxl"><i
                                class="fa fa-user font-20"></i></span>
                    </div>

                    <div class="align-self-center">
                        <h5 class="ps-3 mb-n1 font-15"><?= $tglmasuk1 ?></h5>
                        <span class="ps-3 font-11 color-theme opacity-70"><?php echo $rt['statusbayar']; ?></span>
                    </div>
                    <div class="ms-auto text-end align-self-center">
                        <h5 class="color-theme font-15 font-700 d-block mb-n1">Rp. <?php echo $jumlahbayar; ?></h5>
                        <span class="color-green-dark font-11"><?= $tglmasuk ?> <i
                                class="fa fa-check-circle"></i></span>
                    </div>
                </a>
                <div class="divider my-3"></div>
                <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>

                <p class="text-center font-11 opacity-50 mb-0">Histori bayaran yang masuk</p>

            </div>




            <nav aria-label="pagination-demo">
                <ul class="pagination pagination- justify-content-center">

                    <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
                    <li class="page-item active"><a
                            class="page-link rounded-xs color-black bg-highlight shadow-l border-0"
                            href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
				}
				?>

                </ul>
            </nav>



        </div>
        <!-- Page content ends here-->

        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
            data-menu-load="menu-main.php"></div>
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>



    </div>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>