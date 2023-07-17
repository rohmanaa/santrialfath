<?php
 include 'php/config.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Login App</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light">
    

    
<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="#" class="header-title">App Fath</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

            
    <div class="page-content pb-0">
        
        
        <div class="card rounded-0 mb-0" data-card-height="cover-full">
            <div class="card-center ps-3">
                <div class="text-center">
                    <h1 class="font-40 font-800 pb-2">App<span class="gradient-highlight p-2 mx-1 color-white scale-box d-inline-block rounded-s border-0">Fath</span></h1>
                    <h5 class="mt-n2 opacity-30 mb-4">Powered by Tpa Alfath.</h5>
                </div>
                
                <div class="ms-3 me-4 mb-n3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-style no-borders no-icon validate-field mb-4">
                        <input type="number" name="id_karyawan"  class="form-control validate-name" id="form1a" placeholder="Nomor Induk Santri">
                        <label for="form1a" class="color-highlight">Username</label>
                      
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders no-icon validate-field mb-4">
                        <input type="password" name="password" class="form-control validate-password" id="form1ab" placeholder="Password">
                        <label for="form1ab" class="color-highlight">Password</label>
                      
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="clearfix"></div>
           
                    
                </div>

                <center>
        <button type="submit" name="submit" class="btn btn-center-l gradient-highlight rounded-sm btn-l font-13 font-600 mt-5 border-0"> BISMILLAH</button>
                </center>
            
              </form>

            </div>
            
        </div>    
     
                
    </div>

    <?php 
 error_reporting(0);
 session_start();
 if (isset($_SESSION['id_karyawan'])) {
     header("Location: index.php");
 }
  
 if (isset($_POST['submit'])) {
     $email = $_POST['id_karyawan'];
     $password =$_POST['password'];
  
     $sql = "SELECT * FROM karyawan WHERE id_karyawan='$email' AND password='$password' AND statussantri='aktif'";
     $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION['id_karyawan'] = $row['id_karyawan'];
         $_SESSION['nama_karyawan']= $row['nama_karyawan'];
         $_SESSION['id']= $row['id'];
         header("Location: index.php");
     } else {
         echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
     }
 }
  
 ?>
    
    
    <!-- Page content ends here-->
         
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
