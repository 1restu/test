<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali) 
              VALUES ('$id_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali')";
    mysqli_query($koneksi, $query);
    header('Location: peminjaman.php');
    exit;
} else {
    // Ambil data anggota
    $anggota_sql = "SELECT * FROM anggota";
    $anggota_result = mysqli_query($koneksi, $anggota_sql);

    // Ambil data buku
    $buku_sql = "SELECT * FROM buku";
    $buku_result = mysqli_query($koneksi, $buku_sql);
}
?>

<?php include 'inc/header.php'; ?>
<h2>Tambah Peminjaman</h2>
<form action="tambah_peminjaman.php" method="POST">
    <label>Anggota</label>
    <select name="id_anggota" required>
        <?php while ($anggota = mysqli_fetch_assoc($anggota_result)) { ?>
            <option value="<?php echo $anggota['id_anggota']; ?>"><?php echo $anggota['nama']; ?></option>
        <?php } ?>
    </select>
    <label>Buku</label>
    <select name="id_buku" required>
        <?php while ($buku = mysqli_fetch_assoc($buku_result)) { ?>
            <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
        <?php } ?>
    </select>
    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required>
    <label>Tanggal Kembali</label>
    <input type="date" name="tanggal_kembali" required>
    <button type="submit">Tambah</button>
</form>
<?php include 'inc/footer.php'; ?>
