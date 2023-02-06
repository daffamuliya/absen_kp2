<?php
include "conn.php";
if (isset($_POST['id_bidang'])) {
    $bidang = $_POST["id_bidang"];

    $sql = "select * from tb_subbidang where id_bidang=$bidang ";

    $hasil = mysqli_query($conn, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {   
        ?>
        <option value="<?php echo  $data['nama_subbidang']; ?>"><?php echo $data['nama_subbidang']; ?></option>
        <?php
    
    }

}

?>
