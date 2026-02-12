<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$sclae="20";

$arrList = getEducationMemberOnlineList("", $_GET[sw], $_GET[sk], $scale, $_REQUEST[offset]);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">회원 교육신청목록</h2>

<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delOnline(idx){
	var cfm;
	cfm =false;
	cfm = confirm("해당 회원의 교육과정을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmOnlineHidden.idx.value = idx;
		document.frmOnlineHidden.submit();
	}
}

function stateChange(idx, val) {
	document.frmChangeHidden.idx.value = idx;
	document.frmChangeHidden.status.value = val;
	document.frmChangeHidden.submit();
}
</script>
<h3 class="admin-title-middle">회원교육신청검색</h3>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<form name="frmSort" method="get" action="education_member.php">
	<input type="hidden" name="sw" value="s">
	<tr>
		<th>접수상태</th>
		<td class="space-left">
		 <select name="status">
			<option value="">선택</option>
			<option value="I"<?=$_GET[status]=="I"?" selected":""?>>접수중</option>
			<option value="C"<?=$_GET[status]=="C"?" selected":""?>>취소</option>
			<option value="Y"<?=$_GET[status]=="Y"?" selected":""?>>접수완료</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>교육년도</th>
		<td class="space-left">
		<select name="syear">
			<option value="">선택</option>
			<? for($i=date("Y")+1; $i>"2013"; $i--) {?>
			<option value="<?=$i?>"<?=$_GET[syear]==$i?" selected":""?>><?=$i?></option>
			<?}?>
		</select> ~ 
		<select name="eyear">
			<option value="">선택</option>
			<? for($i=date("Y")+1; $i>"2013"; $i--) {?>
			<option value="<?=$i?>"<?=$_GET[eyear]==$i?" selected":""?>><?=$i?></option>
			<?}?>
		</select>
		</td>
	</tr>
	<tr>
		<th>교육명</th>
		<td class="space-left">
		  <input type="text" name="sk" value="<?=$_REQUEST[sk]?>" class="input" /> <input type="image" src="/backoffice/images/btn_search.gif" alt="검색" />
		</td>
	</tr>
	</form>
  </tbody>
</table>
<br />
<div class="clfix mgb5">
    <div class="fl" style="padding-top:4px;">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 명</strong></div>
    <div class="fr"></div>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <th width="10%">회사명</th>
	  <th width="30%">교육과정명</th>
	  <th width="10%">아이디</th>
	  <th width="10%">접수상태</th>
	  <th width="10%">이름</th>
	  <th width="10%">연락처</th>
	  <th width="10%">신청일</th>
	  <th width="10%">관리</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>
	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <td><?=$arrList['list'][$i]['company']?></td>
	  <td><?=stripslashes($arrList['list'][$i]['e_name'])?></td>
	  <td><?=$arrList['list'][$i]['user_id']?></td>
	  <td><select name="status" onchange="stateChange(<?=$arrList['list'][$i]['idx']?>, this.value)">
				<option value="I"<?=$arrList['list'][$i]['status']=="I"?" selected":""?>>접수중</option>
				<option value="Y"<?=$arrList['list'][$i]['status']=="Y"?" selected":""?>>접수완료</option>
				<option value="C"<?=$arrList['list'][$i]['status']=="C"?" selected":""?>>취소</option>
			</select>
	  </td>
	  <td><?=$arrList['list'][$i]['user_name']?></td>	  
	  <td><?=$arrList['list'][$i]['phone']?></td>	  
	  <td><?=substr($arrList['list'][$i]['wdate'],0,10)?></td>
	  <td><a href="javascript:delOnline('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="10" >등록된 교육신청이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"sw=".$_GET[sw]."&sk=".$_GET[sk]."&status=".$_GET[status]."&syear=".$_GET[syear]."&eyear=".$_GET[eyear])?>
</div>

<form name="frmOnlineHidden" method="post" action="education_evn.php">
<input type="hidden" name="evnMode" value="deleteMemberOnline">
<input type="hidden" name="idx">
<input type="hidden" name="rt_url" value="<?=$_SERVER[REQUEST_URI]?>">
</form>

<form name="frmChangeHidden" method="post" action="education_evn.php">
<input type="hidden" name="evnMode" value="changeMemberOnlineStatus">
<input type="hidden" name="idx">
<input type="hidden" name="status">
<input type="hidden" name="rt_url" value="<?=$_SERVER[REQUEST_URI]?>">
</form>

  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>