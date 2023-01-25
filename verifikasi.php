<?php

session_start();
require 'conn.php';
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nobp = '$id'");
$row = mysqli_fetch_assoc($result);
$status = 0;
$password = mysqli_real_escape_string($conn, $row["nobp"]); 
$password = password_hash($password,PASSWORD_DEFAULT); //Enkripsi Password dengan Algoritma Default

$test = mysqli_query($conn, "INSERT INTO user (username,password,level,nama,status) VALUE ( '$id','$password','Mahasiswa', '$row[nama]','$status')");

if($test){
  echo "<script>alert('Berhasil Verifikasi!');window.location='verifikasi_admin.php'</script>";
  header("Location: verifikasi_admin.php");
  exit;
}else{
  echo "<script>alert('Gagal!');window.location='verifikasi_admin.php'</script>";
}

?>