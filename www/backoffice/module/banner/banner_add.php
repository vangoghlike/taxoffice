<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/banner/banner.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php";
if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$dblink = SetConn($_conf_db["main_db"]);

$arrCategoryList = getCategoryList(1);

SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">메인이미지 등록</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 메인이미지 관리 &nbsp;&gt;&nbsp; 메인이미지 등록</div>
	</div>

<script language="javascript">
function CheckForm(frm){
	if (frm.b_subject.value==""){
		alert("제목을 입력해 주십시요.");
		frm.b_subject.focus();
		return false;
	}
	if (frm.image_file.value==""){
		alert("메인이미지를 입력해 주십시요.");
		frm.image_file.focus();
		return false;
	}
}

</script>

<form name="frmInfo" method="post" action="banner_evn.php" ENCTYPE="multipart/form-data" onSubmit="return CheckForm(this)">
<input type="hidden" name="evnMode" value="insert">

<!-- 기본정보 -->
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>메인이미지 타입</th>
		<td class="space-left">
		<select name="b_type" onchange="chkType(this.value)">
			<option value="1">1. PC 메인 슬라이드 배경 이미지</option>
			<option value="2">2. MO 메인 슬라이드 배경 이미지</option>
			<option value="3">3. PC 영문 슬라이드 배경 이미지</option>
			<option value="4">4. MO 영문 슬라이드 배경 이미지</option>
		</select>
		</td>
	</tr>	
	<tr>
		<th>제목</th>
		<td class="space-left"><input type="text" name="b_subject" style="width:50%" maxlength="200" class="input" /></td>
	</tr>
	<tr>
		<th>메인이미지</th>
		<td class="space-left"><input type="file" name="image_file" style="width:50%"> </td>
	</tr>
	<tr>
		<th>링크주소</th>
		<td class="space-left"><input type="text" name="b_url" style="width:50%" maxlength="255" class="input" /></td>
	</tr>
	<tr>
		<th>새창</th>
		<td class="space-left">
		<input type="radio"  id="radio1" name="b_target" value="_blank" ><label for="radio1">_blank (새창)</label> &nbsp;&nbsp;
		<input type="radio"  id="radio2" name="b_target" value="_self" checked><label for="radio1">_self (현재페이지)</label> &nbsp;&nbsp;
		<input type="radio"  id="radio3" name="b_target" value="_top"><label for="radio1">_top</label>
		</td>
	</tr>
	<tr>
		<th>보이기</th>
		<td class="space-left">
		<input type="radio"  id="radio4" name="b_show" value="Y" checked><label for="radio4">보임</label> &nbsp;&nbsp;
		<input type="radio"  id="radio5" name="b_show" value="N"><label for="radio5">숨김</label>
		</td>
	</tr>
	
	<tr>
		<th>정렬순서</th>
		<td class="space-left"><input type="text" name="b_sort" size="10" maxlength="10" value="0" class="input" /> (숫자가 높을수록 먼저 나타남)</td>
	</tr>
  </tbody>
</table>

<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="메인이미지 등록" style="font-weight:bold" /></span>
	</div>
</div>
</form>
  </div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>