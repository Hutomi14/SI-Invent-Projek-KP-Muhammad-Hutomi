<?php 
include "koneksi.php";

$kode = $_POST['kode_aset'];
$lok = $koneksi->query("select * from data_aset where kode_aset='$kode");
$loka = mysqli_fetch_assoc($lok)['nama_aset'];

echo $loka;

?>