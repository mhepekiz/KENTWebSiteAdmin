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
	
	
	if($e_perm=="no"){
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);

if($ac_t=="delete"){
	
	$mesaj_detay = mysql_query("select id, adsoyad, email, telefon, mesaj, durum, aciklama, zaman, ipadresi from online_form where id='$pro_d'");
	list($m_id, $m_ad, $m_email, $m_tel, $m_mesaj, $m_durum, $m_aciklama, $m_zaman, $m_ip) = mysql_fetch_row($mesaj_detay);
	
	mysql_query("delete from online_form where id='$pro_d'");
	
	
	
	$proc = "$m_zaman - $m_ad) - $m_tsaat İletişim Formu Silindi...";

echo "<script> alert(\"$proc\"); </script>";

	$tarih = date("Y-m-d H:i:s");
	$e_ip = $REMOTE_ADDR;

	mysql_query("insert into loglar (proc,editor,ipaddr,zaman) values ('$proc','$e_uname','$e_ip','$tarih')");
	
	
	
}
		
	
$welcomefile=$docroot."/admin/_manage/mh/mesaj.src.php";
include($welcomefile);


	}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>