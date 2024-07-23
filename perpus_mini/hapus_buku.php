<?php
include 'db.php';
$id = $_GET['id'];

$query = "DELETE FROM buku WHERE id_buku = $id";
mysqli_query($koneksi, $query);
header('Location: buku.php');
exit;
?>