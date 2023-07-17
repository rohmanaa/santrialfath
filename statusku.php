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

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>App</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


    <div id="page">

    <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>profile.php" class="header-title"></a>
            <a href="<?=$base_url?>profile.php" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
        </div>
        
        <div class="page-title-clear" style="margin-bottom:-30px"></div>
        <?php
    include 'php/config.php';
        $tampilPeg   =mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='$_SESSION[id_karyawan]'");
        $peg    =mysqli_fetch_array($tampilPeg);
       
    ?>
        <div class="page-content">


            <div class="card ">
                <div class="content">


                    <form method=POST class='form-horizontal' action='php/pesan.php' enctype='multipart/form-data'>
                        <input type=hidden name='id' value='<?=$peg['id']?>' />
                        <div class="input-style has-borders no-icon input-style-always-active mb-4">
                            <textarea id="pesan" name="pesan"
                                placeholder="Enter your message"><?=$peg['pesan']?></textarea>
                            <label for="pesan" class="color-highlight">Buat Status Menarik</label>
                        </div>


                        <button type="submit"
                            class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4"><i
                                class="fa fa-users pr-3"></i> Kirim</button>
                    </form>
                </div>
            </div>


        </div>
        <!-- Page content ends here-->


    </div>
	<script type="text/javascript" src="scripts/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/toast/jquery.toast.min.js"></script>
    
    <script>
        <?php if($_SESSION['toast_error'] == 'Error'){ ?>
           
            $.toast({
                heading: 'Error',
                text: 'Gagal Mengirim Error.',
                showHideTransition: 'slide',
                icon: 'error'
            })
    <?php }
    $_SESSION['toast_error'] = 'up';
    ?>



    </script>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>