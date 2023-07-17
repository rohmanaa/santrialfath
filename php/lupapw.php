<?php  
include 'config.php';
$timestamp = time(); // current timestamp
$formatted_timestamp = date('Y-m-d H:i:s', $timestamp);
 
  if(isset($_POST['lupa'])) {
    $id=$_POST['id_karyawan'];
    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM karyawan WHERE id_karyawan='$id'"));
    if ($cek > 0){
    echo "<script>window.alert('Kamu sudah cekin')
    window.location='../forgot.php'</script>";
    }else {

    $id = $_POST['id_karyawan'];
    $nowa = $_POST['nowa'];
    $formatted_timestamp = $_POST['tglkirim'];

    $sql = "INSERT INTO lupapw (nis,nowa,tglkirim) VALUES ('$id', '$nowa',' $formatted_timestamp')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>window.alert('Berhasil Kirim')
      window.location='../login.php'</script>";
    } else {
      echo 'Terjadi kesalahan: ' . mysqli_error($conn);
    }
    
    // menutup koneksi ke database MySQL
    mysqli_close($conn);
    
 }
}
 ?>