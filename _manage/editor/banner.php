
	
	
	
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
	
		

$pitcure_path = $docroot."/_all_media/_banner/";
$pitcure_folder = "/_all_media/_banner/";



  if($filename){
	  


    if (!is_writable($pitcure_path)) {

      $error_upload =  "true";

    }

    if(!$error_upload){
	     $p_x = date("Ymdhis");

        $moved = "$pitcure_path"."$filename_name";

		$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename_name";

        move_uploaded_file($filename, $moved);
		
		
		//rename("/home/hepekizc/public_html/kentb/_all_media/_banner/$filename_name", "/home/hepekizc/public_html/kentb/_all_media/_banner/musaf");

	rename("/home/kentweb/domains/kenthospital.com/public_html/_all_media/_banner/$filename_name", "/home/kentweb/domains/kenthospital.com/public_html/$sql_name_large");

        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql

	$zaman = date("Y-m-d H:i:s");
	mysql_query("insert into banner (lang,banner,zaman,editor) values ('$dil','$sql_name_large','$zaman','$e_uname')") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Banner eklendi ($banner)...";



echo "<script> alert(\"Banner eklendi ($banner)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		

	
		if($ac_t=="del"){
			
				$get_ban = mysql_query("select id, banner from banner where id='$remhid'");
				list($b_id, $b_yol,) = mysql_fetch_row($get_ban);

			
		
		mysql_query("delete from banner where id='$remhid'");
		
			   
$proc = "Banner silindi ($b_yol)...";



echo "<script> alert(\"Banner silindi ($b_yol)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		


$welcomefile=$docroot."/admin/_manage/editor/banner.src.php";
include($welcomefile);

}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>