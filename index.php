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


$sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Quran' AND hl.id_karyawan = '{$_SESSION['id_karyawan']}'";
$result1 = mysqli_query($conn, $sql);
$count_Qur = mysqli_fetch_array($result1);
                                
$sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Doa' AND hl.id_karyawan = '{$_SESSION['id_karyawan']}'";
$result1 = mysqli_query($conn, $sql);
$count_Doa = mysqli_fetch_array($result1);

$sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Ayat' AND hl.id_karyawan = '{$_SESSION['id_karyawan']}'";
$result1 = mysqli_query($conn, $sql);
$count_Ayat = mysqli_fetch_array($result1);

$sql ="SELECT COUNT(*) as jml FROM hafallapor hl JOIN hafalan h ON hl.id_hafal = h.id_hafal WHERE h.id_kategori = 'Hadist' AND hl.id_karyawan = '{$_SESSION['id_karyawan']}'";
$result1 = mysqli_query($conn, $sql);
$count_Hadist = mysqli_fetch_array($result1);

$totalhafal=$count_Qur['jml']+$count_Doa['jml']+$count_Ayat['jml']+$count_Hadist['jml'];


$cekin  = mysqli_query($conn, "SELECT tahunajaran.status, SUM(misiharian.koin) as total_koin
FROM tahunajaran
JOIN misiharian ON tahunajaran.id_ajaran = misiharian.id_akademik
WHERE misiharian.id_karyawan='{$_SESSION['id_karyawan']}' AND tahunajaran.status = '1'");
$cek = mysqli_fetch_array($cekin);

$sql2 ="SELECT COUNT(*) as jml FROM presensi WHERE id_khd = '1' AND id_karyawan = '{$_SESSION['id_karyawan']}'";
$result2 = mysqli_query($conn, $sql2);
$hadir = mysqli_fetch_array($result2);

$sql3 ="SELECT COUNT(*) as jml FROM prestasi WHERE id_karyawan = '{$_SESSION['id_karyawan']}'";
$result3 = mysqli_query($conn, $sql3);
$pres = mysqli_fetch_array($result3);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
<style>
            .bg-br {
                background-image: url(images/pictures/pr.svg);
            }
            </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Alfath App</title>
    <link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-highlight="highlight-red">




    <div id="page">

        <div class="header header-auto-show header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title">Alfath App</a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
        </div>

        <div id="footer-bar" class="footer-bar-6">
            <a href="<?=$base_url?>dataku.php"><i class="fa fa-graduation-cap"></i><span>Dataku</span></a>
            <a href="<?=$base_url?>halaman.php "><i class="fa fa-university"></i><span>Umum</span></a>
            <a href="<?=$base_url?>index.php" class="active-nav circle-nav"><i
                    class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=$base_url?>profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
            <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
        </div>


       <div class="page-content">
            <div class="card-body">
                <h3><?php echo$_SESSION['nama_karyawan']; ?> <i class="fa fa-check-circle color-green-dark ps-1 pe-1"></i></h3>
         </div>
  <div class="splide double-slider visible-slider slider-no-dots splide--loop splide--ltr splide--draggable is-active" id="double-slider-1" style="visibility: visible;">
            <div class="splide__track" id="double-slider-1-track">
                <div class="splide__list" id="double-slider-1-list" style="transform: translateX(-1389.5px);">
                    <div class="splide__slide ps-3 splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-16" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Bootstrap</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-19" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Dark Mode</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-31" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">SCSS &amp; RTL</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-33" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Mobile Kit</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3" id="double-slider-1-slide01" aria-hidden="true" tabindex="-1" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-6" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">PWA Ready</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide ps-3" id="double-slider-1-slide02" aria-hidden="true" tabindex="-1" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-16" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Bootstrap</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide ps-3" id="double-slider-1-slide03" style="width: 198.5px;" aria-hidden="true" tabindex="-1">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-19" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Dark Mode</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide ps-3 is-visible is-active" id="double-slider-1-slide04" style="width: 198.5px;" aria-hidden="false" tabindex="0">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-31" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">SCSS &amp; RTL</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide ps-3 is-visible" id="double-slider-1-slide05" style="width: 198.5px;" aria-hidden="false" tabindex="0">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-33" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Mobile Kit</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                <div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-6" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">PWA Ready</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-16" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Bootstrap</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-19" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Dark Mode</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div><div class="splide__slide ps-3 splide__slide--clone" style="width: 198.5px;">
                        <div data-card-height="220" class="card  shadow-xl rounded-m bg-31" style="height: 220px;">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">SCSS &amp; RTL</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div></div>
            </div>
        <ul class="splide__pagination"><li><button class="splide__pagination__page" type="button" aria-controls="double-slider-1-slide01 double-slider-1-slide02" aria-label="Go to page 1"></button></li><li><button class="splide__pagination__page" type="button" aria-controls="double-slider-1-slide03 double-slider-1-slide04" aria-label="Go to page 2"></button></li><li><button class="splide__pagination__page is-active" type="button" aria-controls="double-slider-1-slide04 double-slider-1-slide05" aria-label="Go to page 3" aria-current="true"></button></li></ul></div>
    
   

            <div class="card card-style">

                <div class="content">
                    <p class="color-highlight font-500 mb-n1">Assalamu'alaikum,
                        <?php
   
            $hour=date('H:i');
            if  ($hour > '04:00' && $hour < '07:00'){
              $salam = 'Sudah Sholat Subuh ?';
            }
            else if  ($hour > '07:01' && $hour < '11:00'){
                $salam ='Sudah Sholat Dhuha ?';
             }
            else if  ($hour > '11:01' && $hour < '14:59'){
               $salam ='Sudah Sholat Zuhur ?';
            }
            else if  ($hour > '15:00' && $hour < '18:00'){
               $salam= 'Sudah Sholat Ashar ?';
            }
            else if  ($hour > '18:01' && $hour < '19:00'){
                $salam= 'Sudah Sholat Maghrib ?';
            }else if ($hour > '19:01' && $hour < '03:59'){
               $salam ='Sudah Sholat Isya ?';
            }else{
                $salam ='Apa Kabar Hari ini ? ';
            }
echo "$salam&nbsp;";

$tgll=date('d-m-Y');

            ?></p>
                </div>
            </div>
          
          <div class="card card-style mt-n3">
            <div class="content mb-2 mt-3">
                <div class="row text-center mb-0">
                    <a href="#" data-menu="menu-withdraw" class="col-3">
                        <span class="icon icon-l gradient-green shadow-l rounded-sm">
                            <i class="fa fa-university font-18 color-white"></i>
                        </span>
                        <p class="mb-0 pt-1 font-9"><?= $totalhafal ?> Hafal</p>
                    </a>
                    <a href="#" data-menu="menu-transfer" class="col-3">
                        <span class="icon icon-l gradient-blue shadow-l rounded-sm">
                            <i class="fa fa-coins font-18 color-white"></i>
                        </span>
                        <p class="mb-0 pt-1 font-9"><?= $cek['total_koin'] ?> Koin</p>
                    </a>
                    <a href="#" data-menu="menu-request" class="col-3">
                        <span class="icon icon-l gradient-brown shadow-l rounded-sm">
                            <i class="fa fa-calendar font-18 color-white"></i>
                        </span>
                        <p class="mb-0 pt-1 font-9"><?= $hadir['jml'] ?> Hadir</p>
                    </a>
                    <a href="#" data-menu="menu-receipts" class="col-3">
                        <span class="icon icon-l gradient-magenta shadow-l rounded-sm">
                            <i class="fa fa-trophy font-18 color-white"></i>
                        </span>
                        <p class="mb-0 pt-1 font-9"><?= $pres['jml'] ?> Prestasi</p>
                    </a>
                </div>
            </div>
        </div>
                  <?php
$tampil = $conn->prepare("SELECT * FROM shift INNER JOIN karyawan ON shift.id_shift = karyawan.id_shift WHERE id_karyawan = ?");
$tampil->bind_param('i', $_SESSION['id_karyawan']);
$tampil->execute();
$r = $tampil->get_result()->fetch_array();

$bacaan = $conn->prepare("SELECT * FROM capaian WHERE id_karyawan = ? ORDER BY tglbaca DESC");
$bacaan->bind_param('i', $_SESSION['id_karyawan']);
$bacaan->execute();
$bcn = $bacaan->get_result()->fetch_array();
$tglbaca = strftime("%d %B %Y", strtotime($bcn['tglbaca']));


   ?>
          
          <div class="card card-style mt-n3">
            <div class="content mb-2 mt-3">
                <div class="d-flex">
                    <div class="pe-4">
                        <p class="font-600 color-highlight mb-0">Kelasmu</p>
                        <h6><?= $r['nama_shift']?> (<?=$r['ketkelas']?>)</h6>
                    </div>
                    <div class="w-100 pt-1">
                        <h6 class="font-11 font-500">Capaian<span class="float-end color-green-dark">  <?=$bcn['ketbaca']?></span></h6>
                        <div class="divider mb-2 mt-1"></div>
                        <h6 class="font-11 font-500">Tgl Update<span class="float-end color-red-dark"><?=$tglbaca?></span></h6>
                    </div>
                </div>
            </div>
        </div>

          
          
        



        </div>

        <!-- End of Page Content-->
        <!-- All Menus, Action Sheets, Modals, Notifications, Toasts, Snackbars get Placed outside the <div class="page-content"> -->

        <!-- Menu Share -->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
            data-menu-load="menu-main.php"></div>
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/toast/jquery.toast.min.js"></script>
    
    <script>
        <?php if($_SESSION['toast_success'] == 'Success'){ ?>
           
            $.toast({
                heading: 'Success',
                text: 'Terkirim.',
                showHideTransition: 'plain',
                icon: 'success'
            })
    <?php }
    $_SESSION['toast_success'] = 'up';
    ?>

<?php if($_SESSION['toast_error'] == 'Error'){ ?>
                     
            $.toast({
                heading: 'Error',
                text: 'Hubungi Kendala <a href="<?=$base_url?>page-contact.php">issues</a>',
                showHideTransition: 'plain',
                icon: 'error'
            })

   <?php }
   $_SESSION['toast_error'] = 'upi';
   ?>

    </script>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>