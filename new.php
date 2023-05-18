<?php
$query = "SELECT harga FROM fasilitas_kamar WHERE id_kamar = $id_kamar";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$harga_kamar = $row['harga'];
?>
