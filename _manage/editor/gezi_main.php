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
			mysql_query("insert into geziler (baslik, detay, gezibasla, gezibitir, zaman, editor) values ('$baslik','$metin','$orderdate','$orderdate2','$zaman','$e_uname')")or die("DB Error");
			
    
     // write to sql


	mysql_query("update haberler set foto_1='$home_sql_name', foto_2='$detail_sql_name', foto_3='$large_sql_name' where id='$haberim'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Gezi eklendi ($baslik)...";



echo "<script> alert(\"Gezi eklendi ($baslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/gezi_main.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>