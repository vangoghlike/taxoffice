<?php include $_SERVER[DOCUMENT_ROOT] . "/common/header.php"; 
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php"; 
include $_SERVER[DOCUMENT_ROOT] . "/module/product/product.lib.php"; 
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php"; 
include $_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php"; 
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//제품분류 리스트
$arrCategory = getCategoryList(0);//1차카테고리

//회원아이디가 있으면 회원정보를 가져옴
if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]){
	$arrInfo = getUserInfo($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]);
	$arrEmail = explode("@",$arrInfo["list"][0][email]);
	$arrZip = explode("-",$arrInfo["list"][0][zip]);
	$arrPhone = explode("-",$arrInfo["list"][0][phone]);
	$arrFax = explode("-",$arrInfo["list"][0][fax]);
	$arrMobile = explode("-",$arrInfo["list"][0][mobile]);
}

//제품정보
$arrProduct = getProductInfo(mysql_escape_string($_REQUEST[idx]));

//DB해제
SetDisConn($dblink);
?>
<script language="javascript">
function checkForm(frm){
	if (frm.p_name.value==""){
		alert("문의제품을 입력해 주세요.");
		frm.p_name.focus();
		return false;
	}
	if (frm.user_name.value==""){
		alert("이름을 입력해 주세요.");
		frm.user_name.focus();
		return false;
	}
	if (frm.email_id.value.length < 2){
		alert("이메일을 입력해 주세요.");
		frm.email_id.focus();
		return false;
	}
	if (frm.email_id.value.length < 2){
		alert("이메일을 입력해 주세요.");
		frm.email_id.focus();
		return false;
	}
	if (frm.email_domain.value.length < 2){
		alert("이메일을 입력해 주세요.");
		frm.email_domain.focus();
		return false;
	}
	if (frm.company.value.length < 2){
		alert("회사명을 입력해 주세요.");
		frm.company.focus();
		return false;
	}
	if (frm.department.value.length < 2){
		alert("부서를 입력해 주세요.");
		frm.department.focus();
		return false;
	}


	if (frm.phone_1.value.length < 2){
		alert("전화번호를 입력해 주세요.");
		frm.phone_1.focus();
		return false;
	}
	if (frm.phone_2.value.length < 2){
		alert("전화번호를 입력해 주세요.");
		frm.phone_2.focus();
		return false;
	}
	if (frm.phone_3.value.length < 2){
		alert("전화번호를 입력해 주세요.");
		frm.phone_3.focus();
		return false;
	}

	if (frm.contents.value.length < 2){
		alert("내용을 입력해 주세요.");
		frm.contents.focus();
		return false;
	}
}

function setEmailDom(frm,val){
		frm.email_domain.value = val;
		if(val==""){
			frm.email_domain.focus();
		}
}

function setDuty(val){
	$("duty").value = val;
}
</script>
<!-- S 쓰기페이지 -->
<table width="100%" cellpadding="0" cellspacing="0">
<form name="frmOnlineForm" method="post" action="/module/online/online_evn.php" onsubmit="return checkForm(this)">
<input type="hidden" name="evnMode" value="join">
<input type="hidden" name="o_type" value="1">
	<tr>
		<td style="padding:0 0 20px 0;">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr height="40">
					<td class="d_contents01">
					<?for($i=0;$i<$arrCategory["total"];$i++){?>
					<input type="checkbox" name="f_product[]" class="input_button" id="f_product<?=$i?>" value="<?=$arrCategory["list"][$i][cat_name]?>"><label for="f_product<?=$i?>"><?=$arrCategory["list"][$i][cat_name]?></label>
					<?}?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td width="15%" class="tline"></td>
					<td width="85%" class="sline"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">문의제품</td>
					<td class="board_contents02"><input name="p_name" type="text" class="input"  style="width: 95%;" value="<?=stripslashes($arrProduct["list"][0]["p_name"])?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">이름</td>
					<td class="board_contents02"><input name="user_name" type="text" class="input"  style="width: 30%;" value="<?=$arrInfo["list"][0][user_name]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">이메일</td>
					<td class="board_contents02"><input name="email_id" type="text" class="input" style="width:30%" value="<?=$arrEmail[0]?>">
							@
							<input name="email_domain" type="text" class="input" style="width:30%" value="<?=$arrEmail[1]?>">
							<select name="email_list" id="email_list" onChange="setEmailDom(this.form, this.value);" style="width:107px; height:22px">
							<option value="">직접입력</option>
							<option value="naver.com">naver.com</option>
							<option value="chol.com">chol.com</option>
							<option value="dreamwiz.com">dreamwiz.com</option>
							<option value="empal.com">empal.com</option>
							<option value="freechal.com">freechal.com</option>
							<option value="gmail.com">gmail.com</option>
							<option value="hanafos.com">hanafos.com</option>
							<option value="hanmail.net">hanmail.net</option>
							<option value="hanmir.com">hanmir.com</option>
							<option value="hitel.net">hitel.net</option>
							<option value="hotmail.com">hotmail.com</option>
							<option value="korea.com">korea.com</option>
							<option value="lycos.co.kr">lycos.co.kr</option>
							<option value="nate.com">nate.com</option>
							<option value="netian.com">netian.com</option>
							<option value="paran.com">paran.com</option>
							<option value="yahoo.com">yahoo.com</option>
							<option value="yahoo.co.kr">yahoo.co.kr</option>
							</select></td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">회사명</td>
					<td class="board_contents02"><input name="company" type="text" class="input"  style="width: 95%;" value="<?=$arrInfo["list"][0][company]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">부서</td>
					<td class="board_contents02"><input name="department" type="text" class="input"  style="width: 95%;" value="<?=$arrInfo["list"][0][department]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate01">직책</td>
					<td class="board_contents02"><input name="duty" type="text" class="input"  style="width: 95%;" value="<?=$arrInfo["list"][0][duty]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate01">우편번호</td>
					<td class="board_contents02"><input name="zip1" type="text" class="input" style="width:30px" value="<?=$arrZip[0]?>">
						-
						<input name="zip2" type="text" class="input" style="width:30px" value="<?=$arrZip[1]?>">
						
						<a href="javascript:zipSearch(4);"><img src="/common/images/btn_postnum.gif" border="0" class="input_button" align="absmiddle"></a></td>
				</tr>
				<tr>
					<td height="30" class="board_cate01">주소</td>
					<td class="board_contents02">
						<input name="address" type="text" class="input" style="width:98%" value="<?=$arrInfo["list"][0][address]?>"><br>
						<input name="address_ext" type="text" class="input" style="width:98%" value="<?=$arrInfo["list"][0][address_ext]?>">
					</td>
				</tr>
				<tr>
					<td height="30" class="board_cate03">전화번호</td>
					<td class="board_contents02"><input name="phone_1" type="text" class="input" style="width:40px" value="<?=$arrPhone[0]?>">
							-
							<input name="phone_2" type="text" class="input" style="width:40px" value="<?=$arrPhone[1]?>">
							-
							<input name="phone_3" type="text" class="input" style="width:40px" value="<?=$arrPhone[2]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate01">팩스번호</td>
					<td class="board_contents02"><input name="fax_1" type="text" class="input" style="width:40px" value="<?=$arrFax[0]?>">
							-
							<input name="fax_2" type="text" class="input" style="width:40px" value="<?=$arrFax[1]?>">
							-
							<input name="fax_3" type="text" class="input" style="width:40px" value="<?=$arrFax[2]?>"></td>
				</tr>
				<tr>
					<td height="30" class="board_cate01">휴대번호</td>
					<td class="board_contents02"><input name="mobile_1" type="text" class="input" style="width:40px" value="<?=$arrMobile[0]?>">
							-
							<input name="mobile_2" type="text" class="input" style="width:40px" value="<?=$arrMobile[1]?>">
							-
							<input name="mobile_3" type="text" class="input" style="width:40px" value="<?=$arrMobile[2]?>"></td>
				</tr>
				<tr>
					<td rowspan="3" class="board_cate03">내용</td>
					<td class="board_contents02">- 질문내용, 요청자료를 구체적으로 적어주세요.</td>
				</tr>
				<tr>
					<td class="board_contents02"><textarea name="contents"  style="width: 95%;" rows="10" class="textarea"></textarea></td>
				</tr>
				<tr>
					<td class="board_contents02">
					<input type="radio" id="inputEmail" name="reply_type" class="input_button" value="EMAIL" checked><label for="inputEmail">이메일로 답변해 주세요.</label>&nbsp;
					<input type="radio" id="inputPhone" name="reply_type" class="input_button" value="PHONE"><label for="inputPhone">담당자의 전화 답변을 요청합니다.</label></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td height="35" colspan="5" align="center" class="board_footer"><input type="submit" value="견적문의"> <!--<a href="#"><img src="../images/btn_cancel02.gif" border="0" class="input_button"></a>--></td>
				</tr>
			</table>
		</td>
	</tr>
	</form>
</table>
<!-- E 쓰기페이지 -->

<?php include $_SERVER[DOCUMENT_ROOT] . "/common/footer.php"; ?>