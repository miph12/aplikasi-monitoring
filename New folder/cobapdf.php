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

$pdf->SetFont('Times','B',15);
$pdf->Cell(0,10,'REKOMENDASI PENGASUH','0','1','C',false);

$pdf->Ln(10);
$pdf->SetFont('times','',12);
$pdf->Cell(20,6,'Perihal : ',0,0,'L');
$pdf->SetFont('times','B',12);
$pdf->Cell(90,6,'SANTRI BARU ',0,0,'L');
$pdf->SetFont('times','',12);
$pdf->Cell(80,6,'Nomor Rekomendasi : 0828/0123/A.2/X/2017',0,0,'R');


$pdf->Ln(15);
$pdf->SetFont('times','',12);
$pdf->Cell(8,6,'Yth. ','0','0','L');
$pdf->SetFont('times','B',12);
$pdf->Cell(80,6,'Panitia Pendaftaran Santri Baru','0','1','L');
$pdf->SetFont('times','',12);
$pdf->Cell(90,6,'di Sekretariat Pendaftaran Santri Baru','0','1','L');
$pdf->Cell(50,6,'Sukorejo Situbondo','0','1','L');

$pdf->Ln(7);
$pdf->SetFont('times','',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(80,6,'Atas penyerahan orang tua/penerima mandat,','0','1','C');


$pdf->Ln(3);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'Nama',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(120,6,'Bapak/Ibu : Joko Widodo',0,0,'L');
// $pdf->Ln(5);

$pdf->Ln(7);
$pdf->SetFont('Times','',12);
$pdf->Cell(38,6,'Pekerjaan',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(120,6,'Presiden Republik Indonesia',0,0,'L');

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

$pdf->Ln(10);
$pdf->SetFont('times','',12);
$pdf->Cell(0,3,'maka anak dibawah ini,','0','1','L',false);

$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Nama',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(73,6,'Hartono Wahyu Caksono',0,0,'L');
$pdf->Cell(18,6,'Bin(ti)',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(40,6,'Joko Widodo',0,0,'L');

$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Tempat, Tanggal Lahir ',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(73,6,'Yogyakarta, 25 Agustus 1995',0,0,'L');

$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Tes Masuk Pendidikan ',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(52,6,'a. Madrasah ',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(20,6,'MTI',0,0,'L');

$pdf->Ln(6);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,' ',0,0,'L');
$pdf->Cell(3,6,'',0,0,'C');
$pdf->Cell(52,6,'b. Merangkap di Sekolah/PT ',0,0,'L');
$pdf->Cell(3,6,':',0,0,'C');
$pdf->Cell(50,6,'AMIK Ibrahimy',0,0,'L');

$pdf->Ln(10);
$pdf->SetFont('times','',12);
$pdf->Cell(0,3,'Saya terima sebagai santri Pondok Pesantren Salafiyah Syafiiyah Sukorejo. Selanjutnya, agar dites membaca','0','1','L',false);
$pdf->Cell(0,7,'Al-Quran dan didaftarkan sebagai SANTRI BARU dengan memperhatikan aturan yang berlaku.','0','1','L',false);
// $pdf->Cell(0,3,'saya terima sebagai santri Pondok Pesantren Salafiyah Syafiiyah Sukorejo. Selanjutnya, agar dites ,'0','1','L',false');
// $pdf->Cell(0,3,'membaca Al-Quran dan didaftarkan sebagai SANTRI BARU dengan memperhatikan aturan yang berlaku. ,'0','1','L',false');


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
                    

 	$pdf->Ln(8);
    // Title
    $pdf->SetFont('Times','',12);
    $pdf->Cell(0,5,'Sukorejo,'.$tgl." " .$b1." ".$thn,'0','1','R',false);
	$pdf->Ln(22);
  $pdf->SetFont('Times','B',12);
	$pdf->Cell(0,5,'KHR. Ach. Azaim Ibrahimy','0','1','R',false);

$pdf->Output();
?>