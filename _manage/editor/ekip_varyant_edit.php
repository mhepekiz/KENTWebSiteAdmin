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
if($e_perm=="yes"){	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


if($ac_t=="upd"){
	
	
	$pozisyon = mysql_real_escape_string($pozisyon);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("update ekip_varyant set lang='$dil',adsoyad='$adsoyad',pozisyon='$pozisyon', ozgecmis='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			
	
	
	
			   
$proc = "Doktor varyant güncellendi ($remhid)...";



echo "<script> alert(\"Doktor varyant güncellendi ($remhid)..\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
   			


		}
		
		
		if($ac_t=="del"){
			
			
			
		
		mysql_query("delete from ekip_varyant where id='$remhidx'");
		
			   
$proc = "Doktor silindi ($remhidx)...";



echo "<script> alert(\"Doktor silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/ekip_varyant_edit.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>