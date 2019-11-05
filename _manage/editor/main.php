<?


$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();

							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
		$authxx = mysql_query("select yetki from editors where id='$my_eid'");
									list($my_auth)=mysql_fetch_row($authxx);

								if($my_auth=="151"){

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);

$get_eu = mysql_query("select uname from editors where id='$my_eid'");
list($e_uname)=mysql_fetch_row($get_eu);




  $tarih = date("Y-m-d H:i:s");



if($ac_t=="add"){


   if(($adsoyad)&&($email)){
   
  $tarih = date("Y-m-d H:i:s");
  
    mysql_query("insert into editors (name,email,uname,pass,durum,yetki,zaman) values ('$adsoyad','$email','$kullanici','$sifreonay','on','$yetki','$tarih')");
  
    }
  
  
  

 
    
     // write to sql

     
$proc = "Editör eklendi ($adsoyad)...";





echo "<script> alert(\"Editör eklendi ($adsoyad)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	



    


		}







if($ac_t=="del"){

  if($remhid){
    mysql_query("delete from editors where id='$remhid'");	
    $my_message = "Editör sistemden silindi...";
  }

} 



$welcomefile=$docroot."/admin/_manage/_pages/editor/main.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
} else { echo"Eriþim yetkiniz bulunmamaktadýr IP adresiniz rapor edilmiþtir!"; }
?>