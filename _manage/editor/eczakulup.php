<?


function imaj($foto){
$foto = strtolower($foto);
$degis1 = array('Ý','Ö','Ü','Ð','Ç','Þ','ö','ü','ð','ç','þ','ö','_',' ','--','---','ý');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','-','-','-','-','i');
$foto    =str_replace($degis1,$degis2,$foto);

return $foto;
}



$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();



							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
	
	
	if($e_perm=="yes"){
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);

if($ac_t=="delete"){
	
	$randevu_detay = mysql_query("select id, sirano, zaman, adsoyad, email, bolum, doktor, telefon, ceptelefon, tarihsaat, durum from online_randevu where id='$pro_d'");
	list($r_id, $e_sira, $r_zaman, $r_ad, $r_email, $r_bolum, $r_doktor, $r_tel, $r_gsm, $r_tsaat, $r_durum) = mysql_fetch_row($randevu_detay);

	mysql_query("delete from online_randevu where id='$pro_d'");
	
	
	
	$proc = "$r_zaman - $r_ad) - $r_tsaat Randevu Talebi Silindi...";

echo "<script> alert(\"$proc\"); </script>";

	$tarih = date("Y-m-d H:i:s");
	$e_ip = $REMOTE_ADDR;

	mysql_query("insert into loglar (proc,editor,ipaddr,zaman) values ('$proc','$e_uname','$e_ip','$tarih')");
	
	
	
}
		
	
$welcomefile=$docroot."/admin/_manage/editor/eczakulup.src.php";
include($welcomefile);


	}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>