<?php
// Mengatur header untuk memberikan respon dalam format JSON
header('Content-Type: application/json');

// Mengambil data koneksi ke database
include('connectDB.php');

// Membuat koneksi ke database
$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

// Mengecek koneksi ke database
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}

// Menjalankan query untuk mengambil data pegawai
$query = "SELECT * FROM tb_jabatan ORDER BY jabatan_id ASC";
$result = $connect->query($query);

// Membuat array untuk menampung data pegawai
$data_jabatan = array();

// Memasukkan data pegawai dari hasil query ke dalam array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data_jabatan[] = $row;
    }
}

// Mengembalikan data pegawai dalam format JSON
echo json_encode($data_jabatan);

// Menutup koneksi ke database
$connect->close();
?>