<?php
require('plugins/fpdf/fpdf.php');

require('plugins/fpdf/force_justify.php');
include "koneksi.php";

function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}


/*class PDF extends FPDF
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

  
}*/


$pdf = new PDF('P','mm','LEGAL');
$pdf->AliasNbPages();
$pdf->AddFont('Aprille Display Caps SSi','','Aprille Display Caps SSi.php');
$pdf->AddPage('P');


$pdf->garis();
$pdf->SetFillColor(210,221,242);
// $pdf->SetFont('Times','',12);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'SURAT PERJANJIAN SANTRI BARU','0','1','C',false);

$pdf->Ln(5);
$pdf->SetFont('times','',11);
$pdf->Cell(0,0,'Yang bertanda tangan/membubuhkan cap jempol di bawah ini, calon santri dan orang tua/wali/penerima mandat : ','0','1','L',false);

$pdf->Ln(3);
$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Nama',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Joko Widodo',0,0,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Tempat Lahir',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Yogyakarta, 02 Januari 1968 ',0,0,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Alamat Lengkap',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Jln. Arema Indonesia No. 1987 - Sukoharjo - Yogyakarta  ',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('times','B',11);
$pdf->Cell(0,3,'Orang Tua/Wali/Penerima Mandat dari Calon Santri:','0','1','L',false);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Nama',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Hartono Wahyu Caksono',0,0,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Tempat Lahir',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Yogyakarta, 25 Agustus 1995 ',0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('times','B',11);
$pdf->Cell(0,3,'Selanjutnya kami berdua disebut sebagai Pihak Pertama.','0','1','L',false);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Nama',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Abdullah Hasan, BA.',0,0,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Tempat Lahir',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Sumenep, 8 November 1965 ',0,0,'L');

$pdf->Ln(5);
$pdf->SetFont('Times','',11);
$pdf->Cell(38,6,'Alamat Lengkap',0,0,'L');
$pdf->Cell(5,6,':',0,0,'C');
$pdf->Cell(60,6,'Perumahan PP Salafiyah Syafiiyah Sukorejo, Sumberejo, Banyuputih, Situbondo ',0,0,'L');

$pdf->Ln(9);
$pdf->SetFont('times','',11);
$pdf->Cell(0,3,'dalam jabatannya sebagai Kepala Bidang Kepesantrenan dan PU, oleh karenanya bertindak untuk dan atas nama Pondok ','0','1','L',false);
$pdf->Cell(0,6,'Pesantren Salafiyah Syafiiyah Sukorejo, selanjutnya disebut sebagai Pihak Kedua. ','0','1','L',false);

$pdf->Ln(2);
$pdf->SetFont('times','',11);
/*$pdf->Cell(0,3,'Pihak Pertama dan Pihak Kedua terlebih dahulu menerangkan, bahwa Pihak Pertama bermaksud untuk mendaftarkan diri ','0','1','FJ',false);
$pdf->Cell(0,6,'di Pondok  Pesantren  Salafiyah  Syafiiyah  Sukorejo  sehingga  dapat  diterima  sebagai  wali  santri  dan santri yang akan   ','0','1','FJ',false);
$pdf->Cell(0,3,'menuntut ilmu semata mencari ridla Allah swt. dengan ini mengingatkan diri kepada Pihak Kedua dalam ikatan perjanjian   ','0','1','FJ',false);
$pdf->Cell(0,6,'sebagai berikut : ','0','1','L',false);*/
// $pdf->cMargin=10;
$pdf->Cell(0,3,'Pihak Pertama dan Pihak Kedua terlebih dahulu menerangkan, bahwa Pihak Pertama bermaksud untuk mendaftarkan diri',0,1,'FJ',false);
$pdf->Cell(0,6,'di Pondok  Pesantren  Salafiyah  Syafiiyah  Sukorejo  sehingga  dapat  diterima  sebagai  wali  santri  dan santri yang akan',0,1,'FJ',false);
$pdf->Cell(0,3,'menuntut ilmu semata mencari ridla Allah swt. dengan ini mengingatkan diri kepada Pihak Kedua dalam ikatan perjanjian',0,1,'FJ',false);
$pdf->Cell(0,6,'sebagai berikut : ','0','1','L',false);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'1.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama menerangkan dengan sebenar-benarnya bahwa salah satu dari keduanya, yakni pihak yang akan',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'didaftarkan  sebagai  santri  di  PP.  Salafiyah  Syafiiyah  Sukorejo  tidak  pernah  terlibat  dalam  tindak  pidana',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(177,6,'kejahatan serta tidak pernah terlibat baik langsung maupun tidak langsung dalam kegiatan organisasi terlarang;',0,0,'FJ',false);

$pdf->Ln(6);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'2.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama yang terdaftar sebagai santri sekaligus siswa/mahasiswa di lembaha pendidikan Pondok Pesantren',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'Salafiyah Syafiiyah Sukorejo akan menaati peraturan, tata tertib, ketentuan dan kebijakan yang dibuat oleh Pengasuh',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'dan atau Pengurus Pondok Pesantren Salafiyah Syafiiyah Sukorejo;',0,0,'L',false);

$pdf->Ln(6);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'3.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama yang terdaftar sebagai santri sekaligus siswa/mahasiswa di lembaga pendidikan Pondok Pesantren',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'Salafiyah Syafiiyah Sukorejo tidak akan menggunakan, menyimpan atau memiliki handphone (HP), laptop, modem,',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'dan sejenisnya yang menjadi larangan secara khusus dari pengasuh Pondok Pesantren Salafiyah Syafiiyah Sukorejo;',0,0,'FJ',false);

$pdf->Ln(6);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'4.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama yang terdaftar sebagai santri sekaligus siswa/mahasiswa di lembaga pendidikan Pondok Pesantren',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'Salafiyah Syafiiyah Sukorejo tidak akan mengkonsumsi, menyimpan atau mengedarkan narkotika, obat-obatan',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'terlarang dan sejenisnya, sebagaimana peraturan undang-undang yang berlaku; ',0,0,'L');



$pdf->Ln(6);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'5.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama yang terdaftar sebagai santri sekaligus siswa/mahasiswa di lembaga pendidikan Pondok Pesantren',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'Salafiyah Syafiiyah Sukorejo benar-benar tidak dalam keadaan hamil (khusus putri);',0,0,'L',false);

$pdf->Ln(6);
$pdf->SetFont('Times','',11);
$pdf->Cell(13,6,'6.',0,0,'C');
$pdf->Cell(0,6,'Pihak Pertama tidak akan berhenti mondok di pesantren Salafiyah Syafiiyah Sukorejo Situbondo hingga LULUS',0,0,'FJ',false);
$pdf->Ln(4);
$pdf->Cell(13,6,'',0,0,'L');
$pdf->Cell(0,6,'pendidikan madrasah.',0,0,'L');

$pdf->Ln(10);
$pdf->SetFont('times','',11);
$pdf->Cell(0,3,'dengan konsekuensi bilamana dikemudian hari pihak pertama melanggar isi perjanjian sebagaimana tersebut diatas, ','0','1','L',false);
$pdf->Cell(0,6,'Pihak Pertama secara bersama-sama tunduk terhadap ketentuan yang berlaku di Pondok Pesantren Salafiyah Syafiiyah','0','1','L',false);
$pdf->Cell(0,3,'Sukorejo berupa ','0','1','L',false);
$pdf->Cell(0,6,'pencabutan hak-haknya sabagai santri dan siswa/mahasiswa serta dikeluarkan dari asrama dan lembaga pendidikan  ','0','1','L',false);
$pdf->Cell(0,3,'Pondok Pesantren Salafiyah Syafiiyah Sukorejo dan atau sanksi lain yang ditetapkan oleh pesantren. ','0','1','L',false);


$pdf->Ln(5);
$pdf->SetFont('times','',11);
$pdf->Cell(0,3,'Demikian surat perjanjian ini dibuat, setelah dibaca dengan seksama dan penuh perhatian Pihak Pertama dan Pihak Kedua secara','0','1','L',false);
$pdf->Cell(0,6,'sadar dan tanpa adanya unsur paksaan dari pihak manapun juga menandatangani/membubuhi cap jempolnya diatas materai cukup.','0','1','L',false);

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
                    

 	$pdf->Ln(5);
    // Title
    $pdf->SetFont('Times','',11);
    $pdf->Cell(0,5,'Sukorejo,'.$tgl." " .$b1." ".$thn,'0','1','R',false);
    $pdf->Cell(0,5,'Pihak Kedua,          ','0','1','R',false);

  $pdf->Ln(1);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(60,5,'Pihak Pertama/Pemohon,',0,0,'C');
  $pdf->Cell(160,6,'',0,0,'C');
  
$pdf->Ln(17);
$pdf->SetFont('Times','',11);
$pdf->Cell(60,6,'Joko Widodo',0,0,'C');
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(60,6,'Hartono Wahyu Caksono',0,0,'C');
$pdf->Cell(20,6,'',0,0,'C');
$pdf->Cell(60,6,'Abdullah Hasan, BA.',0,0,'C');
$pdf->Ln(5);

// $pdf->Ln(17);
$pdf->SetFont('Times','B',10);
$pdf->Cell(60,6,'Orang Tua/Wali/Penerima Mandat',0,0,'C');
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(60,6,'Calon Santri',0,0,'C');
$pdf->Cell(20,6,'',0,0,'C');
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Ln(5);

// $pdf->Ln(17);
$pdf->SetFont('Times','',11);
$pdf->Cell(200,6,'Saksi - Saksi',0,0,'C');

$pdf->Ln(20);
$pdf->SetFont('Times','B',10);
$pdf->Cell(60,6,'(___________________)',0,0,'C');
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(20,6,'',0,0,'C');
$pdf->Cell(60,6,'(___________________)',0,0,'C');
$pdf->Ln(5);

$pdf->Output();
?>