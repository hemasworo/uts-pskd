<?php

session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

require 'functions.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>LOGIN</title>
    </head>

    <body>
        <div class="judul">
        <center><h1>Login to Website Belajar</h1></center>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    <style type="text/css">

    body {
    background-image: url("bg6.jpg");          
    }

    .login {
        margin-top: 50px;
        margin-left: 480px;
        width: 400px;
        padding: 10px;
        border: 1px solid #ccc;
        background: #8FBC8F;
    }
    input[type=username], input[type=password] {
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
</style>
    <div class="login">
        <form action="" method="post">
            <div class="mb-3">
                <label for="masukemail" class="form-label">Username</label>
                <input type="text" class="form-control" id="mskuser" name="username" placeholder="masukkan username">
            </div>
            <div class="mb-3">
                <label for="mskpass" class="form-label">Password</label>
                <input type="password" class="form-control" id="mskpass" name="password" placeholder="masukkan password" >
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="LOGIN" class="btn btn-primary btn-block">
            </div>
            <div class="card-footer text-center py-3">
                <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
            </div>
        </form>
    </div>
    <script language="javascript" src="./star.js"></script>
    </body>

</html>