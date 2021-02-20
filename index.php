<?php

require 'functions.php';

$mobil = query("SELECT * FROM cars");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
</head>

<body>
    <h3>Daftar Mobil</h3>

    <a href="tambah.php">Tambah Data Mobil</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Brand id</th>
            <th>Image</th>
            <th>Color</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1;
        foreach ($mobil as $cars) : ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $cars['name']; ?></td>
                <td><?= $cars['brand_id']; ?></td>
                <td><img src="img/<?= $cars['image']; ?>" width="100" height="100"></td>
                <td><?= $cars['color']; ?></td>
                <td> <a href="detail.php?id=<?= $cars['id']; ?> ">lihat detail</a> </td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>