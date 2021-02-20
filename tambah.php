<?php

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['btn_tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "Data gagal ditambahkan!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mobil</title>
</head>

<body>
    <h3>Form Tambah Data Mobil</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">
                    Nama :
                    <input type="text" name="name" id="name" autocomplete="off" autofocus placeholder="Nama mobil" required>
                </label>
            </li>

            <li>
                <label for="brand_id">
                    Brand ID :
                    <input type="text" name="brand_id" id="brand_id" placeholder="Brand ID :" autocomplete="off" required>
                </label>
            </li>

            <li>
                <label for="color">
                    Warna :
                    <input type="text" name="color" id="color" autocomplete="off" required placeholder="Warna">
                </label>
            </li>

            <li>
                <label for="description">
                    Deskripsi :
                </label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </li>

            <li>
                <label for="email">
                    Gambar :
                    <input type="file" name="image" id="gambar" class="gambar" onchange="previewImage()">
                </label>
                <img src="img/user1.jpg" width="120" style="display: block;" class="img-preview">
            </li>

            <li>
                <label for="create_time">
                    Waktu Dibuat :
                    <input type="date" name="create_time" id="create_time" autocomplete="off" required placeholder="Waktu Dibuat :">
                </label>
            </li>

            <li>
                <label for="update_time">
                    Waktu Diupdate :
                    <input type="date" name="update_time" id="update_time" autocomplete="off" required placeholder="Waktu Diupdate :">
                </label>
            </li>

            <li>
                <label for="stock">
                    Stok :
                    <input type="text" name="stock" id="stock" autocomplete="off" required placeholder="Stok">
                </label>
            </li>

            <li>
                <button type="submit" name="btn_tambah">Tambah Data</button>
            </li>

        </ul>
    </form>

    <script src="js/script.js"></script>
</body>

</html>