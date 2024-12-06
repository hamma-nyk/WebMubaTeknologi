<?php
    include '../../../config/app.php';

    if (isset($_GET['id'])) {
        $id_mhs = $_GET['id'];
        if (deleteMahasiswa($id_mhs) > 0) {
            echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = '../index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = '../index.php';
            </script>
            ";
        }
    }
?>