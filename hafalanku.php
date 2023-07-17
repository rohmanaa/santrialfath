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
    <title>Hafalanku</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

    <div id="page">

        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="<?=$base_url?>index.php" class="header-title">Hafalanku</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
        </div>

        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="<?=$base_url?>dataku.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-20px"></div>

        <div class="page-content">


            <div class="card card-style">
                <p class="content">
                    PENCAPAIAN HAFALAN <span style="text-transform: uppercase"
                        class="color-highlight uppercase"><?php echo$_SESSION['nama_karyawan']; ?></span>
                </p>
            </div>
            <?php
$tampil = mysqli_query($conn,"SELECT * FROM shift INNER JOIN karyawan ON shift.id_shift= karyawan.id_shift  WHERE id_karyawan='$_SESSION[id_karyawan]'");
$r=mysqli_fetch_array($tampil);
?>
            <div class="card card-style">
                <div class="content mb-1">
                    <p class="mb-n1 color-highlight font-600">Histori Hafalanku</p>
                    <p>
                        Update 1 atau 2 Bulan sekali
                    </p>

                    <?php
date_default_timezone_set("Asia/Jakarta");
$batas = 15;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn, "select * from hafallapor");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$hafalan = "SELECT * FROM hafallapor INNER JOIN hafalan ON hafallapor.id_hafal=hafalan.id_hafal WHERE id_karyawan='{$_SESSION['id_karyawan']}' ORDER BY tglhafal DESC limit $halaman_awal, $batas";
$nomor = $halaman_awal + 1;
$res = mysqli_query($conn, $hafalan);
if (mysqli_num_rows($res) > 0) {
while ($h = mysqli_fetch_assoc($res)) {
setlocale(LC_ALL, 'id-ID', 'id_ID');
$tglhaf = strftime("%d %B %Y", strtotime($h['tglhafal']));

?>
                    <hr>
                    <a href="<?=$base_url?>detailhafalan.php?id_hafal=<?=$h['id_hafal']?>">
                        <div class="d-flex mb-4">
                            <div class="align-self-center">
                                <img src="images/icons/cap.svg" class="rounded-sm me-3" width="30">
                            </div>
                            <div class="align-self-center">
                                <p class="color-highlight font-11 mb-n2"><?php $h['kethafalan'] ?></p>
                                <h2 class="font-15 line-height-s mt-1 mb-1"><?= $h['bankhafalan'] ?></h2>
                            </div>
                            <div class="ms-auto ps-3 align-self-center text-center">
                                <p class="color-highlight font-10 mb-n2"><?= $tglhaf ?></p>
                                <h2 class="font-15 mb-0"><?= $h['nilaihafal'] ?></h2>
                            </div>
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