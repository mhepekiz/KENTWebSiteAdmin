


<?




$docroot = $DOCUMENT_ROOT;
$langfile=$docroot."/admin/_manage/editor/includes/lang.php";


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

<legend>Link Giri&#351; Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"  cellpadding="5"><tr><td>

		
<form id="myform" name="myform" class="fValidator-form"  method="POST" enctype="multipart/form-data" class="fValidator-form" action="/admin/_manage/editor/linkler.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" cellpadding="5">
  

   
   <tr>

      <td align="left">Dil</td>

      <td width="90%"><select name="dil">
       <option value="en">İngilizce</option>
      <option value="ar">Arapça</option>
      <option value="ge">Gürcüce</option>
      <option value="az">Azerice</option></td>

    </tr>  
 
        
        
	<tr>
	<td align="left">Link URL</td>
    <td width="90%"><input type="text" name="linkurl" size="70"></td>
    </tr> 
	<tr>
	<td align="left">Link Ad</td>
    <td width="90%"><input type="text" name="linkad" size="70"></td>
    </tr> 
    
    <tr>
	<td align="left">Link Detay</td>
    <td width="90%"><input type="text" name="linkdetay" size="70"></td>
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

							</tr><tr><td>
                            
                            
                            
                                               

&nbsp;<fieldset>

<legend>Sistemdeki Linkler</legend>

<table width="100%" cellspacing="1" cellpadding="2" border="0">

	<tr height="30">



		<td nowrap width="1" bgcolor="#ff6600" align="center"><b>D</b></td>

		

		<td nowrap width="100%" bgcolor="#fd8332"><b>Link Ad</b></td>
		
		<td nowrap align="center" bgcolor="#fd9855">&nbsp;&nbsp;<b>Link URL</b>&nbsp;&nbsp;</td>
       
     	<td nowrap align="center" bgcolor="#ffbc8f">&nbsp;&nbsp;<b>Editor</b>&nbsp;&nbsp;</td>

		<td nowrap align="center" bgcolor="#fecdac"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>		

		<td nowrap align="center" bgcolor="#ffb400">&nbsp;&nbsp;<b>Sil</b>&nbsp;&nbsp;</td>

	</tr>

<?

if($q){

$newsq = "where fuar LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id desc limit 25";

	
}

$hs = 0;

$get_linx = mysql_query("select id,lang,linkadi,linkadres,zaman,editor from linkler $newsq");
while(list($linkid, $lang,$linkadi, $linkurl, $ltarih, $leditor)=mysql_fetch_row($get_linx)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/link_edit.php?ac_t=update&remhid='.$linkid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$linkadi.'('.$lang.')</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$linkurl.'</td>
	
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$leditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$ltarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/egitim_main.php?ac_t=del&remhid='.$hid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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




</td></tr>

						</table>

						</td>

					</tr>

				</table>