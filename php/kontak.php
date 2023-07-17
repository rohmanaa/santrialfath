<?php
  include "config.php";
  if(isset($_POST['kontak'])) {
  $karyawan=$_POST['karyawan'];
  $tglnow=date("Y-m-d");
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kontak WHERE tglkontak='$tglnow' AND karyawan='$karyawan'"));
  if ($cek > 0){
    session_start();
    $_SESSION['toast_warning'] = 'Warning';
      echo "<script language='javascript'>
      window.location='../page-contact.php';
      </script>";
  }else {
$kar = $_POST['karyawan'];
$tg= $_POST['tglkontak'];
$ket = $_POST['pesan'];


$input=mysqli_query($conn,"INSERT INTO kontak (karyawan, tglkontak, pesan)
VALUES('$kar','$tg','$ket')");
}
       if($input){
        session_start();
        $_SESSION['toast_success'] = 'Success';
        echo "<script language='javascript'>
        window.location='../page-contact.php';
      </script>";
                    
                    }else
                    {
                      session_start();
                      $_SESSION['toast_error'] = 'Error';
                        echo "<script language='javascript'>
                        window.location='../page-contact.php';
                        </script>";
                    }
                   } 

    ?>