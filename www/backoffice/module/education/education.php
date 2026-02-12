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

$arrList = getEducationList($_GET[sw], $_GET[sk], $scale, $_REQUEST[offset]);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">모집교육과정</h2>

<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delOnline(idx){
	var cfm;
	cfm =false;
	cfm = confirm("해당 교육과정을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmOnlineHidden.idx.value = idx;
		document.frmOnlineHidden.submit();
	}
}
</script>
<h3 class="admin-title-middle">모집교육검색</h3>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<form name="frmSort" method="get" action="education.php">
	<input type="hidden" name="sw" value="s">
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
    <div class="fr"><span class="btn_pack medium icon"><span class="download"></span><a href="/backoffice/module/education/education_form.php">모집교육 등록</a></span></div>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <!-- <th width="10%">년도</th> -->
	  <th width="30%">교육과정명</th>
	  <th width="10%">교육일수</th>
	  <!-- <th width="10%">교육인원</th> -->
	  <th width="10%">수정 삭제</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <!-- <td><?=$arrList['list'][$i]['e_year']?></td></td> -->
	  <td><?=$arrList['list'][$i]['e_name']?></td>
	  <td><?=$arrList['list'][$i]['e_day']?></td>
	  <!-- <td><?=$arrList['list'][$i]['e_member']?></td> -->
	  <td><a href="education_form.php?mode=edit&idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delOnline('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="8" >등록된 교육과정이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"sw=".$_GET[sw]."&sk=".$_GET[sk]."&syear=".$_GET[syear]."&eyear=".$_GET[eyear])?>
</div>

<form name="frmOnlineHidden" method="post" action="education_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
<input type="hidden" name="rt_url" value="<?=$_SERVER[REQUEST_URI]?>">
</form>
  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>