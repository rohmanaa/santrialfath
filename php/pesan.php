<?php
include "config.php";
$pesan = $_POST['pesan'];
$query = "UPDATE karyawan SET pesan='$pesan' where id='$_POST[id]'";
$hasil = mysqli_query($conn, $query);

if($hasil)
{
  session_start();
  $_SESSION['toast_success'] = 'Success';
  echo "<script language='javascript'>
  window.location='../profile.php';
</script>";
}
else{
  session_start();
  $_SESSION['toast_error'] = 'Error';
    echo "<script language='javascript'>
    window.location='../statusku.php';
    </script>";
}

?>
    