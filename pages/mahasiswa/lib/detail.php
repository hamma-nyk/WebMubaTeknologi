<div class="modal fade" id="detailMahasiswa_<?= $mhs['id_mhs'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <table class="table text-start border border-transparent">
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $mhs['nama_mhs'] ?></td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>: <?= $mhs['prodi_mhs'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php $jk= $mhs['jk_mhs']; echo $jk == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: <?= $mhs['tlp_mhs'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $mhs['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <?= $mhs['email_mhs'] ?></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td class="text-start align-top">: <img src="../../assets/img/<?= $mhs['foto_mhs'] ?>" alt="" width="100px"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>