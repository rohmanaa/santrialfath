
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
<title>Bacaanku</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


<div id="page">

<div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="<?=$base_url?>dataku.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-50px"></div>

    <div class="page-content">


        <div class="card card-style">
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

<div class="card card-style">
            <div class="content mb-2 mt-3">
                <div class="d-flex">
                <div class="w-100 pt-1">
   <h6 class="font-14 font-500">Kelas<span class="float-end color-red-dark"><?= $r['nama_shift']?> (<?=$r['ketkelas']?>)</span></h6>
    <div class="divider mb-2 mt-1"></div>
    <h6 class="font-14 font-500">Guru<span class="float-end color-yellow-dark"><?=$r['walikelas']?></span></h6>

</div>
                </div>
                <div class="divider mb-3"></div>
                <div class="row mb-0">
                    <div class="col-12 pe-1">
                        <h6 class="font-11 font-500">Bacaan saat ini</h6>
                         <h6 class="color-blue-dark mb-0">
                        <img src="<?=$base_url?>images/icons/tro.svg" width="30">
                        <?=$bcn['ketbaca']?>  &#10070; <?=$tglbaca?></h6>
                        
                    </div>
                </div>
            </div>
        </div>
                
                <div class="card card-style">
            <div class="content mb-0">
                <p class="mb-n1 color-highlight font-600">Histori Capaianku</p>
                <p>
                Update 1 atau 2 Bulan sekali
                </p>
<?php
$batas = 30;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn,"select * from capaian");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$baca ="SELECT * FROM capaian WHERE id_karyawan='$_SESSION[id_karyawan]' ORDER BY tglbaca DESC limit $halaman_awal, $batas";
$nomor = $halaman_awal+1;
$re = mysqli_query($conn, $baca);

if (mysqli_num_rows($re) > 0) {
    while($bc = mysqli_fetch_assoc($re)) {

    $tglmasuk=date_format(date_create_from_format('Y-m-d', $bc['tglbaca']),"d M Y");
?>
                <div class="d-flex mb-4">
                    <div class="align-self-center">
                    <img src="images/icons/medal.svg" class="rounded-sm me-3" width="25">

                </div>
                    <div class="align-self-center">
                        <p class="color-highlight font-11 mb-n2">Keterangan</p>
                        <h2 class="font-15 line-height-s mt-1 mb-1"><?= $bc['ketbaca'] ?></h2>
                    </div>
                    <div class="ms-auto ps-3 align-self-center text-center">
                        <p class="color-highlight font-10 mb-n2">Tanggal Update</p>
                        <h2 class="font-15 mb-0"><?= $tglmasuk ?></h2>
                    </div>
                </div>
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
for ($x = 1; $x <= $total_halaman; $x++) {
  echo match ($halaman <=> $x) {
    0 => "<li class='page-item active'><a class='page-link rounded-xs color-black bg-highlight shadow-l border-0' href='?halaman=$x'>$x</a></li>",
    default => "<li class='page-item'><a class='page-link rounded-xs color-black bg-highlight shadow-l border-0' href='?halaman=$x'>$x</a></li>",
  };
}
?>

             
            </ul>
        </nav>
       

       
    </div>
    <!-- Page content ends here-->

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome" data-menu-load="menu-main.php"></div>
   <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php" data-menu-height="480"></div>

    

</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>