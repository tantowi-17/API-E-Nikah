<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nik_l = $_POST["nik_l"];
    $nama_l = $_POST["nama_l"];
    $alamat_l = $_POST["alamat_l"];
    $agama_l = $_POST["agama_l"];
    $telepon_L = $_POST["telepon_l"];
    $tanggal_lahir_l = $_POST["tanggal_lahir_l"];
    $foto_l = $_POST["foto_l"];
    $ktp_l = $_POST["ktp_l"];
    $kk_l = $_POST["kk_l"];
    $nik_p = $_POST["nik_p"];
    $nama_p = $_POST["nama_p"];
    $alamat_p = $_POST["alamat_p"];
    $agama_p = $_POST["agama_p"];
    $telepon_p = $_POST["telepon_p"];
    $tanggal_lahir_p = $_POST["tanggal_lahir_p"];
    $foto_p = $_POST["foto_p"];
    $ktp_p = $_POST["ktp_p"];
    $kk_p = $_POST["kk_p"];
    $tanggal_nikah = $_POST["tanggal_nikah"];
    $hari = $_POST["hari"];
    $tempat = $_POST["tempat"];

    $imageFoto = base64_decode("$foto_l");
    $return = file_put_contents("image/".$nama_l.".JPG", $imageFoto);

    $insertTable = "INSERT INTO tbl_nikah (
                         nik_l, 
                         nama_l,
                         alamat_l,
                         agama_l, 
                         telepon_l, 
                         tanggal_lahir_l, 
                         foto_l,
                         ktp_l,
                         kk_l, 
                         nik_p,
                         nama_p,
                         alamat_p,
                         agama_p,
                         telepon_p, 
                         tanggal_lahir_p,
                         foto_p, 
                         ktp_p,
                         kk_p, 
                         tanggal_nikah,
                         hari,
                         tempat) VALUES
                                (
                                  '$nik_l',
                                  '$nama_l',
                                  '$alamat_l',
                                  '$agama_l',
                                  '$telepon_L',
                                  '$tanggal_lahir_l',
                                  '$foto_l',
                                  '$ktp_l',
                                  '$kk_l',
                                  '$nik_p',
                                  '$nama_p',
                                  '$alamat_p',
                                  '$agama_p',
                                  '$telepon_p',
                                  '$tanggal_lahir_p',
                                  '$foto_p',
                                  '$ktp_p',
                                  '$kk_p',
                                  '$tanggal_nikah',
                                  '$hari',
                                  '$tempat'
                                  )";

    $eksekusi = mysqli_query($konek, $insertTable);
    $cek      = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Simpan Data Berhasil";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);