<?php
include '../../../config/app.php';

if (isset($_POST['submit'])) {
    if (createMahasiswa($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = '../index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <?php include '../layout/upper_script.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../modal">Modal</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Tambah Mahasiswa</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" required>
            </div>
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin</label><br><label class="form-check-label" for="jk"></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                    <label class="form-check-label" for="jk">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                    <label class="form-check-label" for="jk">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="tlp" name="tlp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <div class="mt-4">
                    <img src="" class="img-preview img-fluid" id="img-preview" width="150px" alt="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end" name="submit">+ Tambah</button>
        </form>
    </div>
    <?php include '../layout/bottom_script.php'; ?>
    <script>
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        foto.addEventListener('change', function() {
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        });
    </script>
</body>

</html>