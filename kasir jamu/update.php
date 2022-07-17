<?php

require 'db.php';

$id = $_GET['id'];

$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];
$customer = $_POST['customer'];

$query = "UPDATE transaksi SET barang_id='$barang_id', jumlah = '$jumlah', customer = '$customer' WHERE id = '$id'";
$db->query($query);

header('location: index.php');