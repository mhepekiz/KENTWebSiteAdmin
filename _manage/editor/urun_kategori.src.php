





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


$welcomefile=$docroot."/admin/_manage/editor/urun_main.src.php";
include($welcomefile);


?></td>

							</tr>

							<tr>

								<td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>

<fieldset>

<legend>Kategori Ekleme Formu</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>

		<div class="paging">			

<form name="birseyekle" method="POST" enctype="multipart/form-data" action="/admin/_manage/editor/urun_kategori.php" onSubmit="return bosvarmi(this)">

  <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">

    <tr>

      <td align="left" valign="top" colspan="3">&nbsp;</td>

				</td>

    </tr>
    
        <tr>

      <td align="left" width="10%">Ana Kategori</td>

      <td width="1%">
      
      <select name="catof" size="1">
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

<fieldset>

<legend>Sistemdeki Kategoriler</legend>

<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td>


		<div class="paging">			

<table border="0" width="100%" id="table10" cellpadding="2" cellspacing="0">

	<tr>

		<td nowrap colspan="3">Mevcut kategoriler i&#231;inde arama yapabilirsiniz...</td>

	</tr>

	<tr>

		<td nowrap colspan="3">

		<form method="POST" action="/admin/_manage/editor/urun_kategori.php" name="haber_ara">

			<table border="0" width="100%" id="table11" cellspacing="0" cellpadding="2">

				<tr>

					<td><input type="text" name="q" size="20" value="<?=$q?>"></td>

					<td nowrap><span lang="en">&nbsp;</span><a href="javascript:haber_a();"><img border="0" src="/admin/_media/search.gif" width="16" height="16"> 

					Ara</a></td>

					<td width="100%">&nbsp;<span lang="en">&nbsp;&nbsp;&nbsp;</span><a href="/admin/_manage/editor/urun_kategori.php"><img border="0" src="/admin/_media/showall.gif" width="16" height="16"> 

					Hepsini G&#246;ster</a></td>

				</tr>

			</table>

			<input type="hidden" name="ac_t" value="search">

		</td></form>

	</tr>

	<tr>

		<td nowrap width="83%" bgcolor="#FF6C00"><b>Kategori</b></td>
		
		
		
		
		
		<td nowrap align="center" bgcolor="#FFBE32" width="13%"><span lang="en">&nbsp;&nbsp;&nbsp;</span><b>Eklenme 
		Zaman&#305;</b><span lang="en">&nbsp;&nbsp;&nbsp;</span></td>



		<td nowrap align="center" bgcolor="#FFBE32" width="2%"><b>&nbsp;Sil</b><span lang="en">&nbsp;</span></td>


	</tr>

<?

if($q){

$newsq = "where kategori LIKE '%$q%' order by id desc";

} else {

$newsq = "order by id desc limit 25";

}

$hs = 0;

$get_cat = mysql_query("select id,catof,kategori,zaman from kategori $newsq");

while(list($kid,$katof,$kat,$kzam)=mysql_fetch_row($get_cat)){

$hbaslik = str_replace($q, "<font color='blue'>$q</font>", $hbaslik);

$bgc = (($bgc == '#FFFFFF'))? '#F7F6F6' : '#FFFFFF';





echo'	<tr>


		<td bgcolor="'.$bgc.'" nowrap width="100%">';  if($katof=="0"){ echo'*&nbsp;'; } echo''.$kat.'</td>
		
		<td bgcolor="'.$bgc.'" nowrap align="center">'.$kzam.'</td>		
		
		<td bgcolor="'.$bgc.'" nowrap align="center"><a href="/admin/_manage/editor/urun_kategori.php?ac_t=del&remhid='.$kid.'"><img src="/admin/_media/delete.gif" border="0"></a></td>

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