<?




$docroot = $DOCUMENT_ROOT;
$langfile=$docroot."/admin/_manage/editor/includes/lang.php";




	$get_urun = mysql_query("select id, yeni, kategori, lang, urunadi, ozellikler, tablo from urunler where id='$urunx'");
	list($urid, $uryeni, $urcat, $urlang, $urad, $urozellik, $urtablo) = mysql_fetch_row($get_urun);
	


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

<legend>&#220;r&#252;n Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/urun_edit_resim.php" onSubmit="return bosvarmi(this)">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  
 

   	<? include($langfile); ?>
      

        <tr>

      <td align="left" width="10%">Ana Kategori</td>

      <td colspan="3">
      
      <select name="kategori" size="1">
      <option value="0">Kategori Se&#231;iniz</option>
      
      <?
	  
	  
	  	$kategorine = mysql_query("select id, kategori from kategori where id='$urcat'");
		list($katid, $kat_ad) = mysql_fetch_row($kategorine);
		
		echo'<option selected value="'.$katid.'">'.$kat_ad.'</option>';
	  
      
	  $kategoriler = mysql_query("select id, kategori from kategori where catof<>'0'");
	  while(list($k_id, $k_kat) = mysql_fetch_row($kategoriler)){
		  
		  echo'<option value="'.$k_id.'">'.$k_kat.'</option>';
		  
	  }
	  
	  
	  ?>
      
      
      </select>
      
      
   </td>  

    </tr>

    <tr>

      <td align="left" width="10%">&#220;r&#252;n Ad&#305;</td>

      <td colspan="3"><input type="text" name="urunadi" size="70" value="<?=$urad?>"></td>

    </tr> 
    
     <tr>

      <td valign="top">Foto&#287;raf</td>

      <td colspan="3">
		<input type="file" name="filename" size="20" style="font-family: Tahoma; font-size: 11px"></td>

    </tr>
    
    
    <tr valign="top"><td colspan="2">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" valign="top">&nbsp;&#214;zellikler Tablo</td>
    <td><textarea class="ckeditor" cols="10" id="editor1" name="detay" rows="5"><?=$urozellik?></textarea></td>
    <td width="10%" valign="top">&nbsp;&#214;zellikler Alt</td>
    <td><textarea class="ckeditor" cols="30" id="editor2" name="detay2" rows="5"><?=$urtablo?></textarea></td>
  </tr>
</table>

    
</td>

   
 
</tr>

 

<tr valign="top">  <td width="100%" colspan="3"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="G&#252;ncelle" name="B1"></td>
  </tr>
  </table></td> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  <input type="hidden" name="ac_t" value="update">
  <input type="hidden" name="urunx" value="<?=$urunx?>" />

</form></fieldset>



							</tr>

						</table>

						</td>

					</tr>

				</table>
                
                
          



<br>&nbsp;</td></tr></table></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
                
                
                


<script language="javascript">
CKEDITOR.replace( 'editor1',
    {
        toolbar : 'Basic',
    });
	
	CKEDITOR.replace( 'editor2',
    {
        toolbar : 'Basic',
  
    });
    </script>

