<?

function imaj($foto){
$foto = strtolower($foto);
$degis1 = array('�','�','�','�','�','�','�','�','�','�','�','�','_',' ','--','---','�');
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
	
	$baslik = mysql_real_escape_string($kutubaslik);
	$aciklama = mysql_real_escape_string($aciklama);
	$link = mysql_real_escape_string($kutulink);
	
			$zaman = date("Y-m-d H:i:s");
	
	
			mysql_query("insert into kutular (lang,baslik, aciklama, link, zaman, editor) values ('$dil','$baslik','$aciklama','$link','$zaman','$e_uname')")or die("DB Error");
			$kutuid = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_kutu/";
$pitcure_folder = "/_all_media/_kutu/";





function resim($res){
$res = strtolower($res);
$degis1 = array('I','�','�','G','�','S','�','�','g','�','s','�','_',' ','--','---','i');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','+','+','+','+','i');
$res    =str_replace($degis1,$degis2,$res);
$res    =preg_replace("@[^A-Za-z0-9\-_]+@i","",$res);
return $res;
}


$ressim = resim($filename_name);


  if($filename){
	  


    if (!is_writable($pitcure_path)) {

      $error_upload =  "true";

    }

    if(!$error_upload){
	 
	 
	 $p_x = date("Ymdhis");

        $moved = "$pitcure_path"."$ressim";

		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";

        move_uploaded_file($filename, $moved);

      

        // resize to 450 w

          $tumber = $moved;

	

        // resize to 100 w

		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$ressim".".jpg";	

		  $THUMB_X_home = 225;

		  $THUMB_Y_home = 75;	

		  $son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);


   


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update kutular set resim='$home_sql_name' where id='$kutuid'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Kutu eklendi ($baslik)...";



echo "<script> alert(\"Kutu eklendi ($baslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
		if($ac_t=="del"){
			
			
		mysql_query("delete from kutular where id='$remhid'");
		
			   
$proc = "Kutu silindi ($remhid)...";



echo "<script> alert(\"Kutu silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/kutu.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>