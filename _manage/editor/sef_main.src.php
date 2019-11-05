





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
<?


//$welcomefile=$docroot."/admin/_manage/editor/sef_main.src.php";
//include($welcomefile);





?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Yemek Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/sef_main.php">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

   
      <tr valign="top">


      <td width="100%" colspan="2"><table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="1"><input name="langx" type="radio" value="tr" /></td>
    <td width="7%">&nbsp;T&#252;rk&#231;e</td>
    <td width="1"><input name="langx" type="radio" value="en" /></td>
    <td width="7%">&nbsp;&#304;ngilizce</td>
    <td width="84%" align="right"><input type="submit" value="Ekle" name="B1"></td>
  </tr>
</table>

</td>

    </tr>

       

    <tr>

      <td align="left" width="10%">Yemek Ad&#305;</td>

      <td width="100%"><input type="text" name="yemekadi" size="70"></td>

    </tr> 
    
     <tr>

      <td valign="top">Foto&#287;raf</td>

      <td>
		<input type="file" name="filename" size="20" style="font-family: Tahoma; font-size: 11px"></td>

    </tr>
    
    
    <tr valign="top">

<td align="left" width="10%">&#214;zellikler</td>
      <td width="100%"><textarea class="ckeditor" cols="80" id="editor1" name="detay" rows="10"></textarea>
</td>

   
 
</tr>
<tr valign="top">  <td width="100%" colspan="2"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="Ekle" name="B1"></td>
  </tr>
  </table></td> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  <input type="hidden" name="lang" value="<?=$langx?>">
  <input type="hidden" name="ac_t" value="add">

</form></fieldset>



							</tr>

						</table>

						</td>

					</tr>

				</table>
                
                
          

&nbsp;<fieldset>

<legend>Sistemdeki Yemekler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	

	
	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="0" bgcolor="#FF6C00" align="center"><b>F&nbsp; </b></td>



		<td nowrap width="100%" bgcolor="#FF6C00"><b>&#220;r&#252;n Ad&#305;</b></td>
		
		<td nowrap align="center" bgcolor="#FF9000"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Cat</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>
		
		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>

	</tr>

<?

if($q){

$newsq = "where baslik LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id desc limit 25";


}

$hs = 0;

$get_prd = mysql_query("select id,lang,baslik,editor,zaman from sefinsecimi $newsq");

while(list($pid, $plan, $pad, $pzaman, $peditor)=mysql_fetch_row($get_prd)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';


//<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_edit.php?ac_t=upd&remhid='.$hid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
//<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_img.php?ac_t=addphoto&remhid='.$hid.'"><img src="/admin/_media/search_buton.gif" border="0"></a></td> 



echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_edit.php?urunx='.$pid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		<td bgcolor="'.$bgc.'" nowrap align="center"><img src="/admin/_media/search_buton.gif" border="0"></td> 
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$pad.'</td>

      <td bgcolor="'.$bgc.'" nowrap align="center">'.$pcat.'</td>
	  
	  <td bgcolor="'.$bgc.'" nowrap align="center">'.$pzaman.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$peditor.'</td>

		

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_urun.php?ac_t=del&remhid='.$pid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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




<br>&nbsp;</td></tr></table></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
                
                
                




