<?php 
include "koneksi.php";

$get = $_GET['id'];
mysqli_query($koneksi, "DELETE from data_user where kode_user='$get'");

?>
<meta http-equiv="refresh" content="0.001;url=http://localhost/invent/index.php?page=data-user">