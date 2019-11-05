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
     <td width="10%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php">KAYIT TARİHİ</a></b></td>
    <td width="10%" valign="middle" bgcolor="#efefef"><b>&nbsp;ADI SOYADI</b></td>
    <td width="20%" valign="middle" bgcolor="#efefef"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=bolum">EMAIL</a></b></td>
    <td width="20%" valign="middle" bgcolor="#efefef"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=doktor">DOKTOR</a></b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON 1</b></td>
   
    <td width="6%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=durum">DURUM</a></b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;M</b></td>
    <td width="1%" valign="middle" bgcolor="#efefef"><b>&nbsp;O</b></td>
    <td width="1% valign="middle"" bgcolor="#efefef"><b>&nbsp;S</b></td>
  </tr>
  
  
  <?
  
  
  if(!$order){ $order="zaman"; }
  if($order=="bolum"){ $order="bolum"; }
  if($order=="doktor"){ $order="doktor"; }
  if($order=="durum"){ $order="durum"; }
  
  if($merkez=="cigli"){ $nerede="where merkez='cigli'"; }
  if($merkez=="alsancak"){ $nerede="where merkez='alsancak'"; }
  
  
  
  $randevu_dok = mysql_query("select id, doktorid, adsoyad, email, telefon, zaman, durum from online_doktorasor order by zaman DESC");
  while(list($s_id, $s_doktor, $s_ad, $s_email, $s_tel, $s_zaman, $s_durum) = mysql_fetch_row($randevu_dok)){
	  
	$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';
  
  	if($s_durum=="yeni"){ $bgc="#e6fff3"; }
  
	  
	  $s_ad=iconv("ISO-8859-9", "UTF-8",$s_ad);
	 // $r_ad=ucfirst("$r_ad");


			$doktor_tara = mysql_query("select adsoyad from ekip where id='$s_doktor'");
			list($s_doktor) = mysql_fetch_row($doktor_tara);	
				
				
		
	  
  
 echo' 
  <tr height="30">
    <td bgcolor="'.$bgc.'">&nbsp;'.$s_id.'</td>
     <td bgcolor="'.$bgc.'" align="center">&nbsp;'.$s_zaman.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$s_ad.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$s_email.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$s_doktor.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$s_tel.'</td>
	<td bgcolor="'.$bgc.'" align="center">'.$s_durum.'</td>
	<td bgcolor="'.$bgc.'" align="center"><img src="/admin/_media/user_bonus.gif" border="0"></td>
	<td bgcolor="'.$bgc.'" align="center"><a id="various5" href="soruincele.php?soru='.$s_id.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" align="center"><a href="javascript:confirmDelete(\'/admin/_manage/mh/doktorasor.php?ac_t=delete&pro_d='.$s_id.'\');"><img src="/admin/_media/delete_yeni.gif" border="0"></a></td>
	
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