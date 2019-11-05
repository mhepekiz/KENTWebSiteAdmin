<?


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
	
	
	$fuar = mysql_real_escape_string($fuar);
	$konum = mysql_real_escape_string($konum);
	

function aylar($ayx){
$degis1 = array('OCA','SUB','MAR','NIS','MAY','HAZ','TEM','EYL','EKI','KAS','ARA');
$degis2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
$ayx    =str_replace($degis1,$degis2,$ayx);
return $ayx;
}


		$orderx = aylar($orderdate);
		$ord = explode('-', $orderx);
		
		
		$ordery = aylar($orderdate2);
		$ordy = explode('-', $ordery);
		
		
		
		
		$orderdate = "$ord[2]-$ord[1]-$ord[0]";
		$orderdate2 = "$ordy[2]-$ordy[1]-$ordy[0]";
		
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into fuarlar (lang, baslangic, bitis, fuar, konum, logo_1, logo_2, zaman, editor) values ('$lang','$orderdate','$orderdate2','$fuar','$konum','0','0','$zaman','$e_uname')")or die("DB Error");



$haberim = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_fuar/";
$pitcure_folder = "/_all_media/_fuar/";





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
          $tumber = $moved;
      

     

		  $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$ressim";	

		  $THUMB_X_detail = 150;

		  $THUMB_Y_detail = 150;	

		  $son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

       
		  $target_home = "$pitcure_path"."$u_id"."_home_"."$p_x"."-"."$ressim";	

		  $THUMB_X_home = 80;

		  $THUMB_Y_home = 80;	

		  $son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	

		  $home_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_home);

   


        $upload_ok = "true";



    } else {

      

      $return_error = $error_upload;    

        

    }
    
    
     // write to sql


	mysql_query("update fuarlar set logo_1='$home_sql_name', logo_2='$detail_sql_name' where id='$haberim'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        
			
			
			
			
     
$proc = "Fuar eklendi ($fuar)...";



echo "<script> alert(\"Fuar eklendi ($fuar)...\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
}


		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/fuar_main.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>