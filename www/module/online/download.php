<?
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrFile = getOnlineFileInfo(mysql_escape_string($_GET[boardid]), mysql_escape_string($_GET[b_idx]), mysql_escape_string($_GET[idx]));

if($arrFile["total"] > 0){
	$src_file = $_SERVER[DOCUMENT_ROOT] . "/uploaded/online/" . $arrFile["list"][0][re_name];

	if(!$mode){	

		//다운로드 수 업데이트
		$sql  = "UPDATE " .$GLOBALS["_conf_tbl"]["board_files"]." SET ";
		$sql .= " download = download + 1 ";
		$sql .= "WHERE idx = '".$arrFile["list"][0][idx]."' ";
		
		mysql_query($sql, $GLOBALS[dblink]);

		fileDownload($src_file, iconv("UTF-8","EUC-KR",$arrFile["list"][0][ori_name]));	

	}
}else{
	jsMsg('해당 파일이 없습니다.');
	selfClose();
}
//DB해제
SetDisConn($dblink);
?>