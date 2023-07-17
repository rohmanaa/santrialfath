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
<title>App</title>
<link rel="stylesheet" type="text/css" href="scripts/toast/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
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
    
        
        <div class="card">
            <div class="content">
                <p class="mb-n1 color-highlight font-600 font-12">Edit data kamu</p>
                <h4>Informasi Umum</h4>
                <form method=POST class='form-horizontal' action='php/editdata.php' enctype='multipart/form-data'>   <div class="mt-5 mb-3">
                <input type=hidden name='id' value='<?=$peg['id']?>'/> 
                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="nama_karyawan" type="text" placeholder="Nama Lengkap Santri" Value="<?=$peg['nama_karyawan']?>">
                        <label for="form1" class="color-highlight">Nama Lengkap</label>
                  
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="tempat_lahir" type="text" placeholder="tempat Lahir" Value="<?=$peg['tempat_lahir']?>"/>
                        <label for="form1" class="color-highlight"></label>
                   
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" id="datepicker" name="tgl_lahir" type="date" Value="<?=$peg['tgl_lahir']?>">
                    <label for="form1" class="color-highlight">Tanggal Lahir</label>
                  
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <select name='jeniskelamin' id='jeniskelamin' class='form-control' Value="<?=$peg['jeniskelamin']?>">
                        <option disabled> - Pilih - </option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="form1" class="color-highlight">jenis Kelamin</label>
                 
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="alamat" type="text" Value="<?=$peg['alamat']?>"/>
                        <label for="form1" class="color-highlight">Alamat</label>
                        
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="nohp" type="number" Value="<?=$peg['nohp']?>"/>
                        <label for="form1" class="color-highlight">NO WA (jika ada)</label>
                    
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="form-check icon-check">
                            <input class="form-check-input" onclick='myFunction()' type="checkbox" value="" id="check6">                            
                            <label class="form-check-label" for="check6">Lihat Password</label>
                            <i class="icon-check-1 far fa-frown color-gray-dark font-16"></i>
                            <i class="icon-check-2 far fa-smile font-16 color-highlight"></i>
                    </div>
                    <br>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="password" id='myPassword' type="password" Value="<?=$peg['password']?>"/>
                        <label for="form1" class="color-highlight" >Update Password </label>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="ayah" type="text" Value="<?=$peg['ayah']?>"/>
                        <label for="form1" class="color-highlight">Nama Ayah</label>
                      
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="ibu" type="text" Value="<?=$peg['ibu']?>"/>
                        <label for="form1" class="color-highlight">Nama Ibu</label>
                       <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                    <input class="form-control" name="nowa" type="nowa" Value="<?=$peg['nowa']?>"/>
                        <label for="form1" class="color-highlight">WA Ortu</label>
             
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    
                </div>
                
            
                <button type="submit" name="submit" class="btn btn-m gradient-highlight rounded-s font-13 font-600 mt-4"></i>Simpan</button>
            
            </div>
</form>
        </div>
            
        
    </div>
    <!-- Page content ends here-->
    
    
</div>
</script>        
   <script>   function myFunction() {
                var x = document.getElementById("myPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
              }</script>

<script>
    
<?php if($_SESSION['toast_error'] == 'Error'){ ?>
                     
                     $.toast({
                         heading: 'Error',
                         text: 'Gagal Update, Hubungi Kendala <a href="<?=$base_url?>page-contact.php">issues</a>',
                         showHideTransition: 'plain',
                         icon: 'error'
                     })
         
            <?php }
            $_SESSION['toast_error'] = 'upi';
            ?>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body></html>
