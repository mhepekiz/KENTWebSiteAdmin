<?

function imaj($foto){
$foto = strtolower($foto);
$degis1 = array('�','�','�','�','�','�','�','�','�','�','�','�','_',' ','--','---','�');
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
	
	

function aylar($ayx){
$degis1 = array('OCA','SUB','MAR','NIS','MAY','HAZ','TEM','AGU','EYL','EKI','KAS','ARA');
$degis2 = array('01','02','03','04','05','06','07','08','09','10','11','12');
$ayx    =str_replace($degis1,$degis2,$ayx);
return $ayx;
}


		$orderx = aylar($orderdate);
		$ord = explode('-', $orderx);
	
	echo"---------------------------$orderdate";
		
		$orderdate = "$ord[2]-$ord[1]-$ord[0]";
		
	$anne = mysql_real_escape_string($anne);
	$baba = mysql_real_escape_string($baba);
	$adsoyad = mysql_real_escape_string($adsoyad);
	
		//	$detay = addslashes($detay);
		//	$baslik = addslashes($baslik);
			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into bebekler (bebekad, annead, babaad, dogumtarihi, cinsiyet, zaman, editor) values ('$adsoyad','$anne','$baba','$orderdate','$cinsiyet','$zaman','$e_uname')")or die("DB Error");
			$bbk = mysql_insert_id();
			

$pitcure_path = $docroot."/_all_media/_bebek/";
$pitcure_folder = "/_all_media/_bebek/";





function resim($res){
$res = strtolower($res);
$degis1 = array('I','�','�','G','�','S','�','�','g','�','s','�','_',' ','--','---','i');
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


	mysql_query("update bebekler set foto_1='$home_sql_name', foto_2='$detail_sql_name' where id='$bbk'") or die("DB Err");
	
//echo"$home_sql_name//////// $large_sql_name";
	        

     
$proc = "Bebek eklendi ($adsoyad)...";



echo "<script> alert(\"Bebek eklendi ($adsoyad)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	
			 }
   			


		}
		
		
		if($ac_t=="del"){
			
			
		mysql_query("delete from bebekler where id='$remhid'");
		
			   
$proc = "Bebek silindi ($remhid)...";



echo "<script> alert(\"Bebek silindi ($remhid)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
			
		}
		
		
		
		
	
$welcomefile=$docroot."/admin/_manage/editor/bebekler.src.php";
include($welcomefile);

}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>