 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Monitoring
            <!-- <small>Monev DIKTI</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="index.php?page=pages/pembagian/pembagian">Monitoring</a></li>
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
                  
                    <!-- <a class="btn btn-success" href="index.php?page=pages/pembagian/tambahpembagian" >Tambah Data <i class="glyphicon glyphicon-plus"> </i></a> -->
                  
                  <!-- <a class="btn btn-warning" target="blank" href="pages/devisi/cetakpdf.php"> <i class="glyphicon glyphicon-print"> </i></a> -->

                </div><!-- /.box-header -->
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Devisi</th>
                        <th>Tugas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php 
                include("koneksi.php");
                // $cek = mysqli_query($conek, "SELECT * from kegiatan, jadwal  where kegiatan.kode = jadwal.kode_kegiatan   order by kegiatan.kode DESC  ");
                $cek = mysqli_query($conek, "SELECT * FROM anggota, tugas, monitoring where anggota.id_anggota = monitoring.kode_anggota and tugas.id_tugas = monitoring.kode_tugas ");
                $no=1;
                while ($data = mysqli_fetch_array($cek)) {

                if ($data['status'] == 'Belum Selesai' ) {
                  $tampil = "<label class='btn btn-warning'><i class='glyphicon glyphicon-lock'></i> Belum Selesai </label> ";
                } elseif ($data['status'] == 'Proses' ) {
                  $tampil = "<label class='btn btn-info'><i class='glyphicon glyphicon-refresh'></i> Proses </label> ";
                } else {
                  $tampil = "<label class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Selesai </label> ";
                }

                 ?>
                       <tr>
                         <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_anggota']; ?></td>
                        <td><?php echo $data['bagian']; ?></td>
                        <td><?php echo $data['nama_tugas']; ?></td>
                        <td>
                          <?php echo $tampil; ?>
                        </td>
                        <td><?php echo $data['keterangan']; ?></td>
                        
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
    


<?php
  include("koneksi.php") ;
 
//delete data
            if(isset($_GET['delete'])){

              // include('koneksi.php');
             
              $delete = $_GET['delete'];
                $del = mysqli_query($conek, "DELETE FROM devisi where id_devisi = '$delete'");
             
              if ($del) {
                echo "<script>alert('Delete Data Berhasil ...!');</script>";
                echo '<meta http-equiv="refresh" content="0; index.php?page=pages/devisi/devisi">';
              }else {
                echo "<script>alert('Data Gagal Dihapus...!');</script>";
              echo '<script>windows.history.back()</script>';
            } 
          }
            else { echo "gagal" ; }

  ?>
