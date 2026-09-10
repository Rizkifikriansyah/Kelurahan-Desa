<?php
include '../admin/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    $sql = "INSERT INTO pengaduan (nama, pesan) VALUES ('$nama', '$pesan')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pengaduan berhasil dikirim!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
