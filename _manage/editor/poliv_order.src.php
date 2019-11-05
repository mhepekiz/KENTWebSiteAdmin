<?

require_once('editor_poliv.php');

$editorler = editorler();

?>
<script type="text/javascript" src="/js/scriptaculous-js-1.8.1/lib/prototype.js"></script>
<script type="text/javascript" src="/js/scriptaculous-js-1.8.1/src/scriptaculous.js"></script>

<style type="text/css">

.liste {padding:0;}
 
.liste li { padding:4px 10px; color:#000; cursor:move; list-style:none; width:500px; background:#ddd; margin:10px 0; border:1px solid #999; }


</style>
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

&nbsp;<fieldset>

<legend>Sistemdeki Poliklinikler</legend>



	

<table border="0" width="100%" id="table10" cellpadding="5" cellspacing="1">


	
	<tr>

		<td nowrap width="1" bgcolor="#FF6C00" align="left"><b>Ref Siralama</b></td></tr>
        
        <tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
    <!-- Siralama -->
    
    
 <ul id="editor_liste" class="liste">
<?
foreach ($editorler as $id => $editor)
{
?>  
	<li id="editor_<?=$id?>"><img src="/_media/transfer_up_down.png" border="0" />&nbsp;&nbsp;<?=$editor?></li>
<?
}
?>
</ul>
<script type="text/javascript">
function liste_sirala()
{
	var options = {
		method : 'post',
		parameters : Sortable.serialize('editor_liste'),
		onComplete : function(request) {
		}
	};
	new Ajax.Request('kayit_poliv.php', options);
}
Sortable.create('editor_liste', { onUpdate : liste_sirala });
</script>


    </td>
  </tr>
</table>




</td></tr></table>
						
						</td>

					</tr>

				</table>
                
                	</td>

					</tr>

				</table>
                
                	</td>

					</tr>

				</table>