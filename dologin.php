<?
$docroot = $DOCUMENT_ROOT;

$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();



	$kontrol = mysql_query("select deger from deger where id='$ibnerifo'");
			list($kontx) = mysql_fetch_row($kontrol);
			
			if($kontx=="$code"){
				
				mysql_query("delete from deger where id='$ibnerifo'");
				
				
				
				

//Check Posted Form Values
if(($uname) && ($pass)){




$uname = str_replace("'", "INJECT", $uname);
$pass = str_replace("'", "INJECT", $pass);

$uname = str_replace("=", "INJECT", $uname);
$pass = str_replace("=", "INJECT", $pass);

$uname = str_replace(">", "INJECT", $uname);
$pass = str_replace(">", "INJECT", $pass);

$uname = str_replace("<", "INJECT", $uname);
$pass = str_replace("<", "INJECT", $pass);

$uname = str_replace("!", "INJECT", $uname);
$pass = str_replace("!", "INJECT", $pass);

$uname = str_replace("%", "INJECT", $uname);
$pass = str_replace("%", "INJECT", $pass);




function newsession($sespar="MAX") {
    srand(time()); 
    $kullaniciadi = strtoupper($kullaniciadi);
    $a="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
    $rakam = (32 - strlen($sespar));
    for ($i=0; $i<$rakam; ++$i) { $sespar.=substr($a, (rand()%(strlen($a))),1); }
    return $sespar;
}  
  $userresult = mysql_query("select count(*) from editors where uname='$uname' and pass='$pass'");
  list($usay) = mysql_fetch_row($userresult);
  if ($usay >= 1){
    $session_id = newsession("MAX");
    setcookie(GTBerKCookie,$session_id);
    $expire = time()+1800;
    $ipa = $REMOTE_ADDR;
    $trhx = date("Y-m-d H:s:i");
    $getinf = mysql_query("select id from editors where uname='$uname' and pass='$pass'");
    list($edid)=mysql_fetch_row($getinf);
    mysql_query("insert into essions (sessionid,editorid,expire,ipaddr,trhx) values ('$session_id','$edid','$expire','$ipa','$trhx')");
    header("Location: /admin/_manage/index.php");
  } else {
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1254">
<title>:: Yönetici Alaný ::</title>
</head>
<?  
  echo  "<script> alert('Hatalý kullanýcý adý ya da þifre kombinasyonu!'); </script>\n";
  echo  "<body onLoad=\"history.go(-1);\"></body>";
?>
</body>
</html>  
<?
  }
  
} else {
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1254">
<title>:: Yönetici Alaný ::</title>
</head>
<?  
  echo  "<script> alert('Lütfen kullanýcý adý ve þifreyi yazýn!'); </script>\n";
  echo  "<body onLoad=\"history.go(-1);\"></body>";
?>
</body>
</html>  
<?
}

			} else {
				
				
				echo "<script> alert(\"Güvenlik kodu hatali!\"); </script>";
				echo  "<body onLoad=\"history.go(-1);\"></body>";
				
				 }

?>

