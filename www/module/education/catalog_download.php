<?
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrFile = getCatalogFileInfoShop(mysql_escape_string($_REQUEST[b_idx]), mysql_escape_string($_REQUEST[idx]));

//_DEBUG($arrFile);
if($arrFile["total"] > 0){
	$src_file = $_SERVER[DOCUMENT_ROOT] . "/uploaded/shop_good/" . $arrFile["list"][0][b_idx] . "/" . $arrFile["list"][0][re_name];

	//다운로드 수 업데이트
	$sql  = "UPDATE " .$GLOBALS["_conf_tbl"]["catalog_files"]." SET ";
	$sql .= " download = download + 1 ";
	$sql .= "WHERE idx = '".$arrFile["list"][0][idx]."' ";
	//echo $sql;

	fileDownload($src_file, iconv("utf-8","euc-kr",$arrFile["list"][0][ori_name]));
	mysql_query($sql, $GLOBALS[dblink]);
}else{
	jsMsg('해당 파일이 없습니다.');
	selfClose();
}
//DB해제
SetDisConn($dblink);
?>