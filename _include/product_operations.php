<?

function filter_filenames($filename){
	
	$response = str_replace("Ý","I",$filename);
	$response = str_replace("ý","i",$response);
	$response = str_replace(" ","_",$response);
	$response = str_replace("þ","s",$response);
	$response = str_replace("Þ","S",$response);
	$response = str_replace("ç","c",$response);
	$response = str_replace("Ç","C",$response);
	$response = str_replace("ö","Ö",$response);
	$response = str_replace("ü","u",$response);
	$response = str_replace("ð","ð",$response);
	$response = str_replace("Ü","U",$response);
	$response = str_replace("Ð","G",$response);
	
	return $response;
	
	
}





function Create_Product_Properties($urunid,$urunkod,$urunad,$sitename,$base,$start,$end,$dongu1,$dongu2){
		
	
		$kodfix = filter_filenames($urunkod);
	
		$filename = "$urunid-$kodfix.html";
		$fullpath = $base . $filename;
		
		
		$start = str_replace("---sitename---",$sitename,$start);
		$start = str_replace("---pagetitle---",$urunad,$start);
		
		$content = $start;
		

		
		$get_urun_oz = mysql_query("select isim,detay from urun_detay where urun = '$urunid' and isim <> 'DELETED'");
		while(list($is,$oz)=mysql_fetch_row($get_urun_oz)){
			$tc = (($tc == '#F2F2F2'))? '#FFFFFF' : '#F2F2F2';
			$findme  = '</';
			$pos = strpos($oz, $findme);

			if ($pos === false) {
			   $oz = nl2br($oz);
			} else {
				
				$tc = "";
				
			}
	

			if(!$is){
				
			
				
				$d1 = str_replace("---ozellik---",$oz,$dongu1);
				$d1 = str_replace("---bgc---",$tc,$d1);
							
				$content .= $d1;
				
			} else {
							
				
					
					
				$d2 = str_replace("---ozellik---",$oz,$dongu2);
				$d2 = str_replace("---bgc---",$tc,$d2);
				$d2 = str_replace("---isim---",$is,$d2);
				
		
				
				$content .= $d2;
			}

		}
		
		$content .= $end;
		
		touch($fullpath);
		$handle = fopen($fullpath, 'w');
  		fwrite($handle, $content);
  		fclose($handle);

		
}



function Create_Product_Taksit($urunid,$urunkod,$urunad,$sitename,$base,$start,$end,$dongu_op_pos,$dongu_op_det,$dongu_taksit,$bg1,$bg2,$iko0,$ikox){
		


$ks=0;
$get_kur = mysql_query("select cins,parite from kurlar");
while(list($cins,$parite)=mysql_fetch_row($get_kur)){
	$ks=$ks+1;
	$par[$cins]=$parite;
}



	$get_urun_p = mysql_query("select fiyat,fiyatkur,kdv,indirim from urunler where id='$urunid'");

list($ud_fiyat,$fiyatkur,$ud_kdv,$ud_indirim)=mysql_fetch_row($get_urun_p);


$ud_fiyat = $ud_fiyat - ($ud_fiyat * $ud_indirim) / 100;



$kdvsi = $ud_fiyat * $ud_kdv / 100 ;
$kdvli = $ud_fiyat + $kdvsi;
if($fiyatkur=="USD"){
	$fiyatson = $kdvli * $par['USD'];

} else if($fiyatkur=="EURO"){
	$fiyatson = $kdvli * $par['EURO'];

} else if($fiyatkur=="TL"){
	$fiyatson = $kdvli * 1;

}
	

//echo "<br><br>$fiyatson<br><br>";
	
		$kodfix = filter_filenames($urunkod);
	
		$filename = "$urunid-$kodfix.html";
		$fullpath = $base . $filename;
		
		
		$start = str_replace("---sitename---",$sitename,$start);
		$start = str_replace("---pagetitle---",$urunad,$start);
		
		$op_dets = $dongu_op_det;
		$op_taksit = $dongu_taksit;

		$content = $start;

		$say_op = mysql_query("select count(*) from cc_operator");
		list($op_say)=mysql_fetch_row($say_op);
		

		$get_urun_fiyat = mysql_query("select ");


		$i=0; $j=0; $k=0;
		$get_cc_ops = mysql_query("select id,operator from cc_operator order by id desc");
		while(list($op_id,$op_ad)=mysql_fetch_row($get_cc_ops)){
		$j++;
		$k++;
			if($i==0){
				$opposleft = str_replace("---operator_adi---",$op_ad,$op_dets);
				$optl = ''; $optl_put=''; $bgc='';
				$get_ops_taksit = mysql_query("select taksit,faiz from cc_taksit where operator='$op_id' order by taksit");
				while(list($taksitl,$faizl)=mysql_fetch_row($get_ops_taksit)){
					$bgc = (($bgc == $bg1))? $bg2 : $bg1;
					if($faizl=='0'){ $fikol=$iko0; } else { $fikol=$ikox; }

					$faiztutar = $fiyatson * $faizl/100;
					$toplam = $fiyatson + $faiztutar;
					$taksittutar = $toplam / $taksitl ;
					$toplam = number_format($toplam, 2, ',', '.');
					$taksittutar = number_format($taksittutar, 2, ',', '.');


					$optl = str_replace("---taksit---",$taksitl,$op_taksit);
					$optl = str_replace("---bg---",$bgc,$optl);
					$optl = str_replace("---faizikon---",$fikol,$optl);
					$optl = str_replace("---toplam---",$toplam,$optl);
					$optl = str_replace("---taksit_tutar---",$taksittutar,$optl);
					$optl_put .= $optl; 

				}

				$opposleft = str_replace("---taksitler---",$optl_put,$opposleft);

				$optl_put = '';
				$i++;
			} else {
				$opposright=str_replace("---operator_adi---",$op_ad,$op_dets);

				$optr = ''; $optl_put=''; $bgc='';
				$get_ops_taksit = mysql_query("select taksit,faiz from cc_taksit where operator='$op_id' order by taksit");
				while(list($taksitr,$faizr)=mysql_fetch_row($get_ops_taksit)){
					$bgc = (($bgc == $bg1))? $bg2 : $bg1;
					if($faizr=='0'){ $fikor=$iko0; } else { $fikor=$ikox; }


					$faiztutar = $fiyatson * $faizr/100;
					$toplam = $fiyatson + $faiztutar;
					$taksittutar = $toplam / $taksitr ;
					$toplam = number_format($toplam, 2, ',', '.');
					$taksittutar = number_format($taksittutar, 2, ',', '.');

					$optr = str_replace("---taksit---",$taksitr,$op_taksit);
					$optr = str_replace("---bg---",$bgc,$optr);
					$optr = str_replace("---faizikon---",$fikor,$optr);
					$optr = str_replace("---toplam---",$toplam,$optr);
					$optr = str_replace("---taksit_tutar---",$taksittutar,$optr);

					$optr_put .= $optr; 

				}

				$opposright = str_replace("---taksitler---",$optr_put,$opposright);
				$optr_put = '';
				$i=0;
			}

			if($j==2){
				$j=0;
				$dongu_op_pos_build = str_replace("---operator_left---",$opposleft,$dongu_op_pos);
				$dongu_op_pos_build = str_replace("---operator_right---",$opposright,$dongu_op_pos_build);
	
				$content .= $dongu_op_pos_build;
	
			} else if(($j==1) && ($op_say==$k)){
	
				$dongu_op_pos_build = str_replace("---operator_left---",$opposleft,$dongu_op_pos);
				$dongu_op_pos_build = str_replace("---operator_right---"," ",$dongu_op_pos_build);
	
				$content .= $dongu_op_pos_build;
			}


		}
		
/*
if(!file_exists($fullpath)){
touch($fullpath);
}
$handle = fopen($fullpath, 'w');
fwrite($handle, $content);
fclose($handle);
*/

echo $content;
		
}



function Create_Product_Video($urunid,$urunkod,$urunad,$sitename,$base,$start,$end,$dongu1){
		
	
		$kodfix = filter_filenames($urunkod);
	
		$filename = "$urunid-$kodfix.html";
		$fullpath = $base . $filename;
		
		
		$start = str_replace("---sitename---",$sitename,$start);
		$start = str_replace("---pagetitle---",$urunad,$start);
		
		$content = $start;
		

		
		$get_urun_vi = mysql_query("select video from urunler where id = '$urunid'");
		list($vid)=mysql_fetch_row($get_urun_vi);
			$tc = (($tc == '#F2F2F2'))? '#FFFFFF' : '#F2F2F2';
			
			
				
				$d1 = str_replace("---vid---",$vid,$dongu1);
				
		$content .= $d1;

		$content .= $end;
		
		touch($fullpath);
		$handle = fopen($fullpath, 'w');
  		fwrite($handle, $content);
  		fclose($handle);

		
}



function Upload_Product_Picture($urunid,$resim,$resim_name,$small_size,$medium_size,$large_size,$path,$folder,$e_uname,$proc_mess){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$urunid"."$p_x"."-"."$resim_name";
			
		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";
			
		move_uploaded_file($resim, $moved);
	     
			
	    // resize to 450 w
	    $tumber = $moved;
		$target_large = "$path"."$urunid"."_large_"."$p_x"."-"."$resim_name";
		$THUMB_X = $large_size;
		$THUMB_Y = $large_size;
		$son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
			
		// resize to 160 w		  
			
		$target_detail = "$path"."$urunid"."_detail_"."$p_x"."-"."$resim_name";	
			
		$THUMB_X_detail = $medium_size;
		$THUMB_Y_detail = $medium_size;	
			
		$son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	
		$detail_sql_name = str_replace($path,$folder,$son_detail);
			
		// resize to 100 w
			
		$target_home = "$path"."$urunid"."_home_"."$p_x"."-"."$resim_name";	
		$THUMB_X_home = $small_size;
		$THUMB_Y_home = $small_size;	
		$son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	
		$home_sql_name = str_replace($path,$folder,$son_home);
			
			
			
	    // write to sql
			
		mysql_query("insert into urun_resim (urunid,resim_k,resim_o,resim_b,tarih,editor) values ('$urunid','$home_sql_name','$detail_sql_name','$large_sql_name','$tarih','$e_uname')");       
			
			        
		$proc = "$proc_mess ($urunid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}




function Upload_Firsat_Picture($resim,$resim_name,$resim2,$resim2_name,$path,$folder,$e_uname,$proc_mess){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	 	$urunid="0001";
	 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$urunid"."$p_x"."-"."$resim_name";
	     $moved2 = "$path"."$urunid"."$p_x"."-"."$resim2_name";
		
			
			
		move_uploaded_file($resim, $moved);
		move_uploaded_file($resim2, $moved2);



		$THUMB_X_large = 150;
		$THUMB_Y_large = 150;	
 
		$target_large = "$path"."$urunid"."_large_"."$p_x"."-"."$resim_name";
		$son_large = image_createThumb($moved,$target_large,$THUMB_X_large,$THUMB_Y_large,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
	    	
			
		$THUMB_X_detail = 300;
		$THUMB_Y_detail = 500;	
 
		$target_detail = "$path"."$urunid"."_detail_"."$p_x"."-"."$resim2_name";
		$son_detail = image_createThumb($moved2,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);
		$detail_sql_name = str_replace($path,$folder,$son_detail);
			
			unlink($moved);
			unlink($moved2);
			
	    // write to sql
	    
	    mysql_query("update urun_firsat set banner='$large_sql_name', afis='$detail_sql_name' where id='1'");
	    
			
		//mysql_query("insert into urun_firsat (urunid,banner,afis,tarih,editor) values ('$urunid','$moved','$moved2','$tarih','$e_uname')");       
			
			        
		$proc = "$proc_mess ($urunid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}



function Upload_Uclu_Picture($bid,$resim,$resim_name,$path,$folder,$e_uname,$proc_mess){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	 		 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$bid"."$p_x"."-"."$resim_name";
	     $moved2 = "$path"."$bid"."$p_x"."-"."$resim2_name";
		
			
			
		move_uploaded_file($resim, $moved);
	
		$THUMB_X_large = 370;
		$THUMB_Y_large = 150;	
 
		$target_large = "$path"."$bid"."_large_"."$p_x"."-"."$resim_name";
		$son_large = image_createThumb($moved,$target_large,$THUMB_X_large,$THUMB_Y_large,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
	    	
			
				
			unlink($moved);

	    // write to sql
	    
	    mysql_query("update reklam_ana_3 set banner='$large_sql_name' where id='$bid'");
	    
			
		//mysql_query("insert into urun_firsat (urunid,banner,afis,tarih,editor) values ('$urunid','$moved','$moved2','$tarih','$e_uname')");       
			
			        
		$proc = "$proc_mess ($urunid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}







function Upload_Brand_Logo($markaid,$resim,$resim_name,$small_size,$medium_size,$large_size,$path,$folder,$e_uname){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$urunid"."$p_x"."-"."$resim_name";
			
		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";
			
		move_uploaded_file($resim, $moved);
	     
			
	    // resize to 450 w
	    $tumber = $moved;
		$target_large = "$path"."$urunid"."_large_"."$p_x"."-"."$resim_name";
		$THUMB_X = "450";
		$THUMB_Y = "450";
		$son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
			
		// resize to 160 w		  
			
		$target_detail = "$path"."$urunid"."_detail_"."$p_x"."-"."$resim_name";	
			
		$THUMB_X_detail = "160";
		$THUMB_Y_detail = "160";	
			
		$son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	
		$detail_sql_name = str_replace($path,$folder,$son_detail);
			
		// resize to 100 w
			
		$target_home = "$path"."$urunid"."_home_"."$p_x"."-"."$resim_name";	
		$THUMB_X_home = "100";
		$THUMB_Y_home = "100";	
		$son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	
		$home_sql_name = str_replace($path,$folder,$son_home);
			
			
			
	    // write to sql
			
		mysql_query("update markalar set logo='$home_sql_name' where id='$markaid'");	
			
			        
		$proc = "$proc_mess ($markaid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}



function Upload_Bank_Logo($markaid,$resim,$resim_name,$small_size,$medium_size,$large_size,$path,$folder,$e_uname){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$urunid"."$p_x"."-"."$resim_name";
			
		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";
			
		move_uploaded_file($resim, $moved);
	     
			
	    // resize to 450 w
	    $tumber = $moved;
		$target_large = "$path"."$urunid"."_large_"."$p_x"."-"."$resim_name";
		$THUMB_X = "450";
		$THUMB_Y = "450";
		$son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
			
		// resize to 160 w		  
			
		$target_detail = "$path"."$urunid"."_detail_"."$p_x"."-"."$resim_name";	
			
		$THUMB_X_detail = "160";
		$THUMB_Y_detail = "160";	
			
		$son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	
		$detail_sql_name = str_replace($path,$folder,$son_detail);
			
		// resize to 100 w
			
		$target_home = "$path"."$urunid"."_home_"."$p_x"."-"."$resim_name";	
		$THUMB_X_home = "100";
		$THUMB_Y_home = "100";	
		$son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	
		$home_sql_name = str_replace($path,$folder,$son_home);
			
			
			
	    // write to sql
			
		mysql_query("update cc_operator set logo='$home_sql_name', zaman='$tarih' where id='$markaid'");	
			
			        
		$proc = "$proc_mess ($markaid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}




function Upload_Kargo_Logo($markaid,$resim,$resim_name,$small_size,$medium_size,$large_size,$path,$folder,$e_uname){
	 if (!is_writable($path)) {
		$error_upload =  "true";
	 }
			
	 if(!$error_upload){
	 	
	 	$tarih = date("Y-m-d H:i:s");
	 	
	    $p_x = date("Ymdhis");
	    $moved = "$path"."$urunid"."$p_x"."-"."$resim_name";
			
		//$sql_name_large = "$pitcure_folder"."$u_id"."_large_"."$p_x"."-"."$filename";
			
		move_uploaded_file($resim, $moved);
	     
			
	    // resize to 450 w
	    $tumber = $moved;
		$target_large = "$path"."$urunid"."_large_"."$p_x"."-"."$resim_name";
		$THUMB_X = "450";
		$THUMB_Y = "450";
		$son_large = image_createThumb($tumber,$target_large,$THUMB_X,$THUMB_Y,$quality=100);
		$large_sql_name = str_replace($path,$folder,$son_large);
			
		// resize to 160 w		  
			
		$target_detail = "$path"."$urunid"."_detail_"."$p_x"."-"."$resim_name";	
			
		$THUMB_X_detail = "160";
		$THUMB_Y_detail = "160";	
			
		$son_detail = image_createThumb($tumber,$target_detail,$THUMB_X_detail,$THUMB_Y_detail,$quality=100);	
		$detail_sql_name = str_replace($path,$folder,$son_detail);
			
		// resize to 100 w
			
		$target_home = "$path"."$urunid"."_home_"."$p_x"."-"."$resim_name";	
		$THUMB_X_home = "100";
		$THUMB_Y_home = "100";	
		$son_home = image_createThumb($tumber,$target_home,$THUMB_X_home,$THUMB_Y_home,$quality=100);	
		$home_sql_name = str_replace($path,$folder,$son_home);
			
			
			
	    // write to sql
			
		mysql_query("update kargo_sirket set logo='$home_sql_name' where id='$markaid'");	
			
			        
		$proc = "$proc_mess ($markaid)...";
			
		mysql_query("insert into urun_logs (proc,editor,tarih) values ('$proc','$e_uname','$tarih')");
			
			
			
		$response = "true";
			
	} else {
			
		$response = "false";    
	}
	
	return $response;
}



function Bundle_Product($kod,$bundlekod,$type,$editor,$tarih){
	
	if($type=="r"){ $konum="r"; } else { $konum="b"; }
	mysql_query("insert into urun_bundle (urunkod,bundlekod,konum,tarih,editor) values ('$kod','$bundlekod','$konum','$tarih','$editor')");
	
}

?>