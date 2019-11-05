





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

<legend>Medya Giri&#351; Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"  cellpadding="5"><tr><td>

		
<form id="myform" name="myform" class="fValidator-form"  method="POST" enctype="multipart/form-data" class="fValidator-form" action="/admin/_manage/editor/medya_main.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" cellpadding="5">
  

     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Tarih</font></td>

      <td width="20%">
		
        
        <script type="text/javascript" src="/admin/js/calendarDateInput.js">

</script>
<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
</td>

    </tr>
    
    
    
<tr>

      <td align="left">Yay&#305;n</td>

      <td width="100%"><input type="text" name="yayin" size="70"></td>

    </tr> 
<tr>

      <td align="left">Anahtar Kelimeler</td>

      <td width="100%"><input type="text" name="keywords" size="70"></td>

    </tr> 
    
      <tr>

      <td valign="top">Dosya</td>

      <td colspan="3">
		<input type="file" name="filename" size="20" style="font-family: Tahoma; font-size: 11px"></td>

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


 <tr><td>
                            
                            
                            
                            

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

			<table border="0" width="100%" id="table11" cellspacing="0" cellpadding="3">

			

	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>Resim</b></td>


		<td nowrap width="50%" bgcolor="#FF6C00"><b>Tarih</b></td>
        <td nowrap width="50%" bgcolor="#FF6C00"><b>Medya</b></td>
		
		
	

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

$get_medya = mysql_query("select id,tarih,yayin,foto_1,editor,zaman from medya $newsq");

while(list($medid, $medtar, $medyay, $medfo, $mededi, $medzam)=mysql_fetch_row($get_medya)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center" valign="top"><a href="/admin/_manage/editor/medya_edit.php?remhid='.$medid.'&mansetst='.$hmanset.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	<td bgcolor="'.$bgc.'" nowrap align="center"><img src="'.$medfo.'" border="0"></td>
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$medtar.'</td>
		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$medyay.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$heditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$htarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/medya_main.php?ac_t=del&remhid='.$medid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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




<br>&nbsp;</td></tr>
  
  </table></td> 
  
  <input type="hidden" name="ac_t" value="add">

</form>


<script>
$("#myform").validator();


$.tools.validator.fn("#myform", function(input, value) {
	return value != 0 ? true : {     
		en: "Please make a selection"
	};
	
	
});

</script>


</fieldset>

							</tr>

						</table>

						</td>

					</tr>

				</table>