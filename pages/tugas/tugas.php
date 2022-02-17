 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tugas
            <!-- <small>Monev DIKTI</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="index.php?page=pages/tugas/tugas">Tugas</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                  
                    <button class="btn btn-success" data-toggle="modal" data-target="#Modaladddata" >Tambah Data <i class="glyphicon glyphicon-plus"> </i></button>
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                  <a class="btn btn-warning" target="blank" href="pages/tugas/cetakpdf.php"> <i class="glyphicon glyphicon-print"> </i></a>

                </div><!-- /.box-header -->
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php 
                include("koneksi.php");
                // $cek = mysqli_query($conek, "SELECT * from kegiatan, jadwal  where kegiatan.kode = jadwal.kode_kegiatan   order by kegiatan.kode DESC  ");
                $cek = mysqli_query($conek, "SELECT * FROM tugas ");
                $no=1;
                while ($data = mysqli_fetch_array($cek)) {
                 ?>
                       <tr>
                         <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_tugas']; ?></td>
                        <td>
                          <a href="index.php?page=pages/tugas/edittugas&id=<?php echo $data['id_tugas']; ?>" class="btn btn-xs btn-info" ><i class="fa fa-pencil" ></i></a> 
                          <a href="index.php?page=pages/tugas/tugas&delete=<?php echo $data['id_tugas']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                     </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.0 -->
        </div>
        <strong>Copyright &copy; 2017 <a href="#"></a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    

<div class="modal fade " tabindex="-1" id="Modaladddata" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="" >
        
          <div class="form-group ">
            <label for="nama_tugas" class="control-label">Nama Tugas</label>
            <input class="form-control" id="nama_tugas" required name="nama_tugas" type="text">
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" required name="simpan" value="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
  include("koneksi.php") ;
  if (isset($_POST['simpan'])){
  $nama_tugas     = $_POST['nama_tugas'];
  
    $simpan = mysqli_query($conek, "INSERT into tugas (id_tugas, nama_tugas)
      values ('', '$nama_tugas') ");
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Ditambah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Ditambah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tugas/tugas">';
    
  } else {
      echo '<script>windows.history.back()</script>';
    }
    

//delete data
            if(isset($_GET['delete'])){

              // include('koneksi.php');
             
              $delete = $_GET['delete'];
                $del = mysqli_query($conek, "DELETE FROM tugas where id_tugas = '$delete'");
             
              if ($del) {
                echo "<script>alert('Delete Data Berhasil ...!');</script>";
                echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tugas/tugas">';
              }else {
                echo "<script>alert('Data Gagal Dihapus...!');</script>";
              echo '<script>windows.history.back()</script>';
            } 
          }
            else { echo "gagal" ; }

  ?>
