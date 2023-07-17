<?php
include "config.php";

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['profile']['name'];
$ukuran = $_FILES['profile']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
  session_start();
  $_SESSION['toast_warning'] = 'Warning';
  echo "<script language='javascript'>
  window.location='../uploadprofile.php';
</script>";
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['profile']['tmp_name'], '../images/avatars/'.$rand.'_'.$filename);
    mysqli_query($conn, "UPDATE karyawan SET foto='$xx' where id_karyawan='$_POST[id_karyawan]'");
    session_start();
    $_SESSION['toast_success'] = 'Success';
    echo "<script language='javascript'>
    window.location='../profile.php';
  </script>";
	}else{
    session_start();
    $_SESSION['toast_error'] = 'Error';
      echo "<script language='javascript'>
      window.location='../uploadprofile.php';
      </script>";
	}
}


?>
