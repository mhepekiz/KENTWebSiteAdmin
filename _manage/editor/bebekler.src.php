





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

<legend>Bebek Giris Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/bebekler.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
  
    
     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Foto&#287;raf</font></td>

      <td width="20%">
		<input type="file" name="filename" size="20" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px"></td>

    </tr>
     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Do&#287;um Tarihi</font></td>

      <td width="20%">
		
        
        <script type="text/javascript" src="/admin/js/calendarDateInput.js">

</script>
<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
</td>

    </tr>
    
<tr>

      <td align="left">Ad Soyad</td>

      <td width="100%"><input type="text" name="adsoyad" size="70"></td>

    </tr> 
    
    <tr>

      <td align="left">Anne Ad&#305;</td>

      <td width="100%"><input type="text" name="anne" size="70"></td>

    </tr> 
    
    <tr>

      <td align="left">Baba Ad&#305;</td>

      <td width="100%"><input type="text" name="baba" size="70"></td>

    </tr> 

   <tr>

      <td align="left">Ad Soyad</td>

      <td width="100%"><select name="cinsiyet">
      <option value="kiz">K&#305;z</option>
      <option value="erkek">Erkek</option></td>

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
  
  <input type="hidden" name="ac_t" value="add">

</form>

</fieldset>

							</tr>
                            
                            
                            <tr><td>
                            
                            
                            
                            

&nbsp;<fieldset>

<legend>Sistemdeki Bebekler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0">

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>


		<td nowrap width="30%" bgcolor="#FF6C00"><b>Ad Soyad</b></td>
        <td nowrap width="30%" bgcolor="#FF6C00"><b>Do&#287;um Tarihi</b></td>
		
		
	

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

$newsq = "order by dogumtarihi desc";

	
}

$hs = 0;

$get_baby = mysql_query("select id,bebekad,dogumtarihi,editor,zaman from bebekler $newsq");

while(list($bid,$bebekad,$bebektarih,$beditor,$btarih)=mysql_fetch_row($get_baby)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/egitmen_edit.php?ac_t=update&remhid='.$hid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$bebekad.'</td>
		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$bebektarih.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$beditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$btarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/bebekler.php?ac_t=del&remhid='.$bid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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