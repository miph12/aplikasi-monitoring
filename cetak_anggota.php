
<html>
<title>Cetak Pelanggan</title>
    <link href="cetaklaporan.css" rel="stylesheet" type="text/css" />

<body onLoad="window.print();">
    <center><table width="1000">
        <tr>
            <td>
           <img src="a.png"  align="left">
            <!-- <img src="../images/b.png" width="75" hspace="1" align="right"> -->
            
            <CENTER><h2 class="title">RAJAWALI MOTOR </h2></CENTER>           
            <CENTER><h3>Jalan Raya Asembagus No 87 </h3></CENTER>
            
                        <hr>
            </td>
        </tr>
        </table></center>
        <CENTER><B>LAPORAN DATA PELANGGAN</B></CENTER>
        
        <?php 
include  ("koneksi.php");   
                   $query= mysql_query("select * from pelanggan ")
         ?>
        
        <P></P>
        <table id="table-zebra" width="1150" border="1" align="center" style="colour: black;" cellpadding="1" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode pelanggan</th>
            <th>Nama pelanggan</th>
            <th>Alamat </th>
            <th>No Telp</th>
            <th>Kunjungan</th>
            
        </tr>
            
            
            <tbody>
                <?php
                $no=1;
                while ($data=mysql_fetch_array($query)) {
                    $kode_pelanggan=$data['id_pelanggan'];
                $jumlahplg = mysql_query("SELECT count(*) AS num FROM penjualan WHERE kode_pelanggan='$kode_pelanggan'");
                $result = mysql_fetch_assoc($jumlahplg);
$jml = $result['num'];
                    ?>
                    <tr>
                        <td align="center"><?php echo $no;?></td>                   
                        <td><?php echo  $kode_pelanggan; ?></td>
                        <td><?php echo  $data['nama_pelanggan']; ?> </td>
                        <td><?php echo  $data['alamat_pelanggan']; ?> </td>
                        <td><?php echo  $data['no_hp']; ?> </td>
                        <td><?php if ($jml==0) {
                            echo "Tidak Pernah";
                        }else{
                            echo "$jml Kali";
                        } ?></td>
                    </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
<p style="margin-left: 930;px">
            
<br><style="margin-left: 930;px"> </p>
<p></p>
<p></p>
<p style="margin-top: 60;px"></p>
<p style="margin-left: 930;px"></p>
</body>
</html>
        
