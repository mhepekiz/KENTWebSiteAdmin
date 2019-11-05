





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




	$icerik = mysql_query("select metin from aboutmetin where lang='$lang'");
	list($metinx) = mysql_fetch_row($icerik);



?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Hakkimizda Sayfasi Metin Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/metin_about.php?lang=<?=$lang?>" onSubmit="return bosvarmi(this)">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

   
      <tr valign="top">


      <td width="100%"><table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="1"><input name="lang" type="radio" <? if($lang=="tr"){ echo"checked"; } ?> value="tr" /></td>
    <td width="7%">&nbsp;T&#252;rk&#231;e</td>
    <td width="1"><input name="lang" type="radio" <? if($lang=="en"){ echo"checked"; } ?> value="en" /></td>
    <td width="7%">&nbsp;&#304;ngilizce</td>
    <td width="84%" align="right"><input type="submit" value="G&#252;ncelle" name="B1"></td>
  </tr>
</table>

</td>

    </tr>

       
    <tr valign="top">


      <td width="100%"><textarea class="ckeditor" cols="80" id="editor1" name="metin" rows="10"><?=$metinx?></textarea>
</td>

   
 


</td></tr>
<tr valign="top">  <td width="100%"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="G&#252;ncelle" name="B1"></td>
  </tr>
  </table> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  <input type="hidden" name="lang" value="<?=$lang?>">
  <input type="hidden" name="ac_t" value="update">

</form></fieldset>

							</tr>

						</table>

						</td>

					</tr>

				</table>