<?php
include 'inc/header.php';
include 'db.php';

$sql = "SELECT * FROM anggota";
$result = $koneksi->query($sql);
?>

<h2>Daftar Anggota</h2>
<a href="tambah_anggota.php" class="btn">Tambah Anggota</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_anggota']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['nomor_telepon']; ?></td>
                <td>
                    <a href="edit_anggota.php?id=<?php echo $row['id_anggota']; ?>">Edit</a> |
                    <a href="hapus_anggota.php?id=<?php echo $row['id_anggota']; ?>" onclick="return confirm('Hapus anggota ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>
