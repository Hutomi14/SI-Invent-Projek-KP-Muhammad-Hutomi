<?php
//include('dbconnected.php');
require "koneksi.php";

$button = $_POST['button'];

//$button = $_GET['button'];
$tgl_input = date('Y-m-d');

$id = $_POST['id_mhs'];
$kode = $_POST['kode_aset'];
$str = str_replace(".","",$kode);
echo $str;
$nama = $_POST['nama_aset'];
$jumlah = $_POST['jumlah_aset'];
$jumlahh = $_POST['jumlah_asett'];
$harga = $_POST['harga'];
$kategori = $_POST['nama_kategori'];
$lokasi = $_POST['nama_lokasi'];
$kodeh = $_SESSION['kode_user'];

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


if ($button=="Add") {
	mysqli_query($koneksi, "INSERT INTO data_aset (kode_aset, nama_aset, jumlah_aset, harga, tanggal_input, nama_kategori, kode_user) 
		VALUES ('$kode', '$nama', '$jumlah', '$harga', '$tgl_input', '$kategori','$kodeh')");
	header("location: http://localhost/invent/index.php?page=data-aset");
}


//query update
if ($button	== "Update") {
	mysqli_query($koneksi,"UPDATE data_aset SET kode_aset='$kode', nama_aset='$nama', jumlah_aset='$jumlah', harga='$harga' , nama_kategori='$kategori' WHERE kode_aset='$kode' ");
	header("location: http://localhost/invent/index.php?page=data-aset");	
}


// simpan distri
$kat = mysqli_query($koneksi,"SELECT * from data_kategori where nama_kategori='$kategori'");
$kate = mysqli_fetch_assoc($kat);
$katee=$kate['kode_kategori'];
// echo $katee;

$cek = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='$kode_lokasi'");
$jum = mysqli_num_rows($cek);
echo $jum ." ". $kode ." ". $str;;

if ($button=="Simpan" && $jum>0) {
	mysqli_query($koneksi,"UPDATE kelola_aset SET jumlah='$jumlahh' where kode_aset='$kode' and kode_lokasi='$kode_lokasi' ");
	header("location: http://localhost/invent/index.php?page=data-aset");
	
	// echo $jumlahh;
}
else{
	mysqli_query($koneksi, "INSERT INTO kelola_aset (kode_aset, kode_lokasi, kode_kategori, jumlah) 
		VALUES ('$kode', '$kode_lokasi', '$katee', '$jumlahh')");
	header("location: http://localhost/invent/index.php?page=data-aset");
	
}



//mysql_close($host);
?>