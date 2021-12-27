<?php
//Read Identitas Motor//
    $sqlMotor = "SELECT * FROM identitas_motor";
    $query = mysqli_query($koneksi, $sqlMotor);
//Create Identitas Motor*//
    if (isset($_POST["tambahMotor"])){
        $no_registrasi = $_POST["no_registrasi"];
        $nama_pemilik = $_POST["nama_pemilik"];
        $alamat = $_POST["alamat"];
        $no_rangka = $_POST["no_rangka"];
        $no_mesin = $_POST["no_mesin"];
        $plat_no = $_POST["plat_no"];
        $merk = $_POST["merk"];
        $type = $_POST["type"];
        $model = $_POST["model"];
        $tahun_pembuatan = $_POST["tahun_pembuatan"];
        $isi_silinder = $_POST["isi_silinder"];
        $bahan_bakar = $_POST["bahan_bakar"];
        $warna_tnkb = $_POST["warna_tnkb"];
        $tahun_registrasi = $_POST["tahun_registrasi"];
        $no_bpkb = $_POST["no_bpkb"];
        $kode_lokasi = $_POST["kode_lokasi"];
        $masa_berlaku_stnk = $_POST["masa_berlaku_stnk"];
        $tgl_beli = $_POST["tgl_beli"];
        $tgl_beli = $_POST["tgl_beli"];
        $harga_beli = $_POST["harga_beli"];
        $tgl_jual = $_POST["tgl_jual"];
        $harga_jual = $_POST["harga_jual"];
        // File Upload
        $namaAsli = $_FILES['gambar_motor']['name'];
        $x = explode('.',$namaAsli);
        $eks = strtolower(end($x));
        $asal = $_FILES['gambar_motor']['tmp_name'];
        $dir = "../gambarMotor/";
        $nama = uniqid();
        $nama .= '.'.$eks;
        $targetFile = $dir.$nama;
        $uploadOk = 1;
        // Cek apakah file sudah ada difolder ?
        if (file_exists($targetFile)){
            $uploadOk = 0;
        }
        // Cek Proses Upload
        if ($uploadOk == 0){
            echo '<script>alert("Nama file sudah ada!");</script>';
        } else if ($namaAsli=="") {
            $tambahMotor = mysqli_query($koneksi, "INSERT INTO identitas_motor VALUES ('','$no_registrasi','$nama_pemilik','$alamat','$no_rangka','$no_mesin','$plat_no','$merk','$type','$model','$tahun_pembuatan',$isi_silinder,'$bahan_bakar','$warna_tnkb','$tahun_registrasi','$no_bpkb','$kode_lokasi','$masa_berlaku_stnk','$namaAsli','$tgl_beli','$harga_beli','$tgl_jual','$harga_jual')") or die($koneksi);
            if ($tambahMotor){
                echo "<script>alert('Motor berhasil ditambahkan!')
                window.location.replace('M_identitasMotor.php');</script>";
            }
        }
        else {
            if (move_uploaded_file($asal, $targetFile)){
                $tambahMotor = mysqli_query($koneksi, "INSERT INTO identitas_motor VALUES ('','$no_registrasi','$nama_pemilik','$alamat','$no_rangka','$no_mesin','$plat_no','$merk','$type','$model','$tahun_pembuatan',$isi_silinder,'$bahan_bakar','$warna_tnkb','$tahun_registrasi','$no_bpkb','$kode_lokasi','$masa_berlaku_stnk','$nama','$tgl_beli','$harga_beli','$tgl_jual','$harga_jual')") or die($koneksi);
                if ($tambahMotor){
                    echo "<script>alert('Motor berhasil ditambahkan!')
                    window.location.replace('M_identitasMotor.php');</script>";
                }
            } else {
                echo '<script>alert("Proses Upload GAGAL!");</script>';
            }
        }
    }
//Update Identitas Motor*//
    else if(isset($_POST["editMotor"])){
        $id = $_POST["id"];
        $no_registrasi = $_POST["no_registrasi"];
        $nama_pemilik = $_POST["nama_pemilik"];
        $alamat = $_POST["alamat"];
        $no_rangka = $_POST["no_rangka"];
        $no_mesin = $_POST["no_mesin"];
        $plat_no = $_POST["plat_no"];
        $merk = $_POST["merk"];
        $type = $_POST["type"];
        $model = $_POST["model"];
        $tahun_pembuatan = $_POST["tahun_pembuatan"];
        $isi_silinder = $_POST["isi_silinder"];
        $bahan_bakar = $_POST["bahan_bakar"];
        $warna_tnkb = $_POST["warna_tnkb"];
        $tahun_registrasi = $_POST["tahun_registrasi"];
        $no_bpkb = $_POST["no_bpkb"];
        $kode_lokasi = $_POST["kode_lokasi"];
        $masa_berlaku_stnk = $_POST["masa_berlaku_stnk"];
        $tgl_beli = $_POST["tgl_beli"];
        $tgl_beli = $_POST["tgl_beli"];
        $harga_beli = $_POST["harga_beli"];
        $tgl_jual = $_POST["tgl_jual"];
        $harga_jual = $_POST["harga_jual"];
        // File Upload
        $namaAsli = $_FILES['gambar_motor']['name'];
        if($namaAsli==""){
            $queryUpdateMotor = mysqli_query($koneksi, "UPDATE identitas_motor SET no_registrasi='$no_registrasi', nama_pemilik='$nama_pemilik', alamat='$alamat', no_rangka='$no_rangka', no_mesin ='$no_mesin ', plat_no  ='$plat_no ', merk='$merk', type='$type', model='$model', tahun_pembuatan='$tahun_pembuatan', isi_silinder='$isi_silinder', bahan_bakar='$bahan_bakar', warna_tnkb='$warna_tnkb', tahun_registrasi='$tahun_registrasi', no_bpkb='$no_bpkb', kode_lokasi='$kode_lokasi', masa_berlaku_stnk='$masa_berlaku_stnk', tgl_beli='$tgl_beli', harga_beli='$harga_beli', tgl_jual='$tgl_jual', harga_jual='$harga_jual' WHERE id='$id'") or die($koneksi);
            if ($queryUpdateMotor){
                echo "
                    <script>
                        alert('Berhasil Update Data Motor!');
                        document.location.href = 'M_identitasMotor.php';
                    </script>
                ";
            }
        }
        else{
            // Hapus Gambar Lama
            $cariFile = mysqli_query($koneksi, "SELECT * FROM identitas_motor WHERE id = '$id'") or die(mysqli_error($koneksi));
            $cariRow = mysqli_fetch_array($cariFile);
            $namaFile = $cariRow['gambar_motor'];
            $lokasi = "../gambarMotor/".$namaFile;
            if (file_exists($lokasi)){
                unlink($lokasi);
            }
            $x = explode('.',$namaAsli);
            $eks = strtolower(end($x));
            $asal = $_FILES['gambar_motor']['tmp_name'];
            $dir = "../gambarMotor/";
            $nama = uniqid();
            $nama .= '.'.$eks;
            $targetFile = $dir.$nama;
            $uploadOk = 1;
            // Cek apakah file sudah ada difolder ?
            if (file_exists($targetFile)){
                $uploadOk = 0;
            }
            // Cek Proses Upload
            if ($uploadOk == 0){
                echo '<script>alert("Nama file sudah ada!");</script>';
            } 
            else {
                if (move_uploaded_file($asal, $targetFile)){
                    $updateMotor = mysqli_query($koneksi, "UPDATE identitas_motor SET no_registrasi='$no_registrasi', nama_pemilik='$nama_pemilik', alamat='$alamat', no_rangka='$no_rangka', no_mesin ='$no_mesin ', plat_no  ='$plat_no ', merk='$merk', type='$type', model='$model', tahun_pembuatan='$tahun_pembuatan', isi_silinder='$isi_silinder', bahan_bakar='$bahan_bakar', warna_tnkb='$warna_tnkb', tahun_registrasi='$tahun_registrasi', no_bpkb='$no_bpkb', kode_lokasi='$kode_lokasi', masa_berlaku_stnk='$masa_berlaku_stnk', gambar_motor='$nama', tgl_beli='$tgl_beli', harga_beli='$harga_beli', tgl_jual='$tgl_jual', harga_jual='$harga_jual' WHERE id='$id'") or die($koneksi);
                    if ($updateMotor){
                        echo "<script>alert('Berhasil Update Data Motor!')
                        window.location.replace('M_identitasMotor.php');</script>";
                    }
                } else {
                    echo '<script>alert("Proses Upload GAGAL!");</script>';
                }
            }
        }
    }
//Delete Identitas Motor*//
    else if(isset($_POST["hapusMotor"])){
        $id = $_POST["id"];
        $cariFile = mysqli_query($koneksi, "SELECT * FROM identitas_motor WHERE id = '$id'") or die(mysqli_error($koneksi));
        $cariRow = mysqli_fetch_array($cariFile);
        $namaFile = $cariRow['gambar_motor'];
        $lokasi = "../gambarMotor/".$namaFile;
        if (file_exists($lokasi)){
            unlink($lokasi);
        }
        $queryDeleteMotor = mysqli_query($koneksi, "DELETE FROM identitas_motor WHERE id = '$id'") or die($koneksi);
        if ($queryDeleteMotor){
            echo "
                <script>
                    alert('Berhasil Menghapus Motor!');
                    document.location.href = 'M_identitasMotor.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Gagal Menghapus Motor!');
                    document.location.href = 'M_identitasMotor.php';
                </script>
            ";
        }
    }
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