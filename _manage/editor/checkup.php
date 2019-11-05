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
	
	
	
	$baslik = mysql_real_escape_string($baslik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into checkup (lang,programadi, detay, zaman, editor) values ('$dil','$baslik','$metin','$zaman','$e_uname')")or die("DB Error");
			

     
$proc = "Program eklendi ($baslik)...";



echo "<script> alert(\"Program eklendi ($baslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	

		}
		
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from checkup where id='$remhid'");		
		
	  
$proc = "Program silindi ($remhid)...";



echo "<script> alert(\"Program silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/checkup.src.php";
include($welcomefile);
}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>