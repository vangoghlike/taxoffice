<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
if(!in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale="20";

$arrList = getArticleList($_conf_tbl["mail_config"], $scale, $_REQUEST[offset], " WHERE 1=1 ");
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">메일 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 메일 관리 &nbsp;&gt;&nbsp; 메일 목록</div>
	</div>

<script language="javascript">
function delContents(code){
	var cfm;
	cfm =false;
	cfm = confirm("이 메일/문자 내용을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmContentsHidden.code.value = code;
		document.frmContentsHidden.submit();
	}
}

function CheckForm(frm){ 
	if (frm.id.value==""){
		alert("ID 를 입력하여 주십시요.");
		frm.id.focus();
		return false;
	}
	if (frm.id.value.length < 2 || frm.id.value.length > 20) {
		alert("ID는 2~20자리입니다.");
		frm.id.focus();
		return false;
	}
	if (hangul_chk(frm.id.value) != true ){
		alert("ID에 한글이나 여백은 사용할 수 없습니다.");
		frm.id.focus();
	 	return false;
	}

}
</script>

<div class="admin-search">
  <form name="frmContents" method="post" action="mail_evn.php" onSubmit="return CheckForm(this)">
  <input type="hidden" name="evnMode" value="join">
	<div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>	
	<!-- <div class="keyword">신규 메일/문자 코드 : <input type="text" name="code" size="30" maxlength="20" class="input" /> <span class="btn_pack medium icon"><span class="add"></span><input type="submit" value="메일 생성"></span></div> -->
  </form>
</div>

<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="3%">No.</th>
	  <th width="5%">코드제목</th>
	  <th width="5%">메일/문자 코드</th>
	  <th width="20%">메일 제목</th>
	  <th width="5%">메일사용여부</th>
	  <th width="20%">문자내용</th>
	  <th width="5%">문자사용여부</th>
	  <th width="5%">관리</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=number_format($arrList['total']-$i-$offset)?></td>
	  <td><?=$arrList['list'][$i]['code_subject']?></td>
	  <td><?=$arrList['list'][$i]['code']?></td>
	  <td class="space-left"><?=$arrList['list'][$i]['subject']?></td>
	  <td><?=$arrList['list'][$i]['is_use']?></td>
	  <td class="space-left"><?=$arrList['list'][$i]['m_subject']?></td>
	  <td><?=$arrList['list'][$i]['is_use_m']?></td>
	  <td><a href="mail_info.php?code=<?=$arrList['list'][$i]['code']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a>
	  <?if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT"):?><a href="javascript:delContents('<?=$arrList['list'][$i]['code']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a><?endif;?></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="8" >생성된 메일폼이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?>
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
				<li>{SHIPNAME} 수령자명</li>
				<li>{SHIPZIP} 수령자 우편번호</li>
				<li>{SHIPADDRESS} 수령자 주소</li>
				<li>{SHIPADDRESSEXT} 수령자 상세주소</li>
				<li>{SHIPPHONE} 수령자 전화</li>
				<li>{SHIPMOBILE} 수령자 휴대전화</li>
				<li>{COMMENT} 주문시 하실 말씀</li>
			</ul>
		</fieldset>

<form name="frmContentsHidden" method="post" action="mail_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="code">
</form>
  </div>
</div>

<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>