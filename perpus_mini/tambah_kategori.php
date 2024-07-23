<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];

    $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    mysqli_query($koneksi, $query);
    header('Location: kategori.php');
    exit;
}
?>

<?php include 'inc/header.php'; ?>
<h2>Tambah Kategori</h2>
<form action="tambah_kategori.php" method="POST">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori" required>
    <button type="submit">Tambah</button>
</form>
<?php include 'inc/footer.php'; ?>
