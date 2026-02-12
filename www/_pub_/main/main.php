
<?
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//inputOldFileToNewFile();
//inputOldboardToNewBoardNlimit(2117,2117);
//2117

//DB해제
SetDisConn($dblink);
?>