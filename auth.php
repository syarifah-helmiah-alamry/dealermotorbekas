<?php
    require 'koneksi.php';
// SIGN IN
    if (isset($_POST["signIn"])){
        $id_user = $_POST["id_user"];
        $pass = $_POST["password"];
        $signin = "SELECT * FROM user WHERE id_user='$id_user' AND password=md5('$pass')";
        $result = mysqli_query($koneksi, $signin);
        
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_array($result);
            if ($row > 0){
                // Set Session
				session_start();
				$_SESSION['id_user'] = $_POST["id_user"];
                if ($row["hak_akses"]=="Pemilik"){
                    $_SESSION["Pemilik"] = true;
                    header("Location:pemilik/index.php");
                }
                else if ($row["hak_akses"]=="Teller"){
                    $_SESSION["Teller"] = true;
                    header("Location:teller/index.php");
                }
                else if ($row["hak_akses"]=="Teknisi"){
                    $_SESSION["Teknisi"] = true;
                    header("Location:teknisi/index.php");
                }
                else{
                    $_SESSION["Customer"] = true;
                    header("Location:customer/index.php");
                }
                exit;
            }
        }
        $error = true;
        if (isset($error)){
            ?>
                <script>
                alert("Username/Password salah!");
                </script>
            <?php
        }
    }
?>