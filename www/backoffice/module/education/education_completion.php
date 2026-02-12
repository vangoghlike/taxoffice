<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getEducationMemberOnlineList("", "eo", $_GET[idx], $scale, $_REQUEST[offset]);
//_DEBUG($arrList);

$arrOnlineInfo = getEducationOnlineInfo(mysql_escape_string($_GET[idx]));
$arrInfo = getEducationInfo(mysql_escape_string($arrOnlineInfo["list"][0][e_idx]));

//DB해제
SetDisConn($dblink);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="imagetoolbar" content="no" />
<title><?=$_SITE["NAME"]?> 관리자</title>
<link href="/backoffice/css/style.css" rel="stylesheet" type="text/css" />
<script src="/common/js/shop.js" type="text/javascript"></script>

<body>
    <div id="admin-content">

<script language="javascript">
function completCheck(gb){
	if(gb=="Y") {
		var str = "수료처리";
	} else {
		var str = "미수료처리";
	}

	var cfm;
	cfm =false;
	cfm = confirm("선택하신 회원을 "+str+"하시겠습니까?");
	if(cfm==true){
		document.frmOnline.gb.value = gb;
		document.frmOnline.submit();
	}
}
</script>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>교육과정명</th>
		<td class="space-left"><?=$arrInfo["list"][0]["e_name"]?></td>
	</tr>
	<tr>
		<th>교육장소</th>
		<td class="space-left"><?=$arrOnlineInfo["list"][0]["location"]?></td>
	</tr>
	<tr>
		<th>교육일정</th>
		<td class="space-left"><?=$arrOnlineInfo["list"][0][e_s_date]?> ~ <?=$arrOnlineInfo["list"][0][e_e_date]?></td>
	</tr>
  </tbody>
</table>
<br />
<div class="clfix mgb5">
    <div class="fl" style="padding-top:4px;">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 명</strong></div>
    <div class="fr"></div>
</div>
<form id="frmOnline" name="frmOnline" method="POST" action="education_evn.php">
<input type="hidden" name="evnMode" value="editCompletion">
<input type="hidden" name="gb">
<input type="hidden" name="idx" value="<?=$_GET["idx"]?>">
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="2%"><input type="checkbox" onclick="checkboxCheckAll(this.status);"></th>
	  <th width="5%">No.</th>
	  <th width="18%">회사명</th>
	  <th width="20%">아이디</th>
	  <th width="10%">이름</th>
	  <th width="10%">수료상태</th>
	  <th width="10%">연락처</th>
	  <th width="15%">사업자등록번호</th>
	  <th width="10%">처리일</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>
	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><input type="checkbox" id="items[]" name="items[]" value="<?=$arrList["list"][$i][idx]?>"></td>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <td><?=stripslashes($arrList['list'][$i]['company'])?></td>
	  <td><?=$arrList['list'][$i]['user_id']?></td>
	  <td><?=stripslashes($arrList['list'][$i]['user_name'])?></td>
	  <td><?=$arrList['list'][$i]['completion']=="Y"?"수료":"미수료"?></td>
	  <td><?=$arrList['list'][$i]['phone']?></td>	  
  	  <td><?=$arrList['list'][$i]['cmp']?></td>	  
	  <td><?=substr($arrList['list'][$i]['cdate'],0,10)?></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="10" >등록된 교육신청이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>
<div class="clfix mgb5">
    <div class="fl" style="padding-top:4px;"><input type="button" name="btn1" value=" 수료처리 " onclick="completCheck('Y')"> <input type="button" name="btn1" value=" 미수료처리 " onclick="completCheck('N')"></div>
    <div class="cn">
		<div class="paginate">
		  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"sw=".$_GET[sw]."&sk=".$_GET[sk]."&status=".$_GET[status]."&syear=".$_GET[syear]."&eyear=".$_GET[eyear])?>
		</div>
	</div>
</div>
</form>

 </div>

</body>
</html>