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
	

	
	$prosedur = mysql_real_escape_string($prosedur);
	//$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("update prosedurler set lang='$dil', baslik='$prosedur', detay='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			
     
$proc = "Prosedür güncellendi ($prosedur)...";



echo "<script> alert(\"Prosedür güncellendi ($prosedur)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			


		}
		
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from prosedurler where id='$remhid'");		
		
	  
$proc = "Prosedür silindi ($remhid)...";



echo "<script> alert(\"Prosedür silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/prosedur_edit.src.php";
include($welcomefile);

}
$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>