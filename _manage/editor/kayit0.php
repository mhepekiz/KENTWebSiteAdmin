<?


$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();


require_once('editor0.php');
  
sira_kaydet('editor_liste');


?>

