
     
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

	$mesaj_detay = mysql_query("select id, adsoyad, email, telefon, mesaj, durum, aciklama, zaman, ipadresi from online_form where id='$mesaj'");
	list($m_id, $m_ad, $m_email, $m_tel, $m_mesaj, $m_durum, $m_aciklama, $m_zaman, $m_ip) = mysql_fetch_row($mesaj_detay);
	
	

	  
	
		if($m_durum=="yeni"){
		$simdi = date("Y-m-d H:i:s");
			
		mysql_query("update online_form set ilkokunma='$simdi', ilkokuyan='$e_uname', durum='beklemede' where id='$mesaj'");	
			
		}
	
	
	
		 $m_ad=iconv("ISO-8859-9", "UTF-8",$m_ad);
		 $m_mesaj=iconv("ISO-8859-9", "UTF-8",$m_mesaj);
		// $r_aciklama=iconv("UTF-8", "ISO-8859-9",$r_aciklama);		
				
				
					if($mesajislem=="done"){
						$simdi=date("Y-m-d H:i:s");
						
						$mesaj = mysql_real_escape_string($mesaj);
						mysql_query("update online_form set durum='$mesaj_durum', aciklama='$mesaj', sonokunma='$simdi', sonokuyan='$e_uname' where id='$mesid'");
						
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
    
    <form name="randevu_formu" action="mesajincele.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="mesajislem" value="done" />
            <input type="hidden" name="mesid" value="<?=$mesaj?>" />
            
          
            
            
         
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
    <td width="50%"><span class="form">Form Zamanı</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$m_zaman?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Ad Soyad</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$m_ad?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">E-Posta Adresi</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$m_email?></span></td>
  </tr>
   <tr>
    <td width="50%"><span class="form">Telefon</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$m_tel?></span></td>
  </tr>
   <tr>
    <td colspan="3" valign="top"><span class="form">Mesaj</span></td>
  </tr>
   <tr  bgcolor="#efefef" height="100">
    <td colspan="3" valign="top"><span class="altkutu"><?=$m_mesaj?></span></td>
  </tr>
  
</table>
</td>
    <td width="50%" valign="top" style="border-left-color:#999; border-left-width:1px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="50%"><span class="form">Durum</span></td>
   </tr>
   <tr>
    <td width="50%"><select name="mesaj_durum" style="padding: 10px; font-size:12 px; font-family: Arial; border: 1px; border-color:#CCC; border-style:solid" />
    <option value="0" <? if($m_durum=="beklemede"){ echo"selected"; } ?>>----------------</option>
    <option value="randevuok"  <? if($m_durum=="randevuok"){ echo"selected"; } ?>>Randevu Verildi</option>
    <option value="bilgiok"  <? if($m_durum=="bilgiok"){ echo"selected"; } ?>>Bilgi Verildi</option>
    <option value="iletildi"  <? if($m_durum=="iletildi"){ echo"selected"; } ?>>İlgili Bölüme İletildi</option>
    <option value="yok"  <? if($m_durum=="yok"){ echo"selected"; } ?>>Ulaşılamadı</option>
    </select>
    
    
 

    
    </td>
   </tr>
  <tr>
    <td width="30%"><span class="form">Açıklama</span></td>
   </tr>
    <tr>
    <td width="50%"> <textarea name="mesaj" id="textarea" cols="50%" rows="5" style="padding: 10px; font-size:12 px; font-family: Arial; border: 1px; border-color:#CCC; border-style:solid"><?=$m_aciklama?></textarea></td>
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