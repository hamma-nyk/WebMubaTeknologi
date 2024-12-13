<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../../auth/login.php');
    exit;
}
if ($_SESSION['role'] != '1') {
    echo "<script>
        alert('Anda Bukan Admin');
        document.location.href = '../../index.php';
    </script>";
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
        <h1>Daftar User</h1>
        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah User
        </button>
        <!-- Modal Create-->
        <?php include 'lib/create.php'; ?>
        <table class="table table-striped" id="myTable">
            <?php $daftar_user = select("SELECT * FROM tb_user"); ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($daftar_user as $usr) { ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $usr['nama'] ?></td>
                        <td><?= $usr['username'] ?></td>
                        <td><?= $usr['email'] ?></td>
                        <td><?= $usr['password'] ?></td>
                        <!-- <td><?= $mhs['foto_mhs'] ?></td> -->
                        <td class="text-center" width="20%">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?= $usr['id_user'] ?>">
                                Edit
                            </button>
                            <!-- Modal Update-->
                            <?php include 'lib/update.php'; ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $usr['id_user'] ?>">
                                Delete
                            </button>
                            <!-- Modal delete-->
                            <?php include 'lib/delete.php'; ?>                        </td>
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