<?php 
//Tambahkan Koneksi Databases
include '../koneksi.php';

//menerima data dari form
$id_kamar = $_POST['id_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];

//mengirim ke databases
mysqli_query($koneksi, "insert into fasilitas_kamar values('','$id_kamar','$fasilitas', '$harga')");

//Sesudah Menginput Di alihkan Ke halaman index
header("location:fasilitas.php");
?>
