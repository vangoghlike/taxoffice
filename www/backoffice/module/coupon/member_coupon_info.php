<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/coupon/coupon.lib.php";
if(!in_array("point_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_REQUEST["idx"]) {
	$arrInfo = getCouponInfo(mysql_escape_string($_REQUEST["idx"]));
	$btn_name = "쿠폰 수정";
	$mode = "modify";

	$arrCUList = getCouponUserListAdmin(mysql_escape_string($_REQUEST["idx"]), $scale, mysql_escape_string($_REQUEST[offset]));
} else {
	$btn_name = "쿠폰 발행";
	$mode = "add";
}

//DB해제
SetDisConn($dblink);
?>
<script src="/backoffice/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/datePicker/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/datePicker/jquery-ui.css" />
<script>
$(function() {
    $(".datePicker").datepicker({ 
     dateFormat: 'yy-mm-dd',
     monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
     dayNamesMin: ['일','월','화','수','목','금','토'],
	 weekHeader: 'Wk',
     changeMonth: true, //월변경가능
     changeYear: true, //년변경가능
     showMonthAfterYear: true //년 뒤에 월 표시
  });
 });
</script>

<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">회원관련쿠폰 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 프로모션 &nbsp;&gt;&nbsp; 회원관련쿠폰 수정</div>
	</div>

<script language="javascript">
function checkForm(f){
	if(f.coupon_name.value.length < 1){
		alert("쿠폰명을 입력하세요.");
		f.coupon_name.focus();
		return false;
	}
	if(f.coupon_dis.value.length < 1){
		alert("할인금액(율)을 입력하세요.");
		f.coupon_dis.focus();
		return false;
	}
	<? if($mode == "add") {?>
	if(f.coupon_qty.value.length < 1){
		alert("발급수량을 입력하세요.");
		f.coupon_qty.focus();
		return false;
	}
	<?}?>
}
</script>
<script language="javascript">
function couponUserDel(id){
	var cfm;
	cfm =false;
	cfm = confirm("발급된 쿠폰을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmContentsHidden.idx.value = id;
		document.frmContentsHidden.submit();
	}
}

function addMember(no) {
	var win = window.open("/backoffice/module/member/search_member.php?idx="+no,"회원찾기","width=1000,height=700,scrollbars=yes");
	win.focus();
}
</script>

<!-- S 개인정보입력 -->
<form name="frmPoint" method="post" action="/backoffice/module/coupon/coupon_evn.php" onsubmit="return checkForm(this);">
<input type="hidden" name="evnMode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$arrInfo["list"][0]["idx"]?>">
<input type="hidden" name="returnURL" value="<?=$_SERVER[REQUEST_URI]?>">
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>쿠폰명</th>
		<td class="space-left"><input type="text" name="coupon_name" style="width:200px" class="input" value="<?=stripslashes($arrInfo["list"][0][coupon_name])?>"></td>
	</tr>
	<!-- <tr>
		<th>쿠폰설명</th>
		<td class="space-left"><textarea name="coupon_content" class="input" style="width:500px;height:40px"><?=stripslashes($arrInfo["list"][0][coupon_content])?></textarea></td>
	</tr> -->
	<tr>
		<th>유효기간</th>
		<td class="space-left">
			발급후 <select name="coupon_content">
				<option value="1"<?=$arrInfo["list"][0][coupon_content]=="1"?" selected":""?>>1개월</option>
				<option value="3"<?=$arrInfo["list"][0][coupon_content]=="3"?" selected":""?>>3개월</option>
				<option value="6"<?=$arrInfo["list"][0][coupon_content]=="6"?" selected":""?>>6개월</option>
				<option value="12"<?=$arrInfo["list"][0][coupon_content]=="12"?" selected":""?>>12개월</option>
			</select>
		<!-- <input type="text" name="coupon_sdate" style="width:100px" class="input datePicker" value="<?=stripslashes($arrInfo["list"][0][coupon_sdate])?>"> ~ 
			<input type="text" name="coupon_edate" style="width:100px" value="<?=stripslashes($arrInfo["list"][0][coupon_edate])?>" class="input datePicker"> --></td>
	</tr>
	<tr>
		<th>쿠폰적용 상한가</th>
		<td class="space-left"><input type="text" name="over_price" style="width:100px" class="input" value="<?=stripslashes($arrInfo["list"][0][over_price])?>"> (상한가 금액만큼만 할인율이 적용됨, 미기재시 제한없음)</td>
	</tr>
	<tr>
		<th>결제금액 하한가</th>
		<td class="space-left"><input type="text" name="under_price" style="width:100px" class="input" value="<?=stripslashes($arrInfo["list"][0][under_price])?>"> (결제금액 하한가이상만 적용됨, 미기재시 제한없음)</td>
	</tr> 
	<tr>
		<th>쿠폰금액(할인율)</th>
		<td class="space-left"><input type="text" name="coupon_dis" style="width:100px" class="input" maxlength="20" value="<?=stripslashes($arrInfo["list"][0][coupon_dis])?>">
		<select name="coupon_unit">
		<option value="P"<?=$arrInfo["list"][0][coupon_unit]=="P"?" selected":""?>>%</option>
		<option value="F"<?=$arrInfo["list"][0][coupon_unit]=="F"?" selected":""?>>고정금액</option>
		</select>
		</td>
	</tr>
	<!-- <tr>
		<th>발급수량</th>
		<td class="space-left">
		<? if($mode == "modify") {?>
		<?=number_format($arrInfo["list"][0][coupon_qty])?>개, 추가발행: <input type="text" name="coupon_qty" style="width:40px" class="input" maxlength="3" value=""> 숫자만 입력하세요. (수량만큼 쿠폰이 생성됩니다.)
		<?}else{?>
		<input type="text" name="coupon_qty" style="width:40px" maxlength="3" class="input" value="<?=number_format($arrInfo["list"][0][coupon_qty])?>"> 숫자만 입력하세요. (수량만큼 쿠폰이 생성됩니다.)
		<br /><br />
		<input type="checkbox" name="member" value="Y">전체 회원 쿠폰발행 (체크시 전체회원에게 쿠폰이 발행됩니다.)
		<?}?></td>
	</tr> -->
	<tr>
		<td colspan="2" align="center"><input type="button" name="btn" value="목록보기" style="width:100px;height:40px;font-weight:bold" onclick="document.location.href='member_coupon.php'"> <input type="submit" value="<?=$btn_name?>" style="width:100px;height:40px;color:blue;font-weight:bold"></td>
	</tr>	
	</form>
</tbody>
</table>
<br />
<br />
<br />

<h3 class="admin-title-middle">발행된 쿠폰현황</h3>
<div class="clfix mgb5">
    <div class="fl" style="padding-top:4px;">&nbsp;<strong>전체 : <?=number_format($arrCUList['total'])?> 명</strong></div>
    <div class="fr"><span class="btn_pack medium icon"><span class="download"></span><a href="coupon_to_csv.php?idx=<?=$_GET[idx]?>">CSV 파일로 다운로드</a></span> 
</div>

<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25" align="center" bgcolor="#646464">
  <td width="5%"><font color="#ffffff">No.</font></td>
  <td width="20%"><font color="#ffffff">쿠폰번호</font></td>
  <td width="10%"><font color="#ffffff">회원아이디</font></td>
  <td width="10%"><font color="#ffffff">회원명</font></td>
  <td width="5%"><font color="#ffffff">사용여부</font></td>
  <td width="10%"><font color="#ffffff">사용일</font></td>
  <td width="10%"><font color="#ffffff">등록일</font></td>
  <td width="10%"><font color="#ffffff">관리</font></td>
</tr>
<?if($arrCUList['list']['total'] > 0):?>
<?for ($i=0;$i<$arrCUList['list']['total'];$i++) {?>
<tr height="25" align="center">
  <td><?=$arrCUList['total']-$_REQUEST[offset]-$i?></td>
  <td><?=$arrCUList['list'][$i]['coupon_no']?></td>
  <td><?=$arrCUList['list'][$i]['user_id']?></td>
  <td><?=$arrCUList['list'][$i]['user_name']?></td>
  <td><?=$arrCUList['list'][$i]['coupon_use']?></td>
  <td><?=substr($arrCUList['list'][$i]['udate'],0,10)?></td>
  <td><?=substr($arrCUList['list'][$i]['wdate'],0,10)?></td>
  <td align="center">
  <? if($arrCUList['list'][$i]['user_id']) {?>
  <!-- <a href="coupon_evn.php?evnMode=sendCoupon&user_id=<?=$arrCUList['list'][$i]['user_id']?>&user_name=<?=$arrCUList['list'][$i]['user_name']?>&idx=<?=$arrCUList['list'][$i]['idx']?>"><font color='blue'>메일발송</font></a> |  -->
  <?}else{?>
  <a href="javascript:addMember(<?=$arrCUList['list'][$i]['idx']?>)">회원등록</a> | 
  <?}?><a href="javascript:couponUserDel('<?=$arrCUList['list'][$i]['idx']?>')">삭제</a></td>
</tr>
<tr>
  <td colspan="10" height="1" bgcolor="646464"></td>
</tr>
<?}?>

<?else:?>
<tr height="100" align="center">
  <td width="100%" colspan="8" >등록된 쿠폰이 없습니다.</td>
</tr>
<tr>
  <td colspan="10" height="1" bgcolor="646464"></td>
</tr>
<?endif;?>
</table>

<br />
<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25" align="center">
  <td><?=pageNavigation($arrCUList['total'],$scale,$pagescale,$_REQUEST[offset],"idx=".$_REQUEST[idx])?></td>
</tr>
</table>
<form name="frmContentsHidden" method="post" action="coupon_evn.php">
<input type="hidden" name="evnMode" value="user_delete">
<input type="hidden" name="e_idx" value="<?=$_REQUEST[idx]?>">
<input type="hidden" name="idx">
<input type="hidden" name="returnURL" value="<?=$_SERVER[REQUEST_URI]?>">
</form>

</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>