<?php
//include('dbconnected.php');
include "koneksi.php";

$button = $_POST['button'];

//$button = $_GET['button'];
$tgl_input = date('Y-m-d');

$id = $_POST['id_mhs'];
$kode = $_POST['kode_aset'];

$biaya = $_POST['biaya_perbaiki'];

$lokasi = $_POST['nama_lokasi'];
$tanggal_rusak = $_POST['tanggal_rusak'];

if ($lokasi=="MSKI") {
	$kode_lokasi = 1;
}
else if ($lokasi=="PD") {
	$kode_lokasi = 2;
}
else if ($lokasi=="VERA") {
	$kode_lokasi = 3;
}
else if ($lokasi=="BAGIAN UMUM") {
	$kode_lokasi = 4;
}
else {
	$kode_lokasi = 5;
}





if ($button	== "Tambah") {
	mysqli_query($koneksi, "INSERT INTO data_pemeliharaan (kode_aset, kode_lokasi, biaya_perbaiki, tanggal_rusak) 
		VALUES ('$kode', '$kode_lokasi', '$biaya', '$tanggal_rusak')");
	header("location: http://localhost/invent/index.php?page=data-pemeliharaan");
}

//query update
if ($button	== "Update") {
	mysqli_query($koneksi,"UPDATE data_pemeliharaan SET kode_aset='$kode', kode_lokasi='$kode_lokasi', biaya_perbaiki='$biaya', tanggal_rusak='$tanggal_rusak' where kode_pemeliharaan='$id' ");
	header("location: http://localhost/invent/index.php?page=data-pemeliharaan");	
}



//mysql_close($host);
?>