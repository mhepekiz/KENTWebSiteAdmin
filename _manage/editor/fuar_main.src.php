


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

<legend>Fuar Giri&#351; Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"  cellpadding="5"><tr><td>

		
<form id="myform" name="myform" class="fValidator-form"  method="POST" enctype="multipart/form-data" class="fValidator-form" action="/admin/_manage/editor/fuar_main.php" >

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
   
    	<? include($langfile); ?>
        
        
	<tr>
	<td align="left">Fuar</td>
    <td width="100%"><input type="text" name="fuar" size="70"></td>
    </tr> 
	<tr>
	<td align="left">Yer</td>
    <td width="100%"><input type="text" name="konum" size="70"></td>
    </tr> 
          <tr>

      <td valign="top" width="10%"><font face="Arial, Helvetica, sans-serif" style="font-size:12px">Logo</font></td>

      <td width="20%">
		<input type="file" name="filename" size="20" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px"></td>

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

<legend>Sistemdeki Fuarlar</legend>

<table width="100%" cellspacing="1" cellpadding="2" border="0">

	<tr height="30">



		<td nowrap width="1" bgcolor="#ff6600" align="center"><b>D</b></td>

		

		<td nowrap width="100%" bgcolor="#fd8332"><b>Fuar</b></td>
		
		<td nowrap align="center" bgcolor="#fd9855">&nbsp;&nbsp;<b>Başlangıç</b>&nbsp;&nbsp;</td>
        <td nowrap align="center" bgcolor="#fdab75">&nbsp;&nbsp;<b>Bitiş</b>&nbsp;&nbsp;</td>
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

$get_news = mysql_query("select id,fuar,baslangic,bitis,zaman,editor from fuarlar $newsq");

while(list($fid,$ffuar,$fbasla,$fbitis,$ftarih,$feditor)=mysql_fetch_row($get_news)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';

if($hkat=="4"){ $bgc="#e0e9ce"; }


		

echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/fuar_edit.php?ac_t=update&remhid='.$fid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
	
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$ffuar.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$fbasla.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$fbitis.'</td>
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$feditor.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$ftarih.'</td>

				
		
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