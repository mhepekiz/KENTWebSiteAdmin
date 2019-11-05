<?
if(!$GTBerKCookie){ 
  header("Location: /admin/index.php");
  exit();
} else {
  $chkip=mysql_query("select count(*) from essions where ipaddr='$REMOTE_ADDR'");
  list($ipsay)=mysql_fetch_row($chkip);
  if($ipsay >= 1){
    $chkck=mysql_query("select count(*) from essions where sessionid='$GTBerKCookie' and ipaddr='$REMOTE_ADDR'");
    list($cksay)=mysql_fetch_row($chkck);
   
    if($cksay >= 1){
      $geteid = mysql_query("select editorid,expire from essions where ipaddr='$REMOTE_ADDR' and sessionid='$GTBerKCookie'") or die ("error 1"); 
      list($editor,$expire)=mysql_fetch_row($geteid);
      $now = time();
      
      if($now >= $expire){
mysql_query("update essions set sessionid='expired' where ipaddr='$REMOTE_ADDR' and sessionid='$GTBerKCookie'");
header("Location: /admin/expired.php");  
exit();      
      } else {
        $newex = time()+18000;
        mysql_query("update essions set expire='$newex' where ipaddr='$REMOTE_ADDR' and sessionid='$GTBerKCookie'");
       
        mysql_query("delete from essions where sessionid='expired' and editorid='$editor'");
        $my_eid = $editor;
        $e_uname = $ename;
        $my_email = $eemail; 
		
		$userr = mysql_query("select uname, yetki from editors where id='$editor'");
		list($e_uname, $e_perm) = mysql_fetch_row($userr);
        
      
     } 
    } else {
header("Location: /admin/expired.php"); 
exit();
    }
  } else {
header("Location: /admin/index.php"); 
exit();
  }
}
?>