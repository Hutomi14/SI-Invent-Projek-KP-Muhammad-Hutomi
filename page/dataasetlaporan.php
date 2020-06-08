<?php 
include "koneksi.php"
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/css/plugins/simple-line-icons.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/css/plugins/fullcalendar.min.css"/>
	<link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
	<link href="../asset/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../asset/css/stylee.css">
	<!-- end: Css -->

	<link rel="shortcut icon" href="../asset/img/logokppn.png">
</head>
<body>
	<div style="text-align: center">
		<img src="../asset/img/kopaset.png">
	</div>

	<div style="font-size: 7px">
		<table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">No</th>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">Kode</th>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">Kategori</th>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">Nama</th>

					<th style="vertical-align : middle; text-align: center; " rowspan="2">Harga</th>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">Jumlah</th>
					<th style="vertical-align : middle; text-align: center; " rowspan="2">Stok</th>
					<!-- <th style="vertical-align : middle; text-align: center; " rowspan="2">Tanggal Input</th> -->
					<th style="vertical-align : middle; text-align: center; " colspan="5">Lokasi (unit)</th>
					<tr>
						<td>MSKI</td>
						<td>PD</td>
						<td>VERA</td>
						<td>B. UMUM</td>
						<td>BANK</td>
					</tr>


				</tr>
			</thead>
			<tbody>
				
				
				<?php 
				$i =1;
				$sql = $koneksi->query("select * from data_aset");
				while ($data = $sql->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $data['kode_aset']; ?></td>
						<td><?php echo $data['nama_kategori']; ?></td>
						<td><?php echo $data['nama_aset']; ?></td>

						<td><?php echo $data['harga']; ?></td>
						<td><?php echo $data['jumlah_aset']; ?></td>
						<td>
							<?php 
							$kode_aset = $data['kode_aset'];
							$jumlah = $data['jumlah_aset'];
							$stok = $koneksi->query("select jumlah from kelola_aset where kode_aset='$kode_aset'");
							$stok1 = $stok->fetch_assoc()['jumlah']; 
							$stok2 = $stok->fetch_assoc()['jumlah']; 
							$stok3 = $stok->fetch_assoc()['jumlah']; 
							$stok4 = $stok->fetch_assoc()['jumlah']; 
							$stok5 = $stok->fetch_assoc()['jumlah']; 

							$stoktot = $jumlah - ($stok1 + $stok2 + $stok3 + $stok4 + $stok5);
							echo $stoktot;

							?>
							<!-- <td><?php echo $data['tanggal_input']; ?></td> -->
							<?php 
							$kode = $data['kode_aset'];
							$mski = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='1'");
							$mskijum = mysqli_fetch_assoc($mski)['jumlah'];
							if (!isset($mskijum)) {
								$mskijum=0;
							}

							$pd = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='2'");
							$pdjum = mysqli_fetch_assoc($pd)['jumlah'];
							if (!isset($pdjum)) {
								$pdjum=0;
							}

							$vera = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='3'");
							$verajum = mysqli_fetch_assoc($vera)['jumlah'];
							if (!isset($verajum)) {
								$verajum=0;
							}

							$bu = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='4'");
							$bujum = mysqli_fetch_assoc($bu)['jumlah'];
							if (!isset($bujum)) {
								$bujum=0;
							}

							$bank = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='5'");
							$bankjum = mysqli_fetch_assoc($bank)['jumlah'];
							if (!isset($bankjum)) {
								$bankjum=0;
							}
							?>
							<td><?php echo $mskijum; ?></td>
							<td><?php echo $pdjum; ?></td>
							<td><?php echo $verajum; ?></td>
							<td> <?php echo $bujum; ?></td>
							<td><?php echo $bankjum; ?></td>


						</tr>

						<?php               
					} 
					?>
				</tbody>
			</table>

			<div style="font-size: 15px; font-family: serif; margin-left: 65%; margin-top: 20px">
				<p style="margin-bottom: 100px">Lhokseumawe, <?php echo date('d F Y'); ?> <br> Kepala Bagian Umum</p>
				<p  style="margin-bottom: 40px">Muhammad Soleh</p>
			</div>

		</div>
	</body>
	<script >
		window.print();
	</script>
	</html>