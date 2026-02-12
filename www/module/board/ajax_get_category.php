<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//리스트
$arrCate = getCategoryList($_REQUEST['category'],$_REQUEST['gubun']);

for($i=0;$i<$arrCate["total"];$i++){
	echo $arrCate["list"][$i]['cat_no'] . "**" . $arrCate["list"][$i]['cat_name'];
	if($i != ($arrCate["total"]-1)){
		echo "||";
	}
}

//DB해제
SetDisConn($dblink);

?>