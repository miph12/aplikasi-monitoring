<style type="text/css">
  table#dataTable td {
padding-right: 18px; 
  }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Tugas
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Edit Tugas</li>
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
                  <!-- <h3 class="box-title">Quick Example</h3> -->
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <!-- form start -->
                  <?php 
                include("koneksi.php");
                $id = $_GET['id'];
                $lihat = mysqli_query($conek, "select * from tugas where id_tugas = '$id' ");
                $data = mysqli_fetch_array($lihat);
                 ?>
                <form role="form" action="" method="POST" >
                  <div class="box-body" >
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <input type="hidden" value=" <?php echo $data['id_tugas']; ?> " name="id_tugas" >
                        <label for="nama_tugas">Nama Tugas</label>
                        <input type="text" class="form-control "  name="nama_tugas" id="nama_tugas" value="<?php echo $data['nama_tugas']; ?> ">
                      </div>
                    </div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

 <?php
    include("koneksi.php") ;
    if (isset($_POST['simpan'])){
  $id_tugas       = $_POST['id_tugas'];
  $nama_tugas     = $_POST['nama_tugas'];
  
  
    $sim =  "UPDATE tugas set nama_tugas = '$nama_tugas'
              where id_tugas = '$id_tugas' ";
    $simpan = $conek->query($sim);
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Dirubah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Dirubah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tugas/tugas">';
    }  else {
      echo '<script>windows.history.back()</script>';
      }
    ?>

