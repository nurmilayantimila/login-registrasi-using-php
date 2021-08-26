<?php
include "server.php";
$id=$_GET['id'];
$sql = "DELETE FROM user WHERE id='$id'";
$hasil_query = mysqli_query($conn, $sql);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='view.php';</script>";
    }
?>