<?php

session_start();
require 'conn.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_GET["id"];
$jam_keluar = date("H:i:s");
$tanggal = date("Y-m-d");
$status = "Hadir";

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$id'");
$row = mysqli_fetch_assoc($result);
$update = mysqli_query($conn, "UPDATE tb_kehadiran SET jam_keluar = '$jam_keluar'  WHERE id = $id ");

if($update){
 $result = ['status'=>'success', 'msg'=>"Checkout Berhasil", "jam"=>$jam_keluar];
}else{
  $result = ['status'=>'error', 'msg'=>"Checkout Gagal"];
}
echo json_encode($result);
?>