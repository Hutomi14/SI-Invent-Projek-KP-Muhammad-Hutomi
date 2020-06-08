        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Data Aset PD</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center " >Kode</th>
                        <th style="vertical-align : middle; text-align: center " >Kategori</th>
                        <th style="vertical-align : middle; text-align: center; width: 300px" >Nama</th>
                        <th style="vertical-align : middle; text-align: center; width: 50px " >Jumlah</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      // $kode = $koneksi->query("select * from kelola_aset where kode_lokasi='1' ");
                      $kode = $koneksi->query("SELECT data_aset.kode_aset,  data_aset.nama_aset, data_aset.nama_kategori, kelola_aset.jumlah FROM data_aset INNER JOIN kelola_aset ON data_aset.kode_aset = kelola_aset.kode_aset where kelola_aset.kode_lokasi='2'");
                      // $kode_aset = $kode->fetch_assoc()['kode_aset'];
                      // echo $kode_aset ;

                      // $sql = $koneksi->query("select * from data_aset where kode_aset='$kode_aset'");
                      while ($data = $kode->fetch_assoc()) {
                        ?>
                        <tr>

                          <td><?php echo $data['kode_aset']; ?></td>
                          <td><?php echo $data['nama_kategori']; ?></td>
                          <td><?php echo $data['nama_aset']; ?></td>
                          <td><?php echo $data['jumlah']; ?></td>
                          
                        </tr>
                        <!-- edit modal -->
                      <?php  } ?>
                    </tbody>
                  </table>
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
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#datatables-example').DataTable();
        });
      </script>
      <!-- end: Javascript -->
    </body>
    </html>