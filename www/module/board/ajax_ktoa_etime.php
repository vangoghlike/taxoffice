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
if(isset($_REQUEST["stime"])){

$sdtnum = $_SITE["caltime"][$_REQUEST["stime"]];

if($arrBoardList["total"]>0){
	for($i=0; $i < $arrBoardList["total"]; $i++){
		$stime = $_SITE["caltime"][$arrBoardList["list"][$i]['etc_1']];
		$tmpCnt = $_SITE["caltime"][$arrBoardList["list"][$i]['etc_2']] - $_SITE["caltime"][$arrBoardList["list"][$i]['etc_1']];
		for($h=0; $h < $tmpCnt; $h++){
			$oponoff[$h+$stime+1] = 'disabled style="color:#c7c7c7;"';
		}
		if($stime>$sdtnum){
			for($k=$stime+1; $k < 49; $k++){
				$oponoff[$k] = 'disabled style="color:#c7c7c7;"';
			}
		}

	}
}
?>
<select name="etc_2">
<?for($i=2;$i<49;$i++){	
	if($i < ($sdtnum+1)){
		$oponoff[$i] = 'disabled style="color:#c7c7c7;"';
	}
	echo '<option value="'.$_SITE["caltime"][$i].'" '.$oponoff[$i].'>'.$_SITE["caltime"][$i].'</option>';							
}?>
</select>
<?}else{		## 마감인 경우?>
<select name="etc_2">
<?for($i=2;$i<49;$i++){	
	$oponoff[$i] = 'disabled style="color:#c7c7c7;"';	
	echo '<option value="'.$_SITE["caltime"][$i].'" '.$oponoff[$i].'>'.$_SITE["caltime"][$i].'</option>';							
}?>
</select>
<?}?>