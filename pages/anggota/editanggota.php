<style type="text/css">
  table#dataTable td {
padding-right: 18px; 
  }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Anggota
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Edit Anggota</li>
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
                $lihat = mysqli_query($conek, "select * from anggota where id_anggota = '$id' ");
                $data = mysqli_fetch_array($lihat);
                 ?>
                <form role="form" action="" method="POST" >
                  <div class="box-body" >
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <input type="hidden" value=" <?php echo $data['id_anggota']; ?> " name="id_anggota" >
                        <label for="nama_anggota">Nama Anggota</label>
                        <input type="text" class="form-control "  name="nama_anggota" id="nama_anggota" value="<?php echo $data['nama_anggota']; ?> ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <label for="bagian">bagian</label>
                        <select id="bagian" name="bagian" class="form-control">
                        <option value="<?php echo $data['bagian']; ?>"><?php echo $data['bagian']; ?></option>
                         <?php 
                          $cek = mysqli_query($conek, "SELECT * FROM devisi ");
                          while ($dasa = mysqli_fetch_array($cek)) {
                            
                           ?>
                          <option value="<?php echo $dasa['nama_devisi']; ?>"><?php echo $dasa['nama_devisi'] ;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?> " >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="<?php echo $data['password']; ?> " >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="no_hp" class="control-label">No Hp</label>
                        <input class="form-control" id="no_hp" required name="no_hp" value=" <?php echo $data['no_hp']; ?> " >
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
  $id_anggota       = $_POST['id_anggota'];
  $nama_anggota     = $_POST['nama_anggota'];
  $devisi           = $_POST['bagian'];
  $email            = $_POST['email'];
  $password         = $_POST['password'];
  $no_hp            = $_POST['no_hp'];

  
    $sim =  "UPDATE anggota set nama_anggota = '$nama_anggota', bagian = '$devisi', email = '$email', password = '$password', no_hp = '$no_hp' 
              where id_anggota = '$id_anggota' ";
    $simpan = $conek->query($sim);
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Dirubah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Dirubah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/anggota/anggota">';
    }  else {
      echo '<script>windows.history.back()</script>';
      }
    ?>

