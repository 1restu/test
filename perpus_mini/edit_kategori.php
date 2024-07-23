<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id";
    mysqli_query($koneksi, $query);
    header('Location: kategori.php');
    exit;
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM kategori WHERE id_kategori = $id";
    $result = mysqli_query($koneksi, $query);
    $kategori = mysqli_fetch_assoc($result);
}
?>

<?php include 'inc/header.php'; ?>
<h2>Edit Kategori</h2>
<form action="edit_kategori.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $kategori['id_kategori']; ?>">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>" required>
    <button type="submit">Update</button>
</form>
<?php include 'inc/footer.php'; ?>