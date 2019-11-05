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


	
	

if($ac_t=="add"){
	
	
$pitcure_path = $docroot."/_all_media/_pop/";
$pitcure_folder = "/_all_media/_pop/";





function resim($res){
$res = strtolower($res);
$degis1 = array('I','Ö','Ü','G','Ç','S','ö','ü','g','ç','s','ö','_',' ','--','---','i');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','+','+','+','+','i');
$res    =str_replace($degis1,$degis2,$res);
$res    =preg_replace("@[^A-Za-z0-9\-_]+@i","",$res);
return $res;
}


$popres = resim($filename_name);


  if($filename){
	  


    if (!is_writable($pitcure_path)) {

      $error_upload =  "true";

    }

    if(!$error_upload){
	
        $p_x = date("Ymdhis");

        $moved = "$pitcure_path"."$popres".".jpg";

		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";

        move_uploaded_file($filename, $moved);


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql

	$tarih = date("Y-m-d H:i:s");
	$poplink = mysql_real_escape_string($poplink);

	mysql_query("update poppencere set durum='on', poplink='$poplink', popimage='$moved', zaman='$zaman', editor='$e_uname' where id='1'") or die("DB Err");
	
	
	
     
$proc = "Pop pencere sisteme eklendi $moved";


echo "<script> alert(\"Pop pencere sisteme eklendi $moved...!\"); </script>";



	$e_ip = $REMOTE_ADDR;

	

	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
		
if($ac_t=="del"){
			
			
		mysql_query("update poppencere set durum='off' where id='1'");
		
			   
$proc = "Popup silindi...";



echo "<script> alert(\"Popup silindi!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/popup.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);




?>