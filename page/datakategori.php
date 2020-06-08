<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading"><h3>Data Kategori Aset</h3></div>
      <div class="panel-body">
        <a style="margin-bottom: 10px; margin-left:88%" data-toggle="modal" data-target="#myModall" ><input style="margin-bottom: 10px" class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Data"></a>
        <div class="responsive-table">
          <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="vertical-align : middle; text-align: center; width: 100px " >Kode Kategori</th>
                <!-- <th style="vertical-align : middle; text-align: center " >Kategori</th> -->
                <th style="vertical-align : middle; text-align: center;" >Nama Kategori</th>
                <!-- <th style="vertical-align : middle; text-align: center; width: 50px " >Jumlah</th> -->
                
                <th style="vertical-align : middle; text-align: center; width: 100px" >Aksi</th>                       
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = $koneksi->query("select * from data_kategori");
              while ($data = $sql->fetch_assoc()) {

                ?>
                <tr>

                  <td><?php echo $data['kode_kategori']; ?></td>
                  <td><?php echo $data['nama_kategori']; ?></td>
                  
                  <td>
                    <!-- Button untuk modal -->
                    <?php 
                    $kode_kategori = $data['kode_kategori'];
                    $str = str_replace(".","",$kode_kategori); ?>
                    <a name="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $str; ?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Data Akan Dihapus, Anda Yakin?')" href="?page=data-kategori-hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

                <!-- edit modal -->
                <div class="modal fade" id="myModal<?php echo $str; ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Kategori Aset</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="page/datakategoriedit.php" method="POST">     

                         <?php
                         $id = $data['kode_kategori'];
                         $query_edit = $koneksi->query("select * from data_kategori where kode_kategori='$id'");
                        //$result = mysqli_query($conn, $query);
                         $row = $query_edit->fetch_assoc() ; 
                                  // echo $str;
                         ?>

                         <input type="hidden" name="id_mhs" value="<?php echo $row['kode_kategori']; ?>">

                         <div class="form-group">
                          <label>Kode Kategori</label>
                          <input type="text" name="kode_kategori" class="form-control" required value="<?php echo $row['kode_kategori']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Nama Kategori</label>
                          <input type="text" name="nama_kategori" class="form-control" value="<?php echo $row['nama_kategori']; ?>" required >      
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
              <h4 class="modal-title">Tambah Data Kategori Aset</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="page/datakategoriedit.php" method="POST">                               
                <input type="hidden" name="id_mhs" value="<?php echo $data['id']; ?>">

                <div class="form-group">
                  <label>Kode Kategori</label>
                  <input type="text" name="kode_kategori" class="form-control" required value="<?php echo $data['kode_kategori']; ?>">      
                </div>

                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data['nama_kategori']; ?>" required >      
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
    var kode_aset = $("#kode_aset").val();
    $.ajax({
      url:'prosecari.php';
      data:"kode_aset"+kode_aset
    }).success(function(data){
      var json = data,
      obj =JSON.parse(json);
      $('#nama_aset').val(obj.nama_aset);
    });
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