





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

<SCRIPT TYPE="text/javascript" LANGUAGE="javascript"> 
 
function waitPreloadPage() { //DOM
		if (document.getElementById){
			document.getElementById('prepage').style.visibility='hidden';
		} else {
			if (document.layers){ //NS4
				document.prepage.visibility = 'hidden';
			} else { //IE4
				document.all.prepage.style.visibility = 'hidden';
			}
		}
		// <![CDATA[
		var myMenu;
 
			myMenu = new SDMenu("my_menu");
			myMenu.init();
		
		// ]]>
}
 
 
// End -->
</SCRIPT> 





<fieldset>

<legend>Video Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="frm" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/addvideo.php" onSubmit="document.getElementById('submitdiv').innerHTML='Lütfen Bekleyin...<img src=\'_media/loading.gif\'></img>'">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

   
    
     <tr>

      <td valign="top">Video</td>

      <td>
		<input type="file" name="filename" size="20" style="font-family: Tahoma; font-size: 11px"></td>

    </tr>
    
    <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Tarih</font></td>

      <td width="20%">
		
        
        <script type="text/javascript" src="/admin/js/calendarDateInput.js">

</script>
<script>DateInput('orderdate', true, 'DD-MON-YYYY')</script>
</td>

    </tr>
    
    
  <tr>

      <td align="left">Başlık</td>

      <td width="100%"><input type="text" name="videoad" size="70"></td>

    </tr> 
    
  <tr>

      <td align="left">Keyword</td>

      <td width="100%"><input type="text" name="keywords" size="70"></td>

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
    <td width="84%" align="right"><div id="submitdiv"><input type="submit" id="B1"  value="Ekle" name="B1"></div></td>
  </tr>
  </table></td> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
 
  <input type="hidden" name="ac_t" value="add">

</form></fieldset>



</td></tr>


<tr><td>

<fieldset>

<legend>Sistemdeki Videolar</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0">

	<tr>





		<td nowrap width="100%" bgcolor="#FF6C00"><b>Video</b></td>
		
		
	

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

$newsq = "order by id desc";

	
}

$hs = 0;

$get_vid = mysql_query("select id,baslik,editor,zaman from videolar $newsq");

while(list($vid,$video,$veditor,$vtarih)=mysql_fetch_row($get_vid)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$video.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$veditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$vtarih.'</td>

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/addvideo.php?ac_t=del&remhid='.$vid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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

		<td bgcolor="'.$bgc.'" nowrap width="100%">Sistemde kayıtlı video bulunmamaktadır.</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">&nbsp;</td>

	</tr>';

}

?>

</table>

</td></tr><tr><td>


</td></tr></table></fieldset>


</td></tr></table></td>
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