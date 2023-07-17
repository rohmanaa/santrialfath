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
<title>Peraturan</title>
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
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="<?=$base_url?>index.php" class="header-title">Ketentuan</a>
   </div>
    
    <div class="page-title page-title-fixed">
    <a href="#" data-back-button class="page-title-icon shadow-xl bg-theme color-theme me-0 ms-3"><i class="fa fa-arrow-left"></i></a>

        <h1 class="font-22">Syarat dan Ketentuan</h1>
  
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content fixed-height-page">

        <div class="card card-style">
            <div class="content">
                <h2 class="">1. Ketentuan</h2>
                <p>
                Dengan mengakses situs web ini, Anda setuju untuk terikat oleh Syarat dan Ketentuan Penggunaan situs web ini, semua hukum dan peraturan yang berlaku, dan setuju bahwa Anda bertanggung jawab untuk mematuhi hukum setempat yang berlaku. Jika Anda tidak setuju dengan salah satu ketentuan ini, Anda dilarang menggunakan atau mengakses situs ini. Materi yang terkandung dalam situs web ini dilindungi oleh undang-undang hak cipta dan merek dagang yang berlaku.
                </p>

                <h4 class="">2. Peraturan Umum</h4>
                <ol type="a">
                    <li>
                    Santri yang libur Lebih dari 1 Bulan Berturut-turut tanpa alasan jelas, maka dianggap berhenti dari TPA Alfath, mengaji minimal 2X pertemuan/pekan dan memberi keterangan jika tidak masuk.
                    </li>
                    <li>
                    Jika santri tersebut ingin mengaji kembali maka Wali/orang tua santri diwajibkan bertemu kepada Guru/Pihak TPA Al-Fath secara langsung.(1)
                                    </li>
                                    <li>
                                    Santri yang sering masuk-keluar (pindah pengajian) dari TPA Alfath selama lebih dari 2 kali, maka tidak diperbolehkan masuk ke TPA Al-Fath kembali.
</li><li>
Tidak diizinkan membawa teman baru untuk mengaji di TPA Al-Fath tanpa membawa Wali/Orang tua/Penanggung jawab pihak bersangkutan.
</li>
<li>
Tidak mengaji pada 2 tempat pengajian.
</li><li>
Santri TPA AL-Fath aktif akan diberikan KTS ( Kartu Tanda Santri ).
</li>
                </ol>

                <h4 class="">3. Penggunaan</h4>
                <ol type="a"><li>Aplikasi ini hanya digunakan khusus Santri TPA Alfath.</li></ol>

                <h4 class="">4. Limit</h4>
                <p>Bila Santri sudah dinyatakan berhenti/mengundurkan diri/mengaji ditempat lain, maka tidak dapat mengakses Aplikasi Santri.
                    </p>

            </div>
        </div>

        <div class="card card-style">
            <div class="content">

                <h2 class="bolder bottom-15">Privasi</h2>
                <p>Privasi Anda sangat penting bagi kami. Oleh karena itu, kami telah mengembangkan Kebijakan ini agar Anda memahami bagaimana kami mengumpulkan, menggunakan, mengomunikasikan, dan mengungkapkan serta memanfaatkan informasi pribadi. Berikut ini menguraikan kebijakan privasi kami.</p>
                <ul>
                    <li>Sebelum atau pada saat pengumpulan informasi pribadi, kami akan mengidentifikasi tujuan pengumpulan informasi.</li>
                    <li>Kami akan mengumpulkan dan menggunakan informasi pribadi semata-mata dengan tujuan untuk memenuhi tujuan yang ditentukan oleh kami dan untuk tujuan lain yang sesuai, kecuali jika kami mendapatkan persetujuan dari individu yang bersangkutan atau sebagaimana diwajibkan oleh hukum.</li>
                    <li>Data pribadi harus relevan dengan tujuan penggunaannya, dan, sejauh diperlukan untuk tujuan tersebut, harus akurat, lengkap, dan terkini. </li>
                    <li>Kami akan melindungi informasi pribadi dengan perlindungan keamanan yang wajar terhadap kehilangan atau pencurian, serta akses, pengungkapan, penyalinan, penggunaan, atau modifikasi yang tidak sah.</li>
                    <li>Kami hanya akan menyimpan informasi pribadi selama diperlukan untuk memenuhi tujuan tersebut. </li>                   
                    <li>Kami akan menyediakan informasi kepada pelanggan tentang kebijakan dan praktik kami yang berkaitan dengan pengelolaan informasi pribadi. </li>
                    <li>Kami akan mengumpulkan informasi pribadi dengan cara yang sah dan adil dan, jika sesuai, dengan sepengetahuan atau persetujuan individu yang bersangkutan. </li>
                </ul>
                <p>Kami berkomitmen untuk menjalankan TPA kami sesuai dengan prinsip-prinsip ini untuk memastikan bahwa kerahasiaan informasi pribadi dilindungi dan dipertahankan. </p>                            
            </div>
        </div>
        
  
    </div>
    <!-- Page content ends here-->
    
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>