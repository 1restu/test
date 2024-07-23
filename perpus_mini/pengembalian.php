<?php
include 'db.php';
include 'inc/header.php';

$sql = "SELECT pengembalian.*, peminjaman.id_anggota, peminjaman.id_buku, anggota.nama AS nama_anggota, buku.judul AS judul_buku 
        FROM pengembalian 
        JOIN peminjaman ON pengembalian.id_peminjaman = peminjaman.id_peminjaman 
        JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
        JOIN buku ON peminjaman.id_buku = buku.id_buku";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Pengembalian</title>
</head>
<body>
<h2>Daftar Pengembalian</h2>
<a href="tambah_pengembalian.php" class="btn">Tambah Pengembalian</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pengembalian</th>
            <th>Denda</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_pengembalian']; ?></td>
                <td><?php echo $row['nama_anggota']; ?></td>
                <td><?php echo $row['judul_buku']; ?></td>
                <td><?php echo $row['tanggal_pengembalian']; ?></td>
                <td><?php echo $row['denda']; ?></td>
                <td>
                    <a href="edit_pengembalian.php?id=<?php echo $row['id_pengembalian']; ?>">Edit</a> |
                    <a href="hapus_pengembalian.php?id=<?php echo $row['id_pengembalian']; ?>" onclick="return confirm('Hapus pengembalian ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>