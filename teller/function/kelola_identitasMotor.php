<?php
//Read Identitas Motor//
    $sqlMotor = "SELECT * FROM identitas_motor";
    $query = mysqli_query($koneksi, $sqlMotor);
//Pencarian Data
    if(isset($_POST["searchData"])){
        $cari = $_POST["pencarian"];
        $query = mysqli_query($koneksi, "SELECT * FROM identitas_motor WHERE no_registrasi LIKE '%$cari%' 
        OR nama_pemilik LIKE '%$cari%' 
        OR alamat LIKE '%$cari%' 
        OR no_rangka LIKE '%$cari%' 
        OR no_mesin LIKE '%$cari%' 
        OR plat_no LIKE '%$cari%' 
        OR merk LIKE '%$cari%' 
        OR type LIKE '%$cari%' 
        OR model LIKE '%$cari%' 
        OR tahun_pembuatan LIKE '%$cari%' 
        OR isi_silinder LIKE '%$cari%' 
        OR bahan_bakar LIKE '%$cari%' 
        OR warna_tnkb LIKE '%$cari%' 
        OR tahun_registrasi LIKE '%$cari%' 
        OR no_bpkb LIKE '%$cari%' 
        OR kode_lokasi LIKE '%$cari%' 
        OR masa_berlaku_stnk LIKE '%$cari%' 
        OR tgl_beli LIKE '%$cari%' 
        OR harga_beli LIKE '%$cari%' 
        OR tgl_jual LIKE '%$cari%' 
        OR harga_jual LIKE '%$cari%'");
    }
?>