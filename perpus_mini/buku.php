<?php
include 'db.php';
$query = "SELECT * FROM buku";
$result = mysqli_query($koneksi, $query);
?>

<?php include 'inc/header.php'; ?>
    <h2>Daftar Buku</h2>
<a href="tambah_buku.php" class="btn">Tambah Buku?</a>
<table>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>
    <?php while ($buku = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($buku['id_buku']); ?></td>
            <td><?= htmlspecialchars($buku['judul']); ?></td>
            <td><?= htmlspecialchars($buku['penulis']); ?></td>
            <td><?= htmlspecialchars($buku['tahun_terbit']); ?></td>
            <td>
                <a href="edit_buku.php?id=<?= htmlspecialchars($buku['id_buku']); ?>">Edit</a> |
                <a href="hapus_buku.php?id=<?= htmlspecialchars($buku['id_buku']); ?>">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php include 'inc/footer.php'; ?>