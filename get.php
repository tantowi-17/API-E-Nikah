<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"];
    
    $perintah = "SELECT * FROM tbl_nikah WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek      = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();

        while($ambil = mysqli_fetch_object($eksekusi)){
            $F["id"] = $ambil->id;
            $F["nik_l"] = $ambil->nik_l;
            $F["nama_l"] = $ambil->nama_l;
            $F["alamat_l"] = $ambil->alamat_l;
            $F["agama_l"] = $ambil->agama_l;
            $F["telepon_l"] = $ambil->telepon_l;
            $F["tanggal_lahir_l"] = $ambil->tanggal_lahir_l;
            $F["foto_l"] = $ambil->foto_l;
            $F["ktp_l"] = $ambil->ktp_l;
            $F["kk_l"] = $ambil->kk_l;
            $F["nik_p"] = $ambil->nik_p;
            $F["nama_p"] = $ambil->nama_p;
            $F["alamat_p"] = $ambil->alamat_p;
            $F["agama_p"] = $ambil->agama_p;
            $F["telepon_p"] = $ambil->telepon_p;
            $F["tanggal_lahir_p"] = $ambil->tanggal_lahir_p;
            $F["foto_p"] = $ambil->foto_p;
            $F["ktp_p"] = $ambil->ktp_p;
            $F["kk_p"] = $ambil->kk_p;
            $F["tanggal_nikah"] = $ambil->tanggal_nikah;
            $F["hari"] = $ambil->hari;
            $F["tempat"] = $ambil->tempat;

            array_push($response["data"], $F);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);