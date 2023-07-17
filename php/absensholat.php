<?php
  include "config.php";
  if(isset($_POST['sholat'])) {
  $id=$_POST['id_karyawan'];
  $namamisi=$_POST['namamisi'];
  $tglnow=date("Y-m-d");
  $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM misiharian WHERE tglmisi='$tglnow' AND namamisi='$namamisi' AND id_karyawan='$id'"));
  if ($cek > 0){
  echo "<script>window.alert('Kamu sudah cekin')
  window.location='../index.php'</script>";
  }else {
$id = $_POST['id_karyawan'];
$tglmisi= $_POST['tglmisi'];
$namamisi= $_POST['namamisi'];
$koin = $_POST['koin'];

$input=mysqli_query($conn,"INSERT INTO misiharian (id_karyawan, tglmisi, namamisi, koin)
VALUES('$id', '$tglmisi', '$namamisi', '$koin')");
}
       if($input){
                      echo "<script language='javascript'>
    alert('Berhasil');
    window.location='../index.php';
    </script>";
                    
                    }else
                    {
                        echo "<script language='javascript'>
    alert('Gagal, coba kembali');
    window.location='../index.php';
    </script>";
                    }
                   } 

    ?>
    