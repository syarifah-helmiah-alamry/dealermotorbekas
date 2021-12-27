<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/kelola_identitasMotor.php';
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
                Penjualan<br>Motor Bekas
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Home</a>
                <a href="M_identitasMotor.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Kelola Motor</a>
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Kelola User</a>
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
            <div class="container-fluid">
<!-- Data Identitas Motor -->
                <div class="row mx-3">
                    <h4 class="h4 warna-1 text-center mb-3">Data Identitas Motor</h4>
                    <div class="row">
                        <div class="col">
                            <form method="POST" class="form-group d-flex justify-content-end">
                                <input name="pencarian" class="form-control border-bottom rounded-0 shadow-none w-25" type="text" placeholder="Search" style="background: transparent; border: none; outline: hidden;color:white;">
                                <button name="searchData" type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 70vh;">
                        <table class="table table-bordered border-primary align-middle text-center mx-auto" style="min-width: 1500px;">
                            <thead class="table-dark border-light">
                                <tr>
                                    <th>No</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Kode Lokasi</th>
                                    <th>Masa Berlaku STNK</th>
                                    <th>Harga Jual</th>
                                    <th style="width:70px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-light border-dark">
                            <?php
                                $no = 1;
                                while ($row = mysqli_fetch_array($query)){?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['merk'] ?></td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['no_registrasi'] ?></td>
                                        <td><?php echo $row['nama_pemilik'] ?></td>
                                        <td><?php echo $row['alamat'] ?></td>
                                        <td><?php echo $row['tahun_pembuatan'] ?></td>
                                        <td><?php echo $row['kode_lokasi'] ?></td>
                                        <td><?php echo $row['masa_berlaku_stnk'] ?></td>
                                        <td>Rp. <?php echo number_format($row['harga_jual'], 0, ',', '.') ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihat<?php echo $row['id'] ?>" style="width: 75px;">Detail</button>
                                        </td>
<!-- Modal Detail Data Motor* -->
                                        <div class="modal fade" id="lihat<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="headerLabel">Detail Data Motor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- dari ini -->
                                                        <div class="text-center mb-3">
                                                            <img src="../gambarMotor/<?php echo $row['gambar_motor'] ?>" style="height: 200px;">
                                                        </div>
                                                        <!-- sampe ini -->
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>No Registrasi</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['no_registrasi'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Nama Pemilik</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['nama_pemilik'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Alamat</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['alamat'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>No Rangka</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['no_rangka'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>No Mesin</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['no_mesin'] ?>">
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
                                                            <div class="col-5 mt-1"><label>Model</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['model'] ?>">
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
                                                            <div class="col-5 mt-1"><label>No BPKB</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['no_bpkb'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Kode Lokasi</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['kode_lokasi'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Masa Berlaku STNK</label></div>
                                                            <div class="col">
                                                                <input type="date" class="form-control form-box" readonly value="<?php echo $row['masa_berlaku_stnk'] ?>">
                                                            </div>
                                                        </div>
                                                        <!-- dari ini -->
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Tanggal Beli</label></div>
                                                            <div class="col">
                                                                <input type="date" class="form-control form-box" readonly value="<?php echo $row['tgl_beli'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Harga Beli</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="Rp. <?php echo number_format($row['harga_beli'], 0, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Tanggal Jual</label></div>
                                                            <div class="col">
                                                                <input type="date" class="form-control form-box" readonly value="<?php echo $row['tgl_jual'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Harga Jual</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="Rp. <?php echo number_format($row['harga_jual'], 0, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <!-- sampe ini -->
                                                        <div class="row">  
                                                            <div class="col-md-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>                                     
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr><?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
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