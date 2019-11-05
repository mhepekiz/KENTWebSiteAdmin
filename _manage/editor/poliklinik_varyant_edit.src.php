

<?


	
	
				$var_det = mysql_query("select id, polid, lang, poliklinik, detay from poliklinikler_varyant where id='$remhid'");
				list($pv_id, $pv_pid, $pv_lang, $pv_pol, $pv_detay) = mysql_fetch_row($var_det);
				
				
		$get_pol = mysql_query("select id, poliklinik from poliklinikler where id='$pv_pid'");
		list($pol_id, $pol_po) = mysql_fetch_row($get_pol);
	

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

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Poliklinik Varyant Giris Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/poliklinik_varyant_edit.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
 

 <tr>

      <td align="left">Ana Poliklinik</td>

      <td width="100%"><?=$pol_po?></td>

    </tr> 

<tr>

      <td align="left">Dil</td>
       <td width="100%"><select name="dil">
      <?
      
	  
	  	if($pv_lang=="en"){ echo'<option selected value="en">İngilizce</option>'; }
		if($pv_lang=="ar"){ echo'<option selected value="ar">Arapça</option>'; }
		if($pv_lang=="ge"){ echo'<option selected value="ge">Gürcüce</option>'; }
		if($pv_lang=="az"){ echo'<option selected value="az">Azerice</option>'; } 
	  
	  
	  ?>

     
       <option value="en">İngilizce</option>
      <option value="ar">Arapça</option>
      <option value="ge">Gürcüce</option>
      <option value="az">Azerice</option></td>

    </tr> 
    
    <tr>

      <td align="left">Poliklinik</td>

      <td width="100%"><input type="text" name="poliklinik" size="70" value="<?=$pv_pol?>"></td>

    </tr> 

       
    <tr valign="top">


      <td width="100%" colspan="2"><textarea class="ckeditor" cols="80" id="editor1" name="metin" rows="10"><?=$pv_detay?></textarea>
</td>

   
 


</td></tr>
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
  <input type="hidden" name="remhid" value="<?=$pv_id?>">

</form>

<iframe border="0" src="/admin/_manage/editor/haber_foto.php" width="100%" height="60" style="border:none" scrolling="no"></iframe>


</fieldset>

							</tr><tr><td>
                            
                            
                        
                            

&nbsp;<fieldset>

<legend>Sistemdeki Poliklinikler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0">

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>


		<td nowrap width="100%" bgcolor="#FF6C00"><b>Poliklinik</b></td>
		
		
	

		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>


<?
if(($yet_tip=="151")||($yet_tip=="5")){
									
										echo'			

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>'; } ?>

	</tr>

<?

if($q){

$newsq = "where baslik LIKE '%$q%' order by id desc";

} else {

$newsq = "where polid='$remhid' order by id desc limit 25";

	
}

$hs = 0;

$get_news = mysql_query("select id,poliklinik,editor,zaman from poliklinikler_varyant $newsq");

while(list($pid,$polik,$peditor,$ptarih)=mysql_fetch_row($get_news)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/poliklinik_varyant_edit.php?ac_t=update&remhid='.$pid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$polik.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$peditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$ptarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/poliklinik_varyant.php?ac_t=del&remhid='.$remhid.'&remhidx='.$pid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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