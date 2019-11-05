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

$get_eu = mysql_query("select uname from editors where id='$my_eid'");
list($e_uname)=mysql_fetch_row($get_eu);


if($ac_t=="add"){
	
	
	if($kategori){
		
		$simdi = date("Y-m-d H:i:s");
		mysql_query("insert into kategori (catof, kategori, zaman, editor) values ('$catof','$kategori','$simdi','$e_uname')");
		
		
		
		
		   
$proc = "Kategori eklendi ($kategori)...";



echo "<script> alert(\"Kategori eklendi ($kategori)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$simdi')");
	
	
		}		
	
	
	}
	
	
	if($ac_t=="del"){
	
	
	if($remhid){
		$simdi = date("Y-m-d H:i:s");
		
		mysql_query("delete from kategori where id='$remhid'");
		
		
		   
$proc = "Kategori silindi ($remhid)...";



echo "<script> alert(\"Kategori silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$simdi')");
	
	
		
		}		
	
	
	}
	
	


$welcomefile=$docroot."/admin/_manage/editor/urun_kategori.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>