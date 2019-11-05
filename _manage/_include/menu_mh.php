 <?
 
 



	$kontrol_yeni_randevu = mysql_query("select id from online_randevu where durum='yeni'");
	list($yeni_randevu) = mysql_fetch_row($kontrol_yeni_randevu);
	
	if($yeni_randevu){ $rand_img = "doktor_on.gif"; } else { $rand_img = "doktor.gif"; }
	
	$kontrol_yeni_soru = mysql_query("select id from online_doktorasor where durum='yeni'");
	list($yeni_soru) = mysql_fetch_row($kontrol_yeni_soru);
	
	if($yeni_soru){ $soru_img = "klinik_on.gif"; } else { $soru_img = "klinik.gif"; }


	$kontrol_yeni_mesaj = mysql_query("select id from online_form where durum='yeni'");
	list($yeni_mesaj) = mysql_fetch_row($kontrol_yeni_mesaj);
	
	if($yeni_mesaj){ $msg_img = "kurum_on.gif"; } else { $msg_img = "kurum.gif"; }



 ?>
 
 <fieldset><legend> Yönetim Paneli </legend>
                
                <table width="100%" border="0">
                <tr><td>&nbsp;</td></tr>
  <tr>
    <td align="center" width="10%"><font face="Tahoma" style="font-size:11px">
								<a href="/admin/_manage/mh/randevu.php">
								<img border="0" src="/admin/_media/<?=$rand_img?>"><br>
								<br>
								Randevu Talepleri</a></font></td>
     <td align="center" width="10%"><font face="Tahoma" style="font-size:11px">
								<a href="/admin/_manage/mh/doktorasor.php">
								<img border="0" src="/admin/_media/<?=$soru_img?>"><br>
								<br>
								Doktoruna Sor</a></font></td>
                                
       <td align="center" width="10%"><font face="Tahoma" style="font-size:11px">
								<a href="/admin/_manage/mh/mesaj.php">
								<img border="0" src="/admin/_media/<?=$msg_img?>"><br>
								<br>
								Mesajlar</a></font></td>
      <td align="center" width="10%">&nbsp;</td>
    <td align="center" width="10%"><font face="Tahoma" style="font-size:11px"><a href="/admin/cikis.php"><img border="0" src="/admin/_media/logoff.gif" /><br />
          <br />
Çıkış</a></font></td>
     <td align="center" width="10%">&nbsp;</td>
                                
         <td align="center" width="10%">&nbsp;</td>
      
     <td align="center" width="10%">&nbsp;</td>
    <td align="center" width="10%">&nbsp;</td>
    <td align="center" width="60%">&nbsp;</td>

  </tr>
</table></fieldset><br />