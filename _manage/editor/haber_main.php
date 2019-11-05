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
	
	
	
	$zmn = explode('-', $orderdate);
	
	if($zmn[1]=="OCA"){ $ay = "1"; }
	if($zmn[1]=="SUB"){ $ay = "2"; }
	if($zmn[1]=="MAR"){ $ay = "3"; }
	if($zmn[1]=="NIS"){ $ay = "4"; }
	if($zmn[1]=="MAY"){ $ay = "5"; }
	if($zmn[1]=="HAZ"){ $ay = "6"; }
	if($zmn[1]=="TEM"){ $ay = "7"; }
	if($zmn[1]=="AGU"){ $ay = "8"; }
	if($zmn[1]=="EYL"){ $ay = "9"; }
	if($zmn[1]=="EKI"){ $ay = "10"; }
	if($zmn[1]=="KAS"){ $ay = "11"; }
	if($zmn[1]=="ARA"){ $ay = "12"; }
	

	$bitisi = "$zmn[2]-$ay-$zmn[0]";

	
	$baslik = mysql_real_escape_string($baslik);
	$metin = mysql_real_escape_string($metin);
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into haberler (kategori, baslik, metin, bitis, foto_1, foto_2, foto_3, zaman, editor) values ('$kategori','$baslik','$metin','$bitisi','1','2','3','$zaman','$e_uname')")or die("DB Error");
			$haberim = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_news/";
$pitcure_folder = "/_all_media/_news/";





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

		  $THUMB_X = 400;

		  $THUMB_Y = 400;

  		  $son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);

		  $large_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_large);

        // resize to 70 w		  

		  $target_detail = "$pitcure_path"."$u_id"."_detail_"."$p_x"."-"."$ressim";	

		  $THUMB_X_detail = 150;

		  $THUMB_Y_detail = 150;	

		  $son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	

		  $detail_sql_name = str_replace($pitcure_path,$pitcure_folder,$son_detail);

        // resize to 100 w

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


	mysql_query("update haberler set foto_1='$home_sql_name', foto_2='$detail_sql_name', foto_3='$large_sql_name' where id='$haberim'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Haber eklendi ($baslik)...";



echo "<script> alert(\"Haber eklendi ($baslik)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
	
	if($ac_t=="del"){
		
	mysql_query("delete from haberler where id='$remhid'");		
		
	  
$proc = "Haber silindi ($remhid)...";



echo "<script> alert(\"Haber silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");	
	}
	
	
	
	
	
	
$welcomefile=$docroot."/admin/_manage/editor/haber_main.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>