<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../../auth/login.php');
    exit;
}
include '../../config/app.php';
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
        <h1>Daftar Mahasiswa</h1>
        <hr>
        <a href="lib/create.php" class="btn btn-primary mb-1">Tambah Mahasiswa</a>
        <table class="table table-striped" id="myTable">
            <?php $daftar_mhs = select("SELECT * FROM tb_mahasiswa"); ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Foto</th> -->
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($daftar_mhs as $mhs) { ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $mhs['nama_mhs'] ?></td>
                        <td><?= $mhs['prodi_mhs'] ?></td>
                        <td><?= $mhs['jk_mhs'] ?></td>
                        <td><?= $mhs['tlp_mhs'] ?></td>
                        <td><?= $mhs['email_mhs'] ?></td>
                        <!-- <td><?= $mhs['foto_mhs'] ?></td> -->
                        <td class="text-center" width="20%">
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#detailMahasiswa_<?= $mhs['id_mhs'] ?>">
                                Detail
                            </button>
                            <?php include 'lib/detail.php'; ?>
                            <a href="lib/update.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-warning">Edit</a>
                            <a href="lib/delete.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?\nData yang dihapus tidak dapat dikembalikan.\nNama Mahasiswa: <?= $mhs['nama_mhs'] ?>')">Delete</a>
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