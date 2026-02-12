<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$sclae="20";

$arrList = getOnlineList(mysql_escape_string($_REQUEST[o_type]), "", "", $scale, $_REQUEST[offset]);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">온라인문의 관리</h2>

<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delOnline(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 신청건을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmOnlineHidden.idx.value = idx;
		document.frmOnlineHidden.submit();
	}
}
</script>
<div class="mgb5">
  &nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <th width="20%">제목</th>
	  <th width="10%">이름</th>
	  <th width="15%">E-mail</th>
	  <th width="10%">전화번호</th>
	  <th width="5%">처리</th>
	  <th width="10%">신청일</th>
	  <th width="10%">수정 삭제</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <td><?=$arrList['list'][$i]['p_name']?></td>
	  <td><?=$arrList['list'][$i]['user_name']?><?if($arrList['list'][$i]['user_id']):?> (<a href="member_info.php?user_id=<?=$arrList['list'][$i]['user_id']?>"><?=$arrList['list'][$i]['user_id']?></a>)<?endif;?></td>
	  <td><?=$arrList['list'][$i]['email']?></td>
	  <td><?=$arrList['list'][$i]['phone']?></td>

	  <td><?=$arrList['list'][$i]['status']?></td>
	  <td><?=substr($arrList['list'][$i]['wdate'],0,10)?></td>
	  <td><a href="online_info.php?o_type=<?=$arrList['list'][$i]['o_type']?>&idx=<?=$arrList['list'][$i]['idx']?>&listURL=<?=urlencode($_SERVER[REQUEST_URI])?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delOnline('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="8" >등록된 신청건이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"o_type=".$_REQUEST[o_type])?>
</div>

<form name="frmOnlineHidden" method="post" action="online_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
<input type="hidden" name="rt_url" value="<?=$_SERVER[REQUEST_URI]?>">
</form>
  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>