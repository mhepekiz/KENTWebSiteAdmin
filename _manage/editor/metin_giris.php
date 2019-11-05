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


	if($ac_t=="update"){
		
	$metin = stripslashes($metin);
	mysql_query("update girismetin set metin='$metin' where lang='$lang'");
	
	
		   
$proc = "Giris yazisi güncellendi ($lang)";



echo "<script> alert(\"Giris yazisi güncellendi ($lang)\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$simdi')");
		
	}



$welcomefile=$docroot."/admin/_manage/editor/metin_giris.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>