<?php
require('../../plugins/fpdf/fpdf.php');
include "../../koneksi.php";

function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}

function format_rupiah($angka){
 $rupiah=number_format($angka,0,',','.');
 return $rupiah;
}

class PDF extends FPDF
{
  // Page header
  function Header()
  {

      // Logo
      // $this->Image('../../dist/img/p2s2.png',87,4,40);
      // Arial bold 15
      $this->SetFont('Arial','',15);
      // Move to the right
      $this->Cell(5);
      $this->Ln(10);
      // Title
      $this->Cell(0,5,'DATA DEVISI','0','1','C',false);
  	$this->SetFont('Arial','B',17);
  	// $this->Cell(0,5,'BIDANG PENDIDIKAN TINGGI','0','1','C',false);
   //  $this->SetFont('Arial','B',11);
   //  $this->Cell(0,4,'SUMBEREJO BANYUPUTIH SITUBONDO JAWA TIMUR','0','1','C',false);

      // Line break
      $this->Ln(7);

  }

  function garis(){
    $this->SetLineWidth(1);
    $this->Line(10,26,205,26);
    $this->SetLineWidth(0);
    $this->Line(10,27,205,27);
  }

  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P');

$start_x=$pdf->GetX(); //initial x (start of column position)
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 20;  //define cell width
$cell_height=7;    //define cell height

$pdf->garis();
$pdf->SetFillColor(210,221,242);
// $pdf->SetFont('Times','',12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(90,6,'Nama Devisi',1,0,'C');
$pdf->Ln(1);
$no = 0;
$tampil = mysqli_query($conek, "SELECT * FROM  devisi  ");

while($data = mysqli_fetch_array($tampil) ) {

	$no++;
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(8,5,$no.".",1,0,'C');
	$pdf->Cell(90,5,$data['nama_devisi'],1,0,'L');
	
}

 $tgl1=gmdate("d-m-Y");

                     $bln = date('m');
                     switch ($bln) {
                         case '1':
                             $b1 = 'Januari';
                             break;
                         case '2':
                             $b1 = 'Februari';
                             break;
                        case '3':
                            $b1 = 'Maret';
                            break;
                        case '4':
                            $b1 = 'April';
                            break;
                        case '5':
                            $b1 = 'Mei';
                            break;
                        case '6':
                            $b1 = 'Juni';
                            break;
                        case '7':
                            $b1 = 'Juli';
                            break;
                        case '8':
                            $b1 = 'Agustus';
                            break;
                        case '9':
                            $b1 = 'September';
                            break;
                        case '10':
                            $b1 = 'Oktober';
                            break;
                        case '11':
                            $b1 = 'Nopember';
                            break;
                         default:
                             $b1 = 'Desember';
                             break;
                     }
                        $tgl = date('d');
                        $thn = date('Y');
                    

 	$pdf->Ln(10);
    // Title
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(0,5,'Sukorejo,'.$tgl." " .$b1." ".$thn,'0','1','R',false);
	$pdf->Ln(14);
	$pdf->Cell(0,5,'_____________________','0','1','R',false);

$pdf->Output();
?>