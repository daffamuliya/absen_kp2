<?php

session_start();
require 'conn.php';

$id = $_GET["id"];
$jam_masuk = date("H:i:s");
$tanggal = date("Y-m-d");
$status = "Hadir";


$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$id'");
$row = mysqli_fetch_assoc($result);
$masuk = mysqli_query($conn, "INSERT INTO tb_kehadiran (nobp,nama,jam_masuk,jam_keluar,tanggal,status) VALUE ( '$id','$row[nama]','$jam_masuk', '','$tanggal','$status')");

if($masuk){
  echo "<script>alert('Berhasil Absen!');window.location='absen_hadir.php'</script>";
}else{
  echo "<script>alert('Gagal Absen!');window.location='absen_hadir.php'</script>";
}

?>