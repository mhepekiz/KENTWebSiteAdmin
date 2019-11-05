<?


$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();

							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
if($e_perm=="yes"){	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


if($ac_t=="add"){
	
	
	$linkurl = mysql_real_escape_string($linkurl);
	$linkad = mysql_real_escape_string($linkad);
	$linkdetay = mysql_real_escape_string($linkdetay);
	

			$zaman = date("Y-m-d H:i:s");
			mysql_query("insert into linkler (lang,linkadi, linkadres, linkaciklama, zaman, editor) values ('$dil','$linkad','$linkurl','$linkdetay','$zaman','$e_uname')")or die("DB Error");


}
	
	
$welcomefile=$docroot."/admin/_manage/editor/linkler.src.php";
include($welcomefile);
}

$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>