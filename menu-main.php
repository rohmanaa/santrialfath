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
<style>
    .bg-qt {
  background-image: url(images/pictures/pr.svg);
    }
</style>


<div class="card rounded-0 bg-qt" data-card-height="150">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28">Alfath App</h1>
        <p class="mb-2 ps-3 font-12 color-white opacity-50">Welcome to the Future</p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<h6 class="menu-divider">Menu</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-welcome" href="<?=$base_url?>alfathprofile.php">
        <i class="fa fa-user-md gradient-magenta color-white"></i>
        <span>Tentang</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-contact" href="<?=$base_url?>page-contact.php">
        <i class="fa fa-envelope gradient-teal color-white"></i>
        <span>Kontak</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-welcome" href="<?=$base_url?>peraturan.php">
        <i class="fa fa-bookmark gradient-red color-white"></i>
        <span>Ketentuan</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider mt-4">Settings</h6>
<div class="list-group list-custom-small list-menu">
    <a href="#" data-menu="menu-colors">
        <i class="fa fa-brush gradient-highlight color-white"></i>
        <span>Highlights</span>
        <i class="fa fa-angle-right"></i>
    </a>

    <a id="nav-welcome" href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode">
        <i class="fa fa-moon gradient-dark color-white"></i>
        <span>Dark Mode</span>
        <div class="custom-control small-switch ios-switch">
            <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-menu">
            <label class="custom-control-label" for="toggle-dark-menu"></label>
        </div>
    </a>
    <a href="<?=$base_url?>logout.php" data-menu="menu-option-1">
    <i class="fa fa-info  gradient-yellow color-white"></i>
    <span>Logout</span>
    <i class="fa fa-angle-right"></i>
    </a>

</div>






<h6 class="menu-divider font-10 mt-4">Made with <i class="fa fa-heart color-red-dark pl-1 pr-1"></i> by Rohman<span class="copyright-year"> @2023</span></h6>
