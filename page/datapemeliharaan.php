<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading"><h3>Data Pemeliharaan Aset</h3></div>
      <div class="panel-body">
        <div style="text-align: right; margin-bottom: 10px">
          <a data-toggle="modal" data-target="#myModall" ><input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Data"></a>
          <a href="page/datapemeliharaanlaporan.php" target="_blank"><span class="icon-box btn btn-primary mt-2 mt-xl-0"><span class="icons icon-printer"></span></span></a>
        </div>
        <div class="responsive-table">
          <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="vertical-align : middle; text-align: center; width: 100px " >Kode Aset</th>
                <!-- <th style="vertical-align : middle; text-align: center " >Kategori</th> -->
                <th style="vertical-align : middle; text-align: center;" >Nama</th>
                <!-- <th style="vertical-align : middle; text-align: center; width: 50px " >Jumlah</th> -->
                <th style="vertical-align : middle; text-align: center; width: 70px " >Biaya</th>
                <th style="vertical-align : middle; text-align: center; width: 50px " >Lokasi</th>
                <th style="vertical-align : middle; text-align: center; width: 80px" >Tanggal Rusak</th>
                <th style="vertical-align : middle; text-align: center; width: 100px" >Aksi</th>                       
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = $koneksi->query("select * from data_pemeliharaan");
              while ($data = $sql->fetch_assoc()) {
                $x = $data['kode_aset'];
                $y = $data['kode_lokasi'];
                $nama = $koneksi->query("select * from data_aset where kode_aset='$x'")->fetch_assoc();
                $lokasi = $koneksi->query("select * from data_lokasi where kode_lokasi='$y'")->fetch_assoc();
                ?>
                <tr>

                  <td><?php echo $data['kode_aset']; ?></td>
                  <td><?php echo $nama['nama_aset']; ?></td>
                  <td><?php echo "Rp. ".$data['biaya_perbaiki']; ?></td>
                  <td><?php echo $lokasi['nama_lokasi']; ?></td>
                  <td><?php echo $data['tanggal_rusak']; ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a name="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['kode_pemeliharaan']; ?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Data Akan Dihapus, Anda Yakin?')" href="?page=data-pemeliharaan-hapus&id=<?php echo $data['kode_pemeliharaan']; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

                <!-- edit modal -->
                <div class="modal fade" id="myModal<?php echo $data['kode_pemeliharaan']; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Pemeliharaan Aset</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="page/datapemeliharaanedit.php" method="POST">                               
                          <input type="hidden" name="id_mhs" value="<?php echo $data['kode_pemeliharaan']; ?>">

                          <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode_aset" class="form-control" required value="<?php echo $data['kode_aset']; ?>">      
                          </div>

                          <div class="form-group">
                            <label>Biaya</label>
                            <input type="text" name="biaya_perbaiki" class="form-control" value="<?php echo $data['biaya_perbaiki']; ?>" required onkeypress="return Angka(event)" placeholder="Hanya angka">      
                          </div>

                          <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control"  name="nama_lokasi" required>
                              <option value="<?php echo $lokasi['nama_lokasi'];?>" selected><?php echo $lokasi['nama_lokasi'];?></option>
                              <?php 
                              $lok = $koneksi->query("select * from data_lokasi");
                              while ($loka = mysqli_fetch_assoc($lok)) { ?>
                               <option value="<?php echo $loka['nama_lokasi']; ?>"><?php echo $loka['nama_lokasi']; ?></option>
                               <?php 
                             }
                             ?>
                           </select>
                         </div>

                         <div class="form-group">
                          <label>Tanggal Rusak</label>
                        </div>                     
                        <div class="form-group">
                           <input type="date" name="tanggal_rusak" class="datetime form-control" max="<?php echo date('Y-m-d'); ?>" required style="margin-top: -15px; margin-bottom:20px; width: 300px">
                        </div>

                        <div class="modal-footer">  
                          <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Update" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>


                      </form>
                    </div>
                  </div>

                </div>
              </div>




              <?php               
            } 
            ?>
          </tbody>
        </table>
      </div>

      <!-- modal tambah -->
      <div class="modal fade" id="myModall" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data Pemeliharaan Aset</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="page/datapemeliharaanedit.php" method="POST">                               
                <input type="hidden" name="id_mhs" >

                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_aset" class="form-control" id="kode_aset" required onkeyup="carikode();">      
                </div>

               <!--  <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_aset" class="form-control" id="nama_aset">      
                </div> -->

                <div class="form-group">
                  <label>Biaya</label>
                  <input type="text" name="biaya_perbaiki" class="form-control" required onkeypress="return Angka(event)" placeholder="Hanya angka">      
                </div>

                <div class="form-group">
                  <label>Lokasi</label>
                  <select class="form-control" name="nama_lokasi" required>
                    <option value="" >Pilih Lokasi</option>
                    <?php 
                    $lok = $koneksi->query("select * from data_lokasi");
                    while ($loka = mysqli_fetch_assoc($lok)) { ?>
                     <option value="<?php echo $loka['nama_lokasi']; ?>"><?php echo $loka['nama_lokasi']; ?></option>
                     <?php 
                   }
                   ?>
                 </select>
               </div>

               <div class="form-group">
                <label>Tanggal Rusak</label>
              </div>                     
              <div class="form-group">
                <input type="date" name="tanggal_rusak" class="datetime form-control" max="<?php echo date('Y-m-d'); ?>" required style="margin-top: -15px; margin-bottom:20px; width: 300px">
              </div>

              <div class="modal-footer">  
                <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>



            </form>
          </div>
        </div>

      </div>
    </div>



  </div>
</div>
</div>
</div>

</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
</script>


<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->

<!-- cari kode aset otomatis -->
<script type="text/javascript">
  function carikode(){
    var kode_aset = document.getElementById('kode_aset');
    if (kode_aset){
      $.ajax({
        type:'POST';
        url:'page/prosescari.php';
        data{
          kode = kode_aset,
        },
        success: function(response){
          $('#nama_aset').html(response);
        }
      });
    }
  }
</script>

<script type="text/javascript">
  $('.datetime').datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    yearRange: "c-100:c+10",
    dayNamesMin : [ "S", "M", "T", "W", "T", "F", "S" ]
  });
</script>
<script type="text/javascript">
  function Angka(evt){
    var charCode=(evt.which) ? 
    evt.which: event.keyCode
    if (charCode>31 && (charCode<48 || charCode >57))
      return false;
    return true;
  }
</script>

<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>