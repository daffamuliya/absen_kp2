<?php
$conn = mysqli_connect ("localhost","root","","absenmagang");

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi ($data) {

    global $conn;
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    // Insert Database
    mysqli_query($conn, "INSERT INTO user VALUES('','$nobp','$password','$level')");
    return mysqli_affected_rows($conn);


}

function tambah ($data) {
    
    global $conn;

    $nama = ($data["nama"]);
    $nobp = ($data["nobp"]);
     // upload Surat 
     $surat_pernyataan = upload();
     if (!$surat_pernyataan) {
         return false;
     } 
    $email = ($data["email"]);
    $universitas = ($data["universitas"]);
    $jurusan = ($data["jurusan"]);
    $id_bidang = ($data["id_bidang"]);
    $id_subbidang = ($data["id_subbidang"]);
    $tanggalmasuk = ($data["tanggalmasuk"]);
    $tanggalkeluar = ($data["tanggalkeluar"]);
    $lamapkl = ($data["lamapkl"]);
   
    $query = "INSERT INTO tb_mahasiswa VALUES ('$nobp','$nama','$email','$surat_pernyataan', '$universitas','$jurusan','$id_bidang','$id_subbidang','$tanggalmasuk','$tanggalkeluar','$lamapkl')";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);


}

function upload() {
    
    $namaFile = $_FILES['surat_pernyataan']['name'];
    $_error = $_FILES ['surat_pernyataan'] ['error'];
    $tmpName = $_FILES ['surat_pernyataan'] ['tmp_name'];

    // pengecekan 
    if ($_error === 4) {

        echo 
        "<script> 
           alert('pilih surat terlebih dahulu!');
        </script>" ;
        return false;      

    }

    //pengecekan apakah ini Surat apa tidak
    $ekstensiSuratValid = ['pdf', 'docs', 'docx'];
    $ekstensiSurat = explode('.', $namaFile);
    $ekstensiSurat = strtolower(end($ekstensiSurat));

    if (!in_array($ekstensiSurat, $ekstensiSuratValid)) {
        echo 
        "<script> 
           alert('Upload dalam bentuk PDF, Docs, dan Docx!');
        </script>" ;
        return false;  
    }

    move_uploaded_file($tmpName, 'assets/surat/' . $namaFile);
    return $namaFile;
}


function verifikasi($id) {
    global $conn;
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function masuk($id) {
    global $conn;
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    
    global $conn;
    
    $password_baru = mysqli_real_escape_string($conn, $data["password_baru"]);
    $password_baru = password_hash($password_baru,PASSWORD_DEFAULT);
    $query = "UPDATE user SET password='$password_baru', status='1' WHERE username = '$_SESSION[username]'";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);



}

function detail($id) {
    global $conn;
    mysqli_query($conn, "SELECT FROM user WHERE id =$id");
    return mysqli_affected_rows($conn);
}


function izin($data) {
    
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $nama = ($data["nama"]);
    $nobp = ($data["nobp"]);
    $tanggal = date("Y-m-d");
    $status = ($data["status"]);
    $jam_masuk = "00:00:00";
    $jam_keluar = "00:00:00";

    mysqli_query($conn, "INSERT INTO tb_kehadiran VALUES('','$nobp','$nama','$jam_masuk','$jam_keluar','$tanggal','$status')");
    return mysqli_affected_rows($conn);


}