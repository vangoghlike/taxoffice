<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/point/point.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php";
if(!in_array("point_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysql_escape_string($_REQUEST["user_id"]));

$arrPoint = getNowPoint(mysql_escape_string($_REQUEST["user_id"]));
//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "../member/menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">적립금 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 프로모션 &nbsp;&gt;&nbsp; 적립금 지급/사용 추가</div>
	</div>

<script language="javascript">
function checkForm(f){
	if(f.point.value.length < 1){
		alert("적립금을 입력하세요.");
		f.point.focus();
		return false;
	}
	if(f.point.contents.length < 1){
		alert("내용을 입력하세요.");
		f.contents.focus();
		return false;
	}

	var cfm;
	cfm =false;
	cfm = confirm("이 적립금 내용을 저장 하시겠습니까?");
	if(cfm==false){
		return false;
	}
}
</script>
<div class="mgb10">
	<form name="frmSort" method="get" action="<?=$_SERVER[PHP_SELF]?>">
	&nbsp;<strong>아이디 :</strong> <input type="text" name="user_id" value="<?=$_REQUEST[user_id]?>" class="input" /> <input type="image" src="/backoffice/images/btn_search.gif" alt="검색" align="absmiddle" />
	</form>
</div>

<?if($arrInfo["total"] > 0){?>
<!-- S 개인정보입력 -->
<table class="admin-table-type1">
	<form name="frmPoint" method="post" action="point_evn.php" onsubmit="return checkForm(this);">
	<input type="hidden" name="evnMode" value="add">
	<input type="hidden" name="user_id" value="<?=$arrInfo["list"][0]["user_id"]?>">
	<tr>
		<th>아이디</th>
		<td class="space-left"><?=$arrInfo["list"][0]["user_id"]?></td>
	</tr>
	<tr>
		<th>이 름</th>
		<td class="space-left"><?=$arrInfo["list"][0][user_name]?></td>
	</tr>
	<tr>
		<th>로그인 횟수</th>
		<td class="space-left"><?=number_format($arrInfo["list"][0][login_count])?></td>
	</tr>
	<tr>
		<th>최근로그인</th>
		<td class="space-left"><?=$arrInfo["list"][0][login_last]?></td>
	</tr>
	<tr>
		<th>업데이트일</th>
		<td class="space-left"><?=$arrInfo["list"][0][udate]?></td>
	</tr>
	<tr>
		<th>회원가입일</th>
		<td class="space-left"><?=$arrInfo["list"][0][wdate]?></td>
	</tr>
	<tr>
		<th>적립금 잔액</th>
		<td class="space-left"><strong><?=number_format($arrPoint["nowpoint"])?></strong></td>
	</tr>
	<tr>
		<th>입력구분</th>
		<td class="space-left">
			<select name="type">
			<option value="plus">적립금 지급</option>
			<option value="minus">적립금 사용</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>적립금</th>
		<td class="space-left"><input type="text" name="point" size="10" class="input" /></td>
	</tr>
	<tr>
		<th>내용</th>
		<td class="space-left"><input type="text" name="contents" size="100" class="input" /></td>
	</tr>
</table>
<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge"><input type="submit" value="정보입력" style="font-weight:bold" /></span>
	</div>
</div>	
</form>
<?}else{?>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
	<tr>
		<td><font color=red>검색된 회원이 없습니다.</th>
	</tr>
</table>
<?}?>
</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>