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

$tampilPeg = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='{$_SESSION['id_karyawan']}'");
$peg = mysqli_fetch_array($tampilPeg);
setlocale(LC_ALL, 'id-ID', 'id_ID');
$tgllahir = strftime("%d %B %Y", strtotime($peg['tgl_lahir']));

?>


<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Alfath App</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">

    <style>
    .bg-br {
        background-image: url(images/pictures/pr.svg);
    }
    </style>
</head>

<body class="theme-light" data-highlight="highlight-red">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">



        <div id="footer-bar" class="footer-bar-6">
            <a href="<?=$base_url?>dataku.php"><i class="fa fa-graduation-cap"></i><span>Dataku</span></a>
            <a href="<?=$base_url?>halaman.php "><i class="fa fa-university"></i><span>Umum</span></a>
            <a href="<?=$base_url?>index.php"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=$base_url?>profile.php" class="active-nav circle-nav"><i
                    class="fa fa-user"></i><span>Profile</span></a>
            <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
        </div>

 

            <!-- card in this page format must have the class card-full to avoid seeing behind it-->
       <div class="card card-style mt-3 bg-br">
         
         
<center>
                <div class="content">
                    <a href="<?= 'images/avatars/'.$peg['foto']?>" title="<?= $peg['nama_karyawan']?>"
                        class="default-link" data-gallery="gallery-3" >
                        <img src="<?= 'images/avatars/'.$peg['foto']?>" class="img-fluid shadow-xl"
                            style="width: 90px; height: 90px;  border-radius:100%;border:3px solid white"
                            alt="Belum Ada foto">
                    </a>
                </div>

               
                <div class="content">
                    <h4 class="color-white mb-0"><?=$peg['nama_karyawan']?>
                    </h4>
                </div>

           
                    <p class="color-white">
                        " <?= $peg['pesan']?> "
                    </p>
                
  </center>
      </div>
         <div class="card card-style mt-3">
            <div class="content mb-1">
                <div class="list-group list-custom-small list-menu ms-0 me-1">
                    <a href="<?=$base_url?>profilelihat.php" class="menu-active">
                        <i class="fa fa-home gradient-blue color-white"></i>
                        <span>Biodata</span>
                        <span class="badge gradient-blue color-white">></span>
                        <i class="fa fa-angle-right"></i>
                    </a>     
                    <a href="<?=$base_url?>useredit.php">
                        <i class="fa fa-cog gradient-magenta color-white"></i>
                        <span>Edit Biodata</span>
                        <i class="fa fa-angle-right"></i>
                    </a>        
                    <a href="<?=$base_url?>uploadprofile.php">
                        <i class="fa fa-heart gradient-red color-white"></i>
                        <span>Photo Profile</span>
                        <span class="badge gradient-red color-white">HOT</span>
                        <i class="fa fa-angle-right"></i>
                    </a>     
                    <a href="<?=$base_url?>statusku.php">
                        <i class="fa fa-star gradient-yellow color-white"></i>
                        <span>Status</span>
                        <i class="fa fa-angle-right"></i>
                    </a>    
                         
                </div>
            </div>  
   
        


            </div>
        </div>
        <!-- Page content ends here-->
        <!-- Page content ends here-->

        <!-- Menu Share -->
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
            text: 'Berhasil Update.',
            showHideTransition: 'slide',
            icon: 'success'
        })
        <?php }
    $_SESSION['toast_success'] = 'up';
    ?>
        </script>


        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
</body>

</html>