<script>
function confirmDelete(delUrl) {
  if (confirm("Bu kaydı silmek istediğinize emin misiniz?")) {
    document.location = delUrl;
  }
}

</script>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
    
  <table width="100%" border="0" cellspacing="1" cellpadding="2" bgcolor="#ffffff">
  <tr height="30">
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;NO</b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;SİTE</b></td>
     <td width="10%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php">KAYIT TARİHİ</a></b></td>
    <td width="15%" valign="middle" bgcolor="#efefef"><b>&nbsp;ADI SOYADI</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;EPOSTA</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=durum">DURUM</a></b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;M</b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;O</b></td>
    <td width="1% valign="middle"" bgcolor="#efefef"><b>&nbsp;S</b></td>
  </tr>
  
  
  <?
  
  
  if(!$order){ $order="zaman"; }
  if($order=="durum"){ $order="durum"; }
  
   
  
  $mesaj_dok = mysql_query("select id, site, adsoyad, email, telefon, durum, zaman from online_form order by $order DESC");
  while(list($m_id, $m_site, $m_ad, $m_email, $m_tel, $m_durum, $m_zaman) = mysql_fetch_row($mesaj_dok)){
	  
	$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';
  
  	if($m_durum=="yeni"){ $bgc="#e6fff3"; }
  
	  
	  $m_ad=iconv("ISO-8859-9", "UTF-8",$m_ad);
	 // $r_ad=ucfirst("$r_ad");


	
	  
  
 echo' 
  <tr height="30">
    <td bgcolor="'.$bgc.'">&nbsp;'.$m_id.'</td>
	<td bgcolor="'.$bgc.'">&nbsp;'.$m_site.'</td>
    <td bgcolor="'.$bgc.'" align="center">&nbsp;'.$m_zaman.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$m_ad.'</td>
   <td bgcolor="'.$bgc.'">&nbsp;'.$m_email.'</td>
	<td bgcolor="'.$bgc.'">&nbsp;'.$m_tel.'</td>
	<td bgcolor="'.$bgc.'" align="center">'.$m_durum.'</td>
	<td bgcolor="'.$bgc.'" align="center"><img src="/admin/_media/user_bonus.gif" border="0"></td>
	<td bgcolor="'.$bgc.'" align="center"><a id="various5" href="mesajincele.php?mesaj='.$m_id.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" align="center"><a href="javascript:confirmDelete(\'/admin/_manage/mh/mesaj.php?ac_t=delete&pro_d='.$m_id.'\');"><img src="/admin/_media/delete_yeni.gif" border="0"></a></td>
	
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