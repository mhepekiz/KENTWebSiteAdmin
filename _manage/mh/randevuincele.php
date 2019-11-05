
     
<!-- Add jQuery library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<!-- Optionaly include easing and/or mousewheel plugins -->
<script type="text/javascript" src="/js/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/css/jquery.fancybox.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.0.3"></script>

<!-- Optionaly include button and/or thumbnail helpers -->
<link rel="stylesheet" href="/js/helpers/jquery.fancybox-buttons.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/helpers/jquery.fancybox-buttons.js?v=2.0.3"></script>

<link rel="stylesheet" href="/js/helpers/jquery.fancybox-thumbs.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/helpers/jquery.fancybox-thumbs.js?v=2.0.3"></script>



<?


	$docroot = $DOCUMENT_ROOT;
	$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();




$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
	
	
	if($e_perm=="no"){

	$randevu_detay = mysql_query("select id, merkez, zaman, adsoyad, email, bolum, doktor, telefon, ceptelefon, tarihsaat, durum, aciklama from online_randevu where id='$randevu'");
	list($r_id, $r_merkez, $r_zaman, $r_ad, $r_email, $r_bolum, $r_doktor, $r_tel, $r_gsm, $r_tsaat, $r_durum, $r_aciklama) = mysql_fetch_row($randevu_detay);
	
	
	if($r_merkez=="cigli"){
	
		$bolum_tara = mysql_query("select poliklinik from poliklinikler where id='$r_bolum'");
		list($r_bolum) = mysql_fetch_row($bolum_tara);
		
			$doktor_tara = mysql_query("select adsoyad from ekip where id='$r_doktor'");
			list($r_doktor) = mysql_fetch_row($doktor_tara);	} elseif($r_merkez=="alsancak"){
				
				
				mysql_close();
				connecttoatip();
				
				$bolum_tara = mysql_query("select poliklinik from poliklinikler where id='$r_bolum'");
		list($r_bolum) = mysql_fetch_row($bolum_tara);
		
			$doktor_tara = mysql_query("select adsoyad from ekip where id='$r_doktor'");
			list($r_doktor) = mysql_fetch_row($doktor_tara);
			
			
			mysql_close();
			connecttodb();
				
			}
	  
	
		if($r_durum=="yeni"){
		$simdi = date("Y-m-d H:i:s");
			
		mysql_query("update online_randevu set ilkokunma='$simdi', ilkokuyan='$e_uname', durum='beklemede' where id='$randevu'");	
			
		}
	
	
	
		 $r_ad=iconv("ISO-8859-9", "UTF-8",$r_ad);
		// $r_aciklama=iconv("UTF-8", "ISO-8859-9",$r_aciklama);		
				
				
					if($randevuislem=="done"){
						$simdi=date("Y-m-d H:i:s");
						
						$mesaj = mysql_real_escape_string($mesaj);
						mysql_query("update online_randevu set durum='$randevu_durum', aciklama='$mesaj', sonislem='$simdi', sonokuyan='$e_uname' where id='$randid'");
						
					echo "<script>parent.$.fancybox.close();</script>"; 	
						
					}
				
				
				
				?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>


 <link rel="stylesheet" type="text/css" href="/css/style.css"/>
 
 
 
 



</head>

<body topmargin="0" leftmargin="0" bgcolor="#FFFFFF">




<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    <form name="randevu_formu" action="randevuincele.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="randevuislem" value="done" />
            <input type="hidden" name="randid" value="<?=$randevu?>" />
            
          
            
            
         
             <tr height="117"><td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="/admin/_media/tepelogobg.png" width="100%">&nbsp;</td>
    <td width="1"><img src="/admin/_media/tepelogo.png" border="0" /></td>
  </tr>
</table>
</td></tr>
  <tr>
    <td width="70%"><table width="100%" border="0" cellspacing="0" cellpadding="10">
   <tr>
    <td width="50%"><span class="form">Merkez</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_merkez?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Form Zamanı</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_zaman?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Ad Soyad</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_ad?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">E-Posta Adresi</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_email?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Randevu İstediği Bölüm</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_bolum?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Randevu İstediği Doktor</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_doktor?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Randevu İstediği Zaman</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_tsaat?></span></td>
  </tr>
   <tr>
    <td width="50%"><span class="form">Telefon 1</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_tel?></span></td>
  </tr>
   <tr>
    <td width="50%"><span class="form">Telefon 2</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$r_gsm?></span></td>
  </tr>
</table>
</td>
    <td width="50%" valign="top" style="border-left-color:#999; border-left-width:1px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="50%"><span class="form">Durum</span></td>
   </tr>
   <tr>
    <td width="50%"><select name="randevu_durum" style="padding: 10px; font-size:12 px; font-family: Arial; border: 1px; border-color:#CCC; border-style:solid" />
    <option value="0" <? if($r_durum=="beklemede"){ echo"selected"; } ?>>----------------</option>
    <option value="randevuok"  <? if($r_durum=="randevuok"){ echo"selected"; } ?>>Randevu Verildi</option>
    <option value="bilgiok"  <? if($r_durum=="bilgiok"){ echo"selected"; } ?>>Bilgi Verildi</option>
    <option value="yok"  <? if($r_durum=="yok"){ echo"selected"; } ?>>Ulaşılamadı</option>
    </select>
    
    
 

    
    </td>
   </tr>
  <tr>
    <td width="30%"><span class="form">Açıklama</span></td>
   </tr>
    <tr>
    <td width="50%"> <textarea name="mesaj" id="textarea" cols="50%" rows="5" style="padding: 10px; font-size:12 px; font-family: Arial; border: 1px; border-color:#CCC; border-style:solid"><?=$r_aciklama?></textarea></td>
   </tr>
 
   <tr>
    <td width="50%" align="right"><input type="submit" class="form-button" name="Submit" value="Kaydet" /></td></form>
  </tr>
</table>
    </td>
  </tr>
</table>
</td>
  </tr>
</table>



</body>
</html>


<? } 


mysql_close();

?>