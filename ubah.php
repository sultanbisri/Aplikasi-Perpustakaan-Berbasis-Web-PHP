<?php

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

// ambil data dari url
$id = $_GET['id'];

// query mobil berdasarkan id
$mobil = query("SELECT * FROM cars WHERE id = '$id'");

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['btn_ubah'])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "Data gagal diubah!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mobil</title>
</head>

<body>
    <h3>Form Ubah Data Mobil</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mobil['id']; ?>">
        <ul>
            <li>
                <label for="name">
                    Nama Mobil :
                    <input type="text" name="name" id="name" autocomplete="off" value="<?= $mobil['name']; ?>">
                </label>
            </li>

            <li>
                <label for="brand_id">
                    Brand ID :
                    <input type="text" name="brand_id" id="brand_id" autocomplete="off" value="<?= $mobil['brand_id']; ?>">
                </label>
            </li>

            <li>
                <label for="color">
                    Warna :
                    <input type="text" name="color" id="color" autocomplete="off" value="<?= $mobil['color']; ?>">
                </label>
            </li>

            <li>
            <li>
                <label for="description">
                    Deskripsi :
                </label>
                <textarea name="description" id="description"><?= $mobil['description']; ?></textarea>
            </li>
            </li>

            <li>
                <input type="hidden" name="gambar_lama" value="<?= $mobil['image']; ?>">
                <label for="email">
                    Gambar :
                    <input type="file" name="image" id="image" class="image" onchange="previewImage()">
                </label>
                <img src="img/<?= $mobil['image']; ?>" width="120" style="display: block;" class="img-preview">
            </li>

            <li>
                <label for="create_time">
                    Waktu Dibuat :
                    <input type="date" name="create_time" id="create_time" autocomplete="off" value="<?= $mobil['create_time']; ?>">
                </label>
            </li>

            <li>
                <label for="update_time">
                    Waktu Diupdate :
                    <input type="date" name="update_time" id="update_time" autocomplete="off" value="<?= $mobil['update_time']; ?>">
                </label>
            </li>

            <li>
                <label for="stock">
                    Stok :
                    <input type="text" name="stock" id="stock" autocomplete="off" value="<?= $mobil['stock']; ?>">
                </label>
            </li>

            <li>
                <button type="submit" name="btn_ubah">Ubah Data</button>
            </li>

        </ul>
    </form>

    <script src="js/script.js"></script>
</body>

</html>