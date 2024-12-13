<?php
    if (isset($_POST['delete'])) {
        if (deleteUser($_POST) > 0) {
            echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
?>
<div class="modal fade" id="deleteModal<?= $usr['id_user']?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-white fw-bold fs-5" id="deleteModalLabel">Delete User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_user" class="form-label">Apakah anda yakin delete user ini?</label>
                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $usr['id_user']; ?>" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
