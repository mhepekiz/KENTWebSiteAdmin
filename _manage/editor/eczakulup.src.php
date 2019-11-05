<script>
function confirmDelete(delUrl) {
  if (confirm("Bu kaydı silmek istediğinize emin misiniz?")) {
    document.location = delUrl;
  }
}

</script>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr><td>
  <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC">
  <tr height="30">
    <td bgcolor="#efefef" width="1"><img src="/admin/_media/export2excelsml.gif" border="0" /></td>
   <td bgcolor="#EFEFEF" width="99%"><table width="40%" border="0" cellspacing="0" cellpadding="0">
  <form method="post" enctype="multipart/form-data" action="/admin/_manage/editor/e_excel.php" target="_blank"><tr>
    <td><script>DateInput('firstdate', true, 'YYYY-MON-DD')</script></td>
    <td><script>DateInput('lastdate', true, 'YYYY-MON-DD')</script></td>
    <td><input type="submit" value="Excel Dök"></td>
  </tr></form>
</table>
</td> 
    
  </tr>
</table>
  
  </td></tr><tr><td>&nbsp;</td></tr><tr>
    <td>
    
  <table width="100%" border="0" cellspacing="1" cellpadding="2" bgcolor="#ffffff">
  <tr height="30">
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;NO</b></td>
    <td width="5%" valign="middle" bgcolor="#efefef"><b>&nbsp;SIRA NO</b></td>
    <td width="15%" valign="middle" bgcolor="#efefef"><b>&nbsp;ADI SOYADI</b></td>
    <td width="20%" valign="middle" bgcolor="#efefef"><b>&nbsp;ECZANE</b></td>
    <td width="10%" valign="middle" bgcolor="#efefef"><b>&nbsp;DOĞUM TARİHİ</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON 1</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON 2</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;ŞEHİR</b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;M</b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;O</b></td>
    <td width="1% valign="middle"" bgcolor="#efefef"><b>&nbsp;S</b></td>
  </tr>
  
  
  <?
  
 
  
  
  
  $kayit_dok = mysql_query("select id, sirano, adsoyad, eczane, dogumtarihi, eczanetel, emailx, ceptel, adres, semtilce, sehir, kangrubu, zaman, ipadresi from eczakulup order by sirano DESC");
  while(list($e_id, $e_sira, $e_ad, $e_eczane, $e_dt, $e_etel, $e_email, $e_cep, $e_adres, $e_semt, $e_sehir, $e_kan, $e_zaman, $e_ip) = mysql_fetch_row($kayit_dok)){
	  
	$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';
  
  	  
	  $e_ad=iconv("ISO-8859-9", "UTF-8",$e_ad);
	  $e_sehir=iconv("ISO-8859-9", "UTF-8",$e_sehir);
	 // $r_ad=ucfirst("$r_ad");


  
 echo' 
  <tr height="30">
    <td bgcolor="'.$bgc.'">&nbsp;'.$e_id.'</td>
	<td bgcolor="'.$bgc.'">&nbsp;'.$e_sira.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$e_ad.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$e_eczane.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$e_dt.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$e_etel.'</td>
	<td bgcolor="'.$bgc.'">&nbsp;'.$e_cep.'</td>
	<td bgcolor="'.$bgc.'" align="center">'.$e_sehir.'</td>
	<!-- <td bgcolor="'.$bgc.'" align="center"><img src="/admin/_media/user_bonus.gif" border="0"></td>
	<td bgcolor="'.$bgc.'" align="center"><a id="various5" href="randevuincele.php?randevu='.$r_id.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" align="center"><a href="javascript:confirmDelete(\'/admin/_manage/mh/randevu.php?ac_t=delete&pro_d='.$r_id.'\');"><img src="/admin/_media/delete_yeni.gif" border="0"></a></td>-->
	
  </tr>';
  
  }
  
  
  ?>
</table>


</td>
  </tr>
</table>
	<script type="text/javascript"> 
	
	
   $("#various5").fancybox({
	    'autoScale'     	: true,
        'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type'		    : 'iframe'
		
	});
</script> 