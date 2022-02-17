<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Jadwal Kegiatan
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Tambah Jadwal Kegiatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Quick Example</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php 
                include("koneksi.php");
                $id_anggota = $_GET['id_anggota'];
                $lihat = mysqli_query($conek, "select * from anggota where id_anggota = '$id_anggota' ");
                $data = mysqli_fetch_array($lihat);
                 ?>
                <form role="form" action="" method="POST">
                  <div class="box-body" >
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <input type="hidden" value="<?php echo $data['id_anggota']; ?>" name="id_anggota" >
                        <p> <label for="nama_anggota">Nama Anggota</label>
                        <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Modaladddata" >Cari Data <i class="glyphicon glyphicon-search"> </i></button>
                        <input type="text" class="form-control " value="<?php echo $data['nama_anggota']; ?>" name="nama_anggota" readonly id="nama_anggota" >
                      </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <label for="bagian">Devisi</label>
                        <input id="bagian" name="bagian" type="text" value="<?php echo $data['bagian']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                <?php 
                $id_tugas = $_GET['id_tugas'];
                $lihat = mysqli_query($conek, "select * from tugas where id_tugas = '$id_tugas' ");
                $data1 = mysqli_fetch_array($lihat);
                 ?>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nama_tugas" class="control-label">Tugas</label>
                        <input type="hidden" value="<?php echo $data1['id_tugas']; ?>" name="id_tugas" >
                        <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modaltugas" >Cari Data <i class="glyphicon glyphicon-search"> </i></button>
                        <input class="form-control" id="nama_tugas" value="<?php echo $data1['nama_tugas']; ?>" required name="nama_tugas" type="text">
                      </div><!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                  </div>
                </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



<div class="modal fade " tabindex="-1" id="modaltugas"  role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Data Tugas</h4>
      </div>
      <div class="modal-body">
        <table id="exampe1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Tugas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $no=1;
          $ambil = mysqli_query($conek,"SELECT * from tugas ");

          while ($a1 = mysqli_fetch_array($ambil)) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $a1['nama_tugas']; ?></td>
              <td><a href="index.php?page=pages/pembagian/tambahpembagian&id_anggota=<?=$_GET['id_anggota'];?>&id_tugas=<?php echo $a1['id_tugas']; ?>" class="btn btn-default "><i class="glyphicon glyphicon-ok"> Pilih</i></a></td>
              
            </tr>
          <?php } ?>
         </tbody>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" required name="simpan" value="Simpan">
        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade " tabindex="-1" id="Modaladddata" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <table id="exampe1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Anggota</th>
              <th>Devisi</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $no=1;
          $ambil = mysqli_query($conek,"SELECT * from anggota ");

          while ($a2 = mysqli_fetch_array($ambil)) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $a2['nama_anggota']; ?></td>
              <td><?php echo $a2['bagian']; ?></td>
              <td><?php echo $a2['email']; ?></td>
              <td><a href="index.php?page=pages/pembagian/tambahpembagian&id_anggota=<?php echo $a2['id_anggota']; ?>" class="btn btn-default "><i class="glyphicon glyphicon-ok"> Pilih</i></a></td>
            </tr>
          <?php } ?>
         </tbody>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" required name="simpan" value="Simpan">
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
 if (isset($_POST['simpan'])){
  $id_anggota     = $_POST['id_anggota'];
  $id_tugas       = $_POST['id_tugas'];
  
    $simpan = mysqli_query($conek, "INSERT into monitoring (id_monitoring, kode_anggota, kode_tugas, status )
      values ('', '$id_anggota', '$id_tugas', 'Belum Selesai') ");
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Ditambah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Ditambah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/pembagian/pembagian">';
    
  } else {
      echo '<script>windows.history.back()</script>';
    }
    

 ?>