<?
$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();

$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);

mysql_query("delete from essions where sessionid='$GTBerKCookie'");
header("Location: /admin/goodbye.php");
?>