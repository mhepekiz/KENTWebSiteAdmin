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
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


	
	
	
	
	
	

if($ac_t=="add"){
	
			$yemekadi = stripslashes($yemekadi);
			$detay = stripslashes($detay);
			mysql_query("insert into sefinsecimi (lang, baslik, bilgi, resim_1, resim_2, resim_3) values ('$langx','$yemekadi','$detay','0','0','0')")or die("DB Error");
			$yemek = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_yemek/";
$pitcure_folder = "/_all_media/_yemek/";



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

      

        // resize to 450 w

          $tumber = $moved;

		  $target_large = "$pitcure_path"."$u_id"."_large_"."$p_x"."-"."$filename_name";

		  $THUMB_X = 250;

		  $THUMB_Y = 250;

  		  $son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);

        // resize to 70 w		  

		  $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$filename_name";	

		  $THUMB_X_detail = 160;

		  $THUMB_Y_detail = 160;	

		  $son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

        // resize to 100 w

		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$filename_name";	

		  $THUMB_X_home = 100;

		  $THUMB_Y_home = 100;	

		  $son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);

   


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update sefinsecimi set resim_1='$home_sql_name', resim_2='$detail_sql_name', resim_3='$large_sql_name' where id='$yemek'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Yemek eklendi ($yemekadi)...";



echo "<script> alert(\"Yemek eklendi ($yemekadi)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
		
		


$welcomefile=$docroot."/admin/_manage/editor/sef_main.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>