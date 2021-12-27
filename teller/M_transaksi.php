<?php
    require '../koneksi.php';
    require 'function/kelola_transaksi.php';
    require 'function/session.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Transaksi</title>
</head>
<body>
<!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-3" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 warna-1 fs-4 fw-bold text-uppercase">
                Penjualan<br>Motor Bekas
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Home</a>
                <a href="M_identitasMotor.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Kelola Motor</a>
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Kelola User</a>
                <a href="M_transaksi.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Transaksi</a>
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
            <div class="container-fluid">
                <div class="row my-2 mx-4">
                    <div class="row d-flex justify-content-start">
                        <a href="M_data_transaksi.php" class="btn btn-secondary m-3" style="width: 200px;">Data Transaksi</a>
                    </div>
                    <h3 class="fs-4 warna-1 text-center mb-4">Daftar Motor Tersedia</h3>
<!-- Galeri Motor - ibro-->
                    <?php
                        
                        while ($row = mysqli_fetch_array($queryMotor)){?>
                            <div class="card m-3" style="width: 18rem;">
                            <img src="../gambarMotor/<?php echo $row['gambar_motor'] ?>" style="height: 200px;" class="card-img-top mt-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['merk'] .' '. $row['type'] ?></h5>
                                    <p class="card-text">Harga : Rp. <?php echo number_format($row['harga_jual'], 0, ',', '.') ?></p>
                                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#lihat<?php echo $row['id'] ?>" style="width: 68px;">Detail</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beli<?php echo $row['id'] ?>" style="width: 68px;">Beli</button>
                                </div>
                            </div>
<!-- Modal Detail Data Motor -->
                            <div class="modal fade" id="lihat<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="headerLabel">Detail Data Motor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-3">
                                                <img src="../gambarMotor/<?php echo $row['gambar_motor'] ?>" style="height: 200px;">
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>No Registrasi</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['no_registrasi'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Plat No</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['plat_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Merk</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['merk'] ?>">  
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Type</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['type'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Tahun Pembuatan</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['tahun_pembuatan'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Isi Silinder</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['isi_silinder'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Bahan Bakar</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['bahan_bakar'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Warna TNKB</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['warna_tnkb'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Tahun Registrasi</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="<?php echo $row['tahun_registrasi'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Masa Berlaku STNK</label></div>
                                                <div class="col">
                                                    <input type="date" class="form-control form-box" readonly value="<?php echo $row['masa_berlaku_stnk'] ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-5 mt-1"><label>Harga Jual</label></div>
                                                <div class="col">
                                                    <input type="text" class="form-control form-box" readonly value="Rp. <?php echo number_format($row['harga_jual'], 0, ',', '.') ?>">
                                                </div>
                                            </div>
                                            <div class="row">  
                                                <div class="col-md-12 d-flex justify-content-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>                                     
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- Modal Transaksi Beli -->
                            <div class="modal fade" id="beli<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="headerLabel">Transaksi Pembelian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>ID Customer</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="id_cust" value="<?php echo $id_custMax ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>Nama Customer</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="nama_cust">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>NIK Customer</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="nik_cust">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>Alamat Customer</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="alamat_cust">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>Telp Customer</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="telp_cust">
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>ID Kendaraan</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="id" value="<?php echo $row['id'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row pb-3">
                                                    <div class="col-4 mt-1"><label>Harga Jual</label></div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-box" name="harga_jual" value="<?php echo $row['harga_jual'] ?>">
                                                    </div>
                                                </div>
                                                <div class="invisible position-absolute">
                                                    <input type="text" class="form-control" name="harga_jual_real" value="<?php echo $row['harga_beli'] ?>" readonly>
                                                </div>
                                                <div class="row mt-3">  
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button name="prosesTransaksi" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertEditModal">Proses</button>
                                                    </div>                                     
                                                </div> 
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                    ?>
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