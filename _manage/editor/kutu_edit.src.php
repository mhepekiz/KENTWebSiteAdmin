

<?

	$kutum = mysql_query("select id, lang, baslik, aciklama, link from kutular where id='$remhid'");
	list($kut_id, $dr_lang, $kut_baslik, $kut_aciklama, $kut_link) = mysql_fetch_row($kutum);
	


?>



<table border="0" width="100%" id="table7" cellspacing="0" cellpadding="0" height="100%">

					<tr>

						<td valign="top" style="font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif; font-size: 11px"><!--Start Contents-->

						

						</td>

					</tr>

				
					<tr>

						<td valign="top" height="100%" bgcolor="#F9F8F8" style="font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif; font-size: 11px">

						<table border="0" width="100%" id="table9" cellspacing="0" cellpadding="4">

							<tr>

								<td>
</td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Kutu Giri&#351; Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/kutu_edit.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
  
  <tr>

      <td align="left">Dil</td>
       <td width="100%"><select name="dil">
      <?
      
	  
	  	if($dr_lang=="tr"){ echo'<option selected value="en">Türkçe</option>'; }
		if($dr_lang=="en"){ echo'<option selected value="en">İngilizce</option>'; }
		if($dr_lang=="ar"){ echo'<option selected value="ar">Arapça</option>'; }
		if($dr_lang=="ge"){ echo'<option selected value="ge">Gürcüce</option>'; }
		if($dr_lang=="az"){ echo'<option selected value="az">Azerice</option>'; } 
	  
	  
	  ?>

     
       <option value="en">İngilizce</option>
      <option value="ar">Arapça</option>
      <option value="ge">Gürcüce</option>
      <option value="az">Azerice</option></td>

    </tr> 
    
    
      
     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Foto&#287;raf</font></td>

      <td width="20%">
		<input type="file" name="filename" size="20" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px"></td>

    </tr>
    <tr>

      <td valign="top" width="100%" colspan="2"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Resim 225x75 px olmal&#305;d&#305;r</font></td>

     

    </tr>
    
    
<tr>

      <td align="left">Kutu Ba&#351;l&#305;k</td>

      <td width="100%"><input type="text" name="kutubaslik" size="70" value="<?=$kut_baslik?>"></td>

    </tr> 
    
    <tr>

      <td align="left">Aç&#305;klama</td>

      <td width="100%"><input type="text" name="aciklama" size="70" value="<?=$kut_aciklama?>"></td>

    </tr> 
    
    <tr>

      <td align="left">Link</td>

      <td width="100%"><input type="text" name="kutulink" size="70" value="<?=$kut_link?>"></td>

    </tr> 

 
    </tr>     
   
<tr valign="top">  <td width="100%" colspan="2"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="Ekle" name="B1"></td>
  </tr>
  </table> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  
  <input type="hidden" name="ac_t" value="upd">
  <input type="hidden" name="remhid" value="<?=$remhid?>">

</form>

</fieldset>

							</tr>
                            
                            
                            <tr><td>
                            
                            
                            
                            

&nbsp;<fieldset>

<legend>Sistemdeki Kutular</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0">

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>


		<td nowrap width="30%" bgcolor="#FF6C00"><b>Ba&#351;l&#305;k</b></td>
        <td nowrap width="30%" bgcolor="#FF6C00"><b>Link</b></td>
		
		
	

		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>

	</tr>

<?

if($q){

$newsq = "where adsoyad LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id desc limit 25";

	
}

$hs = 0;

$get_box = mysql_query("select id,baslik,link,editor,zaman from kutular $newsq");

while(list($kid,$kbaslik,$klink,$keditor,$ktarih)=mysql_fetch_row($get_box)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/kutu_edit.php?ac_t=update&remhid='.$kid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$kbaslik.'</td>
		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$klink.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$beditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$btarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/kutu.php?ac_t=del&remhid='.$kid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
	</tr>'; 



$hs = $hs+1;




}
if(($hs=="0") && ($q)){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Aramanyz sonucunda kayyt bulunamamy?tyr.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

} else if(($hs=="0") && ($q=="")){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Sistemde kayytly haber bulunmamaktadyr.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

}

?>

</table>

</td></tr><tr><td>


</td></tr></table></fieldset>




<br>&nbsp;</td></tr></table></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
                
                
                



</td></tr>



						</table>

						</td>

					</tr>

				</table>