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
    <title>Alfath Profile</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


    <div id="page">

        <div class="header header-fixed header-logo-center">
            <a href="<?=$base_url?>index.php" class="header-title">Al-Fath Profile</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
        </div>

        <style>
        .bg-qt {
            background-image: url(images/pictures/pr.svg);
        }
        </style>
        <div class="card card-fixed bg-qt mb-n5" data-card-height="250">
            <div class="card-center text-center">
                <h1 class="color-white font-24 mb-n2">TPA ALFATH PABUARAN</h1>
                <p class="color-white opacity-90 font-11 mb-0">
                    Pengajian Anak-Remaja<br>
                    <a href="http://youtube.com/c/keluargaalfath" target="_blank"
                        class="icon icon-xs rounded-sm mr-1 shadow-l bg-red-dark"><i class="fab fa-youtube"></i></a>
                    <a href="http://instagram.com/keluargaalfath" target="_blank"
                        class="icon icon-xs rounded-sm mr-1 shadow-l bg-red-dark"><i class="fab fa-instagram"></i></a>
                    <a href="http://mailto:tpaalfathpabuaran@gmail.com" target="_blank"
                        class="icon icon-xs rounded-sm mr-1 shadow-l bg-yellow-dark"><i
                            class="fa fa-paper-plane"></i></a>
                    <a href="https://chat.whatsapp.com/GGxDjPx5GFW7oDXswXe5V7" target="_blank"
                        class="icon icon-xs rounded-sm mr-1 shadow-l bg-whatsapp"><i class="fab fa-whatsapp"></i></a>

                </p>

            </div>
        </div>
        <div class="card card-clear" data-card-height="250"></div>


        <div class="page-content pb-3">

            <!-- card in this page format must have the class card-full to avoid seeing behind it-->
            <div class="card card-full rounded-m pb-4">
                <div class="drag-line"></div>

                <div class="content">
                    <p class="font-600 mb-n1 color-highlight">Profile TPA Al-Fath</p>
                    <h1>Tentang</h1>
                    <p>
                        Majelis TK/TPA Al-Fath dibentuk pada tanggal 30 Juli 2017. adanya pengajian ini disebabkan
                        karena ada seorang yang pindah ke daerah kami yang bertanya-tanya dimana tempat pengajian,
                        singkat cerita zada isu bahwa disini dapat mengajar mengaji.
                        dan akhirnya isu tersebut meluas sehingga tetangga kami pun mengaji disini, yang berawal kurang
                        lebih 7 murid . </p>
                    <h1>Misi</h1>
                    <p>
                        Menjadikan Generasi qurani<br>
                        Membentuk generasi berkarakter mandiri dan religius <br>
                        Membentuk Akhlaq yang baik<br>
                        Membentuk pribadi yang baik dan disiplin</p>
                    <h1>Sekretariat</h1>
                    <p>Jalan Gotong royong, Kp. Pabuaran RT01/04 No. 68, Kec. Gunungsindur, Kab. Bogor<br>
                        <a href="https://goo.gl/maps/YaaMrPRswxQmtBLA7" target="_blank"><i class="fa fa-map"></i>
                            Maps</a>
                    </p>
                    <div class="divider mt-3 mb-3"></div>
                    <h1>Pengurus</h1>
                    <div class="d-flex">
                        <div class="me-auto">
                            <img src="images/pictures/boy.svg" width="100" class="rounded-sm">
                        </div>
                        <div class="w-100 ps-3">
                            <h4 class="mb-0">Atang</h4>
                            <p class="mb-2">Kepala Rumah Tangga</p>
                            <p>

                                <span class="mt-3 badge border color-green-dark border-green-dark">Support</span>
                            </p>
                        </div>
                    </div>

                    <div class="divider mt-3 mb-3"></div>

                    <div class="d-flex">
                        <div class="me-auto">
                            <img src="images/pictures/woman.svg" width="100" class="rounded-sm">
                        </div>
                        <div class="w-100 ps-3">
                            <h4 class="mb-0">Siti Rodiah</h4>
                            <p class="mb-2">Ibu Rumah Tangga</p>
                            <p>

                                <span class="ms-2 badge border color-blue-dark border-blue-dark">Guru</span>
                            </p>
                        </div>
                    </div>


                    <div class="divider mt-3 mb-3"></div>

                    <div class="d-flex">
                        <div class="me-auto">
                            <img src="images/pictures/boy.svg" width="100" class="rounded-sm">
                        </div>
                        <div class="w-100 ps-3">
                            <h4 class="mb-0">Rohman Abdul Azis</h4>
                            <p class="mb-2">Anak Pertama</p>
                            <p>

                                <span class="mt-3 badge border color-green-dark border-green-dark">Guru</span>
                                <span class="ms-2 badge border color-red-dark border-red-dark">Juru Wakil</span>
                            </p>
                        </div>
                    </div>

                    <div class="divider mt-3 mb-3"></div>

                    <div class="d-flex">
                        <div class="me-auto">
                            <img src="images/pictures/woman.svg" width="100" class="rounded-sm">
                        </div>
                        <div class="w-100 ps-3">
                            <h4 class="mb-0">Putri Paradilah</h4>
                            <p class="mb-2">Istri Rohman</p>
                            <p>

                                <span class="mt-2 badge border color-red-dark border-red-dark">Guru</span>
                            </p>
                        </div>
                    </div>


                    <div class="divider mt-3 mb-3"></div>

                    <div class="d-flex">
                        <div class="me-auto">
                            <img src="images/pictures/woman.svg" width="100" class="rounded-sm">
                        </div>
                        <div class="w-100 ps-3">
                            <h4 class="mb-0">Angginaka Rohmawati</h4>
                            <p class="mb-2">Anak Kedua</p>
                            <p>

                                <span class="ms-2 badge border color-red-dark border-red-dark">Asisten Ibu Rodiah</span>
                            </p>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- Page content ends here-->

        <!-- Main Menu-->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280"
            data-menu-active="nav-pages"></div>

        <!-- Share Menu-->

        <!-- Colors Menu-->
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.php"
            data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>