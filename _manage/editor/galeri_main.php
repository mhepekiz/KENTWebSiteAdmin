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
	
	
	$galeriadi = mysql_real_escape_string($galeriadi);
	$sanatci = mysql_real_escape_string($sanatci);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
		


			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into galeriler (sanatci, galeriadi, zaman, editor) values ('$sanatci','$galeriadi','$zaman','$e_uname')")or die("DB Error");
			
    
  

     
$proc = "Galeri eklendi ($galeriadi/$sanatci)...";



echo "<script> alert(\"Galeri eklendi ($galeriadi/$sanatci)...!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/galeri_main.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>