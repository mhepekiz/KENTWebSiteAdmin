
	
	
	
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
	
		

$pitcure_path = $docroot."/_all_media/_genel/";
$pitcure_folder = "/_all_media/_genel/";



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

	rename("/home/hepekizc/public_html/kent/_all_media/_genel/$filename_name", "/home/hepekizc/public_html/kent/$sql_name_large");

        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql

	$zaman = date("Y-m-d H:i:s");
	mysql_query("update genelresim set durum='on', resim1='$sql_name_large',zaman='$zaman',editor='$e_uname' where id='1'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "G&#246;rsel eklendi ($sql_name_large)...";



echo "<script> alert(\"G&#246;rsel eklendi ($sql_name_large)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		

	
		if($ac_t=="del"){
			
			
		
		mysql_query("update genelresim set durum='off' where id='$remhid'");
		
			   
$proc = "G&#246;rsel silindi ($remhid)...";



echo "<script> alert(\"G&#246;rsel silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		


$welcomefile=$docroot."/admin/_manage/editor/tedavitani.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>