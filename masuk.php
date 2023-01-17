<?php

session_start();
require 'conn.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_GET["id"];
$jam_masuk = date("H:i:s");
$tanggal = date("Y-m-d");
$status = "Hadir";

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$id'");
$row = mysqli_fetch_assoc($result);
$masuk = mysqli_query($conn, "INSERT INTO tb_kehadiran (nobp,nama,jam_masuk,jam_keluar,tanggal,status) VALUE ( '$id','$row[nama]','$jam_masuk', '','$tanggal','$status')");
$last_id = mysqli_insert_id($conn);

if($masuk){
 $result = ['status'=>'success', 'msg'=>"Checkin Berhasil", "jam"=>$jam_masuk, "id"=>$last_id];
}else{
  $result = ['status'=>'error', 'msg'=>"Checkin Gagal"];
}
echo json_encode($result);
?>