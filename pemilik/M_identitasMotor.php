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
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Home</a>
                <a href="M_identitasMotor.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Kelola Motor</a>
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Kelola User</a>
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
                        <div class="col d-flex justify-content-start">
                            <button type="button" class="btn btn-primary mb-4" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</button>
                        </div>
                        <div class="col">
                            <form method="POST" class="form-group d-flex justify-content-end">
                                <input name="pencarian" class="form-control border-bottom rounded-0 shadow-none w-50" type="text" placeholder="Search" style="background: transparent; border: none; outline: hidden;color:white;">
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
                                    <th style="width:260px">Aksi</th>
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
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMotor<?php echo $row['id'] ?>" style="width: 75px;">Edit</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusMotor<?php echo $row['id'] ?>" style="width: 75px;">Hapus</button>
                                        </td>
<!-- Modal Detail Data Motor* -->
                                        <div class="modal fade" id="lihat<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="headerLabel">Detail Data Motor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- ini -->
                                                    <div class="modal-body">
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
                                                        <!-- ini -->
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
<!-- Modal Edit Data Motor* -->     
                                        <form method="POST" class="form-group" enctype="multipart/form-data">
                                            <div class="modal fade text-start" id="editMotor<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Motor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="invisible position-absolute">
                                                                <input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>No Registrasi</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="no_registrasi" value="<?php echo $row['no_registrasi'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Nama Pemilik</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="nama_pemilik" value="<?php echo $row['nama_pemilik'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Alamat</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="alamat" value="<?php echo $row['alamat'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>No Rangka</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="no_rangka" value="<?php echo $row['no_rangka'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>No Mesin</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="no_mesin" value="<?php echo $row['no_mesin'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Plat No</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="plat_no" value="<?php echo $row['plat_no'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Merk</label></div>
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
                                                                        <option <?php if ($row['Triump'] == "Honda") { echo 'selected'; }?> value="Triump">Triump</option>
                                                                        <option <?php if ($row['Vespa'] == "Honda") { echo 'selected'; }?> value="Vespa">Vespa</option>
                                                                        <option <?php if ($row['Viar'] == "Honda") { echo 'selected'; }?> value="Viar">Viar</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Type</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="type" value="<?php echo $row['type'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Model</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="model" value="<?php echo $row['model'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Tahun Pembuatan</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="tahun_pembuatan" value="<?php echo $row['tahun_pembuatan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Isi Silinder</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="isi_silinder" value="<?php echo $row['isi_silinder'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Bahan Bakar</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="bahan_bakar" value="<?php echo $row['bahan_bakar'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Warna TNKB</label></div>
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
                                                                <div class="col-4 mt-1"><label>Tahun Registrasi</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="tahun_registrasi" value="<?php echo $row['tahun_registrasi'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>No BPKB</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="no_bpkb" value="<?php echo $row['no_bpkb'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Kode Lokasi</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="kode_lokasi" value="<?php echo $row['kode_lokasi'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Masa Berlaku STNK</label></div>
                                                                <div class="col">
                                                                    <input type="date" class="form-control form-box" name="masa_berlaku_stnk" value="<?php echo $row['masa_berlaku_stnk'] ?>">
                                                                </div>
                                                            </div>
                                                            <!-- dari ini -->
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Tanggal Beli</label></div>
                                                                <div class="col">
                                                                    <input type="date" class="form-control form-box" name="tgl_beli" value="<?php echo $row['tgl_beli'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Harga Beli</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="harga_beli" value="<?php echo $row['harga_beli'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Tanggal Jual</label></div>
                                                                <div class="col">
                                                                    <input type="date" class="form-control form-box" name="tgl_jual" value="<?php echo $row['tgl_jual'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Harga Jual</label></div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-box" name="harga_jual" value="<?php echo $row['harga_jual'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-4 mt-1"><label>Gambar Motor</label></div>
                                                                <div class="col">
                                                                    <input type="file" class="form-control form-box" name="gambar_motor" id="gambar_motor">
                                                                </div>
                                                            </div>
                                                            <!-- sampe ini -->
                                                            <div class="row mt-3">  
                                                                <div class="col-md-12 d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alerteditMotor<?php echo $row['id'] ?>">Simpan</button>
                                                                </div>                                     
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-start" id="alerteditMotor<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Edit motor <?php echo $row['no_registrasi'] ?> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary" name="editMotor">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </form>  
<!-- Tombol Konfirmasi Hapus Motor-->
                                        <form method="POST" class="form-group">
                                            <div class="invisible position-absolute">
                                                <input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
                                            </div>
                                            <div class="modal fade text-start" id="hapusMotor<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="alertHapusModal" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Hapus motor <?php echo $row['no_registrasi'] ?> ?<br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                            <button name="hapusMotor" type="submit" class="btn btn-primary">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </tr><?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<!-- Modal Tambah Data* -->
                <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="headerLabel">Tambah Data Motor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" class="mx-2" enctype="multipart/form-data">
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>No Registrasi</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="no_registrasi" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Nama Pemilik</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="nama_pemilik" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Alamat</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>No Rangka</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="no_rangka" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>No Mesin</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="no_mesin" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Plat No</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="plat_no" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Merk</label></div>
                                        <div class="col">
                                            <select name="merk" class="form-select">
                                                <option value="Honda">Honda</option>
                                                <option value="Yamaha">Yamaha</option>
                                                <option value="Kawasaki">Kawasaki</option>
                                                <option value="Suzuki">Suzuki</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Harley Davidson">Harley Davidson</option>
                                                <option value="Ducati">Ducati</option>
                                                <option value="KTM">KTM</option>
                                                <option value="TVS">TVS</option>
                                                <option value="Benelli">Benelli</option>
                                                <option value="Aprilia">Aprilia</option>
                                                <option value="MV Agusta">MV Agusta</option>
                                                <option value="Triump">Triump</option>
                                                <option value="Vespa">Vespa</option>
                                                <option value="Viar">Viar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Type</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="type">
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Model</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="model" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Tahun Pembuatan</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="tahun_pembuatan" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Isi Silinder</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="isi_silinder" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Bahan Bakar</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="bahan_bakar" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Warna TNKB</label></div>
                                        <div class="col">
                                            <select name="warna_tnkb" class="form-select">
                                                <option value="Hitam">Hitam</option>
                                                <option value="Merah">Merah</option>
                                                <option value="Kuning">Kuning</option>
                                                <option value="Biru">Biru</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Tahun Registrasi</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="tahun_registrasi" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>No BPKB</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="no_bpkb" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Kode Lokasi</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="kode_lokasi" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Masa Berlaku STNK</label></div>
                                        <div class="col">
                                            <input type="date" class="form-control form-box" name="masa_berlaku_stnk" required>
                                        </div>
                                    </div>
                                    <!-- dari ini -->
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Gambar Motor</label></div>
                                        <div class="col">
                                            <input type="file" class="form-control form-box" name="gambar_motor" id="gambar_motor">
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Tanggal Beli</label></div>
                                        <div class="col">
                                            <input type="date" class="form-control form-box" name="tgl_beli" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Harga Beli</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="harga_beli" placeholder="Rp." required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Tanggal Jual</label></div>
                                        <div class="col">
                                            <input type="date" class="form-control form-box" name="tgl_jual" required>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 mt-1"><label>Harga Jual</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control form-box" name="harga_jual" placeholder="Rp." required>
                                        </div>
                                    </div>
                                    <!-- sampe ini-->
                                    <div class="row mt-3">  
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="tambahMotor" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertEditModal">Simpan</button>
                                        </div>                                     
                                    </div> 
                                </form>  
                            </div>
                        </div>
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