<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardList	= getBoardArticleDS("ktoaorder", $_REQUEST["cal_date"]);

//DB해제
SetDisConn($dblink);
?>
<table>
	<colgroup>
		<col style="">
		<col style="width:145px">
		<col style="width:145px">
		<col style="width:260px">
	</colgroup>
	<tbody>
		<tr>
			<th>회사명</th>
			<th>성명</th>
			<th>예약장소</th>
			<th>예약일시</th>
		</tr>
	<?
	if($arrBoardList["total"]>0){
		for($i=0; $i < $arrBoardList["total"]; $i++){
	?>
		<tr>
			<td><?=$arrBoardList["list"][$i]['homepage']?></td>
			<td><?=$arrBoardList["list"][$i]['name']?></td>
			<td><?=$arrBoardList["list"][$i]['category']?></td>
			<td><?=$arrBoardList["list"][$i]['schedule_date']?>(<?=weekday($arrBoardList["list"][$i]['schedule_date'])?>) <?=$arrBoardList["list"][$i]['etc_1']?> ~ <?=$arrBoardList["list"][$i]['etc_2']?></td>
		</tr>
	<?
		}
	}else{
		echo '<tr><td colspan="5">등록된 예약일정이 없습니다.</td></tr>';
	}	
	?>
	</tbody>
</table>