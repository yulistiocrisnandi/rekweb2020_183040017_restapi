<?php

// API mysqli untuk koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "universitas_pasundan");

// Ambil semua data dari datavase
$result = $mysqli->query("SELECT * FROM mahasiswa");
$rows = $result->fetch_all();

// konversi ke format json
$data_json = json_encode($rows);

// tampilkan data jsob
echo $data_json;

?>

<!DOCTYPE html>
<html>

<head>
    <title>REST API</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstap@4.5.3/dist/css/bootstap.min.css" integrity="sha384-TXBt27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6upKI2xXr2" crossorigin="anonymous">

<body class="container">
    <h3 class="my-3">Daftar Mahasiswa</h3>
    <table border="1" class="tabel table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nrp</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach (json_decode($data_json) as $data) {
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
                    <td><?= $data[3]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>