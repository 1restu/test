<?php
include 'db.php';
include 'inc/header.php';

$sql = "SELECT peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku 
        FROM peminjaman 
        JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
        JOIN buku ON peminjaman.id_buku = buku.id_buku";
$result = $koneksi->query($sql);
?>

<h2>Daftar Peminjaman</h2>
<a href="tambah_peminjaman.php" class="btn">Tambah Peminjaman</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_peminjaman']; ?></td>
                <td><?php echo $row['nama_anggota']; ?></td>
                <td><?php echo $row['judul_buku']; ?></td>
                <td><?php echo $row['tanggal_pinjam']; ?></td>
                <td><?php echo $row['tanggal_kembali']; ?></td>
                <td>
                    <a href="edit_peminjaman.php?id=<?= $row['id_peminjaman']; ?>">Edit</a> |
                    <a href="hapus_peminjaman.php?id=<?= $row['id_peminjaman']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus peminjaman ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include 'inc/footer.php'; ?>