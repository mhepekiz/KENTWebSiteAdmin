<?



	$haber_detay = mysql_query("select id, kategori, baslik, metin from haberler where id='$remhid'");
	list($h_id, $h_cat, $h_baslik, $h_metin) = mysql_fetch_row($haber_detay);


		$katt = mysql_query("select kategori from kategori where id='$h_cat'");
		list($kategorim) = mysql_fetch_row($katt);

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
<?


$welcomefile=$docroot."/admin/_manage/editor/metin_main.src.php";
include($welcomefile);




	$icerik = mysql_query("select metin from girismetin where lang='$lang'");
	list($metinx) = mysql_fetch_row($icerik);



?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Haber Giris Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/haber_edit.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
  <tr>

      <td align="left">Kategori</td>

      <td width="100%">
       <select name="kategori" size="1">
      <option value="0">Kategori Se&#231;iniz</option>
      
      <?
	  
	  echo'<option selected value="'.$h_cat.'">'.$kategorim.'</option>';
      
	  $kategoriler = mysql_query("select id, kategori from kategori");
	  while(list($k_id, $k_kat) = mysql_fetch_row($kategoriler)){
		  
		  echo'<option value="'.$k_id.'">'.$k_kat.'</option>';
		  
	  }
	  
	  
	  ?>
      
      
      </select>
      </td>

    </tr> 
    
     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Foto&#287;raf</font></td>

      <td width="20%">
		<input type="file" name="filename" size="20" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px"></td>

    </tr>
<tr>

      <td align="left">Ba&#351;l&#305;k</td>

      <td width="100%"><input type="text" name="baslik" size="70" value="<?=$h_baslik?>"></td>

    </tr> 

       
    <tr valign="top">


      <td width="100%" colspan="2"><textarea class="ckeditor" cols="80" id="editor1" name="metin" rows="10"><?=$h_metin?></textarea>
</td>

   
 


</td></tr>
<tr valign="top">  <td width="100%" colspan="2"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="Guncelle" name="B1"></td>
  </tr>
  </table> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  
  <input type="hidden" name="ac_t" value="upd">
  <input type="hidden" name="remhid" value="<?=$h_id?>">

</form>

<iframe border="0" src="/admin/_manage/editor/haber_foto.php" width="100%" height="60" style="border:none" scrolling="no"></iframe>


</fieldset>

							</tr><tr><td>
                            
                            
                            
                            

&nbsp;<fieldset>

<legend>Sistemdeki Haberler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	<tr>

		<td nowrap colspan="6">Mevcut haberler i&#231;inde filtreleme yapabilirsiniz...</td>

	</tr>

	<tr>

		<td nowrap colspan="6">

		<form method="POST" action="/admin/_manage/haber/haberekle.php" name="haber_ara">

			<table border="0" width="100%" id="table11" cellspacing="0" cellpadding="0">

				<tr>

					<td><input type="text" name="q" size="20" value="<?=$q?>"></td>

					<td nowrap><span lang="en">&nbsp;</span><a href="javascript:haber_a();"><img border="0" src="/admin/_media/search.gif" width="16" height="16"> 

					Ara</a></td>

					<td width="15%">&nbsp;<span lang="en">&nbsp;&nbsp;&nbsp;</span><a href="/admin/_manage/haber/main.php"><img border="0" src="/admin/_media/showall.gif" width="16" height="16"> 

					Hepsini G&#246;ster</a></td>


					<td width="22%">&nbsp;<span lang="en">&nbsp;&nbsp;&nbsp;</span><a href="<?=$_SERVER['REQUEST_URI'];?>?list=spor"><img border="0" src="/admin/_media/showall.gif" width="16" height="16"> 

					Sadece Spor Haberleri</a></td>
                    
                    
					<td width="62%">&nbsp;<span lang="en">&nbsp;&nbsp;&nbsp;</span><a href="<?=$_SERVER['REQUEST_URI'];?>?list=nospor"><img border="0" src="/admin/_media/showall.gif" width="16" height="16"> 

					Spor Haberlerini Gizle</a></td>


				</tr>

			</table>

			<input type="hidden" name="ac_t" value="search">

		</td></form>

	</tr>

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		

		<td nowrap width="100%" bgcolor="#FF6C00"><b>Ba&#351;l&#305;k</b></td>
		
		
	

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

$get_news = mysql_query("select id,baslik,editor,zaman from haberler $newsq");

while(list($hid,$hbaslik,$heditor,$htarih)=mysql_fetch_row($get_news)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/editor/edit.php?ac_t=upd&remhid='.$hid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$hbaslik.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$heditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$htarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/haberekle.php?ac_t=del&remhid='.$hid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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