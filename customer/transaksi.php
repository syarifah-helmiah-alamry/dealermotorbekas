<?php
    require '../koneksi.php';
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
                <i class="me-2"></i>Penjualan<br>Motor Bekas
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Home</a>
                <a href="identitas_motor.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">Identitas Motor</a>
                <a href="create_user.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">Membuat User</a>
                <a href="transaksi.php" class="list-group-item list-group-item-action bg-transparent active-bar fw-bold">Transaksi</a>
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
                    <h3 class="fs-4 warna-1 text-center mb-4">Transaksi</h3>
                    
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