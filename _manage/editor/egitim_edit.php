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
	
	
	$baslik = mysql_real_escape_string($baslik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
		



function aylar($ayx){
$degis1 = array('OCA','SUB','MAR','NIS','MAY','HAZ','TEM','EYL','EKI','KAS','ARA');
$degis2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
$ayx    =str_replace($degis1,$degis2,$ayx);
return $ayx;
}


		$orderx = aylar($orderdate);
		$ord = explode('-', $orderx);
		
		
		$ordery = aylar($orderdate2);
		$ordy = explode('-', $ordery);
		
		
		
		
		$orderdate = "$ord[2]-$ord[1]-$ord[0]";
		$orderdate2 = "$ordy[2]-$ordy[1]-$ordy[0]";
		
			$zaman = date("Y-m-d H:i:s");
			mysql_query("update egitimler set baslik='$baslik', detay='$metin', egitimbasla='$orderdate', egitimbitir='$orderdate2', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			
 
     
$proc = "Egitim guncellendi ($baslik)...";



echo "<script> alert(\"Egitim guncellendi ($baslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/egitim_edit.src.php";
include($welcomefile);
}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>