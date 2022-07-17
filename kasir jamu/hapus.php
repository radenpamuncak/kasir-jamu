<?php
$id = $_GET['id'];
include 'db.php';
$query = "DELETE FROM transaksi WHERE id = '$id'";
$db->query($query);
header('location:index.php');
