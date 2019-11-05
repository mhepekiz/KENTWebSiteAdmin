<?

$docroot = $DOCUMENT_ROOT;




$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

connecttodb();



function GenPass($_maxlen) {
    $A = "ABCDEFGHJKLMNOPQRSTUWXYZ";
    for ($i=0;$i<=$_maxlen;$i++) {
         $code .= $A[rand(0,strlen($A))];
    }
    return $code;
}

$actcode=GenPass(4);



mysql_query("insert into deger (deger) values ('$actcode')");
	
	$checkid=mysql_insert_id();




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=win-1254" />
<title>Yönetim Paneli :.. Mamut </title>


<style> 
		* { margin: 0; padding: 0; }
		
		html { 
			background: url(/admin/_media/bg.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			
		}
		
		html,body {
	margin:0;
	padding:0;
	height:100%; /* needed for container min-height */
}
		
		
	</style> 
    
   <link href="/admin/css/admin.css" rel="stylesheet" type="text/css">
 
</head>

<body topmargin="0" leftmargin="0">


<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
  <tr height="100%">
    <td align="center" height="100%"><table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr height="100%">
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td rowspan="3" width="527" height="472"><table width="527" height="472" border="0" cellspacing="0" cellpadding="0" background="_media/login.png">
  <tr>
    <td>
    
    
    <div class="loginpage">

<form id="loginform" name="loginform" action="/admin/dologin.php" method="post">
 <input type="hidden" name="ibnerifo" value="<?=$checkid?>" />

<table width="80%" height="350" align="center" border="0" cellpadding="0" cellspacing="0">

	<tr>

		<td width="100%" style="background-position:left center; background-repeat:no-repeat;"></td>

		<td  style="background-position:center; background-repeat:no-repeat;" align="center" valign="top"><table width="333" border="0" align="center" cellpadding="3" cellspacing="1" style="margin-top:50px;">

			<tr>

				<td class="logintitle" width="250">Kullanıcı Adı</td>

				<td colspan="2"><input name="uname" type="text" class="logininput" id="uname" maxlength="70"  /></td>

			</tr>

			<tr>

				<td class="logintitle">Şifre</td>

				<td colspan="2"><input name="pass" type="password" class="logininput" id="pass" maxlength="70"></td>

			</tr>

			<tr>

				<td class="logintitle">CAPTCHA</td>

				<td><input name="code" type="text" id="code" size="6" maxlength="6" class="loginsecure" /></td>

				<td align="center"><img src="/imgchk.php?imid=<?=$checkid?>"></td>

			</tr>

	  			<tr>

				<td></td>

				<td colspan="2"><input type="submit" class="loginbutton" name="Submit" value="Giriş" /></td>

			</tr>

		</table><br>

</td>

	</tr>

</table>

</form>

</div>



</td>
  </tr>
</table>
</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</td>
  </tr>
</table>




</body>
</html>
