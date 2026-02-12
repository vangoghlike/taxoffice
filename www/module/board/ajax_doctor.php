<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardList = getBoardListBaseNFile("trmdoctor", $_REQUEST["category"], "e", "Y", 0, 0);

//DB해제
SetDisConn($dblink);

$nextdate = date("Y-m-d", strtotime("+1 day", strtotime(date("Y-m-d"))));
?>
<?
for($i=0; $i < $arrBoardList["list"]["total"]; $i++){
	$imgsrc[$i] = "/uploaded/board/trmdoctor/".$arrBoardList["list"][$i][re_name];

?>
<label class="select"><input type="radio" name="select2" onclick="calAjax('<?=$arrBoardList["list"][$i]['idx']?>','<?=$nextdate?>')">
	<div class="p pic_wrap">
		<div class="pic"><img src="<?=$imgsrc[$i]?>" alt="사진"><em><?=$arrBoardList["list"][$i]['name']?></em> <?php if($arrBoardList["list"][$i]['name']=="이종표"){?>원장<?}else{?>과장<?}?></div>
		<div class="txt">
			<strong>진료시간표</strong>
			<em><?=nl2br($arrBoardList["list"][$i]['etc_4'])?></em>
			<strong>진료과목</strong>
			<em><?=nl2br($arrBoardList["list"][$i]['etc_5'])?></em>
		</div>
	</div>
</label>
<?}?>