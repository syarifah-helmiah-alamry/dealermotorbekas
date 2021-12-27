<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/kelola_User.php';
    $getID = $_GET['getID'];
    $sqlUser = "SELECT * FROM user WHERE id_user='$getID'";
    $query = mysqli_query($koneksi, $sqlUser);
    $row = mysqli_fetch_array($query);
?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Data User</title>
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
                <a href="M_identitasMotor.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Identitas Motor</a>
                <a href="M_kelolaUser.php" class="list-group-item list-group-item-action bg-transparent fw-bold active-bar">Membuat User</a>
                <a href="M_transaksi.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Transaksi</a>
                <a href="setting.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Pengaturan Akun</a>
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
                    <h3 class="fs-4 warna-1 text-center mb-4">Edit User</h3>
                    <form method="POST" class="warna-1 mx-auto px-5" style="width: 700px;">
                        <div class="row pb-3">
                            <div class="col-3"><label>ID User</label></div>
                            <div class="col">
                                <input type="text" readonly class="form-control" name="id_user" value="<?php echo $row['id_user'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-3"><label>Nama</label></div>
                            <div class="col">
                                <input type="text" class="form-control form-box" name="nama" value="<?php echo $row['nama'] ?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-3"><label>Password</label></div>
                            <div class="col">
                                <input type="password" class="form-control form-box" name="password">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-3"><label>Hak Akses</label></div>
                            <div class="col">
                                <select name="hak_akses" class="form-select" >
                                    <option <?php if ($row['hak_akses'] == "Pemilik") { echo 'selected'; }?> value="Pemilik">Pemilik</option>
                                    <option <?php if ($row['hak_akses'] == "Teller") { echo 'selected'; }?> value="Teller">Teller</option>
                                    <option <?php if ($row['hak_akses'] == "Teknisi") { echo 'selected'; }?> value="Teknisi">Teknisi</option>
                                    <option <?php if ($row['hak_akses'] == "Customer") { echo 'selected'; }?> value="Customer">Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col ps-5">
                                <button class="btn btn-primary" type="submit" style="width: 30%;" name="updateUser">Simpan</button>
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