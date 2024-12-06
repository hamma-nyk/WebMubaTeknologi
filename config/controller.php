<?php
function select($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
    $connect->close();
}
function selectBarang($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
    $connect->close();
}
function createBarang($post)
{
    global $connect;
    $nama_brg = strip_tags($post['nama_brg']);
    $jumlah_brg = strip_tags($post['jumlah_brg']);
    $harga_brg = strip_tags($post['harga_brg']);
    $query = "INSERT INTO tb_barang (nama_brg, jumlah_brg, harga_brg, tanggal_brg) VALUES ('$nama_brg', '$jumlah_brg', '$harga_brg', CURRENT_TIMESTAMP())";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}
function updateBarang($post)
{
    global $connect;
    $id_brg = strip_tags($post['id_brg']);
    $nama_brg = strip_tags($post['nama_brg']);
    $jumlah_brg = strip_tags($post['jumlah_brg']);
    $harga_brg = strip_tags($post['harga_brg']);
    $query = "UPDATE tb_barang SET nama_brg='$nama_brg', jumlah_brg='$jumlah_brg', harga_brg='$harga_brg', tanggal_brg=CURRENT_TIMESTAMP() WHERE id_brg = '$id_brg'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}
function deleteBarang($id_brg)
{
    global $connect;
    $query = "DELETE FROM tb_barang WHERE id_brg = '$id_brg'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}
function createMahasiswa($post)
{
    global $connect;
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $tlp = strip_tags($post['tlp']);
    $email = strip_tags($post['email']);

    $nama_separator = explode(' ', $nama);
    $nama_untuk_file = implode('_', $nama_separator);
    $foto = uploadFotoMahasiswa(strtoupper($nama_untuk_file));

    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO tb_mahasiswa (nama_mhs, prodi_mhs, jk_mhs, tlp_mhs, email_mhs, foto_mhs) VALUES ('$nama', '$prodi', '$jk', '$tlp', '$email', '$foto')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}
function uploadFotoMahasiswa($nama)
{
    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('Pilih Foto Terlebih Dahulu');
        </script>";
        return false;
    }

    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $ekstensi_valid)) {
        echo "<script>
            alert('Yang Anda Upload Bukan Gambar');
        </script>";
        return false;
    }

    if ($ukuran_file > 1000000) {
        echo "<script>
            alert('Ukuran Terlalu Besar');
        </script>";
        return false;
    }

    $nama_file_baru = $nama . '.' . $ekstensi_file;
    move_uploaded_file($tmp_name, '../../../assets/img/' . $nama_file_baru);
    return strip_tags($nama_file_baru);
}
function updateMahasiswa($post)
{
    global $connect;
    $id_mhs = strip_tags($post['id_mhs']);
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $tlp = strip_tags($post['tlp']);
    $email = strip_tags($post['email']);
    $foto_lama = strip_tags($post['foto_lama']);

    $nama_separator = explode(' ', $nama);
    $nama_untuk_file = implode('_', $nama_separator);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    }else{
        $foto = uploadFotoMahasiswa(strtoupper($nama_untuk_file));
    }

    $query = "UPDATE tb_mahasiswa SET nama_mhs='$nama', prodi_mhs='$prodi', jk_mhs='$jk', tlp_mhs='$tlp', email_mhs='$email', foto_mhs='$foto' WHERE id_mhs = '$id_mhs'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}
function deleteMahasiswa($id_mhs)
{
    global $connect;
    $query = "DELETE FROM tb_mahasiswa WHERE id_mhs = '$id_mhs'";
    $foto = select("SELECT foto_mhs FROM tb_mahasiswa WHERE id_mhs = '$id_mhs'");
    unlink('../../../assets/img/' . $foto[0]['foto_mhs']);
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
    $connect->close();
}   
