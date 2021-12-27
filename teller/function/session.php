<?php
    require '../koneksi.php';
    require '../auth.php';
// Ambil Session
    session_start();
    $id_user = $_SESSION['id_user'];
    $querySession = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
    $rowSession = mysqli_fetch_array($querySession);
    $_SESSION['nama'] = $rowSession['nama'];
// Cek Session
    if (!isset($_SESSION[null]) && !isset($_SESSION["Teller"])){
        header("Location: ../login.php");
        exit;
    }
?>