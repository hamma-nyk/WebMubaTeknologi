<?php
include '../../../config/app.php';

if (isset($_POST['submit'])) {
    if (updateBarang($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diupdate');
            document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diupdate');
            document.location.href = '../index.php';
        </script>
        ";
    }
}

if (isset($_GET['id'])) {
    $id_brg = $_GET['id'];
    $barang = select("SELECT * FROM tb_barang WHERE id_brg = $id_brg")[0];
} else {
    echo "
    <script>
        alert('Data Tidak Ditemukan');
        document.location.href = '../index.php';
    </script>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
    <?php include '../layout/upper_script.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/mahasiswa">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/modal">Modal</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Update Barang</h1>
        <hr>
        <form action="" method="POST">
            <input type="text" name="id_brg" value="<?= $barang['id_brg']; ?>" hidden autocomplete="off" readonly>
            <div class="mb-3">
                <label for="nama_brg" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="<?= $barang['nama_brg']; ?>" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="jumlah_brg" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_brg" name="jumlah_brg" value="<?= $barang['jumlah_brg']; ?>" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="harga_brg" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga_brg" name="harga_brg" value="<?= $barang['harga_brg']; ?>" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="tanggal_brg" class="form-label">Tanggal Barang</label>
                <input type="text" class="form-control" id="tanggal_brg" name="tanggal_brg" value="<?= date('d/m/y'); ?>" readonly required>
            </div>
            <button type="submit" class="btn btn-warning float-end" name="submit">Simpan</button>
        </form>
    </div>
    <?php include '../layout/bottom_script.php'; ?>
</body>

</html>