<?
include ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include ($_SERVER[DOCUMENT_ROOT] . "/module/banner/banner.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = setBannerCount(mysql_escape_string($_REQUEST[idx]));

//DB해제
SetDisConn($dblink);

if($arrList==true){
	echo "1";
}else{
	echo "0";
}
?>