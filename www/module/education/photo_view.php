<?
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/product/product.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//제품정보
$arrInfo = getProductFileInfo(mysql_escape_string($_REQUEST[b_idx]), mysql_escape_string($_REQUEST[idx]));

//DB해제
SetDisConn($dblink);

if($arrInfo["total"] < 1){
	jsMsg("해당제품의 확대 이미지를 찾을 수 없습니다.");
	selfClose();
}

//_DEBUG($arrInfo);
?>
<html>
<head>
<title><?=$arrInfo["list"][0]["ori_name"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language=javascript> 
	moveTo(0,0);
	resizeTo('<?=($arrInfo["list"][0]["width"])+20?>','<?=($arrInfo["list"][0]["height"])+80?>');
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin=0 topmargin=0 onContextMenu='return false;'>
<center>
<a href='javascript:window.close(self)'><img src='/uploaded/product/<?=$_REQUEST[b_idx]?>/<?=$arrInfo["list"][0]["re_name"]?>' border='0'></a>
</center>
</body>
</html>