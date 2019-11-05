<?





function imaj($foto){
$foto = strtolower($foto);
$degis1 = array('İ','Ö','Ü','Ğ','Ç','Ş','ö','ü','ğ','ç','ş','ö','_',' ','--','---','ı');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','-','-','-','-','i');
$foto    =str_replace($degis1,$degis2,$foto);

return $foto;
}









$docroot = $DOCUMENT_ROOT;
$dbfile=$docroot."/admin/_include/mysql-conf.php";
include($dbfile);

//Connect to Database
connecttodb();

							


$authfile=$docroot."/admin/_manage/_include/auth.php";
include($authfile);
	

$headerfile=$docroot."/admin/_manage/_include/page_header.php";
include($headerfile);


	
	
	
	
	
	

if($ac_t=="add"){
	
	
		$simdi = date("Y-m-d H:i:s");
	
		
			mysql_query("insert into tasozellik (katid, sertlik, birimhacimagirligi, ozgulagirlik, atm_suemme_agirlik, atm_suemme_hacim, kaynar_suemme_agirlik, kaynar_suemme_hacim, porozite, basinc_direnci, don_basinc_direnci, darbe_direnci, egilme_direnci, elastisite, doluluk, gozenek, ortalama_asinma_cm, ortalama_asinma_kgf, sio2, fe2o3, cao, mgo, zaman, editor) values ('$kategori', '$sertlik', '$birimhacimagirligi', '$ozgulagirlik', '$suemme_agirlik', '$suemme_hacim', '$kaynarsuemme_agirlik', '$kaynarsuemme_hacim', '$porozite', '$basinc_direnci', '$donbasinc_direnci', '$darbe_direnci', '$egilme_direnci', '$elastisite', '$dolulukorani', '$gozenek', '$ortalamaasinma', '$ortalamacekme', '$sio2', '$fe2o3', '$cao', '$mgo', '$simdi', '$editor')")or die("DB Error");
			$urunum = mysql_insert_id();
			

     
$proc = "Ürün eklendi ($urunadi)...";



echo "<script> alert(\"Ürün eklendi ($urunadi)!\"); </script>";



	$e_ip = $REMOTE_ADDR;



	mysql_query("insert into loglar (islem,editorid,eusername,ipno,zaman) values ('$proc','$my_eid','$e_uname','$e_ip','$tarih')");
	
	
	


		}
		
		
		
		


$welcomefile=$docroot."/admin/_manage/editor/tablo_main.src.php";
include($welcomefile);


$footerfile=$docroot."/admin/_manage/_include/page_footer.php";
include($footerfile);
?>