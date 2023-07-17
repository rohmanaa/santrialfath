<?php
  include "config.php";

// memasukkan data ke dalam tabel MySQL
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];
$sebagai = $_POST['sebagai'];
$waktu= $_POST['waktu'];
$sql = "INSERT INTO grupchat (nama,pesan,sebagai,waktu) VALUES ('$nama', '$pesan','$sebagai','$waktu')";
if (mysqli_query($conn, $sql)) {
  echo "<script>window.alert()
  window.location='../grupchat.php'</script>";
} else {
  echo 'Terjadi kesalahan: ' . mysqli_error($conn);
}

// menutup koneksi ke database MySQL
mysqli_close($conn);
?>
