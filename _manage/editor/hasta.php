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


if($ac_t=="add"){
	
	
	$adsoyad = mysql_real_escape_string($adsoyad);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into hastalar (adsoyad, ozgecmis, zaman, editor) values ('$adsoyad','$metin','$zaman','$e_uname')")or die("DB Error");
			$hastam = mysql_insert_id();
			


$pitcure_path = $docroot."/_all_media/_hasta/";
$pitcure_folder = "/_all_media/_hasta/";



  if($filename){
	  


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

		  $target_large = "$pitcure_path"."$u_id"."_large_"."$p_x"."-"."$filename_name";
		  $large_file = "$pitcure_folder"."_large_"."$p_x"."-"."$filename_name";

		  $THUMB_X = 120;

		  $THUMB_Y = 179;

  		  $son_large = smart_resize_image($tumber,$target_large,$THUMB_X,$THUMB_Y);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);
		  
		  
		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$filename_name";
		  $home_file = "$pitcure_folder"."_home_"."$p_x"."-"."$filename_name";

		  $THUMB_X = 336;

		  $THUMB_Y = 500;

  		  $son_home = smart_resize_image($tumber,$target_home,$THUMB_X,$THUMB_Y);

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);


		 $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$filename_name";
		 $detail_file = "$pitcure_folder"."_detail_"."$p_x"."-"."$filename_name";

		  $THUMB_X = 235;

		  $THUMB_Y = 350;

  		  $son_detail = smart_resize_image($tumber,$target_detail,$THUMB_X,$THUMB_Y);

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

     

        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update hastalar set foto_1='$home_file', foto_2='$detail_file' where id='$hastam'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

  //  unlink($moved);
	
	
	
	
	
	
	
	
	
			 }
   			
   			


		}
		
		
		if($ac=t=="del"){
			
				$get_adam = mysql_query("select id, adsoyad, ozgecmis, foto from egitmenler where id='$remhid'");
				list($e_id, $e_ad, $e_ozgecmis, $e_foto) = mysql_fetch_row($get_adam);

			
		
		mysql_query("delete from egitmenler where id='$remhid'");
		
			   
$proc = "Egitmen silindi ($e_ad)...";



echo "<script> alert(\"Egitmen silindi ($e_ad)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/hasta.src.php";
include($welcomefile);

}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>