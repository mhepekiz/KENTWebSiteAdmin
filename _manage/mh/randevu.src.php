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
    <td bgcolor="#EFEFEF" width="15%"><a href="/admin/_manage/mh/randevu.php?merkez=cigli&order=<?=$order?>"><b>ÇİĞLİ RANDEVULARI</b></a></td>
    <td bgcolor="#EFEFEF" width="15%"><a href="/admin/_manage/mh/randevu.php?merkez=alsancak&order=<?=$order?>"><b>ALSANCAK RANDEVULARI</b></a></td>
    <td bgcolor="#EFEFEF" width="15%"><a href="/admin/_manage/mh/randevu.php?order=<?=$order?>"><b>TÜM RANDEVULAR</b></a></td>
    <td bgcolor="#efefef" width="1"><img src="/admin/_media/export2excelsml.gif" border="0" /></td>
   <td bgcolor="#EFEFEF" width="70%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form method="post" enctype="multipart/form-data" action="/admin/_manage/mh/excel.php" target="_blank"><tr>
    <td><script>DateInput('firstdate', true, 'YYYY-MON-DD')</script></td>
    <td><script>DateInput('lastdate', true, 'YYYY-MON-DD')</script></td>
    <td><select name="hangiklinik">
    <option value="1">Hepsi</option>
    <option value="2">Çiğli</option>
    <option value="3">Alsancak</option>
    </select></td>
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
    <td width="2%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;MERKEZ</b></td>
    <td width="10%" valign="middle" bgcolor="#efefef" align="center"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php">KAYIT TARİHİ</a></b></td>
    <td width="15%" valign="middle" bgcolor="#efefef"><b>&nbsp;ADI SOYADI</b></td>
    <td width="20%" valign="middle" bgcolor="#efefef"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=bolum">BÖLÜM</a></b></td>
    <td width="20%" valign="middle" bgcolor="#efefef"><b>&nbsp;<a href="/admin/_manage/mh/randevu.php?order=doktor">DOKTOR</a></b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON 1</b></td>
    <td width="6%" valign="middle" bgcolor="#efefef"><b>&nbsp;TELEFON 2</b></td>
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
  
  
  
  $randevu_dok = mysql_query("select id, merkez, zaman, adsoyad, email, bolum, doktor, telefon, ceptelefon, durum from online_randevu $nerede order by $order DESC");
  while(list($r_id, $r_merkez, $r_zaman, $r_ad, $r_email, $r_bolum, $r_doktor, $r_tel, $r_cep, $r_durum) = mysql_fetch_row($randevu_dok)){
	  
	$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';
  
  	if($r_durum=="yeni"){ $bgc="#e6fff3"; }
  
	  
	  $r_ad=iconv("ISO-8859-9", "UTF-8",$r_ad);
	 // $r_ad=ucfirst("$r_ad");


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
	  
  
 echo' 
  <tr height="30">
    <td bgcolor="'.$bgc.'">&nbsp;'.$r_id.'</td>
    <td bgcolor="'.$bgc.'" align="center">&nbsp;'.$r_merkez.'</td>
    <td bgcolor="'.$bgc.'" align="center">&nbsp;'.$r_zaman.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$r_ad.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$r_bolum.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$r_doktor.'</td>
    <td bgcolor="'.$bgc.'">&nbsp;'.$r_tel.'</td>
	<td bgcolor="'.$bgc.'">&nbsp;'.$r_cep.'</td>
	<td bgcolor="'.$bgc.'" align="center">'.$r_durum.'</td>
	<td bgcolor="'.$bgc.'" align="center"><img src="/admin/_media/user_bonus.gif" border="0"></td>
	<td bgcolor="'.$bgc.'" align="center"><a id="various5" href="randevuincele.php?randevu='.$r_id.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" align="center"><a href="javascript:confirmDelete(\'/admin/_manage/mh/randevu.php?ac_t=delete&pro_d='.$r_id.'\');"><img src="/admin/_media/delete_yeni.gif" border="0"></a></td>
	
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