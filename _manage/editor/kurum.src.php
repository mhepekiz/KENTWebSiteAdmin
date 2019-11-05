





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

<legend>Kurum Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/kurum.php">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

    <tr>

      <td align="left" valign="top" colspan="3">&nbsp;</td>

				</td>

    </tr>
    
        <tr>

      <td align="left" width="10%">Ana Kategori</td>

      <td width="1%">
      
      <select name="catof" size="1">
      <option value="0">Kategorisiz</option>
      
      <?
      
	  $kategoriler = mysql_query("select id, kategori from kurum_kategori");
	  while(list($k_id, $k_kat) = mysql_fetch_row($kategoriler)){
		  
		  echo'<option value="'.$k_id.'">'.$k_kat.'</option>';
		  
	  }
	  
	  
	  ?>
      
      
      </select>
      
      
   </td>  <td width="90%"></td>

    </tr>

    <tr>

      <td align="left" width="10%">Kurum</td>

      <td width="1%"><input type="text" name="kurum" size="70"></td>  <td width="90%"><input type="submit" value="Ekle" name="B1"></td>

    </tr>

 

  </table>

  <input type="hidden" name="ac_t" value="add">

</form></td></tr></table></fieldset>

<fieldset>

<legend>Sistemdeki Kurumlar</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>


		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	<tr>

		<td nowrap colspan="3">Mevcut kurumlar i&#231;inde arama yapabilirsiniz...</td>

	</tr>

	
	<tr>

		<td nowrap width="83%" bgcolor="#FF6C00"><b>Kurum</b></td>
		
		
		
		
		
		<td nowrap align="center" bgcolor="#FFBE32" width="13%"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>



		<td nowrap align="center" bgcolor="#FFBE32" width="2%"><b>&nbsp;Sil</b><span lang="en">&nbsp;</span></td>


	</tr>

<?

if($q){

$newsq = "where kurum LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id";

}

$hs = 0;

$get_kur = mysql_query("select id,kurum,zaman,editor from kurumlar $newsq");

while(list($kid,$kurx,$kzam,$kedit)=mysql_fetch_row($get_kur)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';





echo'	<tr>


		<td bgcolor="'.$bgc.'" nowrap width="100%">';  if($katof=="0"){ echo'*&nbsp;'; } echo''.$kurx.'</td>
		
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$kzam.'</td>		
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/kurum.php?ac_t=del&remhid='.$kid.'"><img src="/admin/_media/delete.gif" border="0"></a></td>

	';
	
}		

?>

</table>

</td></tr></table></fieldset>

</td></tr></table>&nbsp;</td>

							</tr>

						</table>

						</td>

					</tr>

				</table>