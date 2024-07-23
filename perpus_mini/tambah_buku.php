<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
    $id_kategori = htmlspecialchars($_POST['id_kategori']);   
    
    $query = "INSERT INTO buku (judul, penulis, tahun_terbit, id_kategori) 
              VALUES ('$judul', '$penulis', '$tahun_terbit', '$id_kategori')";
    if(mysqli_query($koneksi, $query)) {
        header('Location: buku.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Ambil data kategori
    $kategori_sql = "SELECT * FROM kategori";
    $kategori_result = mysqli_query($koneksi, $kategori_sql);
}
?>

<?php include 'inc/header.php'; ?>
<h2>Tambah Buku</h2>
<form action="tambah_buku.php" method="POST">
    <label>Judul</label>
    <input type="text" name="judul" required>
    <label>Penulis</label>
    <input type="text" name="penulis" required>
    <label>Tahun Terbit</label>
    <input type="text" name="tahun_terbit" required>
    <label>Kategori</label>
    <select name="id_kategori" required>
        <?php while ($kategori = mysqli_fetch_assoc($kategori_result)) { ?>
            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
        <?php } ?>
    </select>
    <button type="submit">Tambah</button>
</form>
<?php include 'inc/footer.php'; ?>
