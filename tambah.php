<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
		";
	}


}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Input Data Siswa</title>
</head>
<body>
    <div class="container mt-3">
        <div class="col-md-5">
            
            <h1 class="mb-3">Tambah Data Mahasiswa</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama siswa">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat siswa">
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal lahir siswa">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>