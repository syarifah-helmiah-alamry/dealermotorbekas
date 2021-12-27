<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/kelola_data_transaksi.php';
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
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Home</a>
                <a href="M_data_transaksi.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Transaksi</a>
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
                <div class="row mx-3">
                    <h4 class="h4 warna-1 text-center mb-3">Data Transaksi</h4>
                    <div class="row mb-2">
                        <div class="col d-flex justify-content-start">
                            <a href="M_transaksi.php" class="btn btn-secondary mb-3" style="width: 200px;">Kembali</a>
                        </div>
                        <div class="col">
                            <form method="POST" class="form-group d-flex justify-content-end">
                                <input name="pencarian" class="form-control border-bottom rounded-0 shadow-none w-50" type="text" placeholder="Search" style="background: transparent; border: none; outline: hidden;color:white;">
                                <button name="searchData" type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 70vh;">
                        <table class="table table-bordered border-primary align-middle text-center mx-auto" style="min-width: 1000px;">
                            <thead class="table-dark border-light">
                                <tr>
                                    <th>No</th>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>ID Customer</th>
                                    <th>ID Kendaraan</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Jual Real</th>
                                    <th style="width: 85px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-light border-dark">
                            <?php
                                $no = 1;
                                while ($row = mysqli_fetch_array($queryTransaksi)){?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['IdTrsk'] ?></td>
                                        <td><?php echo $row['Tgl_Trsk'] ?></td>
                                        <td><?php echo $row['Id_cust'] ?></td>
                                        <td><?php echo $row['Id_Kendaraan'] ?></td>
                                        <td>Rp. <?php echo number_format($row['Harga_Jual'], 0, ',', '.') ?></td>
                                        <td>Rp. <?php echo number_format($row['Harga_Jual_real'], 0, ',', '.') ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihat<?php echo $row['IdTrsk'] ?>" style="width: 75px;">Detail</button>
                                        </td>
<!-- Modal Detail Data Transaksi -->
                                        <div class="modal fade" id="lihat<?php echo $row['IdTrsk'] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="headerLabel">Tambah Data Motor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center mb-3">
                                                            <img src="../gambarMotor/<?php echo $row['gambar_motor'] ?>" style="height: 200px;">
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Tanggal Transaksi</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['Tgl_Trsk'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>ID Transaksi</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['IdTrsk'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>ID Customer</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['id_cust'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Nama Customer</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['nama_cust'] ?>">  
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>ID Kendaraan</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="<?php echo $row['Id_Kendaraan'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Harga Jual</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="Rp. <?php echo number_format($row['Harga_Jual'], 0, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3">
                                                            <div class="col-5 mt-1"><label>Harga Jual Real</label></div>
                                                            <div class="col">
                                                                <input type="text" class="form-control form-box" readonly value="Rp. <?php echo number_format($row['Harga_Jual_real'], 0, ',', '.') ?>">
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