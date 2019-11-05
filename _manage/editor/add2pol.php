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


if($ac_t=="add"){
	

	
	$ekbaslik = mysql_real_escape_string($ekbaslik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into poliklinik_alt (poliklinik, baslik, detay, zaman, editor) values ('$remhid','$ekbaslik','$metin','$zaman','$e_uname')")or die("DB Error");
			
     
$proc = "Poliklinik detay eklendi ($ekbaslik)...";



echo "<script> alert(\"Poliklinik detay eklendi ($ekbaslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			


		}
		
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from poliklinik_alt where id='$remhidx'");		
		
	  
$proc = "Bilgi silindi ($remhid)...";



echo "<script> alert(\"Bilgi silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/add2pol.src.php";
include($welcomefile);

}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>