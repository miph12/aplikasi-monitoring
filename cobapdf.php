<?php
require('plugins/fpdf/fpdf.php');
include "koneksi.php";

function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}


class PDF extends FPDF
{
  // Page header
  function Header()
  {

      // Logo
      $this->Image('dist/img/logo.png',80,2,50);
      // Arial bold 15
      $this->SetFont('Aprille Display Caps SSi','',20);
      // Move to the right
      $this->Cell(5);
      $this->Ln(11);
      // Title
    $this->Cell(0,5,'PONDOK PESANTREN SALAFIYAH SYAFIIYAH SUKOREJO','0','1','C',false);
  	$this->SetFont('Arial','B',12);
  	$this->Cell(0,7,'SUMBEREJO BANYUPUTIH SITUBONDO JAWA TIMUR','0','1','C',false);
    $this->SetFont('Arial','',10);
    $this->Cell(0,1,'Akte Notaris No. 4/25.08.1970 & No. 55/24.09.2013','0','1','C',false);

      // Line break
      $this->Ln(7);

  }

  function garis(){
    $this->SetLineWidth(1);
    $this->Line(10,36,195,36);
    $this->SetLineWidth(0);
    $this->Line(10,37,195,37);
  }

  
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddFont('Aprille Display Caps SSi','','Aprille Display Caps SSi.php');
$pdf->AddPage('P');


$pdf->garis();
$pdf->SetFillColor(210,221,242);
// $pdf->SetFont('Times','',12);

$pdf->SetFont('Times','B',13);
$pdf->Cell(0,10,'SURAT PENGANTAR PENDAFTARAN SANTRI BARU','0','1','C',false);

// $pdf->Ln(10);
// $pdf->SetFont('times','',12);
// $pdf->Cell(20,6,'Perihal : ',0,0,'L');
// $pdf->SetFont('times','B',12);
// $pdf->Cell(90,6,'SANTRI BARU ',0,0,'L');
// $pdf->SetFont('times','B',17);
// $pdf->Cell(80,6,'Nomor Registrasi : O1701004 ',0,0,'R');


// $pdf->Ln(15);
// $pdf->SetFont('times','',12);
// $pdf->Cell(8,6,'Yth. ','0','0','L');
// $pdf->SetFont('times','B',12);
// $pdf->Cell(80,6,'Panitia Pendaftaran Santri Baru','0','1','L');
// $pdf->SetFont('times','',12);
// $pdf->Cell(90,6,'di Sekretariat Pendaftaran Santri Baru','0','1','L');
// $pdf->Cell(50,6,'Sukorejo Situbondo','0','1','L');

$pdf->Ln(7);
$pdf->SetFont('times','',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(40,6,'Yang Berindentitas di bawah ini,','0','1','C');


$pdf->Ln(3);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'No Registrasi',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(120,6,'O1701001',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'Nama Lengkap',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(120,6,'Syarif Aminul Khoiri',0,0,'L');

$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Tempat, Tanggal Lahir ',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(73,6,'Yogyakarta, 25 Agustus 1995',0,0,'L');


$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'Alamat Lengkap',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(120,6,'Jln. Arema Indonesia No. 1987',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(43,6,'',0,0,'C');
$pdf->Cell(28,6,'Desa/Kelurahan',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(50,6,'Sukoharjo',0,0,'L');
$pdf->Cell(20,6,'Kecamatan',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,'Sukoharjo',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(43,6,'',0,0,'C');
$pdf->Cell(28,6,'Kabupaten/Kota',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(50,6,'Yogyakarta',0,0,'L');
$pdf->Cell(20,6,'Propinsi',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,'Yogyakarta',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'Tanggal Daftar',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(120,6,'25 Mei 2017',0,0,'L');


$pdf->Ln(10);
$pdf->SetFont('times','',12);
$pdf->Cell(0,3,'Dinyatakan telah mendaftar sebagai calon santri baru jalur online Pondok Pesantren Salafiyah Syafiiyah  ','0','1','L',false);
$pdf->Cell(0,7,'Sukorejo Situbondo Jawa Timur','0','1','L',false);

$pdf->Ln(3);
$pdf->SetFont('times','',12);
$pdf->Cell(0,3,'Surat ini Wajib dibawa ketika hendak Sowan ke pengasuh Pesantren Salafiyah Syafiiyah Sukorejo  ','0','1','L',false);

$pdf->Output();
?>