<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardList	= getBoardArticleTime("ktoaorder", $_REQUEST["cal_date"], $_REQUEST["category"]);

//DB해제
SetDisConn($dblink);

if($arrBoardList["total"]>0){
	for($i=0; $i < $arrBoardList["total"]; $i++){
		$stime = $_SITE["caltime"][$arrBoardList["list"][$i]['etc_1']];
		$tmpCnt = $_SITE["caltime"][$arrBoardList["list"][$i]['etc_2']] - $_SITE["caltime"][$arrBoardList["list"][$i]['etc_1']];
		for($h=0; $h < $tmpCnt; $h++){
			$oponoff[$h+$stime] = 'disabled style="color:#c7c7c7;"';
		}
	}
}
?>
<select name="etc_1" onchange="ajaxTimeEnd(this.value);" id="startTime">
<?for($i=1;$i<48;$i++){	
	echo '<option value="'.$_SITE["caltime"][$i].'" '.$oponoff[$i].'>'.$_SITE["caltime"][$i].'</option>';							
}?>
</select>
	