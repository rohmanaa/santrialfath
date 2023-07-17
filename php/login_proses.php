<?php
include 'config.php';
$idkaryawan=$_POST['id_karyawan'];
$password=$_POST['password'];
$qry=mysql_query("SELECT * FROM karyawan WHERE id_karyawan'$idkaryawan' AND password='$password'");
$jumpa=mysql_num_rows($qry);
$r=mysql_fetch_array($qry);
 

if ($jumpa > 0) {
	session_start();
	$_SESSION['idkaryawan']= $r['id_karyawan'];
	$_SESSION['namakaryawan']= $r['nama_karyawan'];
	header('location:../index.php');
}
else {
    print_r($jumpa);
    echo 'gagal';
	exit();
}
?>