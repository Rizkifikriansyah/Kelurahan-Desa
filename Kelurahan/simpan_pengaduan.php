<?php

include 'admin/db.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

$query = "INSERT INTO pengaduan(nama,pesan)
          VALUES('$nama','$pesan')";

mysqli_query($conn, $query);

echo "
<script>
alert('Pengaduan berhasil dikirim!');
window.location='user/index.php';
</script>
";

?>