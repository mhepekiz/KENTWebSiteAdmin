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

	
	

if($ac_t=="add"){
	
	
$pitcure_path = $docroot."/_all_media/_pool/";
$pitcure_folder = "/_all_media/_pool/";





function resim($res){
$res = strtolower($res);
$degis1 = array('I','Ö','Ü','G','Ç','S','ö','ü','g','ç','s','ö','_',' ','--','---','i');
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

		  $target_large = "$pitcure_path"."$u_id"."_large_"."$p_x"."-"."$ressim".".jpg";

		  $THUMB_X = 600;

		  $THUMB_Y = 600;

  		  $son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);

        // resize to 70 w		  

		  $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$ressim".".jpg";	

		  $THUMB_X_detail = 400;

		  $THUMB_Y_detail = 400;	

		  $son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

        // resize to 100 w

		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$ressim".".jpg";	

		  $THUMB_X_home = 150;

		  $THUMB_Y_home = 150;	

		  $son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);

   


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql

	$tarih = date("Y-m-d H:i:s");

	mysql_query("insert into havuz (foto_1, foto_2, foto_3, zaman, editor) values ('http://kent.ifsaiumumi.com$home_sql_name', 'http://kent.ifsaiumumi.com$detail_sql_name', 'http://kent.ifsaiumumi.com$large_sql_name', '$tarih', '$e_uname')") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

  echo'<a href="'.$large_sql_name.'"><font face="Arial" style="font-size:12px">'.$large_sql_name.'</a>';

	$e_ip = $REMOTE_ADDR;

	$proc = "Fotograf havuza eklendi $home_sql_name / $e_ip";

	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
		
		

$welcomefile=$docroot."/admin/_manage/editor/haber_foto.src.php";
include($welcomefile);



}

?>