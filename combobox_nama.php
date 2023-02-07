<?php
include "conn.php";
if (isset($_POST['nama'])) {
    $nama = $_POST["nama"];

    $sql = "select * from tb_mahasiswa where nama= '$nama' ";

    $hasil = mysqli_query($conn, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {   
        ?>
        <option value="<?php echo $data['nobp']; ?>"><?php echo $data['nobp']; ?></option>                                    
        <?php
    
    }

}

?>
