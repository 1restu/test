<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query = "INSERT INTO pengembalian (id_peminjaman, tanggal_pengembalian, denda) 
              VALUES ('$id_peminjaman', '$tanggal_pengembalian', '$denda')";
    mysqli_query($koneksi, $query);
    header('Location: pengembalian.php');
    exit;
} else {
    // Ambil data peminjaman
    $peminjaman_sql = "SELECT peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku 
                       FROM peminjaman 
                       JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                       JOIN buku ON peminjaman.id_buku = buku.id_buku";
    $peminjaman_result = mysqli_query($koneksi, $peminjaman_sql);
}
?>

<?php include 'inc/header.php'; ?>
<h2>Tambah Pengembalian</h2>
<form action="tambah_pengembalian.php" method="POST">
    <label>Peminjaman</label>
    <select name="id_peminjaman" required>
        <?php while ($peminjaman = mysqli_fetch_assoc($peminjaman_result)) { ?>
            <option value="<?php echo $peminjaman['id_peminjaman']; ?>">
                <?php echo $peminjaman['nama_anggota'] . " - " . $peminjaman['judul_buku']; ?>
            </option>
        <?php } ?>
    </select>
    <label>Tanggal Pengembalian</label>
    <input type="date" name="tanggal_pengembalian" required>
    <label>Denda</label>
    <input type="number" name="denda" required>
    <button type="submit">Tambah</button>
</form>
<?php include 'inc/footer.php'; ?>
