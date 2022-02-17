
<html>
<head>
	<title>Cetak Surat Perijinan</title>
</head>
<style type="text/css">
.style01 {font-size: 25px; font-weight: bold; font-family: times; margin-top: 15px; margin-left: 50px;}
.style02 {font-size: 20px;  font-family: times; margin-top: -25px; margin-left: 120px;}
.style03 {font-size: 13px; font-weight: bold; text-decoration: underline; }
.nama{
    margin-left: 60px;
  }
.atas {
  margin-top: 20px;
  margin-left: 15px;
}
.gambar{
  margin-left: 10px;
  margin-top: -20px;
}
.isi{
  margin-left: 0px;
}
.bawah {
  margin-right: 20px;
  margin-top: -30px;
}
.kiri {
  margin-left: 400px;
}
</style>
<body>
  <div>
      <img class="gambar" style="margin-left: 150px;" src="logo.png" width="200">
      <p class="style01">Pondok Pesantren Salafiyah Syafi'iyah</p>
      <p class="style02">Sukorejo Situbondo Jawa Timur</p>
    
  <hr style="margin-top: -20px;" >
 <h3 style="margin-left: 150px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  SURAT IDZIN BEPERGIAN</h3><br>
 <h4 style="margin-top: -20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Nomor : 0828/ &nbsp;&nbsp;&nbsp;&nbsp;  /P2S2/B2a/1b/&nbsp;&nbsp;&nbsp;   /  </h4>

 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pondok Pesantren "Salafiyah Syafi'iyah" Sukorejo Situbondo Jawa Timur Memberi</p><br>
<p style="margin-top: -20px;" > idzin keluar kepada santri :</p>
 <?
// session_start();
include 'koneksi.php';
  $id = $_GET['id'];
  $lihat = mysqli_query($conek, "SELECT * FROM perijinan, asrama, santri where perijinan.id_santri = santri.id_santri and santri.asrama = asrama.id_asrama and perijinan.id_perijinan = '$id' ");
  $data = mysqli_fetch_array($lihat);
?>
 <table border="0">
   <tr>
      <td width="70" >Nama</td>
      <td width="3%">:</td>
      <td><?php echo $data['nama_santri'] ?></td>
   </tr>
   <tr>
      <td >Asrama</td>
      <td>:</td>
      <td><?php echo $data['nama_asrama'] ?></td>
   </tr>
   <tr>
      <td >Kepala Kamar</td>
      <td>:</td>
      <td><?php echo $data['kepala_kamar'] ?></td>
   </tr>
   <tr>
      <td >Kelas/Semester</td>
      <td>:</td>
      <td>Pagi : <?php echo $data['pend_pagi'] ?>, Sore : <?php echo $data['pend_sore'] ?></td>
   </tr>
   <tr>
      <td >Tujuan</td>
      <td>:</td>
      <td><?php echo $data['tujuan'] ?></td>
   </tr>
   <tr>
      <td >Keperluan</td>
      <td>:</td>
      <td><?php echo $data['keperluan'] ?></td>
   </tr>
   <tr>
      <td >Berangkat Jam</td>
      <td>:</td>
      <td><?php echo $data['berangkat'] ?></td>
   </tr>
   <tr>
      <td >Keterangan Lain</td>
      <td>:</td>
      <td><?php echo $data['keterangan'] ?></td>
   </tr>
</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian kepada yang berkepentingan agar menjadi maklum.</p>
    <br>
    <br>


  <table class="bawah" border="0">
      <tr>
      <?
        //Array Hari 
        $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu"); 
        $hari = $array_hari[date("N")];  
        //Format Tanggal 
        $tanggal = date ("j");  
        //Array Bulan 
        $array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember"); 
        $bulan = $array_bulan[date("n")]; 
        $tahun = date("Y"); 
      ?>
        
        <td width="320"></td>
        <td>Sukorejo, <?php echo $tanggal.' '.$bulan.' '.$tahun; ?></td>
      </tr> 
      <tr>
        <td ></td>
        <td >Pengasuh Pondok Pesantren</td>
        <!-- <td>Kasir, <?php echo $_SESSION['username']; ?> </td> -->
      </tr>
      <tr>
        <td></td>
        <td>Salafiyah Syafi'iyah Sukorejo</td>
      </tr> 
      <tr>
        <td ></td>
        <td></td>
      </tr>
      <tr>
        <td ></td>
        <td></td>
      </tr>
      <tr>
        <td ></td>
        <td></td>
      </tr>
      <tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr><tr>
        <td ></td>
        <td></td>
      </tr>
      <tr>
        <td ></td>
        
        <td><strong>KHR. AZAIM IBRAHIMY, S.Sy</strong></td>
      </tr>
    </table>

</div>

</body>
</html>