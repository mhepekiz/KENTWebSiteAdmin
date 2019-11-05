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

$get_eu = mysql_query("select uname from editors where id='$my_eid'");
list($e_uname)=mysql_fetch_row($get_eu);





$welcomefile=$docroot."/admin/_manage/editor/banner_order.src.php";
include($welcomefile);

}
$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);

?>