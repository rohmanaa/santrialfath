<?php
  include "config.php";
  if(isset($_POST['cekin'])) {
  $id=$_POST['id_karyawan'];
  $namamisi=$_POST['namamisi'];
  $tglnow=date("Y-m-d");
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM misiharian WHERE tglmisi='$tglnow' AND namamisi='$namamisi' AND id_karyawan='$id'"));
  if ($cek > 0){
  echo "<script>window.alert('Kamu sudah cekin')
  window.location='../misiharian.php'</script>";
  }else {
$id = $_POST['id_karyawan'];
$aka = $_POST['id_akademik'];
$tglmisi= $_POST['tglmisi'];
$namamisi= $_POST['namamisi'];
$koin = $_POST['koin'];

$input=mysqli_query($conn,"INSERT INTO misiharian (id_karyawan,id_akademik, tglmisi, namamisi, koin)
VALUES('$id', '$aka','$tglmisi', '$namamisi', '$koin')");
}
       if($input){
        session_start();
        $_SESSION['toast_success'] = 'Succes';
                      echo "<script language='javascript'>
                      window.location='../misiharian.php';
    </script>";
                    
                    }else
                    {
                      session_start();
                      $_SESSION['toast_error'] = 'Errr';
                                    echo "<script language='javascript'>
                                    window.location='../misiharian.php';
                  </script>";
                    }
                   } 

    ?>
    

