<?php 
require "koneksi.php";
$button = $_POST['button'];
$id = $_POST['id_mhs'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = "admin";


if ($button=="Tambah") {
	mysqli_query($koneksi, "INSERT INTO data_user VALUES ('$kode_user', '$nama_user','$level', '$username', '$password')");
	header("location: http://localhost/invent/index.php?page=data-user");
	// echo $kode_user." ".$nama_user." ".$level." ".$username." ".$password;

}

if ($button = "Update") {
	mysqli_query($koneksi,"UPDATE data_user SET nama_user='$nama_user', username='$username', password='$password' WHERE kode_user='$id'");
	header("location: http://localhost/invent/index.php?page=data-user");
}






?>