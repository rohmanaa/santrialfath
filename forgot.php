<?php 
 
 include 'php/config.php';
 $timestamp = time(); // current timestamp
 $formatted_timestamp = date('Y-m-d H:i:s', $timestamp);
 
 ?>
 <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Forgot</title>
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
<style>
            .bg-br {
                background-image: url(images/pictures/pr.svg);
            }
            </style>
    <div class="page-content pb-0">

        <div data-card-height="cover-full" class="card mb-0 bg-br">
            <div class="card-center">
                <div class="text-center">
                    <p class="font-600 color-highlight mb-1 font-16">Reset Password</p>
                    <h1 class="font-40 color-white">Forgot</h1>
                    <p class="boxed-text-xl color-white opacity-50 pt-3 font-15">
Masukan NIS (Nomos Induk Santri) dan Nomor WA untuk reset password                    </p>
                </div>
  
                <div class="content px-4">
                <form action="<?=$base_url?>php/lupapw.php" method="post" enctype="multipart/form-data">
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="number" name="id_karyawan" class="form-control validate-name" id="form1a" placeholder="Nomor Induk Santri" required>
                        <label for="form1a" class="color-highlight">Nomor Induk Santri</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <input type="number" name="nowa" class="form-control validate-name" id="form1a" placeholder="Nomor WhatsApp" required>
                        <label for="form1a" class="color-highlight">Nomor WhatsApp</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <input type="hidden" name ="tglkirim" value="<?= $formatted_timestamp ?>">

                    <center>
        <button type="submit" name="lupa" class="btn btn-center-l gradient-highlight rounded-sm btn-l font-13 font-600 mt-5 border-0"> DAPATKAN</button>
                </center>
            
              </form>
                    <div class="row pt-3 mb-3">
                        <div class="col-6 text-start font-11">
                            <a class="color-white opacity-50" href="<?= $base_url?>login.php">Login</a>
                        </div>
          
                    </div>
                </div>


            </div>
            <div class="card-overlay bg-black opacity-85"></div>
        </div>

    </div>
    <!-- Page content ends here-->
   
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
