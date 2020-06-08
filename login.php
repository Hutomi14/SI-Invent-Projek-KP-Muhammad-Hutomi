<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link href="asset/css/stylee.css" rel="stylesheet">
</head>
<body>
 
	
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

	
 
	<div class="kotak_login">
		<center>
		<img src="asset/img/logokppn.png" style="width: 200px">
	</center>
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
			
		</form>
		
	</div>
 
 
</body>
</html>