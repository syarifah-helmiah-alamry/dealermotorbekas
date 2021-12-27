<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/kelola_identitasMotor.php';
    $id = $_GET['id'];
    $sqlMotor = "SELECT * FROM identitas_motor WHERE id='$id'";
    $query = mysqli_query($koneksi, $sqlMotor);
    $row = mysqli_fetch_array($query);
?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Identitas Motor</title>
</head>
<body>
<!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-3" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 warna-1 fs-4 fw-bold text-uppercase">
                <i class="me-2"></i>Penjualan<br>Motor Bekas
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Home</a>
                <a href="M_identitasMotor.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Identitas Motor</a>
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Membuat User</a>
                <a href="M_transaksi.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Transaksi</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                onclick="return confirm('Keluar ?')">Keluar</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-2 py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="warna-1 fs-4 me-3" id="menu-toggle"><img src="../assets/Icon/Sidebar.png" style="width: 25px; height: 25px"></i>
                    <h2 class="fs-2 m-0 warna-1">Menu</h2>
                </div>
            </nav>
<!-- Page Content -->
            <div class="container">
            <div class="row my-4">
                    <h3 class="fs-4 warna-1 text-center mb-4">Input Identitas Motor</h3>
                    <form method="POST" class="warna-1 mx-auto px-5" style="width: 700px;">
                        <div class="row pb-3">
                            <div class="col-4"><label>No Registrasi</label></div>
                            <div class="col">
                                <input type="text" class="form-control" name="no_registrasi" value="<?php echo $row['no_registrasi'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Nama Pemilik</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="nama_pemilik" value="<?php echo $row['nama_pemilik'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Alamat</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="alamat" value="<?php echo $row['alamat'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>No Rangka</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="no_rangka" value="<?php echo $row['no_rangka'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>No Mesin</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="no_mesin" value="<?php echo $row['no_mesin'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Plat No</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="plat_no" value="<?php echo $row['plat_no'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Merk</label></div>
                            <div class="col">
                                <select name="merk" class="form-select">
                                    <option <?php if ($row['merk'] == "Honda") { echo 'selected'; }?> value="Honda">Honda</option>
                                    <option <?php if ($row['merk'] == "Yamaha") { echo 'selected'; }?> value="Yamaha">Yamaha</option>
                                    <option <?php if ($row['merk'] == "Kawasaki") { echo 'selected'; }?> value="Kawasaki">Kawasaki</option>
                                    <option <?php if ($row['merk'] == "Suzuki") { echo 'selected'; }?> value="Suzuki">Suzuki</option>
                                    <option <?php if ($row['merk'] == "BMW") { echo 'selected'; }?> value="BMW">BMW</option>
                                    <option <?php if ($row['merk'] == "Harley Davidson") { echo 'selected'; }?> value="Harley Davidson">Harley Davidson</option>
                                    <option <?php if ($row['merk'] == "Ducati") { echo 'selected'; }?> value="Ducati">Ducati</option>
                                    <option <?php if ($row['merk'] == "KTM") { echo 'selected'; }?> value="KTM">KTM</option>
                                    <option <?php if ($row['merk'] == "TVS") { echo 'selected'; }?> value="TVS">TVS</option>
                                    <option <?php if ($row['merk'] == "Benelli") { echo 'selected'; }?> value="Benelli">Benelli</option>
                                    <option <?php if ($row['merk'] == "Aprilia") { echo 'selected'; }?> value="Aprilia">Aprilia</option>
                                    <option <?php if ($row['merk'] == "MV Agusta") { echo 'selected'; }?> value="MV Agusta">MV Agusta</option>
                                    <option <?php if ($row['merk'] == "Triump") { echo 'selected'; }?> value="Triump">Triump</option>
                                    <option <?php if ($row['merk'] == "Vespa") { echo 'selected'; }?> value="Vespa">Vespa</option>
                                    <option <?php if ($row['merk'] == "Viar") { echo 'selected'; }?> value="Viar">Viar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Type</label></div>
                            <div class="col">
                                <select name="type" class="form-select">
                                    <option <?php if ($row['type'] == "Manual") { echo 'selected'; }?> value="Manual">Manual</option>
                                    <option <?php if ($row['type'] == "Automatic") { echo 'selected'; }?> value="Automatic">Automatic</option>
                                    <option <?php if ($row['type'] == "Hybrid") { echo 'selected'; }?> value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Model</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="model" value="<?php echo $row['model'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Tahun Pembuatan</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="tahun_pembuatan" value="<?php echo $row['tahun_pembuatan'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Isi Silinder</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="isi_silinder" value="<?php echo $row['isi_silinder'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Bahan Bakar</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="bahan_bakar" value="<?php echo $row['bahan_bakar'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Warna TNKB</label></div>
                            <div class="col">
                                <select name="warna_tnkb" class="form-select">
                                    <option <?php if ($row['warna_tnkb'] == "Hitam") { echo 'selected'; }?> value="Hitam">Hitam</option>
                                    <option <?php if ($row['warna_tnkb'] == "Merah") { echo 'selected'; }?> value="Merah">Merah</option>
                                    <option <?php if ($row['warna_tnkb'] == "Kuning") { echo 'selected'; }?> value="Kuning">Kuning</option>
                                    <option <?php if ($row['warna_tnkb'] == "Biru") { echo 'selected'; }?> value="Biru">Biru</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Tahun Registrasi</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="tahun_registrasi" value="<?php echo $row['tahun_registrasi'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>No BPKB</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="no_bpkb" value="<?php echo $row['no_bpkb'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Kode Lokasi</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="kode_lokasi" value="<?php echo $row['kode_lokasi'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-4"><label>Masa Berlaku STNK</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="masa_berlaku_stnk" placeholder="YYYY-MM-DD" value="<?php echo $row['masa_berlaku_stnk'] ?>">
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col ps-5">
                                <button class="btn btn-primary" type="submit" style="width: 30%;" name="updateMotor">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
<!-- Javascript -->
    <script src="../js/bootstrap.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>