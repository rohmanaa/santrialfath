<?php
include "config.php";
$namak = $_POST['nama_karyawan'];
$tmp= $_POST['tempat_lahir'];
$thr= $_POST['tgl_lahir'];
$jk = $_POST['jeniskelamin'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$pw = $_POST['password'];
$ayh = $_POST['ayah'];
$ibu = $_POST['ibu'];
$nowa = $_POST['nowa'];


$query = "UPDATE karyawan SET 
nama_karyawan='$namak',
tempat_lahir='$tmp', 
tgl_lahir='$thr',
jeniskelamin='$jk',
alamat='$alamat',
nohp='$nohp',
password='$pw',
ayah='$ayh',
ibu='$ibu',
nowa='$nowa' where id='$_POST[id]'";
$hasil = mysqli_query($conn, $query);

if($hasil){
   session_start();
  $_SESSION['toast_success'] = 'Success';
  echo "<script language='javascript'>
  window.location='../profile.php';
</script>";
}
else{   session_start();
  $_SESSION['toast_error'] = 'Error';
    echo "<script language='javascript'>
    window.location='../editdata.php';
    </script>";
}

?>
    