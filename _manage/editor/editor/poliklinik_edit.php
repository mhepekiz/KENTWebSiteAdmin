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


if($ac_t=="upd"){
	

	
	$poliklinik = mysql_real_escape_string($poliklinik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("update poliklinikler set visible='$visible', aktiflink='$aktiflink', lang='$dil', poliklinik='$poliklinik', detay='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			
     
$proc = "Poliklinik guncellendi ($poliklinik)...";



echo "<script> alert(\"Poliklinik guncellendi ($poliklinik)!\"); </script>";



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
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/poliklinik_edit.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>