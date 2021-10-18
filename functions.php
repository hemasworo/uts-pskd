<?php
require "conn.php";

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function enkripsi($data) {
    $method="AES-128-CTR"; 	//Chiper Method
    $key ="Sipinter123@#@"; // kata kunci yg digunakan utk enkripsi data
    $option=0;
    $iv="1251632135716362"; // panjang iv disesuaikan dengan method chiper

	return openssl_encrypt($data, $method, $key, $option, $iv);
}

function dekripsi($data) {
    $method="AES-128-CTR"; 	//Chiper Method
    $key ="Sipinter123@#@"; // kata kunci yg digunakan utk enkripsi data
    $option=0;
    $iv="1251632135716362"; // panjang iv disesuaikan dengan method chiper

	return openssl_decrypt($data, $method, $key, $option, $iv);
}

function tambah($data) {
	global $conn;

	$nama = enkripsi($data["nama"]);
	$alamat = enkripsi($data["alamat"]);
	$tanggal = enkripsi($data["tanggal"]);

	$query = "INSERT INTO `calon-siswa` 
				VALUES (NULL, '$nama', '$alamat', '$tanggal')
			";
	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = enkripsi($data["nama"]);
	$alamat = enkripsi($data["alamat"]);
	$tanggal = enkripsi($data["tanggal"]);

	$query = "UPDATE `calon-siswa` SET
				nama = '$nama',
				alamat = '$alamat',
				`tanggal-lahir` = '$tanggal' WHERE id = $id
			";

	mysqli_query($conn, $query);
	echo mysqli_error($conn);

	return mysqli_affected_rows($conn);	
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM `calon-siswa` WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$email = $data["email"];
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $name_lengkap = $data["nama"];

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script> alert('username sudah terdaftar!'); </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script> alert('konfirmasi password tidak sesuai!'); </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('$username', '$password', '$email', '$name_lengkap')");

	return mysqli_affected_rows($conn);

}