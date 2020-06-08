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
		<img src="../asset/img/kopperawatan.png">
	</div>

	<div style="font-size: 7px">
		 <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
            <thead>
              <tr>
              	<th style="vertical-align : middle; text-align: center; width: 10px " >No</th>
                <th style="vertical-align : middle; text-align: center; width: 100px " >Kode Aset</th>
                <!-- <th style="vertical-align : middle; text-align: center " >Kategori</th> -->
                <th style="vertical-align : middle; text-align: center;" >Nama</th>
                <!-- <th style="vertical-align : middle; text-align: center; width: 50px " >Jumlah</th> -->
                <th style="vertical-align : middle; text-align: center; width: 70px " >Biaya</th>
                <th style="vertical-align : middle; text-align: center; width: 50px " >Lokasi</th>
                <th style="vertical-align : middle; text-align: center; width: 80px" >Tanggal Rusak</th>
                               
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              $sql = $koneksi->query("select * from data_pemeliharaan");
              while ($data = $sql->fetch_assoc()) {
                $x = $data['kode_aset'];
                $y = $data['kode_lokasi'];
                $nama = $koneksi->query("select * from data_aset where kode_aset='$x'")->fetch_assoc();
                $lokasi = $koneksi->query("select * from data_lokasi where kode_lokasi='$y'")->fetch_assoc();
                ?>
                <tr>
                	<td><?php echo $i++; ?></td>
                  <td><?php echo $data['kode_aset']; ?></td>
                  <td><?php echo $nama['nama_aset']; ?></td>
                  <td><?php echo "Rp. ".$data['biaya_perbaiki']; ?></td>
                  <td><?php echo $lokasi['nama_lokasi']; ?></td>
                  <td><?php echo $data['tanggal_rusak']; ?></td>
                 


              <?php               
            } 
            ?>
          </tbody>
        </table>
        <div style="margin-top: 300px">
        <div style="font-size: 15px; font-family: serif; margin-left: 65%; margin-top: 20px">
        <p style="margin-bottom: 100px">Lhokseumawe, <?php echo date('d F Y'); ?> <br> Kepala Bagian Umum</p>
        <p  style="margin-bottom: 40px">Muhammad Soleh</p>
      </div>
    </div>

	</div>
</body>
<script >
	window.print();
</script>
</html>