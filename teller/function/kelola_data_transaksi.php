<?php
//Read Transaksi
    $sqlTransaksi = "SELECT * FROM transaksi t, identitas_motor im, customer c WHERE im.id=t.Id_Kendaraan AND c.id_cust=t.Id_cust ORDER BY Tgl_Trsk";
    $queryTransaksi = mysqli_query($koneksi, $sqlTransaksi);
//Update Transaksi
    if(isset($_POST["editTrsk"])){
        $IdTrsk = $_POST["IdTrsk"];
        $id_cust = $_POST["id_cust"];
        $nama_cust = $_POST["nama_cust"];
        $alamat_cust = $_POST["alamat_cust"];
        $telp_cust = $_POST["telp_cust"];
        $nik_cust = $_POST["nik_cust"];
        $Harga_Jual = $_POST["Harga_Jual"];
        $queryEditTrsk = mysqli_query($koneksi, "UPDATE transaksi SET Harga_Jual='$Harga_Jual' WHERE IdTrsk='$IdTrsk'") or die($koneksi);
        if($queryEditTrsk){
            $queryEditCust = mysqli_query($koneksi, "UPDATE customer SET nama_cust='$nama_cust', alamat_cust='$alamat_cust', telp_cust='$telp_cust', nik_cust='$nik_cust' WHERE id_cust='$id_cust'") or die($koneksi);
            if ($queryEditCust){
                echo "
                    <script>
                        alert('Berhasil Update Transaksi!');
                        document.location.href = 'M_data_transaksi.php';
                    </script>
                ";
            }
            else{
                echo "
                    <script>
                        alert('Gagal Update Data Customer!');
                        document.location.href = 'M_data_transaksi.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Gagal Update Transaksi!');
                    document.location.href = 'M_data_transaksi.php';
                </script>
            ";
        }
    }
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