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

$cekin  = mysqli_query($conn, "SELECT tahunajaran.status, SUM(misiharian.koin) as total_koin
FROM tahunajaran
JOIN misiharian ON tahunajaran.id_ajaran = misiharian.id_akademik
WHERE misiharian.id_karyawan='{$_SESSION['id_karyawan']}' AND tahunajaran.status = '1'");
$cek = mysqli_fetch_array($cekin);

?>
<!DOCTYPE HTML>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Misi Harian</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-highlight="highlight-red">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>


    <div id="page">
        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>dataku.php" class="header-title"></a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-20px"></div>



        <div class="page-title page-title-fixed">

            <div class="card header-card shape-rounded" data-card-height="210">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/avatars/alfath.png"></div>
            </div>
        </div>


        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome"
            data-menu-load="menu-main.php"></div>
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>


        <div class="page-content">
          
          <style>
            .bg-br {
                background-image: url(images/pictures/pr.svg);
            }
            </style>

            <div class="card card-style">
                <div class="card rounded-0 mb-0 bg-br" data-card-height="10" style="height:10px;">
                    <div class="card-top pe-3 pt-3">
                    </div>
                </div>

                <?php
$tglnow=date("Y-m-d");
$tampilPe = mysqli_query($conn, "SELECT * FROM misiharian WHERE tglmisi='$tglnow' AND id_karyawan='{$_SESSION['id_karyawan']}'");
$pegi = mysqli_fetch_array($tampilPe);
setlocale(LC_ALL, 'id-ID', 'id_ID');


$akademik = mysqli_query($conn, "SELECT * FROM tahunajaran WHERE status='1'");
$aka = mysqli_fetch_array($akademik);

$sesi=$_SESSION['id_karyawan'];


?>
                <div class="content">
                    <p class="badge mb-n1 bg-yellow-dark font-600">Refresh 1 Kali/24 Jam</p>
                    <div class="d-flex">
                        <div class="me-auto">
                            <div class="list-group list-custom-large mt-n3">
                                <a href="#" class="border-0">
                                    <img src="images/pictures/coin.svg" class="rounded-sm">
                                    <span>Cek in Login Harian </span>
                                    <strong>1 Cek Login : 10 Koin/hari</strong>
                                </a>

                            </div>
                        </div>
                        <div>
                            <form action='php/cekin.php' method='post' enctype='multipart/form-data'>
                                <input type="hidden" name="id_karyawan" value="<?=$sesi?>">
                                <input type="hidden" name="id_akademik" value="<?=$aka['id_ajaran'] ?>">
                                <input type="hidden" name="tglmisi" value="<?= $tglnow ?>">
                                <input type="hidden" name="namamisi" value="cekin">
                                <input type="hidden" name="koin" value="10">
                                <?php
                date_default_timezone_set("Asia/Jakarta");
                            
                if     ($pegi['tglmisi']==$tglnow && $pegi['namamisi']=='cekin') { 
                     echo"<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                         class='fa fa-check pr-3'></i></a>";
                }
                else{ 
                    echo"
                    <button type='submit' name='cekin'
                    class='btn btn-full btn-s font-600 rounded-s bg-highlight mt-1'><i
                        class='fa fa-paper-plane pr-3'></i></button>";
                }

               
                ?>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!-- <div class="card card-style">


                <div class="content">
                    <p class="badge mb-n1 bg-red-dark font-600">Tanggal <?=$tgll?></p>
                    <h1>Absen Sholatmu</h1>
                    <p class="opacity-60 text-uppercase font-10 mt-n2 font-600 mb-1">Aku tidak melihatmu, Tapi ALlah
                        melihatmu</p>

                    <div class="d-flex">
                        <div class="me-auto">
                            <div class="list-group list-custom-large mt-n3">


                                <a href="#" class="border-0">
                                    <img src="images/pictures/coin.svg" class="rounded-sm">

                               
                                    <?php 
                date_default_timezone_set("Asia/Jakarta");
                $ak =date('H:i');
                $sesi=$_SESSION['id_karyawan'];
                if ($ak > '04:00' && $ak < '05:30') {
                $form = '<form action="php/absensholat.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_karyawan" value="'.$sesi.'">
                                    <input type="hidden" name="tglmisi" value="'.$tglnow.'">
                                    <input type="hidden" name="namamisi" value="subuh">
                                    <input type="hidden" name="koin" value="5">'; 
                echo"<span>Subuh</span>
                <strong>Jam 04.00-05.30</strong>";
                if( $pegi['tglmisi']==$tglnow && $pegi['namamisi']=='subuh') { 
                $tombol ="<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                class='fa fa-check pr-3'></i></a>";
                }else{
                    $tombol = "<button type='submit' name='sholat'
                    class='btn btn-full btn-s font-600 rounded-s bg-blue-dark mt-1'><i
                        class='fa fa-paper-plane pr-3'></i></button>";
                }
                } 
                elseif ($ak > '12:00' && $ak < '14:30') {
                    $form = '<form action="php/absensholat.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_karyawan" value="'.$sesi.'">
                    <input type="hidden" name="tglmisi" value="'.$tglnow.'">
                                    <input type="hidden" name="namamisi" value="zuhur">
                                    <input type="hidden" name="koin" value="5">';
                    echo"<span>Zuhur</span>
                    <strong>Jam 12:00 - 14:30</strong>";
                    if( $pegi['tglmisi']==$tglnow && $pegi['namamisi']=='zuhur') { 
                        $tombol ="<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                        class='fa fa-check pr-3'></i></a>";
                        }else{
                            $tombol = "<button type='submit' name='sholat'
                            class='btn btn-full btn-s font-600 rounded-s bg-blue-dark mt-1'><i
                                class='fa fa-paper-plane pr-3'></i></button>";
                        }
                }
                elseif ($ak > '15:00' && $ak < '17:30') {
                    $form = '<form action="php/absensholat.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_karyawan" value="'.$sesi.'">
                    <input type="hidden" name="tglmisi" value="'.$tglnow.'">
                                    <input type="hidden" name="namamisi" value="ashar">
                                    <input type="hidden" name="koin" value="5">';
                    echo"<span>Ashar</span>
                    <strong>Jam 15:00 - 17:30</strong>";
                    if( $pegi['tglmisi']==$tglnow && $pegi['namamisi']=='ashar') { 
                        $tombol ="<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                        class='fa fa-check pr-3'></i></a>";
                        }else{
                            $tombol = "<button type='submit' name='sholat'
                            class='btn btn-full btn-s font-600 rounded-s bg-blue-dark mt-1'><i
                                class='fa fa-paper-plane pr-3'></i></button>";
                        }
                }
                elseif ($ak > '18:00' && $ak < '19:10') {
                    $form = '<form action="php/absensholat.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_karyawan" value="'.$sesi.'">
                    <input type="hidden" name="tglmisi" value="'.$tglnow.'">
                                    <input type="hidden" name="namamisi" value="maghrib">
                                    <input type="hidden" name="koin" value="5">';
                    echo"<span>Maghrib</span>
                    <strong>jam 18:00 - 19:10</strong>";
                    if( $pegi['tglmisi']==$tglnow && $pegi['namamisi']=='maghrib') { 
                        $tombol ="<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                        class='fa fa-check pr-3'></i></a>";
                        }else{
                            $tombol = "<button type='submit' name='sholat'
                            class='btn btn-full btn-s font-600 rounded-s bg-blue-dark mt-1'><i
                                class='fa fa-paper-plane pr-3'></i></button>";
                        }
                }
                elseif ($ak > '19:11' && $ak < '23:59') {
                    $form = '<form action="php/absensholat.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_karyawan" value="'.$sesi.'">
                    <input type="hidden" name="tglmisi" value="'.$tglnow.'">
                                    <input type="hidden" name="namamisi" value="isya">
                                    <input type="hidden" name="koin" value="5">';
                    echo"<span>Isya</span>
                    <strong>Jam 19:11-23:59</strong>";
                    if( $pegi['tglmisi']==$tglnow && $pegi['namamisi']=='isya') { 
                        $tombol ="<a href ='#' class='btn btn-full btn-s font-600 rounded-s bg-green-dark mt-1'><i
                        class='fa fa-check pr-3'></i></a>";
                        }else{
                            $tombol = "<button type='submit' name='sholat'
                            class='btn btn-full btn-s font-600 rounded-s bg-blue-dark mt-1'><i
                                class='fa fa-paper-plane pr-3'></i></button>";
                        }
                }
                else{ echo " <span>Belum masuk waktu</span>
                    <strong>Tunggu Waktu</strong>";}
                ?>
                                </a>
                            </div>
                        </div>
                        <div>
                            <?= $form?>
                            <?php 
                
              
                     echo $tombol;
                
                
                                 ?>
                            </form>

                        </div>
                    </div>


                    </form>
                </div>
            </div> -->


            <div class="card card-style">
                <div class="content">
                    <p class="badge mb-n1 bg-red-dark font-600">PEROLEHAN KOIN</p>
                    <h1>Kumpulkan Sebanyak-banyaknya</h1>
                    <div class="d-flex">
                        <div class="me-auto">

                            <div class="list-group list-custom-large mt-n3">

                                <?php 
    $sql ="SELECT * FROM karyawan ORDER BY nama_karyawan ASC";
  $result = mysqli_query($conn, $sql);                                 
  if (mysqli_num_rows($result) > 0) {
      foreach($result as $row) { 
        $sql = "SELECT SUM(koin) AS jml
        FROM misiharian ms
        WHERE ms.namamisi = 'cekin' AND ms.id_karyawan = '{$row['id_karyawan']}'
        GROUP BY ms.namamisi, ms.id_karyawan
";

      $result1 = mysqli_query($conn, $sql);
      $count_koin = mysqli_fetch_array($result1);
?>
                                <a href="#" class="border-0">
                                    <img src="images/pictures/coin.svg" class="rounded-sm">
                                    <span><?= $row['nama_karyawan']?></span>
                                    <strong><?= $count_koin['jml']?></strong>
                                </a>
                                <?php }
                } else {
                    echo "Tidak ada data yang ditemukan.";
                  }
                  mysqli_close($conn);
                  ?>
                            </div>
                            <div class="divider mb-3"></div>


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

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>