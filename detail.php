<?php
require 'conn.php';

$id = $_POST["id"];
$mahasiswa = mysqli_query($conn,"SELECT tb_bidang.nama_bidang, tb_mahasiswa.nama, tb_mahasiswa.nobp,tb_mahasiswa.email,tb_mahasiswa.universitas,tb_mahasiswa.jurusan,tb_mahasiswa.id_bidang,tb_mahasiswa.id_subbidang,
tb_mahasiswa.tanggalmasuk,tb_mahasiswa.tanggalkeluar,tb_mahasiswa.lamapkl,tb_mahasiswa.surat_pernyataan FROM tb_mahasiswa JOIN tb_bidang on tb_bidang.id_bidang = tb_mahasiswa.id_bidang LEFT JOIN user on user.username = tb_mahasiswa.nobp where level = 'Mahasiswa' and id='$id' ");
$data = mysqli_fetch_assoc($mahasiswa);
echo json_encode($data);
?>