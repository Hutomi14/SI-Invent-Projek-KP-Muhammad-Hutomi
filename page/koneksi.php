<?php
$host	="localhost"; //host server
$user	="root"; //user login phpMyAdmin
$pass	=""; //pass login phpMyAdmin
// $db		="db_aset"; //nama database
$db 	= "siaset";
$koneksi 	= mysqli_connect($host, $user, $pass, $db) or die ("Koneksi gagal");

?>