<?php
require("koneksi.php");

$response = array();
$path = "Uploads/";
$filename = "img".rand(9,9999).".jpg";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"];
    $nik_l = $_POST["nik_l"];
    $nama_l = $_POST["nama_l"];
    $alamat_l = $_POST["alamat_l"];
    $agama_l = $_POST["agama_l"];
    $telepon_L = $_POST["telepon_l"];
    $tanggal_lahir_l = $_POST["tanggal_lahir_l"];
//    $foto_l = $_POST["foto_l"];
    $ktp_l = $_POST["ktp_l"];
    $kk_l = $_POST["kk_l"];
    $nik_p = $_POST["nik_p"];
    $nama_p = $_POST["nama_p"];
    $alamat_p = $_POST["alamat_p"];
    $agama_p = $_POST["agama_p"];
    $telepon_p = $_POST["telepon_p"];
    $tanggal_lahir_p = $_POST["tanggal_lahir_p"];
//    $foto_p = $_POST["foto_p"];
    $ktp_p = $_POST["ktp_p"];
    $kk_p = $_POST["kk_p"];
    $tanggal_nikah = $_POST["tanggal_nikah"];
    $hari = $_POST["hari"];
    $tempat = $_POST["tempat"];

    // Upload Image
    $fotoLaki = $path . uniqid() . '.'.pathinfo($_FILES['foto_l']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["foto_l"]["tmp_name"], $fotoLaki);
    $fotoPerempuan = $path . uniqid() . '.'.pathinfo($_FILES['foto_p']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["foto_p"]["tmp_name"], $fotoPerempuan);
    
    $updateNikah = "UPDATE tbl_nikah SET 
                         nik_l = '$nik_l', 
                         nama_l = '$nama_l',
                         alamat_l = '$alamat_l',
                         agama_l = '$agama_l', 
                         telepon_l = '$telepon_L', 
                         tanggal_lahir_l = $tanggal_lahir_l, 
                         foto_l = '$fotoLaki',
                         ktp_l = '$ktp_l',
                         kk_l = '$kk_l', 
                         nik_p = '$nik_p',
                         nama_p = '$nama_p',
                         alamat_p = '$alamat_p',
                         agama_p = '$agama_p',
                         telepon_p = '$telepon_p', 
                         tanggal_lahir_p = '$tanggal_lahir_p',
                         foto_p = '$fotoPerempuan', 
                         ktp_p = '$ktp_p',
                         kk_p = '$kk_p', 
                         tanggal_nikah = '$tanggal_nikah',
                         hari = '$hari',
                         tempat = '$tempat'
                        WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $updateNikah);
    $cek      = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Berhasil Diubah";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Gagal Diubah";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);