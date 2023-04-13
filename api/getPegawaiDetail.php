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

// mengambil id pegawai dari parameter GET
$id_pegawai = $_GET['id_pegawai'];

// Menjalankan query untuk mengambil data pegawai berdasarkan id
$query = "SELECT * 
FROM tb_pegawai AS A
LEFT JOIN tb_jabatan AS B ON A.jabatan_id=B.jabatan_id
LEFT JOIN tb_kontrak AS C ON A.kontrak_id=C.kontrak_id
WHERE A.pgw_id = '$id_pegawai'";
$result = $connect->query($query);

// Membuat array untuk menampung data pegawai
$data_pegawai = array();

// Memasukkan data pegawai dari hasil query ke dalam array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data_pegawai[] = $row;
    }
}

// Mengembalikan data pegawai dalam format JSON
echo json_encode($data_pegawai);

// Menutup koneksi ke database
$connect->close();
?>