<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/common/conf/dbconfig.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$scale = 5;
$offset = $_REQUEST[offset]==""?0:$_REQUEST[offset];

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getMemberPointList($_REQUEST["user_id"], $scale, $offset);

//DB해제
SetDisConn($dblink);
?>
<h3>[ 포인트 내역 ]</h3>
<table class="listTable">
	<colgroup><col width="6%" /><col width="20%" /><col width="" /><col width="20%" /></colgroup>
	<thead>
	<tr>
		<th>번호</th>
		<th>날짜</th>
		<th>사유</th>
		<th>포인트</th>
	</tr>
	</thead>
	<tbody>
	<?
	if($arrList["list"]["total"] > 0){
		for($i=0;$i<$arrList["list"]["total"];$i++){
			$num = $arrList['total'] - ($offset) - $i ;
	?>
	<tr class="allmerge">
		<td><?=$num?></td>
		<td><?=$arrList["list"][$i]["reg_date"]?></td>
		<td style="word-break: break-all;"><?=$arrList["list"][$i]["reci_message"]?></td>
		<td><?=$arrList["list"][$i]["price"]?></td>
	</tr>
	<?
		}
	}else{?>
	<tr class="allmerge">
		<td>포인트 내역이 없습니다.</td>
	</tr>
	<?}?>
	</tbody>
</table>
<p class="paging">PAGE : <b><?=(int)($offset/5)+1?></b> / <?=(int)($arrList['total']/5)?></p>
<div class="paginate">
	<?=pageNavigationAjax($arrList['total'],$scale,$pagescale,$offset,"&sw=&sk=&user_id=".$_REQUEST["user_id"]."")?>
</div>

