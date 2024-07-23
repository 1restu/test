<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $query = "INSERT INTO anggota (nama, alamat, nomor_telepon) VALUES ('$nama', '$alamat', '$nomor_telepon')";
    mysqli_query($koneksi, $query);
    header('Location: anggota.php');
    exit;
}
?>

<?php include 'inc/header.php'; ?>
<h2>Tambah Anggota</h2>
<form action="tambah_anggota.php" method="POST">
    <label>Nama</label>
    <input type="text" name="nama" required>
    <label>Alamat</label>
    <input type="text" name="alamat" required>
    <label>Nomor Telepon</label>
    <input type="text" name="nomor_telepon" required>
    <button type="submit">Tambah</button>
</form>
<?php include 'inc/footer.php'; ?>
