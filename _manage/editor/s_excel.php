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
$kactane = mysql_query("select count(*) from saglikkulup");
list($kayitsayi) = mysql_fetch_row($kactane);

$sk_dok = mysql_query("select id, sirano, adsoyad, dogumtarihi, email, evtel, ceptel, adres, semtilce, sehir, medenihal, kangrubu, tckimlik, meslek, zaman from saglikkulup");




// Send Header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=rapor_saglik_kulup.xls ");
header("Content-Transfer-Encoding: binary ");



// XLS Data Cell

xlsBOF();
xlsWriteLabel(0,0,"NO");
xlsWriteLabel(0,1,"SIRA");
xlsWriteLabel(0,2,"AD SOYAD");
xlsWriteLabel(0,3,"DO&#208;UM TAR&#304;H&#304;");
xlsWriteLabel(0,4,"EMAIL");
xlsWriteLabel(0,5,"EV TELEFONU");
xlsWriteLabel(0,6,"CEP TELEFONU");
xlsWriteLabel(0,7,"ADRES");
xlsWriteLabel(0,8,"SEMT/&#304;L&#199;E");
xlsWriteLabel(0,9,"&#350;EH&#304;R");
xlsWriteLabel(0,10,"MEDEN&#304; HAL");
xlsWriteLabel(0,11,"KAN GRUBU");
xlsWriteLabel(0,12,"TC K&#304;ML&#304;K NO");
xlsWriteLabel(0,13,"MESLEK");
xlsWriteLabel(0,14,"ZAMAN");

$xlsRow = 1;


                while(list($s_id, $s_sira, $s_ad, $s_dt, $s_email, $s_tel, $s_cep, $s_adres, $s_semt, $s_sehir, $s_medeni, $s_kan, $s_tck, $s_meslek, $s_zaman)=mysql_fetch_row($sk_dok)) {
					
					
	
			
			//$r_ad=iconv("UTF-8", "ISO-8859-9",$r_ad);
			//$e_ad=iconv("UTF-8", "ISO-8859-9",$e_ad);
			//$e_eczane=iconv("UTF-8", "ISO-8859-9",$e_eczane);
			//$e_adres=iconv("UTF-8", "ISO-8859-9",$e_adres);
			//$e_semt=iconv("UTF-8", "ISO-8859-9",$e_semt);
			//$e_sehir=iconv("UTF-8", "ISO-8859-9",$e_sehir);
		
			
                    ++$i;
    xlsWriteNumber($xlsRow, 0, $i);
	xlsWriteLabel($xlsRow, 1, "$s_sira");
	xlsWriteLabel($xlsRow, 2, "$s_ad");
	xlsWriteLabel($xlsRow, 3, "$s_dt");
	xlsWriteLabel($xlsRow, 4, "$s_email");
	xlsWriteLabel($xlsRow, 5, "$s_tel");
	xlsWriteLabel($xlsRow, 6, "$s_cep");
	xlsWriteLabel($xlsRow, 7, "$s_adres");
	xlsWriteLabel($xlsRow, 8, "$s_semt");
	xlsWriteLabel($xlsRow, 9, "$s_sehir");
	xlsWriteLabel($xlsRow, 10, "$s_medeni");
	xlsWriteLabel($xlsRow, 11, "$s_kan");
	xlsWriteLabel($xlsRow, 12, "$s_tck");
	xlsWriteLabel($xlsRow, 13, "$s_meslek");
	xlsWriteLabel($xlsRow, 14, "$s_zaman");
	 
                    $xlsRow++; }
 	  
	
	
 

xlsEOF();
exit();


echo"javascript:window.close();";

?>
