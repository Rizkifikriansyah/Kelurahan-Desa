<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query($conn, "UPDATE pengaduan 
                     SET status='Selesai' 
                     WHERE id='$id'");

header("Location: pengaduan.php");

?>