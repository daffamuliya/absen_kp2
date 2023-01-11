<?php
require 'conn.php';
$informasi = query("SELECT * FROM user");

$id = $_GET["id"];

if (hapus($id)>0) {
   echo "<script>alert('Data Berhasil di Hapus!');window.location='list_user.php'</script>";
} else {
   echo "<script type='text/javascript'>alert('Data gagal di Hapus!'); history.back(self); </script>";

}
?>