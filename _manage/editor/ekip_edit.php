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
	
	
	$adsoyad = mysql_real_escape_string($adsoyad);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("update ekip set adsoyad='$adsoyad', pozisyon='$pozisyon', klinik='$klinik', ozgecmis='$metin', zaman='$zaman', editor='$e_uname' where id='$remhid'")or die("DB Error");
			$ekipuye = mysql_insert_id();
			


$pitcure_path = $docroot."/_all_media/_ekip/";
$pitcure_folder = "/_all_media/_ekip/";


function resim($res){
$res = strtolower($res);
$degis1 = array('I','Ö','Ü','G','Ç','S','ö','ü','g','ç','s','ö','_',' ','--','---','i');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','+','+','+','+','i');
$res    =str_replace($degis1,$degis2,$res);
$res    =preg_replace("@[^A-Za-z0-9\-_]+@i","",$res);
return $res;
}




  if($filename){
	  
$filename_name = resim($filename_name);


    if (!is_writable($pitcure_path)) {

      $error_upload =  "true";

    }

    if(!$error_upload){
	  echo"--------------$filename";
        $p_x = date("Ymdhis");

        $moved = "$pitcure_path"."$filename_name";
        

		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";

        move_uploaded_file($filename, $moved);
		
		$tumber = $moved;
		
		//echo"--------------------$tumber";

		  $target_large = "$pitcure_path"."$u_id"."_large_"."$p_x"."-"."$filename_name".".jpg";
		  $large_file = "$pitcure_folder"."_large_"."$p_x"."-"."$filename_name".".jpg";

		  $THUMB_X = 200;

		  $THUMB_Y = 200;

  		  $son_large = smart_resize_image($tumber,$target_large,$THUMB_X,$THUMB_Y);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);
		  
		  
		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$filename_name".".jpg";
		  $home_file = "$pitcure_folder"."_home_"."$p_x"."-"."$filename_name".".jpg";

		  $THUMB_X = 200;

		  $THUMB_Y = 200;

  		  $son_home = smart_resize_image($tumber,$target_home,$THUMB_X,$THUMB_Y);

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);


		 $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$filename_name".".jpg";
		 $detail_file = "$pitcure_folder"."_detail_"."$p_x"."-"."$filename_name".".jpg";

		  $THUMB_X = 200;

		  $THUMB_Y = 200;

  		  $son_detail = smart_resize_image($tumber,$target_detail,$THUMB_X,$THUMB_Y);

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

     

        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update ekip set foto_1='$home_file', foto_2='$detail_file' where id='$remhid'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

  //  unlink($moved);
	
	
	
	
	
	
	
	
	
			 }
   			
   			


		}
		
	
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/ekip_edit.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>