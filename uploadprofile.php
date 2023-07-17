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
    <title>App Alfath</title>
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

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>


    <div id="page">

        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="<?=$base_url?>index.php" class="header-title">File Upload</a>
        </div>

        <?php

        $tampilPeg = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='" . $_SESSION['id_karyawan'] . "'");
        $peg = mysqli_fetch_array($tampilPeg);
?>

        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>profile.php" class="header-title"></a>
            <a href="<?=$base_url?>profile.php" data-back-button class="header-icon header-icon-1"><i
                    class="fa fa-chevron-left"></i></a>
        </div>

        <div class="page-title-clear" style="margin-bottom:-30px"></div>

        <div class="page-content">



            <div class="card">
                <div class="content mb-0">
                    <p class="mb-n1 color-highlight font-600">Select your Image and</p>
                    <h1>Upload Here</h1>
                    <p>
                        Upload an image and get all the data inside it placed nicely and with a preview of the image
                        above it all.
                    </p>
                    <form method=POST class='form-horizontal' action='php/aksi_phopro.php'
                        enctype='multipart/form-data'>


                        <div class='form-group'>
                            <input type=hidden name="id_karyawan" Value="<?php echo $peg['id_karyawan']?>" />
                        </div>
                        <div class='form-group'>

                            <div class='col-sm-8'>
                                <img src=<?='images/avatars/'.$peg['foto']?> width='100' height='100'
                                    style='border:1px solid #d3d3d3 '>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputEmail3' class='col-sm-2 control-label'></label>
                            <div class='col-sm-8'>
                                <input type="file" name="profile" id="profile" class="form-control" />
                                <br>
                                *Gambar .PNG/.JPG Harus dibawah 1 Mb
                            </div>

                        </div>

                        <div class='form-group'>
                            <label for='inputEmail3' class='col-sm-12 control-label'></label>

                            <button type="submit" name="submit" class="btn btn-m gradient-highlight rounded-s font-13 font-600 mt-4"></i>Simpan</button>


                        </div>
                </div>

                </form>
                <br>

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
                         text: 'Gagal Update, Hubungi Kendala <a href="<?=$base_url?>page-contact.php">issues</a>',
                         showHideTransition: 'plain',
                         icon: 'error'
                     })
    <?php }
    $_SESSION['toast_error'] = 'up';

    ?>

    </script>
    <script>
        <?php if($_SESSION['toast_warning'] == 'Warning'){ ?>
           
           $.toast({
                        heading: 'Warning',
                        text: 'Gagal Update, Bukan JPG/PNG.',
                        showHideTransition: 'plain',
                        icon: 'warning'
                    })
   <?php }
   $_SESSION['toast_warning'] = 'up';

   ?>
        </script>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>