<?


$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();

							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


if($ac_t=="add"){
	

	
	$poliklinik = mysql_real_escape_string($poliklinik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into poliklinikler (visible,aktiflink,lang, poliklinik, detay, zaman, editor) values ('$visible','$aktiflink','$dil','$poliklinik','$metin','$zaman','$e_uname')")or die("DB Error");
			
     
$proc = "Poliklinik eklendi ($poliklinik)...";



echo "<script> alert(\"Poliklinik eklendi ($poliklinik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			


		}
		
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from poliklinikler where id='$remhid'");		
		
	  
$proc = "Poliklinik silindi ($remhid)...";



echo "<script> alert(\"Poliklinik silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/poliklinik.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>