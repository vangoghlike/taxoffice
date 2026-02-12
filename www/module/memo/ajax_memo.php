<?
session_start();
header("Content-Type: text/html; charset=euc-kr");
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/memo/memo.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$id = $_REQUEST[id];

//게시판 정보
$memoInfo = getmemoInfo($id);


if($id && $memoInfo["total"] > 0){
	//알림이후 해당 쪽지 업데이트
	setMemoNotifiy($id);
?>
<table width=200 height=200 border=1 align=center>

<tr><td><?=$id?> 님에게 쪽지가 도착하였습니다.</td></tr>
<tr><td><a href="javascript:LayerHideMemo();">닫기</a></td></tr>
</table>
<?
}else{
	echo "0";
}
//DB해제
SetDisConn($dblink);
?>
