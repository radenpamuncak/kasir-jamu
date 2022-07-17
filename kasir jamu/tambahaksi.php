<?php 
include '../db.php';

$nama = $_POST['nama'];
$gambar_url = $_POST['gambar_url'];
$registrasi_id = $_POST['registrasi_id'];

mysqli_query($conn, "INSERT INTO barang values (NULL, '$nama', '$gambar_url', '$registrasi_id')");
header('location: produk.php');
?>