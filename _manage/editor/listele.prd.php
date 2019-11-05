

&nbsp;<fieldset>

<legend>Sistemdeki Ürünler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	<tr>

		<td nowrap colspan="6">Mevcut ürünler i&#231;inde filtreleme yapabilirsiniz...</td>

	</tr>

	<tr>

		<td nowrap colspan="6">

		<form method="POST" action="/admin/_manage/editor/urun_urun.php" name="haber_ara">

			<table border="0" width="100%" id="table11" cellspacing="0" cellpadding="0">

				<tr>

					<td><input type="text" name="q" size="20" value="<?=$q?>"></td>

					<td nowrap><span lang="en">&nbsp;</span><a href="javascript:haber_a();"><img border="0" src="/admin/_media/search.gif" width="16" height="16"> 

					Ara</a></td>

					<td width="15%">&nbsp;<span lang="en">&nbsp;&nbsp;&nbsp;</span><a href="/admin/_manage/editor/urun_urun.php"><img border="0" src="/admin/_media/showall.gif" width="16" height="16"> 

					Hepsini G&#246;ster</a></td>




				</tr>

			</table>

			<input type="hidden" name="ac_t" value="search">

		</td></form>

	</tr>

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="0" bgcolor="#FF6C00" align="center"><b>F&nbsp; </b></td>



		<td nowrap width="100%" bgcolor="#FF6C00"><b>Ürün Adi</b></td>
		
		<td nowrap align="center" bgcolor="#FF9000"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Cat</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>
		
		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>

	</tr>

<?

if($q){

$newsq = "where urunadi LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id desc limit 25";


}

$hs = 0;

$get_prd = mysql_query("select id,kategori,lang,urunadi,editor,zaman from urunler $newsq");

while(list($pid, $pcat, $plan, $pad, $pzaman, $peditor)=mysql_fetch_row($get_prd)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';


echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_edit.php?ac_t=upd&remhid='.$hid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_img.php?ac_t=addphoto&remhid='.$hid.'"><img src="/admin/_media/search_buton.gif" border="0"></a></td> 
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$pad.'</td>';

      

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$peditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$pzaman.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_urun.php?ac_t=del&remhid='.$hid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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
                
                
                

