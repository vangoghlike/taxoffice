<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
if(!in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getMailConfig(mysql_escape_string($_REQUEST[code]));

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">메일 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 메일 관리 &nbsp;&gt;&nbsp; 메일 설정</div>
	</div>

		<script>
		function frmCheck(frm){
			try{ contents.outputBodyHTML(); } catch(e){ }
		}
		</script>

		<h3 class="admin-title-middle">발송메일 설정</h3>
		<form id="frmMailConfig" name="frmMailConfig" method="post" action="mail_evn.php" onsubmit="javascript:return frmCheck(this);">
		<input type="hidden" name="evnMode" value="edit">
		<input type="hidden" name="code" value="<?=$arrInfo["list"][0][code]?>">
		<table class="admin-table-type1">
		  <colgroup>
		    <col width="120" />
			<col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>코드 제목</th>
				<td class="space-left"><input type="text" name="code_subject" style="width:20%" maxlength="200" value="<?=stripslashes($arrInfo["list"][0][code_subject])?>" class="input" /></td>
			</tr>
			<tr>
				<th>문자 사용여부</th>
				<td class="space-left"><input type="checkbox" name="is_use_m" id="is_use_m" value="Y"<?=$arrInfo["list"][0][is_use_m]=="Y"?" checked":""?>> <label for="is_use">체크해제시 문자(SMS) 발송되지 않습니다.</label></td>
			</tr>
			<tr>
				<th>문자 제목</th>
				<td class="space-left"><input type="text" name="m_subject" style="width:99%" maxlength="100" value="<?=stripslashes($arrInfo["list"][0][m_subject])?>" class="input" /></td>
			</tr>
			<tr>
				<th></th>
				<td class="space-left"></td>
			</tr>
			<tr>
				<th>메일 사용여부</th>
				<td class="space-left"><input type="checkbox" name="is_use" id="is_use" value="Y"<?=$arrInfo["list"][0][is_use]=="Y"?" checked":""?>> <label for="is_use">체크해제시 메일이 발송되지 않습니다.</label></td>
			</tr>
			<tr>
				<th>메일 제목</th>
				<td class="space-left"><input type="text" name="subject" style="width:99%" maxlength="200" value="<?=stripslashes($arrInfo["list"][0][subject])?>" class="input" /></td>
			</tr>
			<tr>
				<th>메일 내용</th>
				<td class="space-left">
				<textarea id="contents" name="contents"><?=stripslashes($arrInfo["list"][0]["contents"])?></textarea>
				<?
				$CKContent = "contents";
				include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
				?>
					
				</td>
			</tr>
		  </tbody>
		</table>
		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge"><input type="submit" value="정보저장" style="font-weight:bold" /></span>
			</div>
		</div>	

		<fieldset>
			<legend>회원가입/탈퇴/휴면안내 시 제목</legend>
			<ul class="list-dot">
				<li>{NAME} 회원명</li>
			</ul>
		</fieldset>

		<br />

		<fieldset>
			<legend>회원가입/탈퇴/휴면안내 시 내용</legend>
			<ul class="list-dot">
				<li>{ID} 회원ID</li>
				<li>{NAME} 회원명</li>
				<li>{EMAIL} 이메일</li>
				<li>{ZIP} 우편번호</li>
				<li>{ADDRESS} 주소</li>
				<li>{ADDRESSEXT} 상세주소</li>
				<li>{WDATE} 가입일</li>
				<li>{NDATE} 오늘</li>
				<li>{LOGINDATE} 마지막접속일</li>
				<li>{CHANGEDATE} 휴면전환예정일</li>
			</ul>
		</fieldset>

		<br />
		<fieldset>
			<legend>쇼핑주문 시 제목</legend>
			<ul class="list-dot">
				<li>{NAME} 회원명</li>
			</ul>
		</fieldset>

		<br />

		<fieldset>
			<legend>내용</legend>
			<ul class="list-dot">
				<li>{ID} 회원ID</li>
				<li>{NAME} 회원명</li>
				<li>{EMAIL} 이메일</li>
				<li>{ORDERZIP} 주문자 우편번호</li>
				<li>{ORDERADDRESS} 주문자 주소</li>
				<li>{ORDERADDRESSEXT} 주문자 상세주소</li>
				<li>{ORDERPHONE} 주문자 전화</li>
				<li>{ORDERNO} 주문번호</li>
				<li>{SUMMARY} 주문요약</li>
				<li>{PAYTYPE} 결제방식</li>
				<li>{BANKTYPE} 결제계좌</li>
				<li>{TOTAL} 주문금액</li>
				<li>{PAYTOTAL} 결제금액</li>
				<li>{SHIPCOMPANY} 택배사</li>
				<li>{SHIPNUMBER} 송장번호</li>
				<li>{SHIPNAME} 수령자명</li>
				<li>{SHIPZIP} 수령자 우편번호</li>
				<li>{SHIPADDRESS} 수령자 주소</li>
				<li>{SHIPADDRESSEXT} 수령자 상세주소</li>
				<li>{SHIPPHONE} 수령자 전화</li>
				<li>{SHIPMOBILE} 수령자 휴대전화</li>
				<li>{COMMENT} 주문시 하실 말씀</li>
			</ul>
		</fieldset>

		<br />
		<fieldset>
			<legend>상품권발송시 제목</legend>
			<ul class="list-dot">
				<li>{ORDERNAME} 발송자명</li>
				<li>{SHIPNAME} 수령자명</li>
			</ul>
		</fieldset>

		<br />

		<fieldset>
			<legend>내용</legend>
			<ul class="list-dot">
				<li>{SERIAL} 상품권 시리얼번호</li>
				<li>{ORDERNAME} 발송자명</li>
				<li>{SHIPNAME} 수령자명</li>
				<li>{EMAIL} 이메일</li>
				<li>{MOBILE} 수령자 휴대전화</li>
				<li>{COMMENT} 메모</li>
				<li>{IMG} 상품권이미지</li>
			</ul>
		</fieldset>



  </div>
</div>

<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>