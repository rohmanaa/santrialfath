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
<link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Kehadiranku</title>
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
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="<?=$base_url?>hadir.php" data-back-button class="header-icon header-icon-1"><i
                    class="fa fa-chevron-left"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-20px"></div>

        <?php
    $tampil = mysqli_query($conn,"SELECT * FROM shift INNER JOIN karyawan ON shift.id_shift= karyawan.id_shift WHERE id_karyawan='$_SESSION[id_karyawan]'");
    $r=mysqli_fetch_array($tampil);
    ?>

        <div class="card card-style">
            <div class="content mt-4">
                <span class="color-highlight font-700 font-12 d-block mb-n1">HISTORI ABSENSI</span>
                <h3 class="mb-0"><?php echo$_SESSION['nama_karyawan']; ?></h3>
            </div>
            <?php
date_default_timezone_set("Asia/Jakarta");

$batas = 30;
$halaman = $_GET['halaman'] ?? 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn,"select * from presensi");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$kehadiran ="SELECT * FROM presensi INNER JOIN stts ON presensi.id_status=stts.id_status INNER JOIN kehadiran ON presensi.id_khd=kehadiran.id_khd WHERE id_karyawan='$_SESSION[id_karyawan]' ORDER BY id_absen DESC limit $halaman_awal, $batas";
$nomor = $halaman_awal + 1;
$re = mysqli_query($conn, $kehadiran);

if (mysqli_num_rows($re) > 0) {
    while ($t = mysqli_fetch_assoc($re)) {
        setlocale(LC_ALL, 'id-ID', 'id_ID');

        $tglmasuk = strftime("%A, %d %B %Y", strtotime($t['tgl']));
?>
            <a href="<?=$base_url?>detailhadir.php?id_absen=<?=$t['id_absen']?>" class="content my-3">

                <div class="d-flex">
                    <div>
                        <?php 
    if ($t['id_khd']=="1"){ 
        echo "<i class='fa fa-check rounded-sm gradient-blue color-white p-2'></i>";}
    elseif ($t['id_khd']=="2"){ 
        echo "<i class='fa fa-medkit rounded-sm gradient-magenta color-white p-2'></i>";}
    elseif ($t['id_khd']=="3"){ 
        echo "<i class='fa fa-warning rounded-sm gradient-yellow color-white p-2'></i>";}
    elseif ($t['id_khd']=="4"){ 
        echo "<i class='fa fa-times-circle rounded-sm gradient-red color-white p-2'></i>";}
?>

                    </div>
                    <div class="ps-1">
                        <h6 class="font-600 font-12 opacity-50 mb-0">Tanggal</h6>
                        <h6 class="mb-0"><?= $tglmasuk ?></td>
                        </h6>
                    </div>
                    <div class="ms-auto align-self-center text-center">
                        <h6 class="font-500 font-12 opacity-50 mb-0">Status</h6>


                        <?php 
                            if ($t['id_khd']=="1"){ 
                            echo" <span class='badge bg-blue-dark font-10'>HADIR</span> ";}
                            elseif ($t['id_khd']=="2"){ 
                            echo" <span class='badge bg-magenta-dark font-10'>SAKIT</span>";}
                            elseif ($t['id_khd']=="3"){ 
                            echo"<span class='badge bg-yellow-dark font-10'>IZIN</span>";}
                            elseif ($t['id_khd']=="4"){ 
                            echo"<span class='badge bg-red-dark font-10'>ALFA</span>";}
                             ?>
                    </div>
                </div>
            </a>
            <div class="divider mb-0 mt-n2"></div>
            <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>
            <center>Klik Tanggal Untuk Selengkapnya</center>

        </div>



        <nav aria-label="pagination-demo">
            <ul class="pagination pagination- justify-content-center">

                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
                <li class="page-item active"><a class="page-link rounded-xs color-black bg-highlight shadow-l border-0"
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


        <script type="text/javascript" src="scripts/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/toast/jquery.toast.min.js"></script>
    
    <script>
        
        <?php if($_SESSION['toast_success'] == 'Success'){ ?>
           
            $.toast({
                heading: 'Success',
                text: 'Terkirim.',
                showHideTransition: 'slide',
                icon: 'success'
            })

    <?php }
    $_SESSION['toast_success'] = 'up';
    ?>

        
<?php if($_SESSION['toast_warning'] == 'Warning'){ ?>
           
           $.toast({
               heading: 'Warning',
               text: 'Sudah Mengirim Hari ini, Silahkan kembali besok',
               showHideTransition: 'slide',
               icon: 'warning'
           })

   <?php }
   $_SESSION['toast_warning'] = 'up2';
   ?>

           
<?php if($_SESSION['toast_error'] == 'Error'){ ?>
           
           $.toast({
               heading: 'Error',
               text: 'Gagal Mengirim.',
               showHideTransition: 'slide',
               icon: 'error'
           })

   <?php }
   $_SESSION['toast_error'] = 'up1';
   ?>


    </script>

    </div>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>