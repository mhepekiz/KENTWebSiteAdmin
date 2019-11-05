<?

	$poliad = mysql_query("select poliklinik from poliklinikler where id='$remhid'");
	list($polikk) = mysql_fetch_row($poliad);

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

<legend>Poliklinik Giris Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/add2pol_en.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
 
<tr>

      <td align="left" width="10%">Ana Poliklinik </td>

      <td width="90%"><font face="Arial" size="2"><b><?=$polikk?></b></font></td>

    </tr> 
<tr>

      <td align="left"  width="10%">Poliklinik Bilgi</td>

      <td width="90%"><input type="text" name="ekbaslik" size="70"></td>

    </tr> 

       
    <tr valign="top">


      <td width="100%" colspan="2"><textarea class="ckeditor" cols="80" id="editor1" name="metin" rows="10"><?=$metinx?></textarea>
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
  
  <input type="hidden" name="ac_t" value="add">
  <input type="hidden" name="remhid" value="<?=$remhid?>">

</form>

<iframe border="0" src="/admin/_manage/editor/haber_foto.php" width="100%" height="60" style="border:none" scrolling="no"></iframe>


</fieldset>

							</tr><tr><td>
                            
                            
                            
                            

&nbsp;<fieldset>

<legend>Sistemdeki Eklentiler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0">

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>O</b></td>
        <td nowrap width="1" bgcolor="#FF6C00" align="center"><b>P</b></td>


		
        <td nowrap width="100%" bgcolor="#FF6C00"><b>Alt Başlık</b></td>
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

$newsq = "order by id desc limit 25";

	
}

$hs = 0;


	$get_polk = mysql_query("select id, poliklinik from poliklinikler where id='$remhid'");
	list($p_id, $p_pol) = mysql_fetch_row($get_polk);




$get_news = mysql_query("select id,baslik,editor,zaman from poliklinik_alt_en where poliklinik='$remhid' order by baslik");

while(list($pid,$polik,$peditor,$ptarih)=mysql_fetch_row($get_news)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/add2pol_en_edit.php?ac_t=update&remhid='.$pid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/haber_order.php"><img src="/admin/_media/online.gif" border="0"></a></td>
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/add2pol_en.php"><img src="/admin/_media/sml_plus.gif" border="0"></a></td>

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$polik.'</td>
		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$p_pol.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$peditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$ptarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/add2pol_en.php?ac_t=del&remhidx='.$pid.'&remhid='.$remhid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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