
     
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
		
		
  $soru_dok = mysql_query("select id, doktorid, adsoyad, email, telefon, sorunuz, zaman, durum from online_doktorasor where id='$soru'");
  list($s_id, $s_doktor, $s_ad, $s_email, $s_tel, $s_soru, $s_zaman, $s_durum) = mysql_fetch_row($soru_dok);

	
	

			$doktor_tara = mysql_query("select adsoyad from ekip where id='$s_doktor'");
			list($s_doktor) = mysql_fetch_row($doktor_tara);	
			
	  
	
		if($s_durum=="yeni"){
		$simdi = date("Y-m-d H:i:s");
			
		mysql_query("update online_doktorasor set ilkzaman='$simdi', ilkokuyan='$e_uname', durum='beklemede' where id='$soru'");	
			
		}
	
	
	
		 $s_ad=iconv("ISO-8859-9", "UTF-8",$s_ad);
		 $s_soru=iconv("ISO-8859-9", "UTF-8",$s_soru);		
				
				
				
				
				
				
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
    <td width="50%"><span class="form"><?=$s_zaman?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Ad Soyad</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$s_ad?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">E-Posta Adresi</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$s_email?></span></td>
  </tr>
  <tr>
    <td width="50%"><span class="form">Doktor</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$s_doktor?></span></td>
  </tr>
 
   <tr>
    <td width="50%"><span class="form">Telefon</span></td>
    <td width="1"><span class="form">:</span></td>
    <td width="50%"><span class="form"><?=$s_tel?></span></td>
  </tr>
  
   <tr bgcolor="#efefef">
    <td colspan="3"><span class="form">Soru</span></td>
  </tr>
  <tr  bgcolor="#efefef">
    <td colspan="3"><span class="altkutu"><?=$s_soru?></span></td>
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