<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM `calon-siswa`");

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

        <h1 class="mb-3">Data Siswa Baru</h1>
        <div class="d-flex justify-content-between">
            <a href="tambah.php" class="btn btn-primary">Tambah data siswa</a>
            <a href="logout.php" class="btn btn-danger">Keluar</a>
        </div>

        <hr>

        <table class="table table-hover">
            <tr>
                <th class="text-center">No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th class="text-center">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach( $siswa as $row ) : ?>
            <tr>
                <td class="align-middle text-center"><?= $i; ?></td>
                <td class="align-middle"><?= dekripsi($row["nama"]); ?></td>
                <td class="align-middle"><?= dekripsi($row["alamat"]); ?></td>
                <td class="align-middle"><?= dekripsi($row["tanggal-lahir"]); ?></td>
                <td class="align-middle text-center">
                    <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                    <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>