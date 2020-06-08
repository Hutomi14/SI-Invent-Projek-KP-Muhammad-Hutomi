<?php 
require "koneksi.php";
$button = $_POST['button'];
$id = $_POST['id_mhs'];
$kode_kategori = $_POST['kode_kategori'];
$nama_kategori = $_POST['nama_kategori'];

if ($button	== "Update") {
	mysqli_query($koneksi,"UPDATE data_kategori SET kode_kategori='$kode_kategori', nama_kategori='$nama_kategori' WHERE kode_kategori='$id' ");
	header("location: http://localhost/invent/index.php?page=data-kategori");	
}

if ($button=="Tambah") {
	mysqli_query($koneksi, "INSERT INTO data_kategori (kode_kategori, nama_kategori) 
		VALUES ('$kode_kategori', '$nama_kategori')");
	header("location: http://localhost/invent/index.php?page=data-kategori");
}

?>