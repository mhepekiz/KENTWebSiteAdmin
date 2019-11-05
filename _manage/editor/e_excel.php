<?php



$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();



$t=getdate();   
$today=date('Y-m-d G:i:s',$t[0]);
	
function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);  
    return;
}

function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
    return;
}

function xlsWriteNumber($Row, $Col, $Value) {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
return;
} 



                  

$buay = date("m");
$kactane = mysql_query("select count(*) from eczakulup");
list($kayitsayi) = mysql_fetch_row($kactane);

$eczane_dok = mysql_query("select id, sirano, adsoyad, eczane, dogumtarihi, eczanetel, emailx, ceptel, adres, semtilce, sehir, kangrubu, zaman from eczakulup");




// Send Header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=rapor_ecza_kulup.xls ");
header("Content-Transfer-Encoding: binary ");



// XLS Data Cell

xlsBOF();
xlsWriteLabel(0,0,"NO");
xlsWriteLabel(0,1,"SIRA");
xlsWriteLabel(0,2,"AD SOYAD");
xlsWriteLabel(0,3,"ECZANE");
xlsWriteLabel(0,4,"EPOSTA");
xlsWriteLabel(0,5,"DOĞUM TARİHİ");
xlsWriteLabel(0,6,"ECZANE TEL");
xlsWriteLabel(0,7,"CEP TEL");
xlsWriteLabel(0,8,"ADRES");
xlsWriteLabel(0,9,"SEMT/İLÇE");
xlsWriteLabel(0,10,"ŞEHİR");
xlsWriteLabel(0,11,"KAN GRUBU");
xlsWriteLabel(0,12,"ZAMAN");

$xlsRow = 1;


                while(list($e_id, $e_sira, $e_ad, $e_eczane, $e_dt, $e_emailx, $e_tel, $e_cep, $e_adres, $e_semt, $e_sehir, $e_kan, $e_zaman)=mysql_fetch_row($eczane_dok)) {
					
					
	
			
			//$r_ad=iconv("UTF-8", "ISO-8859-9",$r_ad);
			//$e_ad=iconv("UTF-8", "ISO-8859-9",$e_ad);
			//$e_eczane=iconv("UTF-8", "ISO-8859-9",$e_eczane);
			//$e_adres=iconv("UTF-8", "ISO-8859-9",$e_adres);
			//$e_semt=iconv("UTF-8", "ISO-8859-9",$e_semt);
			//$e_sehir=iconv("UTF-8", "ISO-8859-9",$e_sehir);
		
			
                    ++$i;
    xlsWriteNumber($xlsRow, 0, $i);
	xlsWriteLabel($xlsRow, 1, "$e_sira");
	xlsWriteLabel($xlsRow, 2, "$e_ad");
	xlsWriteLabel($xlsRow, 3, "$e_eczane");
	xlsWriteLabel($xlsRow, 4, "$e_emailx");
	xlsWriteLabel($xlsRow, 5, "$e_dt");
	xlsWriteLabel($xlsRow, 6, "$e_tel");
	xlsWriteLabel($xlsRow, 7, "$e_cep");
	xlsWriteLabel($xlsRow, 8, "$e_adres");
	xlsWriteLabel($xlsRow, 9, "$e_semt");
	xlsWriteLabel($xlsRow, 10, "$e_sehir");
	xlsWriteLabel($xlsRow, 11, "$e_kan");
	xlsWriteLabel($xlsRow, 12, "$e_zaman");
	 
                    $xlsRow++; }
 	  
	
	
 

xlsEOF();
exit();


echo"javascript:window.close();";

?>
