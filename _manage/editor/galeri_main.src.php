





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

<legend>Galeriler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"  cellpadding="5"><tr><td>

		
<form id="myform" name="myform" class="fValidator-form"  method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/galeri_main.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" cellpadding="5">
  

    
    
<tr>

      <td align="left">Galeri</td>

      <td width="100%"><input type="text" name="galeriadi" size="70"></td>

    </tr> 

<tr>

      <td align="left">Sanat&#231;&#305;</td>

      <td width="100%"><input type="text" name="sanatci" size="70"></td>

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



<!--
<iframe border="0" src="/admin/_manage/editor/haber_foto.php" width="100%" height="60" style="border:none" scrolling="no"></iframe> -->


</fieldset>

							</tr>
                            
                            <tr><td>
                            
                            
                            <fieldset>

<legend>Sistemdeki &#220;r&#252;nler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	<tr>

		<td nowrap colspan="6">Mevcut &#252;r&#252;nler i&#231;inde filtreleme yapabilirsiniz...</td>

	</tr>

	
	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="0" bgcolor="#FF6C00" align="center"><b>F&nbsp; </b></td>



		<td nowrap width="100%" bgcolor="#FF6C00"><b>Galeri Ad&#305;</b></td>
		
		<td nowrap align="center" bgcolor="#FF9000"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Sanat&#231;&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>
		
		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>

	</tr>

<?



$hs = 0;

$get_gal = mysql_query("select id,sanatci,galeriadi,zaman,editor from galeriler order by id desc limit 100");

while(list($gid, $gauth, $ggal, $gzaman, $geditor)=mysql_fetch_row($get_gal)){


$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';




echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/galeri_edit.php?galeri='.$gid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/galeri_addphoto.php?galeri='.$gid.'"><img src="/admin/_media/search_buton.gif" border="0"></td> 
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$ggal.'</td>

      <td bgcolor="'.$bgc.'" nowrap align="center">'.$gauth.'</td>
	  
	 

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$geditor.'</td>

		 <td bgcolor="'.$bgc.'" nowrap align="center">'.$gzaman.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/galeri_main.php?ac_t=del&remhid='.$gid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
	</tr>'; 



$hs = $hs+1;




}
if(($hs=="0") && ($q)){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Araman&#305;z sonucunda kay&#305;t bulunamam&#305;?t&#305;r.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

} else if(($hs=="0") && ($q=="")){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Sistemde kayytly ürün bulunmamaktadyr.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

}

?>

</table>

</td></tr><tr><td>


</td></tr></table></fieldset>



</td></tr>

						</table>

						</td>

					</tr>

				</table>