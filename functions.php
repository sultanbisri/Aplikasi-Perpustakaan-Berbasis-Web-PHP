<?php

function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'dealer_mobil');
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    // kondisi jika data ingin melihat berdasarkan id
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function upload()
{
    $nama_file = $_FILES['image']['name'];
    $tipe_file = $_FILES['image']['type'];
    $ukuran_file = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmp_file = $_FILES['image']['tmp_name'];

    // ketika tidak ada gambar yang dipilih
    if ($error == 4) {
        // echo "<script>
        //         alert('Pilih gambar terlebih dahulu!');
        //       </script> ";
        return 'user1.jpg';
    }

    // cek ekstensi file
    $daftar_gambar = ['jpg', 'png', 'jpeg'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
                alert('Yang Anda Pilih Bukan Gambar!');
              </script> ";
        return false;
    }

    // cek type file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
                alert('Yang Anda Pilih Bukan Gambar!');
              </script> ";
        return false;
    }

    // cek ukuran file
    if ($ukuran_file > 5000000) {
        echo "<script>
                alert('Ukuran terlalu besar!');
              </script> ";
        return false;
    }

    // lolos pengecekan
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

    return $nama_file_baru;
}

function tambah($data)
{
    $conn = koneksi();

    $nama    = htmlspecialchars($data['name']);
    $brand     = htmlspecialchars($data['brand_id']);
    $color   = htmlspecialchars($data['color']);
    $deskripsi = htmlspecialchars($data['description']);
    $buat_waktu = htmlspecialchars($data['create_time']);
    $update_waktu = htmlspecialchars($data['update_time']);
    $stok = htmlspecialchars($data['stock']);
    // $gambar  = htmlspecialchars($data['gambar']);

    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO
                cars
               VALUES
               (null, '$nama', '$brand', '$gambar', '$color', '$deskripsi', '$buat_waktu', '$update_waktu', '$stok');
            ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();

    // menghapus gambar di folder img
    $mobil = query("SELECT * FROM cars WHERE id = '$id'");

    if ($mobil['image'] != 'user1.jpg') {
        unlink('img/' . $mobil['image']);
    }

    mysqli_query($conn, "DELETE FROM cars WHERE id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id           = $data['id'];
    $nama    = htmlspecialchars($data['name']);
    $brand     = htmlspecialchars($data['brand_id']);
    $color   = htmlspecialchars($data['color']);
    $deskripsi = htmlspecialchars($data['description']);
    $buat_waktu = htmlspecialchars($data['create_time']);
    $update_waktu = htmlspecialchars($data['update_time']);
    $stok = htmlspecialchars($data['stock']);
    $gambar_lama  = htmlspecialchars($data['gambar_lama']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    if ($gambar == 'user1.jpg') {
        $gambar = $gambar_lama;
    }

    $query = " UPDATE cars SET
               name = '$nama',
               brand_id  = '$brand',
               image = '$gambar',
               color = '$color',
               description = '$deskripsi',
               create_time = '$buat_waktu',
               update_time = '$update_waktu',
               stock = '$stok'

               WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}