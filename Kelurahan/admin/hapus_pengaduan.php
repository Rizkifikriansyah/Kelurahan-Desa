<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pengaduan 
                     WHERE id='$id'");

header("Location: pengaduan.php");

?>