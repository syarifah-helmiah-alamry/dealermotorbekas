<?php
//Read User//
    $sqlUser = "SELECT * FROM user ORDER BY create_date ASC";
    $query = mysqli_query($koneksi, $sqlUser);
//Create User//
    if (isset($_POST["tambahUser"])){
        $id_user = $_POST["id_user"];
        $nama = $_POST["nama"];
        $password = $_POST["password"];
        $hak_akses = $_POST["hak_akses"];
        $nik_cust = $_POST["nik_cust"];
        $alamat_cust = $_POST["alamat_cust"];
        $telp_cust = $_POST["telp_cust"];
        if($hak_akses!="Customer"){
            $queryCreate = mysqli_query($koneksi, "INSERT INTO user VALUES ('$id_user','$nama',MD5('$password'),'$hak_akses',CURDATE(),'')") or die($koneksi);
            if ($queryCreate){
                echo "
                    <script>
                        alert('Berhasil membuat User!');
                        document.location.href = 'M_kelolaUser.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal membuat User!');
                        document.location.href = 'M_kelolaUser.php';
                    </script>
                ";
            }
        }
        else{
            $queryCreate = mysqli_query($koneksi, "INSERT INTO user VALUES ('$id_user','$nama',MD5('$password'),'$hak_akses',CURDATE(),'')") or die($koneksi);
            $queryCreateCust = mysqli_query($koneksi, "INSERT INTO customer VALUES ('$id_user','$nama','$alamat_cust','$telp_cust','$nik_cust')") or die($koneksi);
            if ($queryCreateCust){
                echo "
                    <script>
                        alert('Berhasil membuat User sebagai Customer!');
                        document.location.href = 'M_kelolaUser.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal membuat User sebagai Customer!');
                        document.location.href = 'M_kelolaUser.php';
                    </script>
                ";
            }
        }
    }
//Pencarian Data
    if(isset($_POST["searchData"])){
        $cari = $_POST["pencarian"];
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user LIKE '%$cari%' OR nama LIKE '%$cari%' OR create_date LIKE '%$cari%' OR hak_akses LIKE '%$cari%'");
    }
?>