<?


function seo($sef){
$sef = strtolower($sef);
$degis1 = array('�','�','�','�','�','�','�','�','�','�','�','�','_',' ','--','---','�');
$degis2 = array('i','o','u','g','c','s','o','u','g','c','s','o','-','-','-','-','i');
$sef    =str_replace($degis1,$degis2,$sef);
$sef    =preg_replace("@[^A-Za-z0-9\-_]+@i","",$sef);
return $sef;
}



?>

<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<title><? echo"Mamut : &#304;&#231;erik Y&#246;netim Sistemi"; ?></title>


<style>

<!--

a:active     { color: #253B54; text-decoration:none }

a:link       { color: #253B54; text-decoration:none }

a:visited    { color: #253B54; text-decoration:none }

a:hover      { color: #91000A }

-->

</style>


<style type="text/css"><!--
  .btn   { BORDER-WIDTH: 1; width: 26px; height: 24px; }
  .btnDN { BORDER-WIDTH: 1; width: 26px; height: 24px; BORDER-STYLE: inset; BACKGROUND-COLOR: buttonhighlight; }
  .btnNA { BORDER-WIDTH: 1; width: 26px; height: 24px; filter: alpha(opacity=25); }
--></style>
<!-- END : EDITOR HEADER -->
<!-- ---------------------------------------------------------------------- -->



<style type="text/css"><!--
  body, td { font-family: arial; font-size: 12px;  }
  .headline { font-family: arial black, arial; font-size: 28px; letter-spacing: -2px; }
  .subhead  { font-family: arial, verdana; font-size: 12px; let!ter-spacing: -1px; }
-->



#sortable-list        { padding:0; }
li.sortme            { padding:4px 8px; color:#000; cursor:move; list-style:none; width:500px; background:#ddd; margin:10px 0; border:1px solid #999; }
#message-box        { background:#fffea1; border:2px solid #fc0; padding:4px 8px; margin:0 0 14px 0; width:500px; }


</style>


     
<!-- Add jQuery library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<!-- Optionaly include easing and/or mousewheel plugins -->
<script type="text/javascript" src="/js/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/css/jquery.fancybox.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.0.3"></script>

<!-- Optionaly include button and/or thumbnail helpers -->
<link rel="stylesheet" href="/js/helpers/jquery.fancybox-buttons.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/helpers/jquery.fancybox-buttons.js?v=2.0.3"></script>

<link rel="stylesheet" href="/js/helpers/jquery.fancybox-thumbs.css?v=2.0.3" type="text/css" media="screen" />
<script type="text/javascript" src="/js/helpers/jquery.fancybox-thumbs.js?v=2.0.3"></script>



	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/admin/js/calendarDateInput.js"></script>

<!-- <link rel="stylesheet" href="/admin/css/tab-view.css" type="text/css" media="screen">
	<script type="text/javascript" src="/admin/js/ajax.js"></script>
	<script type="text/javascript" src="/admin/js/tab-view.js"> -->

</head>

<body topmargin="0" leftmargin="0">








<table border="0" width="100%" id="table1" cellspacing="0" height="100%" cellpadding="0">
	<tr>
		<td valign="top">
		<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0" height="0">
			<tr>
				<td valign="top" height="100" background="/admin/_media/head_bg.gif">
				<a href="/admin/_manage/"><img border="0" src="/admin/_media/head.gif" border="0"> </td>
			</tr>
			<tr>
				<td valign="top" height="125">
                
               <?

if($e_perm=="yes"){
	               
			   
$menufile=$docroot."/admin/_manage/_include/menu.php";
include($menufile);

} elseif($e_perm=="no"){ 

$menufile=$docroot."/admin/_manage/_include/menu_mh.php";
include($menufile);

 }

?>

                
		  </td></tr><tr><td valign="top">