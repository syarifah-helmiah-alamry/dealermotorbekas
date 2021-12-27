<?php
//Read Identitas Motor//
    $sqlMotor = "SELECT * FROM identitas_motor";
    $queryMotor = mysqli_query($koneksi, $sqlMotor);
//Read Max ID Customer
    $queryIDCust = mysqli_query($koneksi, "SELECT max(id_cust) as IdMax FROM transaksi");
    $dataIDCust = mysqli_fetch_array($queryIDCust);
    $IdTrsk = $dataIDCust['IdMax'];
    $urutan = (int) substr($IdTrsk, 4, 4);
    $urutan++;
    $huruf = "cust";
    $id_custMax = $huruf . sprintf("%04s", $urutan);
//Create Transaksi
    if (isset($_POST["prosesTransaksi"])){
        $id_cust = $_POST["id_cust"];
        $nama_cust = $_POST["nama_cust"];
        $nik_cust = $_POST["nik_cust"];
        $alamat_cust = $_POST["alamat_cust"];
        $telp_cust = $_POST["telp_cust"];
        $id = $_POST["id"];
        $harga_jual = $_POST["harga_jual"];
        $harga_jual_real = $_POST["harga_jual_real"];
        //Random ID Transaksi
        $queryID = mysqli_query($koneksi, "SELECT max(IdTrsk) as id_terbesar FROM transaksi");
        $data = mysqli_fetch_array($queryID);
        $IdTrsk = $data['id_terbesar'];
        $urutan = (int) substr($IdTrsk, 3, 4);
        $urutan++;
        $huruf = "TRS";
        $IdTrsk = $huruf . sprintf("%04s", $urutan);
        //SQL Query
        $queryCreateCust = mysqli_query($koneksi, "INSERT INTO customer VALUES ('$id_cust','$nama_cust','$alamat_cust','$telp_cust','$nik_cust')") or die($koneksi);
        $queryTrsk = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$IdTrsk',NOW(),'$id_cust','$id','$harga_jual','$harga_jual_real')") or die($koneksi);
        if ($queryTrsk){
            echo "
            <script>
                alert('Transaksi Berhasil!');
                document.location.href = 'M_transaksi.php';
            </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Transaksi Gagal!');
                    document.location.href = 'M_transaksi.php';
                </script>
            ";
        }
    }
?>