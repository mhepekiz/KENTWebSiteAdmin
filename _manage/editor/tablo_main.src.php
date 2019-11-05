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

<legend>Kategori Tablosu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		
<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/tablo_main.php">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">


        <tr>

      <td align="left" width="20%">Ana Kategori</td>

      <td colspan="3">
      
      <select name="kategori" size="1">
      <option value="0">Kategori Se&#231;iniz</option>
      
      <?
      
	  $kategoriler = mysql_query("select id, kategori from kategori where catof<>'0'");
	  while(list($k_id, $k_kat) = mysql_fetch_row($kategoriler)){
		  
		  echo'<option value="'.$k_id.'">'.$k_kat.'</option>';
		  
	  }
	  
	  
	  ?>
      
      
      </select>
      
      
   </td>  

    </tr>

    <tr>

      <td align="left" width="20%">Sertlik</td>

      <td colspan="3"><input type="text" name="sertlik" size="10"></td>

    </tr> 
    
        <tr>

      <td align="left" width="20%">Birim Hacim A&#287;&#305;rl&#305;&#287;&#305;</td>

      <td colspan="3"><input type="text" name="birimhacimagirligi" size="10"></td>

    </tr> 
        <tr>

      <td align="left" width="20%">&#214;zg&#252;l A&#287;&#305;rl&#305;&#287;&#305;</td>

      <td colspan="3"><input type="text" name="ozgulagirlik" size="10"></td>

    </tr> 
    
       <tr height="30">

      <td align="left" width="20%" colspan="4"><b>Atmosfer Bas&#305;nc&#305;nda</b></td>

    </td>

    </tr> 
   
       <tr>

      <td align="left" width="20%">Su Emme - A&#287;&#305;rl&#305;k&#231;a</td>

      <td colspan="3"><input type="text" name="suemme_agirlik" size="10"></td>

    </tr> 
    
     <tr>

      <td align="left" width="20%">Su Emme - Hacim</td>

      <td colspan="3"><input type="text" name="suemme_hacim" size="10"></td>

    </tr> 
    
         <tr>

      <td align="left" width="20%">Kaynar Suda Su Emme - A&#287;&#305;rl&#305;k&#231;a</td>

      <td colspan="3"><input type="text" name="kaynarsuemme_agirlik" size="10"></td>

    </tr> 
      <tr>

      <td align="left" width="20%">Kaynar Suda Su Emme - Hacim</td>

      <td colspan="3"><input type="text" name="kaynarsuemme_hacim" size="10"></td>

    </tr> 
   
      <tr>

      <td align="left" width="20%">Porozite</td>

      <td colspan="3"><input type="text" name="porozite" size="10"></td>

    </tr> 
       <tr>

      <td align="left" width="20%">Bas&#305;n&#231; Direnci</td>

      <td colspan="3"><input type="text" name="basinc_direnci" size="10"></td>

    </tr> 
   
          <tr>

      <td align="left" width="20%">Don Sonras&#305; Bas&#305;n&#231; Direnci</td>

      <td colspan="3"><input type="text" name="donbasinc_direnci" size="10"></td>

    </tr> 
    <tr>

      <td align="left" width="20%">Darbe Direnci</td>

      <td colspan="3"><input type="text" name="darbe_direnci" size="10"></td>

    </tr> 
    <tr>

      <td align="left" width="20%">E&#287;ilme Direnci</td>

      <td colspan="3"><input type="text" name="egilme_direnci" size="10"></td>

    </tr> 
   
       <tr>

      <td align="left" width="20%">Elastisite Mod&#252;l&#252;</td>

      <td colspan="3"><input type="text" name="elastisite" size="10"></td>

    </tr> 
           <tr>

      <td align="left" width="20%">Doluluk Oran&#305;</td>

      <td colspan="3"><input type="text" name="dolulukorani" size="10"></td>

    </tr> 
    
    
               <tr>

      <td align="left" width="20%">G&#246;zeneklilik Derecesi</td>

      <td colspan="3"><input type="text" name="gozenek" size="10"></td>

    </tr> 
    
                   <tr>

      <td align="left" width="20%">Ortalama A&#351;&#305;nma Direnci</td>

      <td colspan="3"><input type="text" name="ortalamaasinma" size="10"></td>

    </tr> 
    
    <tr>

      <td align="left" width="20%">Ortalama &#199;ekme Direnci</td>

      <td colspan="3"><input type="text" name="ortalamacekme" size="10"></td>

    </tr> 
    
      <tr>

      <td align="left" width="20%">SiO2</td>

      <td colspan="3"><input type="text" name="sio2" size="10"></td>

    </tr> 
     <tr>

      <td align="left" width="20%">Fe2O3</td>

      <td colspan="3"><input type="text" name="fe2o3" size="10"></td>

    </tr> 
     <tr>

      <td align="left" width="20%">CaO</td>

      <td colspan="3"><input type="text" name="cao" size="10"></td>

    </tr> 
     <tr>

      <td align="left" width="20%">MgO</td>

      <td colspan="3"><input type="text" name="mgo" size="10"></td>

    </tr> 
    

<tr valign="top">  <td width="100%" colspan="3"><table width="100%" border="0" cellpadding="3">
 <tr>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="84%" align="right"><input type="submit" value="Ekle" name="B1"></td>
  </tr>
  </table></td> </tr>

 

  </table>
</td></tr>
  
  </table></td> 
  <input type="hidden" name="ac_t" value="add">

</form></fieldset>



							</tr>

						</table>

						</td>

					</tr>

				</table>
                
                
          

&nbsp;<fieldset>

<legend>Sistemdeki &#220;r&#252;nler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	
	<tr>



		<td nowrap width="1" bgcolor="#FF6C00" align="center"><b>D</b></td>

		<td nowrap width="0" bgcolor="#FF6C00" align="center"><b>F&nbsp; </b></td>



		<td nowrap width="100%" bgcolor="#FF6C00"><b>&#220;r&#252;n Ad&#305;</b></td>
		
		<td nowrap align="center" bgcolor="#FF9000"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Cat</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>
		
		<td nowrap align="center" bgcolor="#FFBE32"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Editor</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		<td nowrap align="center" bgcolor="#FFC446"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>

		

		<td nowrap align="center">

		<p align="center"><span lang="en">&nbsp;&nbsp;</span><b>Sil</b><span lang="en">&nbsp;&nbsp;</span></td>

	</tr>

<?


$newsq = "order by id desc limit 25";


$hs = 0;

$get_prd = mysql_query("select id,kategori,lang,urunadi,editor,zaman from urunler $newsq");

while(list($pid, $pcat, $plan, $pad, $pzaman, $peditor)=mysql_fetch_row($get_prd)){


$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';


		$katego = mysql_query("select kategori, kategorien from kategori where id='$pcat'");
		list($ccc, $cccen) = mysql_fetch_row($katego);



echo'	<tr>

<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_edit.php?urunx='.$pid.'"><img src="/admin/_media/edit.gif" border="0"></a></td>
		<td bgcolor="'.$bgc.'" nowrap align="center"><img src="/admin/_media/search_buton.gif" border="0"></td> 
		
		

		<td bgcolor="'.$bgc.'" nowrap width="100%">'.$pad.'</td>

      <td bgcolor="'.$bgc.'" nowrap align="center">'; if($plan=="tr"){ echo"$ccc"; } else if($plan="en"){ echo"$cccen"; } echo'</td>
	  
	  <td bgcolor="'.$bgc.'" nowrap align="center">'.$pzaman.'</td>

		<td bgcolor="'.$bgc.'" nowrap align="center">'.$peditor.'</td>
$
		

				
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_urun.php?ac_t=del&remhid='.$pid.'"><img src="/admin/_media/delete.gif" border="0"></a></td> 
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

		<td bgcolor="'.$bgc.'" nowrap width="100%">Sistemde kayytly ürün bulunmamaktadyr.</td>

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

