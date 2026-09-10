<?php
include 'db.php';

$data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>

    <style>
        table{
            width:100%;
            border-collapse: collapse;
        }

        th,td{
            border:1px solid #ccc;
            padding:10px;
        }
    </style>
</head>
<body>

<h2>Data Pengaduan Masyarakat</h2>

<table>

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Pesan</th>
    <th>Balasan Bot</th>
    <th>Tanggal</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['pesan']; ?></td>
    <td><?= $row['balasan']; ?></td>
    <td><?= $row['tanggal']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>