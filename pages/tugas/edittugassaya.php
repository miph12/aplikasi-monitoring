<style type="text/css">
  table#dataTable td {
padding-right: 18px; 
  }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Tugas Saya
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Edit Tugas Saya</li>
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
                $lihat = mysqli_query($conek, "SELECT * FROM anggota, tugas, monitoring where anggota.id_anggota = monitoring.kode_anggota and tugas.id_tugas = monitoring.kode_tugas and monitoring.id_monitoring = '$id' ");
                $data = mysqli_fetch_array($lihat);
                 ?>
                <form role="form" action="" method="POST" >
                  <div class="box-body" >
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <input type="hidden" value=" <?php echo $data['id_monitoring']; ?> " name="id_monitoring" >
                        <label for="nama_anggota">Nama Anggota</label>
                        <input type="text" class="form-control "  readonly name="nama_anggota" id="nama_anggota" value="<?php echo $data['nama_anggota']; ?> ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6 ">
                        <label for="bagian">Bagian</label>
                        <input type="text" value="<?php echo $data['bagian']; ?>" id="bagian" readonly name="bagian" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="tugas">Tugas</label>
                        <input type="text" class="form-control" readonly name="tugas" id="tugas" value="<?php echo $data['nama_tugas']; ?> " >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status"  >
                        <option <?php echo $data['status']; ?> ><?php echo $data['status']; ?></option>
                        <option value="Belum Selesai" >Belum Selesai</option>
                        <option value="Proses" >Proses</option>
                        <option value="Selesai" >Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="keterangan" class="control-label">Keterangan</label>
                        <input class="form-control" id="keterangan" required name="keterangan" value=" <?php echo $data['keterangan']; ?> " >
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
  $id_monitoring    = $_POST['id_monitoring'];
  $status           = $_POST['status'];
  $keterangan       = $_POST['keterangan'];
  
  
    $sim =  "UPDATE monitoring set status = '$status', keterangan = '$keterangan'
              where id_monitoring = '$id_monitoring' ";
    $simpan = $conek->query($sim);
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Dirubah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Dirubah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tugas/tugas_saya">';
    }  else {
      echo '<script>windows.history.back()</script>';
      }
    ?>

