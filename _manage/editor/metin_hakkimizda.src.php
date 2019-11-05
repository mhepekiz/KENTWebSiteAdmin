





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


?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Giris Sayfasi Metin Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/metin_hakkimizda.php" onSubmit="return bosvarmi(this)">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

    <tr>

      <td align="left" valign="top" colspan="3">&nbsp;</td>

				</td>

    </tr>
    
        <tr>

      <td align="left" width="10%">Ana Kategori</td>

      <td width="1%">
      
      <select name="anakategori" size="1">
      <option value="0">Alt Kategori Tan&#305;mlamak &#304;&#231;in Bir Ana Kategori Se&#231;iniz</option>
      
      <?
      
	  $kategoriler = mysql_query("select id, kategori from kategori");
	  while(list($k_id, $k_kat) = mysql_fetch_row($kategoriler)){
		  
		  echo'<option value="'.$k_id.'">'.$k_kat.'</option>';
		  
	  }
	  
	  
	  ?>
      
      
      </select>
      
      
   </td>  <td width="90%"></td>

    </tr>

    <tr>

      <td align="left" width="10%">Kategori</td>

      <td width="1%"><input type="text" name="kategori" size="70"></td>  <td width="90%"><input type="submit" value="Ekle" name="B1"></td>

    </tr>

 

  </table>

  <input type="hidden" name="ac_t" value="add">

</form></td></tr></table></fieldset>


</td></tr></table>&nbsp;</td>

							</tr>

						</table>

						</td>

					</tr>

				</table>