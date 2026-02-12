<?
//로그인확인
include_once $_SERVER[DOCUMENT_ROOT] . "/module/member/auth.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$RS = getMyOrderGood(mysql_escape_string($_REQUEST[order_no]), mysql_escape_string($_REQUEST[g_idx]), $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

$arrInfo = getGoodInfo(mysql_escape_string($_REQUEST[g_idx]));

//DB해제
SetDisConn($dblink);

if($RS == false){
	jsMsg("구매한 상품에 대해서만 이용후기를 작성 하실 수 있습니다.");
	jsHistory("-2") ;
}
?>
<script language="javascript">
function checkForm(frm){
	if (frm.subject.value.length < 2){
		alert("제목을 입력해 주세요.");
		frm.subject.focus();
		return false;
	}

	if (frm.contents.value.length < 2){
		alert("내용을 입력해 주세요.");
		frm.contents.focus();
		return false;
	}
}
</script>
이용후기 작성
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <td>
	<!-- 글쓰기페이지 START -->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<form name="reviewForm" method="post" action="/module/shop/review/review_evn.php" onsubmit="return checkForm(this)">
	<input type="hidden" name="evnMode" value="write">
	<input type="hidden" name="order_no" value="<?=$_REQUEST[order_no]?>">
	<input type="hidden" name="g_idx" value="<?=$_REQUEST[g_idx]?>">

	<tr><td>
	
		<table width="100%" cellspacing="1" cellpadding="4" border="0">
		<tr> 
			<td width="20%" bgcolor="#FFFFFF" style="padding-left: 15px;">상품명</td>
			<td width="80%" style="padding-left: 10px;"><?=stripslashes($arrInfo["list"][0][g_name])?></td>
		</tr>
		<tr> 
			<td width="20%" bgcolor="#FFFFFF" style="padding-left: 15px;">이름</td>
			<td width="80%" style="padding-left: 10px;"><?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?>(<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]?>)</td>
		</tr>
		<!--tr> 
			<td width="20%" bgcolor="#FFFFFF" style="padding-left: 15px;">추천</td>
			<td style="padding-left: 10px;"><input type="radio" id="review_point_1" name="review_point" value="1"><label for="review_point_1">비추천</label> <input type="radio" id="review_point_3" name="review_point" value="3" checked><label for="review_point_3">추천</label> <input type="radio" id="review_point_5" name="review_point" value="5"><label for="review_point_5">강력추천</label></td>
		</tr-->
		<tr> 
			<td width="20%" bgcolor="#FFFFFF" style="padding-left: 15px;">제목</td>
			<td style="padding-left: 10px;"><input name="subject" type="text" class="input" size="77"></td>
		</tr>
		<tr> 
			<td height="32" bgcolor="#FFFFFF" style="padding-left: 15px;">내용</td>
			<td style="padding: 5px 0 5px 10px;"><textarea name="contents" cols="75" rows="12" class="input"></textarea></td>
		</tr>
		</table>
			
	</td></tr>
	<tr><td>
		  
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	<td width="80"><a href="/shop.php?goPage=MyReview"><img src="/common/images/btn_list.gif" border="0" align="absmiddle"></a></td>
	<td height="45"><div align="right">&nbsp;&nbsp;<input type="image" src="/common/images/btn_write.gif" border="0" align="absmiddle"></div></td>
	</tr>
	</table>
	
			
	</td></tr>
	</form>
	</table>
	<!-- 글쓰기페이지 END -->
  </td>
</tr>
</table>