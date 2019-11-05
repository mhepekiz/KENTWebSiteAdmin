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
	
			
  $soru_dok = mysql_query("select id, doktorid, adsoyad, email, telefon, sorunuz, zaman, durum from online_doktorasor where id='$soru'");
  list($s_id, $s_doktor, $s_ad, $s_email, $s_tel, $s_soru, $s_zaman, $s_durum) = mysql_fetch_row($soru_dok);

	
	

	mysql_query("delete from online_doktorasor where id='$pro_d'");
	
	
	
	$proc = "$sr_zaman - $s_ad Doktora Soru Silindi...";

echo "<script> alert(\"$proc\"); </script>";

	$tarih = date("Y-m-d H:i:s");
	$e_ip = $REMOTE_ADDR;

	mysql_query("insert into loglar (proc,editor,ipaddr,zaman) values ('$proc','$e_uname','$e_ip','$tarih')");
	
	
	
}
		
	
$welcomefile=$docroot."/admin/_manage/mh/doktorasor.src.php";
include($welcomefile);


	}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>