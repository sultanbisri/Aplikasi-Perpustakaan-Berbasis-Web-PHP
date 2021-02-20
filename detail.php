<?php

require 'functions.php';

// ambil data dari url
$id = $_GET['id'];

$mobil = query("SELECT * FROM cars WHERE id = $id");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
</head>

<body>

    <h3>Detail Mobil</h3>

    <ul>
        <li><img src="img/<?= $mobil['image']; ?> " width="100" height="100"></li>
        <li>Nama : <?= $mobil['name']; ?> </li>
        <li>Brand ID : <?= $mobil['brand_id']; ?></li>
        <li>Deskripsi : <?= $mobil['description']; ?></li>
        <li>Waktu Dibuat : <?= $mobil['create_time']; ?></li>
        <li>Waktu Diubah : <?= $mobil['update_time']; ?></li>
        <li>Stok Tersedia : <?= $mobil['stock']; ?></li>
        <li>
            <a href="ubah.php?id=<?= $mobil['id']; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $mobil['id']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?'); ">hapus</a>
        </li>
        <li><a href="index.php">Kembali Ke Daftar Mobil</a></li>
    </ul>

</body>

</html>