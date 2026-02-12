<?php
function httpPost($url,$params) {
	$postData = '';
	foreach($params as $k => $v) { 
		$postData .= $k . '='.$v.'&'; 
	}
	$postData = rtrim($postData, '&');

	$ch = curl_init();  

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_POST, sizeof($postData));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

	$output=curl_exec($ch);

	curl_close($ch);
	return $output;
}
// setting news type
$news_type = 'news_json';
$news_cid = 'pzTrCWABBK6KbRYQ';
$scale = 10;
if($_REQUEST["scale"] != ""){
	$scale = $_REQUEST["scale"];
}
if ( $_REQUEST['news_code'] ) {
	switch ( $_REQUEST['news_code'] ) {
		case 'josenews' :
			$news_type = 'news_json';
			$news_cid = 'pzTrCWABBK6KbRYQ';
			break;
		case 'joseexam' :
			$news_type = 'laws_json';
			$news_cid = 'Fe5nXD9GCYzAedgE';
			break;
		default :
			$news_type = 'news_json';
			$news_cid = 'pzTrCWABBK6KbRYQ';
			break;
	}
}

if ($_REQUEST['id']) {
	$result = httpPost('http://svc.joseilbo.com/Base/'.$news_type.'.php', array('id' => $_REQUEST['id'], 'cid' => $news_cid));
}
else {
	$result = httpPost('http://svc.joseilbo.com/Base/'.$news_type.'.php', array('Unit' => $scale, 'Page' => (int)$_REQUEST['page'], 'cid' => $news_cid));
}

echo $result;




?>
