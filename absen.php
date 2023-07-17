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
<title>Absen</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

<div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title"></a>
            <a href="<?=$base_url?>index.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-30px"></div>

    <div class="page-content pb-0">

        <div class="card">
            <div class="drag-line"></div>

            <div class="content">
                <p class="font-600 mb-0 color-highlight">Berikan Izin/Sakit Jika tidak masuk</p>
                <h1>Absen Form</h1>
            </div>

             <?php 
                 date_default_timezone_set("Asia/Jakarta");
                $tgll=date('Y-m-d');
                ?>
            <div class="card contact-form">
                <div class="content">
                <form action="php/kirimabsen.php" method="post" enctype='multipart/form-data'>
               
                         <input type="hidden" name="id_karyawan" value="<?=$_SESSION['id_karyawan']?>">
                            <input type="hidden" name="jam_msk" value="<?= $jam ?> ">
                            <input type="hidden" name="jam_klr" value="<?= $jam ?> ">
                            <input type="hidden" name="id_status" value="4">
                        <fieldset>
                            <div class="form-field form-name">
                                <label class="color-theme" for="">Nama:<span>(required)</span></label>
                                <input type="text" name="karyawan" value="<?php echo$_SESSION['nama_karyawan']; ?>" class="round-small" readonly />
                            </div>

                            <div class="form-field form-name">
                                <label class="tgl color-theme" for="tgl">Tanggal<span>(required)</span></label>
                                <input type="text" name="tgl" value=" <?= $tgll ?> " class="round-small" id="tglkontak" readonly />
                            </div>
                            
                            
                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <select name='id_khd' id='id_khd' class='form-control' >
                        <option disabled> - Pilih - </option>
                        <option value="3">Izin</option>
                        <option value="2">Sakit</option>
                    </select>
                    <label for="form1" class="color-highlight">Absen</label>
                 
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>


                            <div class="form-field form-text">
                                <label class="ket color-theme" for="ket">Keterangan<span>(required)</span></label>
                                <textarea name="ket" class="round-small" id="ket" required></textarea>
                            </div>
                           
                            <button type="submit" name="absen" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl contactSubmitButton"><i class="fa fa-paper-plane pr-3"></i> Kirim</button>
                            
                        </fieldset>
                    </form>
                </div>
            </div>            
        </div>

    </div>


    <!-- end of page content-->
    
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome" data-menu-load="menu-main.php"></div>
   <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php" data-menu-height="480"></div>

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