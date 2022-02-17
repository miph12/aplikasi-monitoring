<?
ob_start();
 include "cetak_struktur.php";
 $content = ob_get_clean();

 require_once "pdf/html2pdf.class.php";
 try
 {
 $html2pdf = new HTML2PDF('P','A4', 'en', false, 'ISO-8859-15');
 // $width_in_mm = 215; 
 // $height_in_mm = 110;
 // $html2pdf = new HTML2PDF('l', array($width_in_mm,$height_in_mm), 'en', true, 'UTF-8', array(0, 0, 0, 0));
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 $html2pdf->Output('"nota .pdf');
 }
 catch(HTML2PDF_exception $e) { echo $e; }



function format_rupiah($angka){
 $rupiah=number_format($angka,0,',','.');
 return $rupiah;
}

  
?>