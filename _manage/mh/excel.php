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



	if($hangiklinik=="1"){ $klisor=""; }
	if($hangiklinik=="2"){ $klisor=" and merkez='cigli' "; }
	if($hangiklinik=="3"){ $klisor=" and merkez='alsancak' "; } 
                  

$buay = date("m");
$kactane = mysql_query("select count(*) from online_randevu where zaman between '$firstdate%' and '$lastdate%' $klisor");
list($kayitsayi) = mysql_fetch_row($kactane);

$randevu_dok = mysql_query("select id, merkez, zaman, adsoyad, email, bolum, doktor, telefon, ceptelefon, durum from online_randevu where zaman  between '$firstdate%' and '$lastdate%' $klisor order by zaman");




// Send Header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=rapor_randevu.xls ");
header("Content-Transfer-Encoding: binary ");


$bolum = "BÖLÜM";
$islemy = "İŞLEM YAPAN";


$bolum=iconv("UTF-8", "ISO-8859-9",$bolum);
$islemy=iconv("UTF-8", "ISO-8859-9",$islemy);

// XLS Data Cell

xlsBOF();
xlsWriteLabel(0,0,"NO");
xlsWriteLabel(0,1,"MERKEZ");
xlsWriteLabel(0,2,"ZAMAN");
xlsWriteLabel(0,3,"AD SOYAD");
xlsWriteLabel(0,4,"EPOSTA");
xlsWriteLabel(0,5,"$bolum");
xlsWriteLabel(0,6,"DOKTOR");
xlsWriteLabel(0,7,"TELEFON");
xlsWriteLabel(0,8,"CEP TELEONU");
xlsWriteLabel(0,9,"DURUM");
xlsWriteLabel(0,10,"$islemy");

$xlsRow = 1;
                while(list($r_id, $r_merkez, $r_zaman, $r_ad, $r_email, $r_bolum, $r_doktor, $r_tel, $r_cep, $r_durum)=mysql_fetch_row($randevu_dok)) {
					
					
	if($r_merkez=="cigli"){
	
		$bolum_tara = mysql_query("select poliklinik from poliklinikler where id='$r_bolum'");
		list($r_bolum) = mysql_fetch_row($bolum_tara);
		
			$doktor_tara = mysql_query("select adsoyad from ekip where id='$r_doktor'");
			list($r_doktor) = mysql_fetch_row($doktor_tara);	} elseif($r_merkez=="alsancak"){
				
				
				mysql_close();
				connecttoatip();
				
				$bolum_tara = mysql_query("select poliklinik from poliklinikler where id='$r_bolum'");
		list($r_bolum) = mysql_fetch_row($bolum_tara);
		
			$doktor_tara = mysql_query("select adsoyad from ekip where id='$r_doktor'");
			list($r_doktor) = mysql_fetch_row($doktor_tara);
			
			
			mysql_close();
			connecttodb();
				
			}
			
			
			//$r_ad=iconv("UTF-8", "ISO-8859-9",$r_ad);
			$r_bolum=iconv("UTF-8", "ISO-8859-9",$r_bolum);
			$r_doktor=iconv("UTF-8", "ISO-8859-9",$r_doktor);
		
			
                    ++$i;
    xlsWriteNumber($xlsRow, 0, $i);
	xlsWriteLabel($xlsRow, 1, "$r_merkez");
	xlsWriteLabel($xlsRow, 2, "$r_zaman");
	xlsWriteLabel($xlsRow, 3, "$r_ad");
	xlsWriteLabel($xlsRow, 4, "$r_email");
	xlsWriteLabel($xlsRow, 5, "$r_bolum");
	xlsWriteLabel($xlsRow, 6, "$r_doktor");
	xlsWriteLabel($xlsRow, 7, "$r_tel");
	xlsWriteLabel($xlsRow, 8, "$r_cep");
	xlsWriteLabel($xlsRow, 9, "$r_durum");
	xlsWriteLabel($xlsRow, 10, "musterih1");
	 
                    $xlsRow++; }
 	  
	
	
 

xlsEOF();
exit();


echo"javascript:window.close();";

?>
