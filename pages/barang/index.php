<?php
session_start();
include '../../config/app.php';
if (!isset($_SESSION['login'])) {
    header('Location: ../../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUP Barang</title>
    <?php include 'layout/upper_script.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/mahasiswa">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/user">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Daftar Barang</h1>
        <hr>
        <a href="lib/create.php" class="btn btn-primary mb-1">Tambah Barang</a>
        <a href="lib/export_ss.php" class="btn btn-primary mb-1">Export Excel</a>
        <table class="table table-striped" id="myTable">
            <?php $daftar_barang = select("SELECT * FROM tb_barang"); ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($daftar_barang as $barang) { ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $barang['nama_brg'] ?></td>
                        <td><?= $barang['jumlah_brg'] ?></td>
                        <td><?= 'Rp ' . number_format($barang['harga_brg'], 2, ',', '.') ?></td>
                        <td><?= date('d/m/Y | H:i:s', strtotime($barang['tanggal_brg'])); ?></td>
                        <td>
                            <a href="lib/update.php?id=<?= $barang['id_brg'] ?>" class="btn btn-warning">Edit</a>
                            <a href="lib/delete.php?id=<?= $barang['id_brg'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?\nData yang dihapus tidak dapat dikembalikan.\nNama Barang: <?= $barang['nama_brg'] ?>')">Delete</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
    <?php include 'layout/bottom_script.php'; ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>