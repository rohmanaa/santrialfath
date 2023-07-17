

<?php 
 // Define the base URL of the website
$base_url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

 setlocale(LC_ALL, 'id-ID', 'id_ID');
 date_default_timezone_set("Asia/Jakarta");

 
$server = "localhost";
$user = "root";
$pass = "";
$database = "keluar15_wp26";
 
$conn = mysqli_connect($server, $user, $pass, $database);

if (mysqli_connect_errno()) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
} 
?>



