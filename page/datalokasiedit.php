<?php 
require "koneksi.php";
$button = $_POST['button'];
$id = $_POST['id_mhs'];
$kode_lokasi = $_POST['kode_lokasi'];
$nama_lokasi = $_POST['nama_lokasi'];

if ($button	== "Update") {
	mysqli_query($koneksi,"UPDATE data_lokasi SET nama_lokasi='$nama_lokasi' WHERE kode_lokasi='$id' ");
	header("location: http://localhost/invent/index.php?page=data-lokasi");	
}

if ($button=="Tambah") {
	mysqli_query($koneksi, "INSERT INTO data_lokasi (kode_lokasi, nama_lokasi) 
		VALUES ('$kode_lokasi', '$nama_lokasi')");
	header("location: http://localhost/invent/index.php?page=data-lokasi");
}

 ?>