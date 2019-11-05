





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


//$welcomefile=$docroot."/admin/_manage/editor/urun_main.src.php";
//include($welcomefile);





?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>M&#252;steri Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/musteriler.php" onSubmit="return bosvarmi(this)">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

   
     


     <tr>

      <td valign="top">Banner</td>

      <td>
		<input type="file" name="filename" size="20" style="font-family: Tahoma; font-size: 12px"></td> 
    </tr>
    
    
  
<tr valign="top">  <td width="100%" colspan="2"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="15%">&nbsp;</td>
    <td width="10%">&nbsp;<input type="submit" value="Ekle" name="B1"></td>
     <td width="70%">&nbsp;</td>
   
  </tr>
  </table></td> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  <input type="hidden" name="lang" value="<?=$lang?>">
  <input type="hidden" name="ac_t" value="add">

</form></fieldset>



							</tr>

						</table>

						</td>

					</tr>

				</table>
                
                
          

&nbsp;<fieldset>

<legend>Sistemdeki Bannerler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	


	<tr>



	

	<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>O</b></td>

		<td nowrap width="100%" bgcolor="#FF6C00"><b>Banner</b></td>
		
		
		
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

$get_prd = mysql_query("select id,banner,zaman,editor from musteribanner $newsq");

while(list($bid, $bban, $bzaman, $peditor)=mysql_fetch_row($get_prd)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';


//<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_edit.php?ac_t=upd&remhid='.$hid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
//<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/edit/urun_img.php?ac_t=addphoto&remhid='.$hid.'"><img src="/admin/_media/search_buton.gif" border="0"></a></td> 



echo'	<tr>


		
<td bgcolor="'.$bgc.'" nowrap align="center" valign="top"><a href="/admin/_manage/editor/banner_order.php"><img src="/admin/_media/online.gif" border="0"></a></td>
		
		<td bgcolor="'.$bgc.'" nowrap width="100%"><img src="'.$bban.'" width="200" height="61" border="0"></td>
 
	  <td bgcolor="'.$bgc.'" nowrap align="center">'.$beditor.'</td>
<td bgcolor="'.$bgc.'" nowrap align="center">'.$bzaman.'</td>
		

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/banner.php?ac_t=del&remhid='.$bid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
	</tr>'; 



$hs = $hs+1;




}
if(($hs=="0") && ($q)){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Araman&#305;z sonucunda kay&#305;t bulunamam&#305;?&#351;t&#305;r.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

} else if(($hs=="0") && ($q=="")){

echo '<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">Sistemde kay&#305;t bulunmamaktad&#305;r.</td>

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
                
                
                




