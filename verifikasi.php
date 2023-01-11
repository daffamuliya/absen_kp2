<?php

session_start();
require 'conn.php';
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nobp = '$id'");
$row = mysqli_fetch_assoc($result);
$password = mysqli_real_escape_string($conn, $row["nobp"]);
$password = password_hash($password,PASSWORD_DEFAULT);

$test = mysqli_query($conn, "INSERT INTO user (username,password,level,nama) VALUE ( '$id','$password','Mahasiswa', '$row[nama]')");

if($test){
  echo "<script>alert('Berhasil Verifikasi!');window.location='verifikasi_admin.php'</script>";
  header("Location: verifikasi_admin.php");
  exit;
}else{
  echo "<script>alert('Gagal!');window.location='verifikasi_admin.php'</script>";
}

?>