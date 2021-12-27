<?php
//Read Transaksi
    $sqlTransaksi = "SELECT * FROM transaksi t, identitas_motor im, customer c WHERE im.id=t.Id_Kendaraan AND c.id_cust=t.Id_cust ORDER BY Tgl_Trsk";
    $queryTransaksi = mysqli_query($koneksi, $sqlTransaksi);
?>