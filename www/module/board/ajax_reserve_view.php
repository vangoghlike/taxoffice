<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardArticle = getBoardArticleView($_REQUEST["boardid"], $_REQUEST["category"], $_REQUEST["g_idx"],"read");

//DB해제
SetDisConn($dblink);

?>
<script type="text/javascript">
<!--
function frmCheck(frm){	
	var cfm;
	cfm =false;
	cfm = confirm("해당 예약을 취소합니다. 계속 하시겠습니까?");
	if(cfm==true){
		frm.submit();
	}

	

}	
//-->
</script>
<table class="commonTable text-left">
	<colgroup>
		<col style="width:180px">
		<col style="width:251px">
		<col style="width:180px">
		<col style="width:*">
	</colgroup>
	<tbody>
		<tr>
			<th>이름</th>
			<td><?=stripslashes($arrBoardArticle["list"][0][name])?></td>
			<th>연락처</th>
			<td><?=stripslashes($arrBoardArticle["list"][0][homepage])?></td>
		</tr>
		<tr>
			<th>지도교수</th>
			<td><?=stripslashes($arrBoardArticle["list"][0][subject])?></td>
			<th>인원</th>
			<td><?=stripslashes($arrBoardArticle["list"][0][etc_3])?>명</td>
		</tr>
		<tr class="detail">
			<th>날짜</th>
			<td><?=substr($arrBoardArticle["list"][0][schedule_date],0,10)?> </td>
			<th>시간</th>
			<td><?=substr($arrBoardArticle["list"][0][etc_1],0,2)?>:<?=substr($arrBoardArticle["list"][0][etc_1],2,2)?> ~ <?=substr($arrBoardArticle["list"][0][etc_2],0,2)?>:<?=substr($arrBoardArticle["list"][0][etc_2],2,2)?></td>
		</tr>
	</tbody>
</table>
<form name="form1" method="post" action="/module/board/board_evn.php">
	<input type="hidden" name="evnMode" value="delete">
	<input type="hidden" name="returnURL" value="/service/reservation.php?boardid=<?=$_REQUEST["boardid"]?>&mode=mlist&category=<?=$_REQUEST["category"]?>">
	<input type="hidden" name="boardid" value="<?=$_REQUEST["boardid"]?>">
	<input type="hidden" name="idx" value="<?=$_REQUEST["g_idx"]?>">
	<input type="hidden" name="category" value="<?=$_REQUEST["category"]?>">
	<div class="deatilInfo text-left"><?=stripslashes($arrBoardArticle["list"][0][contents])?>
	<?if($arrBoardArticle["list"][0][r_user]==$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){?>
		<div class="text-right">
			<button class="blackBtn cancleBtn" type="button" name="button" onclick="frmCheck(document.form1);">예약취소</button>
		</div>
	<?}?>
	</div>
</form>