<?php

require 'db.php';

$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];
$customer = $_POST['customer'];

$query = "INSERT INTO transaksi (barang_id, customer, jumlah, tanggal_masuk) VALUES ('$barang_id', '$customer', '$jumlah', NOW())";
$db->query($query);

header('location: index.php');