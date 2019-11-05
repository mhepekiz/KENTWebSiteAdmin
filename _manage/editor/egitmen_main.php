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
			mysql_query("insert into egitmenler (adsoyad, ozgecmis, foto, zaman, editor) values ('$adsoyad','$metin','1','$zaman','$e_uname')")or die("DB Error");
			$hocam = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_egitmen/";
$pitcure_folder = "/_all_media/_egitmen/";





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

		  $target_large = "$pitcure_path"."$u_id"."_large_"."$p_x"."-"."$ressim";

		  $THUMB_X = 200;

		  $THUMB_Y = 200;

  		  $son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);

       

   


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update egitmenler set foto='$large_sql_name' where id='$hocam'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Egitmen eklendi ($adsoyad)...";



echo "<script> alert(\"Egitmen eklendi ($adsoyad)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
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
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/egitmen_main.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>