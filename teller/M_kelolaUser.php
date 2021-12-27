<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/kelola_User.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Data User</title>
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
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent fw-bold active-bar">Kelola User</a>
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
            <div class="container">
                <div class="row my-4">
                    <h3 class="h3 mb-3 text-center warna-1">Data User</h3>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <button type="button" class="btn btn-primary mb-4" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah User</button>
                        </div>
                        <div class="col">
                            <form method="POST" class="form-group d-flex justify-content-end">
                                <input name="pencarian" class="form-control border-bottom rounded-0 shadow-none w-50" type="text" placeholder="Search" style="background: transparent; border: none; outline: hidden;color:white;">
                                <button name="searchData" type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
<!-- Tabel Data User -->
                <div class="row">
                    <h4 class="h4 warna-1 text-center mb-3">Pendaftaran User</h4>
                    <div class="table-responsive" style="max-height: 70vh;">
                    <table class="table table-bordered border-primary align-middle text-center mx-auto" style="min-width: 900px;">
                            <thead class="table-dark border-light">
                                <tr>
                                    <th style="width: 20%;">ID User</th>
                                    <th style="width: 30%;">Nama</th>
                                    <th style="width: 20%;">Hak Akses</th>
                                    <th style="width: 16%;">Create Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-light border-dark">
                                <?php
                                    while ($row = mysqli_fetch_array($query)){?>
                                        <tr>
                                            <td><?php echo $row['id_user'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['hak_akses'] ?></td>
                                            <td><?php echo $row['create_date'] ?></td>
<!-- Modal Mendaftarkan User -->
                                            <form method="POST">
                                                <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="headerLabel">Pendaftaran Customer</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start">
                                                                <div class="row py-1">
                                                                    <div class="col-5 mt-1"><label>ID User</label></div>
                                                                    <div class=col>
                                                                        <input type="text" class="form-control form-box" name="id_user">
                                                                    </div>
                                                                </div>
                                                                <div class="row py-1">
                                                                    <div class="col-5 mt-1"><label>Password</label></div>
                                                                    <div class=col>
                                                                        <input type="password" class="form-control form-box" name="password">
                                                                    </div>
                                                                </div>
                                                                <div class="row py-1">
                                                                    <div class="col-5 mt-1"><label>Nama</label></div>
                                                                    <div class=col>
                                                                        <input type="text" class="form-control form-box" name="nama">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">  
                                                                    <div class="col-md-12 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertTambahModal">Daftar</button>
                                                                    </div>                                     
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade text-start" id="alertTambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Data sudah benar ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-primary" name="tambahUser">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </tr>
                                    <?php
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