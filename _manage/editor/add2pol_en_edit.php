<?


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


if($ac_t=="upd"){
	

	
	$ekbaslik = mysql_real_escape_string($ekbaslik);
	//$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			
			mysql_query("update poliklinik_alt_en set baslik='$ekbaslik', detay='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			
			//echo"mysql_query(\"update poliklinik_alt set baslik='$ekbaslik', detay='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid')\")or die(\"DB Error\");	";
		
			
     
$proc = "Poliklinik detay guncellendi ($ekbaslik)...";



echo "<script> alert(\"Poliklinik detay guncellendi ($ekbaslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			


		}
		
		
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/add2pol_en_edit.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>