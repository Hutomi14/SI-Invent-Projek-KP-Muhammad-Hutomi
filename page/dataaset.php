        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Data Aset</h3></div>
              <div class="panel-body">
                <div style="text-align: right; margin-bottom: 10px">
                  <a data-toggle="modal" data-target="#myModall" ><input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Data"></a>
                  <a href="page/dataasetlaporan.php" target="_blank"><span class="icon-box btn btn-primary mt-2 mt-xl-0"><span class="icons icon-printer"></span></span></a>
                </div>
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center " >Kode</th>
                        <th style="vertical-align : middle; text-align: center " >Kategori</th>
                        <th style="vertical-align : middle; text-align: center; width: 200px" >Nama</th>
                        <th style="vertical-align : middle; text-align: center; width: 50px " >Jumlah</th>
                        <th style="vertical-align : middle; text-align: center; width: 50px " >Stok</th>
                        <th style="vertical-align : middle; text-align: center; width: 50px " >Harga</th>
                        <th style="vertical-align : middle; text-align: center; width: 80px" >Tanggal Input</th>
                        <th style="vertical-align : middle; text-align: center; width: 220px" >Aksi</th>                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                      $sql = $koneksi->query("select * from data_aset");
                      while ($data = $sql->fetch_assoc()) {
                        ?>
                        <tr>

                          <td><?php echo $data['kode_aset']; ?></td>
                          <td><?php echo $data['nama_kategori']; ?></td>
                          <td><?php echo $data['nama_aset']; ?></td>
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

                            $str = str_replace(".","",$kode_aset);
                            // echo $str;

                            ?>
                          </td>
                          <td><?php echo $data['harga']; ?></td>
                          <td><?php echo $data['tanggal_input']; ?></td>
                          <td>
                            <!-- Button untuk modal -->
                            <a name="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?php echo $data['jumlah_aset']; ?>"><i class="fa fa-edit"></i></a>
                            <a name="distribusi" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaldistribusi<?php echo $data['jumlah_aset']; ?>"><i class="fa fa-share-alt-square"></i></a>
                            <a name="detail" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModaldetail<?php echo $data['jumlah_aset']; ?>"><i class="fa fa-info-circle"></i></a>
                            <a onclick="return confirm('Data Akan Dihapus, Anda Yakin?')" href="?page=data-aset-hapus&id=<?php echo $data['kode_aset']; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <!-- edit modal -->
                        <div class="modal fade" id="myModaledit<?php echo $data['jumlah_aset']; ?>" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Data Aset</h4>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/dataasetedit.php" method="POST">

                                  <?php
                                  $id = $data['kode_aset'];
                                  $query_edit = $koneksi->query("select * from data_aset where kode_aset='$id'");
                        //$result = mysqli_query($conn, $query);
                                  $row = $query_edit->fetch_assoc() ; 
                                  // echo $str;
                                  ?>

                                  <input type="hidden" name="id_mhs" value="<?php echo $row['kode_aset']; ?>">

                                  <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="kode_aset" class="form-control" required="required" value="<?php echo $row['kode_aset']; ?>">      
                                  </div>

                                  <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" required="required" name="nama_kategori">
                                      <?php 
                                      $kat = $koneksi->query("select * from data_kategori");
                                      while ($kate = mysqli_fetch_assoc($kat)) { ?>
                                       <option <?php if ($row['nama_kategori'] == $kate['nama_kategori']) {
                                         echo "selected";
                                       } ?> value="<?php echo $kate['nama_kategori']; ?>"><?php echo $kate['nama_kategori']; ?></option>
                                       <?php 
                                     }
                                     ?>
                                   </select>
                                 </div>

                                 <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="nama_aset" class="form-control" required="required" value="<?php echo $row['nama_aset']; ?>">      
                                </div>

                                <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" name="jumlah_aset" class="form-control" required="required" value="<?php echo $row['jumlah_aset']; ?>">      
                                </div>

                                <div class="form-group">
                                  <label>Harga</label>
                                  <input type="text" name="harga" class="form-control" required="required" value="<?php echo $row['harga']; ?>">      
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

                      <!-- modal distribusi -->
                      <div class="modal fade" id="myModaldistribusi<?php echo $data['jumlah_aset']; ?>" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Distribusi Aset</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="page/dataasetedit.php" method="POST">

                                <?php
                                $id = $data['kode_aset'];
                                $query_edit = $koneksi->query("select * from data_aset where kode_aset='$id'");
                        //$result = mysqli_query($conn, $query);
                                $row = $query_edit->fetch_assoc() ; 
                                ?>

                                <input type="hidden" name="id_mhs" value="<?php echo $row['kode_aset']; ?>">

                                <div class="form-group">
                                  <label>Kode</label>
                                  <input type="text" name="kode_aset" class="form-control" required="required" value="<?php echo $row['kode_aset']; ?>" readonly>      
                                </div>

                                <div class="form-group">
                                  <label>Kategori</label>
                                  <input type="text" name="nama_kategori" class="form-control" required="required" value="<?php echo $row['nama_kategori']; ?>" readonly>      
                                </div>

                                <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="nama_aset" class="form-control" required="required" value="<?php echo $row['nama_aset']; ?>" readonly>      
                                </div>

                                <div class="form-group">
                                  <label>Lokasi</label>
                                  <select class="form-control" required="required" name="nama_lokasi">
                                    <?php 
                                    $lok = $koneksi->query("select * from data_lokasi");
                                    echo "<option value='' disabled selected>Pilih Lokasi</option>";
                                    while ($loka = mysqli_fetch_assoc($lok)) { ?>
                                     <option value="<?php echo $loka['nama_lokasi']; ?>"><?php echo $loka['nama_lokasi']; ?></option>
                                     <?php 
                                   }
                                   ?>
                                 </select>
                               </div>

                               <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah_asett" class="form-control" required="required" max="<?php echo $stoktot; ?>">      
                              </div>


                              <div class="modal-footer">  
                                <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Simpan" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>


                            </form>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- modal detail -->
                    <div class="modal fade" id="myModaldetail<?php echo $data['jumlah_aset']; ?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Detail Aset</h4>
                          </div>
                          <div class="modal-body">
                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Kode</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo $row['kode_aset']; ?></div></div>

                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Kategori</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo $row['nama_kategori']; ?></div></div>

                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Nama Aset</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo $row['nama_aset']; ?></div></div>

                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Jumlah Aset</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo $row['jumlah_aset']; ?></div></div>

                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Stok</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo  $stoktot; ?></div></div>

                            <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Harga Aset</div></div>
                            <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo "Rp ".$row['harga']; ?></div></div>

                            <div class="tes" style="width: 20%; height: 180px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 90px">Lokasi</div><div style="margin-top: 90px; color: white">Lokasi</div></div>
                            <div class="tess" style="width: 79%; height: 180px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px; margin-top: -90px">
                              <?php 
                              $kode = $row['kode_aset'];
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

                              $bank = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='5'");
                              $bankjum = mysqli_fetch_assoc($bank)['jumlah'];
                              if (!isset($bankjum)) {
                                $bankjum=0;
                              }

                              $bu = mysqli_query($koneksi,"SELECT * from kelola_aset where kode_aset='$kode' and kode_lokasi='4'");
                              $bujum = mysqli_fetch_assoc($bu)['jumlah'];
                              if (!isset($bujum)) {
                                $bujum=0;
                              }

                              
                              ?>
                              <div style="margin-top: 15px; margin-left: 10px; color: black">1. MSKI: <?php echo $mskijum." unit"; ?></div>
                              <div style="margin-top: 15px; margin-left: 10px; color: black">2. PD: <?php echo $pdjum." unit"; ?></div>
                              <div style="margin-top: 15px; margin-left: 10px; color: black">3. VERA: <?php echo $verajum." unit"; ?></div>
                              <div style="margin-top: 15px; margin-left: 10px; color: black">4. BAGIAN UMUM: <?php echo $bujum." unit"; ?></div>
                              <div style="margin-top: 15px; margin-left: 10px; color: black">5. BANK: <?php echo $bankjum." unit"; ?></div>
                              <div style="margin-top: 15px; margin-left: 10px; color: white">1. </div>
                              <div style="margin-top: 0px; margin-left: 10px; color: white">1. </div>
                            </div>

                            <div style="margin-top: -37px">
                              <div class="tes" style="width: 20%; height: 50px; border:1px solid gray;background-color: #f5f5f5; display: inline-block; color: black; text-align: center;"><div style="margin-top: 15px">Tanggal Input</div></div>
                              <div class="tess" style="width: 79%; height: 50px;border:1px solid gray; background-color: #ffffff;display: inline-block;margin-left: -3px"><div style="margin-top: 15px; margin-left: 10px; color: black"><?php echo $row['tanggal_input']; ?></div></div>
                            </div>




                            <div class="modal-footer">  
                              <button type="button" class="btn btn-primary mt-2 mt-xl-0" data-dismiss="modal">Close</button>
                            </div>



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
                    <h4 class="modal-title">Tambah Data Aset</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="page/dataasetedit.php" method="POST">

                      <input type="hidden" name="id_mhs">

                      <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode_aset" class="form-control" required="required" >      
                      </div>

                      <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" required="required" name="nama_kategori">
                          <?php 
                          $kat = $koneksi->query("select * from data_kategori");
                          echo "<option value='' disabled selected>Pilih kategori</option>";
                          while ($kate = mysqli_fetch_assoc($kat)) { ?>
                           <option value="<?php echo $kate['nama_kategori']; ?>"><?php echo $kate['nama_kategori']; ?></option>
                           <?php 
                         }
                         ?>
                       </select>
                     </div>

                     <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama_aset" class="form-control" required="required" >      
                    </div>

                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" name="jumlah_aset" class="form-control" required="required" >      
                    </div>

                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" name="harga" class="form-control" required="required" >      
                    </div>

                    <div class="modal-footer">  
                      <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Add" />
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
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
