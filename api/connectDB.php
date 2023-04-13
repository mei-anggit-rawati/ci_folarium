<?php
// Informasi koneksi ke database
$db_host = "localhost"; // alamat server database
$db_username = "root"; // username database
$db_password = ""; // password database
$db_name = "db_folarium"; // nama database

// Membuat koneksi ke database menggunakan mysqli
$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

// Mengecek koneksi ke database
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}
?>