





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

<legend>Gezi Giri&#351; Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"  cellpadding="5"><tr><td>

		
<form id="myform" name="myform" class="fValidator-form"  method="POST" enctype="multipart/form-data" class="fValidator-form" action="/admin/_manage/editor/gezi_main.php" >

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" cellpadding="5">
  

     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Ba&#351;lang&#305;&#231; Zaman&#305;</font></td>

      <td width="20%">
		
        
        <script type="text/javascript" src="/js/calendarDateInput.js">

</script>
<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
</td>

    </tr>
    
    
     <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Biti&#351; Zaman&#305;</font></td>

      <td width="20%">
		<script>DateInput('orderdate2', true, 'DD-MON-YYYY')</script>
</td>


    
    </tr>
    
    
<tr>

      <td align="left">Ba&#351;l&#305;k</td>

      <td width="100%"><input type="text" name="baslik" size="70"></td>

    </tr> 

       
    <tr valign="top">


      <td width="100%" colspan="2"><textarea class="ckeditor" cols="80" id="editor1" name="metin" rows="10"><?=$metinx?></textarea>
</td>

   
 


</td></tr>
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


<script>
$("#myform").validator();


$.tools.validator.fn("#myform", function(input, value) {
	return value != 0 ? true : {     
		en: "Please make a selection"
	};
	
	
});

</script>



<iframe border="0" src="/admin/_manage/editor/haber_foto.php" width="100%" height="60" style="border:none" scrolling="no"></iframe>


</fieldset>

							</tr>

						</table>

						</td>

					</tr>

				</table>