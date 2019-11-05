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
	


	
	
$mov_path = $docroot."/_movies/";
$mov_folder = "/_movies/";

$flv_path = $docroot."/_flvfiles/";
$flv_folder = "/_flvfiles/";

$img_path = $docroot."/_imgfiles/";
$img_folder = "/_imgfiles/";

$dynamic_path = "";

if($ac_t=="add"){
	
	
	
	
	

 if($filename){
	 
	 
	
		
		$filecheck = substr($filename_name, -3);

   echo"----------------$filecheck";

    if(($filecheck=="flv")||($filecheck=="avi")){
	
	if (!is_writable($mov_path)) {

      $error_upload =  "true";

    }

    if(!$error_upload){

        $p_x = date("Ymdhis");

 
		
		       $moved = "$mov_path"."$u_id"."$p_x"."-"."$filename_name";
        move_uploaded_file($filename, $moved);	  
		
		

		  
	}

   $upload_ok = "true";
   
   $flv_name = "$u_id"."$p_x"."-"."$filename_name";
   
  exec("ffmpeg -i $moved -ar 22050 -ab 128 -f flv -s 320x240 ".$flv_path."".$flv_name.".flv");
  
  exec(" ffmpeg -i $moved -an -ss 00:00:03 -t 00:00:01 -r 1 -y -s 320x240 ".$img_path."".$flv_name."_large.jpg");
  exec(" ffmpeg -i $moved -an -ss 00:00:03 -t 00:00:01 -r 1 -y -s 128x96 ".$img_path."".$flv_name."_sml.jpg");
  
  $videoson = "$flv_name".".flv";
  $imgson_l = "$flv_name"."_large.jpg";
  $zaman = date("Y-m-d H:i:s");
  
  		mysql_query("insert into videolar (baslik, tarih, detay, keywords, video, videoimg, zaman, editor) values ('$videoad', '$orderdate', '$metin', '$keywords', '$videoson', '$imgson_l', '$zaman', '$e_uname')") or die("Err DB");
		
  
echo "<script> alert(\"Video sisteme eklendi!\"); </script>";

  } else { 
echo "<script> alert(\"Dosya uzantisi AVI ya da FLV olmali!\"); </script>";
}
 
    } else {

      

      $return_error = $error_upload;    

        

  }



 }



	
	}
		
		
	
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from videolar where id='$remhid'");		
		
	  
$proc = "Video silindi ($remhid)...";



echo "<script> alert(\"Video silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
		
	
$welcomefile=$docroot."/admin/_manage/editor/addvideo.src.php";
include($welcomefile);

}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>