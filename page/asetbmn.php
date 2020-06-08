        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Aset Barang Milik Negara</h3></div>
              <div class="panel-body">
                <a data-toggle="modal" data-target="#myModal" ><input style="margin-bottom: 10px; margin-left:88%" class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Data" /></a>
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center; " rowspan="2">Kode</th>
                        <th style="vertical-align : middle; text-align: center; " rowspan="2">Kategori</th>
                        <th style="vertical-align : middle; text-align: center; width: 200px" rowspan="2">Nama</th>
                        <th style="vertical-align : middle; text-align: center; width: 50px " rowspan="2">Jumlah</th>
                        <!-- <th style="width: 50" rowspan="2">Satuan</th> -->
                        <th style="vertical-align : middle; text-align: center; width: 100px " rowspan="2">Harga</th>
                        <th style="vertical-align : middle; text-align: center; width: 100px" rowspan="2">Tanggal Input</th>
                        
                        <th style="vertical-align : middle; text-align: center; width: 200px" rowspan="2">Aksi</th>
                        
                        <!-- <th style="width: 50" rowspan="2">Input</th> -->
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sql = $koneksi->query("select * from data_aset");
                      while ($data = $sql->fetch_assoc()) {
                        ?>
                        <tr>

                          <td><?php echo $data['kode_aset']; ?></td>
                          <td><?php echo $data['kode_kategori']; ?></td>
                          <td><?php echo $data['nama-aset']; ?></td>
                          <td><?php echo $data['jumlah_aset']; ?></td>
                          <td><?php echo $data['harga']; ?></td>
                          <td><?php echo $data['tanggal_input']; ?></td>
                          <td><a href="<?php echo $data['id']; ?>">hh</a></td>


                          <td>
                            <!-- Button untuk modal -->
                            <a name="edit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"><i class="fa fa-edit"></i></a>
                            <a name="detil" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"><i class="fa fa-info-circle"></i></a>
                            <a onclick="return confirm('Data Akan Dihapus, Anda Yakin?')" href="?page=bmn-hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <!-- Modal Edit Mahasiswa-->
                        <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Data Aset</h4>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/editbmn.php" method="POST">

                                  <?php
                                  $id = $data['id'];;
                                  $query_edit = $koneksi->query("select * from tb_asetbmn where id='$id'");
                        //$result = mysqli_query($conn, $query);
                                  $row = $query_edit->fetch_assoc() ; 
                                  ?>

                                  <input type="hidden" name="id_mhs" value="<?php echo $row['id']; ?>">

                                  <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control" value="<?php echo $row['kode']; ?>">      
                                  </div>

                                  <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                                  </div>

                                  <div class="form-group">

                                    <label>Kondisi</label>
                                    <?php $status = $row['kondisi'];?>

                                    <select name="kondisi" class="form-control" value="<?php echo $row['kondisi']; ?>">
                                      <option <?php echo ($status == 'Normal') ? "selected": "" ?>>Normal</option>
                                      <option <?php echo ($status == 'Diperbaiki') ? "selected": "" ?>>Diperbaiki</option>
                                      <option <?php echo ($status == 'Rusak') ? "selected": "" ?>>Rusak</option>
                                    </select>     
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
                                  </div>

                                  <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" value="<?php echo $row['satuan']; ?>">      
                                  </div>

                                  <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">      
                                  </div>

                                  <div class="modal-footer">  
                                    <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Update" /></a>
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
              </div>
            </div>

            <!-- Modal tambah data-->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Aset</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="page/editbmn.php" method="POST">

                      <?php
                      $id = $data['id'];;
                      $query_edit = $koneksi->query("select * from data_aset where id='$id'");
                        //$result = mysqli_query($conn, $query);
                      $row = $query_edit->fetch_assoc() ; 
                      ?>

                      <input type="hidden" name="id_mhs" value="<?php echo $row['id']; ?>">

                      <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="<?php echo $row['kode']; ?>">      
                      </div>

                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                      </div>

                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
                      </div>

                      <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="<?php echo $row['satuan']; ?>">      
                      </div>

                      <div class="form-group">

                        <label>Kondisi</label>
                        <?php $status = $row['kondisi'];?>

                        <select name="kondisi" class="form-control" value="<?php echo $row['kondisi']; ?>">
                          <option <?php echo ($status == 'Normal') ? "selected": "" ?>>Normal</option>
                          <option <?php echo ($status == 'Diperbaiki') ? "selected": "" ?>>Diperbaiki</option>
                          <option <?php echo ($status == 'Rusak') ? "selected": "" ?>>Rusak</option>
                        </select>     
                      </div>

                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">      
                      </div>

                      <div class="modal-footer">  
                        <input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Add" /></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>


                    </form>
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
      </html>