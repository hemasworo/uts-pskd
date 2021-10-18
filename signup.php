<?php
require 'functions.php';

if( isset($_POST["daftar"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script> alert('user baru berhasil ditambahkan!'); </script>";
	} else {
		echo "Error bre: ". mysqli_error($conn);
	}

}

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Website Belajar</title>
    </head>

    <body>
        <center> <h1>SIGN UP</h1></center>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

        <style type="text/css">
            body {
                background-image: url("bg6.jpg");
                
            }

            .daftar {
                margin-top: 50px;
                margin-left: 480px;
                width: 400px;
                padding: 10px;
                border: 1px solid #ccc;
                background: #8FBC8F;
            }

            input[type=email],
            input[type=password] {
                margin: 5px auto;
                width: 100%;
                padding: 10px;
            }

            input[type=submit] {
                margin: 5px auto;
                float: right;
                padding: 5px;
                width: 90px;
                border: 1px solid #fff;
                color: #fff;
                background: #8B0000;
                cursor: pointer;
            }
            input[type=reset] {
                margin: 5px auto;
                float: right;
                padding: 5px;
                width: 90px;
                border: 1px solid #fff;
                color: #fff;
                background: #8B0000;
                cursor: pointer;
            }
        </style>
        <div class="daftar">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="mskuser" class="form-label">Username</label>
                    <input type="text" class="form-control" id="mskuser" name="username" placeholder="masukkan username">
                </div>
                <div class="mb-3">
                    <label for="masukpw" class="form-label">Password</label>
                    <input type="password" class="form-control" id="masukpw" name="password" placeholder="masukkan password">
                </div>
                <div class="mb-3">
                    <label for="masukpw2" class="form-label">Verifikasi Password</label>
                    <input type="password" class="form-control" id="masukpw2" name="password2" placeholder="masukkan password">
                </div>
                <div class="form-group">
                    <label for="masukemail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="masukkan email">
                </div>
                <div class="form-group">
                    <label for="masuknama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <input type="submit" name="daftar" value="DAFTAR" class="btn btn-primary btn-block">
                </div>
                <div class="form-group">
                    <input type="reset" name="reset" value="RESET" class="btn btn-primary btn-block">
                </div>
                <div class="card-footer text-center py-3">
                <div class="small"><a href="login.php">Sudah Punya Akun? Login</a></div>
            </form>
        </div>
        </div>
    </body>
</html>