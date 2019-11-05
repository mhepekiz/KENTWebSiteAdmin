<?php
function editorler()
{
	$sorgu  = 'SELECT id, baslik FROM haberler ORDER BY sira, LOWER(baslik)';
	$sonuc  = mysql_query($sorgu);$editorler = array();
	while ($bilgi = mysql_fetch_object($sonuc))
	{
		$editorler[$bilgi->id] = $bilgi->baslik;
	}
	return $editorler;
}


function sira_kaydet($key)
{
	if (!isset($_POST[$key]) || !is_array($_POST[$key])) return;
	$editorler = editorler();
	$sira = 1;
	foreach ($_POST[$key] as $editor_id)
	{
		if (!array_key_exists($editor_id, $editorler)) continue;
		$sorgu = sprintf('update haberler set sira = %d where id = %d',
		$sira,
		$editor_id);
		mysql_query($sorgu);
		$sira++;
	}
}
?>

