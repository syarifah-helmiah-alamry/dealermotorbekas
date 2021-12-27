<?php
    require 'auth.php';
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Penjualan Motor Bekas</title>
</head>
<body>
    <div class="container fadeIn first d-flex wrapper">
        <div class="row content w-75 m-auto">
            <div class="col-md-6 m-auto">
                <img src="assets/Logo/Login.jpeg" class="img-fluid animated">
            </div>
            <div class="col-md-5 m-auto">
                <h4 class="h4 text-center mb-4">Login</h4>
                <form method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="id_user">
                    </div>
                    <div class="form-group mt-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" name="signIn" class="btn btn-class mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>