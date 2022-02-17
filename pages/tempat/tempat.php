 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tempat Acara
            <!-- <small>Monev DIKTI</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="index.php?page=pages/tempat/tempat">Tempat Acara</a></li>
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
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Tempat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                include("koneksi.php");
                // $cek = mysqli_query($conek, "SELECT * from kegiatan, jadwal  where kegiatan.kode = jadwal.kode_kegiatan   order by kegiatan.kode DESC  ");
                $cek = mysqli_query($conek, "SELECT * FROM tempat_acara ");
                $no=1;
                while ($data = mysqli_fetch_array($cek)) {
                 ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_tempat']; ?></td>
                        <td>
                          <a href="index.php?page=pages/tempat/edittempat&id=<?php echo $data['kode']; ?>" class="btn btn-xs btn-info" ><i class="fa fa-pencil" ></i></a> 
                          <a href="index.php?page=pages/tempat/tempat&delete=<?php echo $data['kode']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $no++; }  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

  <?php 
     function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}
?>


<div class="modal fade bs-example-modal-lg" tabindex="-1" id="Modaladddata" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <?php 
       $carikode = mysqli_query($conek, "SELECT kode from tempat_acara ") or die (mysqli_error());
      // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      $jumlah_data = mysqli_num_rows($carikode);
      // jika $datakode
      if ($datakode) {
       // membuat variabel baru untuk mengambil kode barang mulai dari 1
       $nilaikode = substr($jumlah_data[0], 1);
       // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
       // setiap $kode di tambah 1
       $kode = $jumlah_data + 1;
       // hasil untuk menambahkan kode 
       // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
       // atau angka sebelum $kode
       $kode_otomatis = "NT".str_pad($kode, 3, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis = "NT0001";
      }
         ?>
         <input type="text" name="kode" value="<?php echo $kode_otomatis ; ?>" >
          <div class="row" >
          <div class="form-group col-md-6">
            <label for="namakegiatan" class="control-label">Nama Tempat</label>
            <input type="text" class="form-control" name="nama_tempat" id="namakegiatan" >
          </div>
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
  $kode_otomatis    = $_POST['kode'];
  $nama_tempat      = $_POST['nama_tempat'];

  
    $sim =  "INSERT into tempat_acara (kode, nama_tempat) values ('$kode_otomatis','$nama_tempat') ";
    $simpan = $conek->query($sim);
    
     if($simpan){
                  echo "<script>alert('Data Berhasil Ditambah...!');</script>";
                }else {
                  echo "<script>alert('Data gagal Ditambah...!');</script>";
                }
  
      echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tempat/tempat">';
    }  else {
      echo '<script>windows.history.back()</script>';
    }
    

//delete data
            if(isset($_GET['delete'])){

              // include('koneksi.php');
             
              $delete = $_GET['delete'];
                $del = mysqli_query($conek, "DELETE FROM tempat_acara where kode = '$delete'");
                
             
              if ($del) {
                echo "<script>alert('Delete Data Berhasil ...!');</script>";
                echo '<meta http-equiv="refresh" content="0; index.php?page=pages/tempat/tempat">';
              }else {
                echo "<script>alert('Data Gagal Dihapus...!');</script>";
              echo '<script>windows.history.back()</script>';
            } 
          }
            else { echo "gagal" ; }

  ?>
