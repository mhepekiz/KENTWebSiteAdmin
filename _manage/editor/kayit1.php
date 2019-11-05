<?


$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();


require_once('editor1.php');
  
sira_kaydet('editor_liste');


?>

