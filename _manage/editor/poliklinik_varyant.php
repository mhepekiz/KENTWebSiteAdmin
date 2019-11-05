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


if(($ac_t=="add")&&($remhid)){
	

	
	$poliklinik = mysql_real_escape_string($poliklinik);
	//$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into poliklinikler_varyant (polid, lang, poliklinik, detay, zaman, editor) values ('$remhid','$dil','$poliklinik','$metin','$zaman','$e_uname')")or die("DB Error");
			
     
$proc = "Poliklinik eklendi ($poliklinik)...";



echo "<script> alert(\"Poliklinik eklendi ($poliklinik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			


		}
		
		
	
	if($ac_t=="del"){
			
			
			
		
		mysql_query("delete from poliklinikler_varyant where id='$remhidx'");
		
			   
$proc = "Klinik silindi ($remhidx)...";



echo "<script> alert(\"Klinik silindi ($remhidx)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/poliklinik_varyant.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>