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

$arrList = getEducationOnlineList($_GET[sw], $_GET[sk], $scale, $_REQUEST[offset]);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">온라인 교육신청목록</h2>

<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delOnline(idx){
	var cfm;
	cfm =false;
	cfm = confirm("해당 온라인 교육과정을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmOnlineHidden.idx.value = idx;
		document.frmOnlineHidden.submit();
	}
}

function completionOpen(idx) {
	var obj = window.open("education_completion.php?idx="+idx, "수료여부", "width=1000, height=800");
	obj.focus();
}
</script>
<h3 class="admin-title-middle">온라인교육신청검색</h3>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<form name="frmSort" method="get" action="education_online.php">
	<input type="hidden" name="sw" value="s">
	<tr>
		<th>접수상태</th>
		<td class="space-left">
		 <select name="status">
			<option value="">선택</option>
			<option value="S"<?=$_GET[status]=="S"?" selected":""?>>모집대기</option>
			<option value="I"<?=$_GET[status]=="I"?" selected":""?>>모집중</option>
			<option value="E"<?=$_GET[status]=="E"?" selected":""?>>모집마감</option>
			<option value="A"<?=$_GET[status]=="A"?" selected":""?>>교육중</option>
			<option value="B"<?=$_GET[status]=="B"?" selected":""?>>교육종료</option>
		</select>
		</td>
	</tr>
	<!-- <tr>
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
	</tr> -->
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
    <div class="fr"><span class="btn_pack medium icon"><span class="download"></span><a href="/backoffice/module/education/education_online_form.php">온라인 교육 등록</a></span></div>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <!-- <th width="10%">년도</th> -->
	  <th width="30%">교육과정명</th>
	  <th width="10%">모집기간</th>
	  <th width="10%">교육기간</th>
	  <th width="10%">교육시간</th>
	  <th width="10%">접수</th>
	  <th width="10%">신청인원</th>
	  <th width="10%">수료관리</th>
	  <th width="10%">관리</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>
	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <!-- <td><?=$arrList['list'][$i]['e_year']?></td> -->
	  <td><?=stripslashes($arrList['list'][$i]['e_name'])?> <?=stripslashes($arrList['list'][$i]['e_num'])?></td>
	  <td><?=$arrList['list'][$i]['r_s_date']?><br><?=$arrList['list'][$i]['r_e_date']?></td>
	  <td><?=$arrList['list'][$i]['e_s_date']?><br><?=$arrList['list'][$i]['e_e_date']?></td>	  
	  <td><?=$arrList['list'][$i]['e_s_time']?><br><?=$arrList['list'][$i]['e_e_time']?></td>
	  <td><?=$_SITE["STATUS"][$arrList['list'][$i]['status']]?></td>
	  <td><?=number_format($arrList['list'][$i]['o_count'])?> / <?=$arrList['list'][$i]['person']?></td>
	  <td><input type="button" name="btn" value="수료관리" onclick="completionOpen('<?=$arrList['list'][$i]['idx']?>')"></td>
	  <td><a href="education_online_form.php?mode=edit&idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delOnline('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
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
<input type="hidden" name="evnMode" value="deleteOnline">
<input type="hidden" name="idx">
<input type="hidden" name="rt_url" value="<?=$_SERVER[REQUEST_URI]?>">
</form>
  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>