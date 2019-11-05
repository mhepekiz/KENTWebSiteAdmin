<?

$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();



$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);



$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile); 



$welcomefile=$docroot."/admin/_manage/_pages/welcome.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>