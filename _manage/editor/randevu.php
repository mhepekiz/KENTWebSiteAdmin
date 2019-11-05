<?


function imaj($foto){
$foto = strtolower($foto);
$degis1 = array('Ý','Ö','Ü','Ð','Ç','Þ','ö','ü','ð','ç','þ','ö','_',' ','--','---','ý');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','-','-','-','-','i');
$foto    =str_replace($degis1,$degis2,$foto);

return $foto;
}





							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
	
	
	if($e_perm=="no"){
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


		
	
$welcomefile=$docroot."/admin/_manage/mh/randevu.src.php";
include($welcomefile);


	}


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>