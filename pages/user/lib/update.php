<?php

if (isset($_POST['submit'])) {
    if (updateUser($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diupdate');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diupdate');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>
<div class="modal fade" id="updateModal<?= $usr['id_user']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-white fw-bold fs-5" id="editModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $usr['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required value="<?= $usr['username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="<?= $usr['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password baru/lama">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" id="role">
                            <?php $role = $usr['role']; ?>
                            <option value="1" <?php if ($role == 1) echo 'selected'; ?>>Admin</option>
                            <option value="2" <?php if ($role == 2) echo 'selected'; ?>>User</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">+ Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>