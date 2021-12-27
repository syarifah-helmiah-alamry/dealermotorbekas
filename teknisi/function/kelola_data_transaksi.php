<?php
//Read Transaksi
    $sqlTransaksi = "SELECT * FROM transaksi t, identitas_motor im, customer c WHERE im.id=t.Id_Kendaraan AND c.id_cust=t.Id_cust ORDER BY Tgl_Trsk";
    $queryTransaksi = mysqli_query($koneksi, $sqlTransaksi);
//Hapus Transaksi
    if (isset($_POST["hapusTrsk"])){
        $IdTrsk = $_POST["IdTrsk"];
        $id_cust = $_POST["id_cust"];
        $queryHapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE IdTrsk = '$IdTrsk'") or die($koneksi);
        $queryHapusCust = mysqli_query($koneksi, "DELETE FROM customer WHERE id_cust = '$id_cust'") or die($koneksi);
        if ($queryHapus){
            echo "
                <script>
                    alert('Berhasil Menghapus Transaksi!');
                    document.location.href = 'M_data_transaksi.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Gagal Menghapus Transaksi!');
                    document.location.href = 'M_data_transaksi.php';
                </script>
            ";
        }
    }
?>