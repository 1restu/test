<?php
include 'inc/header.php';
include 'db.php';

// Ambil data kategori dari database
$sql = "SELECT * FROM kategori";
$result = $koneksi->query($sql);
?>

<h2>Daftar Kategori</h2>
<a href="tambah_kategori.php" class="btn">Tambah Kategori</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_kategori']; ?></td>
                <td><?php echo $row['nama_kategori']; ?></td>
                <td>
                    <a href="edit_kategori.php?id=<?php echo $row['id_kategori']; ?>">Edit</a> |
                    <a href="hapus_kategori.php?id=<?php echo $row['id_kategori']; ?>" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>
