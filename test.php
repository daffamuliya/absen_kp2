<?php
//get no bp
//query select

session_start();
require 'conn.php';
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');


$result = mysqli_query($conn, "select * from user where level != 'admin'");
while($rows = mysqli_fetch_assoc($result)){
    $ada = Check($rows['username']);
    if($ada==0){
        $query = "INSERT INTO tb_kehadiran (nobp,nama,tanggal,jam_masuk,jam_keluar,status) VALUES ('$rows[username]','$rows[nama]','$tgl','00:00:00','00:00:00','Alfa')";
        mysqli_query ($conn, $query);
    
    }
}

function Check($nobp){
    $tgl = date('Y-m-d');
    global $conn;
    $sql = mysqli_query($conn, "select * from tb_kehadiran where nobp= '$nobp' and tanggal='$tgl'");
    $res = mysqli_num_rows($sql);
    return $res;
}



?>

