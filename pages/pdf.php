<?php 
include "../plugins/fpdf/fpdf.php";
include "../koneksi.php";

function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}

$pdf = new FPDF();
// $pdf->AddPage();
 // $pdf->Open();
 // $pdf->AliasNbPages();
 $pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'Pondok Pesantren Salafiyah Syafiiyah sukorejo','0','1','C',false);
$pdf->SetFont('Arial','i',11);
$pdf->Cell(0,5,'PENDIDIKAN TINGGI IBRAHIMY','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',false);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,5,'Laporan Jadwal Kegiatan','0','1','C',false);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(45,6,'Nama Kegiatan',1,0,'C');
$pdf->Cell(50,6,'Lembaga',1,0,'C');
$pdf->Cell(45,6,'Tanggal Kegiatan',1,0,'C');
$pdf->Cell(20,6,'Tempat',1,0,'C');
$pdf->Cell(20,6,'No',1,0,'C');
$pdf->Ln(1);
$no = 0;
$sql = mysqli_query($conek, "SELECT * FROM jadwal,kegiatan where jadwal.kode_kegiatan = kegiatan.kode  ");

while($data = mysqli_fetch_array($sql) ) {
	 $tanggal = $data['tanggal_kegiatan'];
      $day = date('D', strtotime($tanggal));
      $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
      );
	$no++;
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(8,5,$no.".",1,0,'C');
	$pdf->Cell(45,5,$data['nama_kegiatan'],1,0,'L');
	$pdf->Cell(50,5,$data['lembaga'],1,0,'L');
	$pdf->Cell(45,5,$dayList[$day]. " ". TanggalIndo($data['tanggal_kegiatan']),1,0,'L');
	$pdf->Cell(20,5,$data['tempat_kegiatan'],1,0,'L');
	$pdf->Cell(20,5,$data['jam'],1,0,'L');
}


$pdf->Output();

 ?>