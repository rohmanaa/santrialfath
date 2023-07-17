<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Quran</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">

</head>


<body>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<div class="header header-fixed header-logo-center">
        <a href="<?=$base_url?>raportku.php" class="header-title">Raport</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fa fa-chevron-left"></i></a>
</div>

<div class="page-title-clear" style="margin-bottom:-20px"></div>
<div class="card card-style">
 
<div class="content text-center py-3">
                <i class="far fa-clock fa-8x color-highlight mb-5"></i>
                <h1 class="font-36 font-800 mb-2">We're on It!</h1>
                <p class="boxed-text-xl">
Untuk Saat ini Raport Belum Tersedia                </p>

                <div class="countdown row mb-4 mt-5 ms-3 me-3">
                    <div class="disabled">
                        <h1 class="mb-n2 color-theme font-28" id="years"></h1>
                        <p class="mt-n1 color-theme font-11 opacity-30">years</p>
                    </div>
                    <div class="col-3">
                        <h1 class="mb-n2 color-theme font-28" id="days"></h1>
                        <p class="mt-n1 color-theme font-11 opacity-30">days</p>
                    </div>
                    <div class="col-3">
                        <h1 class="mb-n2 color-theme font-28" id="hours"></h1>
                        <p class="mt-n1 color-theme font-11 opacity-30">hours</p>
                    </div>
                    <div class="col-3">
                        <h1 class="mb-n2 color-theme font-28" id="minutes"></h1>
                        <p class="mt-n1 color-theme font-11 opacity-30">minutes</p>
                    </div>
                    <div class="col-3">
                        <h1 class="mb-n2 color-theme font-28" id="seconds"></h1>
                        <p class="mt-n1 color-theme font-11 opacity-30">seconds</p>
                    </div>
                </div>


            </div>
  
</div>
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

