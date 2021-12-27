<?php
	require 'koneksi.php';
	// Cek Session
    session_start();
    if (isset($_SESSION["Pemilik"])){
        header("Location: pemilik/index.php");
        exit;
    }
    else if (isset($_SESSION["Teller"])){
        header("Location: teller/index.php");
        exit;
    }
    else if (isset($_SESSION["Teknisi"])){
        header("Location: teknisi/index.php");
        exit;
    }
    else if (isset($_SESSION["Customer"])){
        header("Location: customer/index.php");
        exit;
    }
    else{
        header("Location: login.php");
        exit;
    }
?>