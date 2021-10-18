<?php
$conn = mysqli_connect('localhost', 'root', '', 'uts');
// Cek Koneksi
if (mysqli_connect_errno())
{
    echo "Koneksi Gagal : " . mysqli_connect_error();
}