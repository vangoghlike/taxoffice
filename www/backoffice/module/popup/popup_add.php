<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/popup/popup.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/fckeditor/fckeditor.php";
if(!in_array("popup_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);



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
		<h2 class="admin-title">팝업 등록</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 팝업관리 &nbsp;&gt;&nbsp; 팝업 등록</div>
	</div>

<script language="javascript">
function checkform(f){
	if(f.subject.value==""){
		alert("팝업제목을 입력하세요.");
		f.subject.focus();
		return false;
	}
	if(f.s_date.value==""){
		alert("팝업 시작일을 선택해 주세요.");
		f.s_date.focus();
		return false;
	}
	if(f.e_date.value==""){
		alert("팝업 종료일을 선택해 주세요.");
		f.e_date.focus();
		return false;
	}
	if(f.width.value==""){
		alert("팝업가로크기를 입력하세요.");
		f.width.focus();
		return false;
	}
	if(f.height.value==""){
		alert("팝업세로크기를 입력하세요.");
		f.height.focus();
		return false;
	}
	if(f.p_mode[0].checked==false && f.p_mode[1].checked==false){
		alert("팝업형태를 선택해 주세요.");
		f.p_mode[0].focus();
		return false;
	}
	if(f.p_type[0].checked==false && f.p_type[1].checked==false){
		alert("팝업타입을 선택해 주세요.");
		f.p_type[0].focus();
		return false;
	}
	if(f.p_type[0].checked==true){
		if(f.photo_file.value==""){
			alert('팝업 이미지를 선택해 주세요.');
			f.photo_file.focus();
			return false;
		}
//		if(f.p_url.value==""){
//			alert('클릭시 이동주소를 입력해 주세요.');
//			f.p_url.focus();
//			return false;
//		}
//		if(f.p_target[0].checked==false && f.p_target[1].checked==false){
//			alert('클릭시 타겟을 선택해 주세요');
//			f.p_target[0].focus();
//			return false;
//		}
	}
	try{ contents.outputBodyHTML(); } catch(e){ }
}

function popupCheck(fval){
	f = document.frmPopup;
	if(fval=="IMG"){
		f.photo_file.disabled = false;
		f.p_url.disabled = false;
		f.p_target[0].disabled = false;
		f.p_target[1].disabled = false;
	}else{
		f.photo_file.disabled = true;
		f.p_url.disabled = true;
		f.p_target[0].disabled = true;
		f.p_target[1].disabled = true;
	}
}

function templet(gb) {
	if(gb == "1") {
		document.frmPopup.width.value="450";
		document.frmPopup.height.value="580";
		contents.loadContents('<table style="width:450px;height:580px;" background="/backoffice/images/popup_temp1.jpg"><tr><td valign="top" style="padding-left:60px;padding-top:50px">﻿</td></tr></table>');
	}
	if(gb == "2") {
		document.frmPopup.width.value="400";
		document.frmPopup.height.value="480";
		contents.loadContents('<table style="width:400px;height:480px;" background="/backoffice/images/popup_temp2.jpg"><tr><td valign="top" style="padding-left:60px;padding-top:50px"></td></tr></table>');
	}
	if(gb == "3") {
		document.frmPopup.width.value="420";
		document.frmPopup.height.value="500";
		contents.loadContents('<table style="width:420px;height:500px;" background="/backoffice/images/popup_temp3.jpg"><tr><td valign="top" style="padding-left:50px;padding-top:50px"></td></tr></table>');
	}
	if(gb == "4") {
		document.frmPopup.width.value="500";
		document.frmPopup.height.value="500";
		contents.loadContents('<table style="width:500px;height:500px;" background="/backoffice/images/popup_temp4.jpg"><tr><td valign="top" style="padding-left:50px;padding-top:30px"></td></tr></table>');
	}
	if(gb == "5") {
		document.frmPopup.width.value="400";
		document.frmPopup.height.value="500";
		contents.loadContents('<table style="width:400px;height:500px;" background="/backoffice/images/popup_temp5.jpg"><tr><td valign="top" style="padding-left:30px;padding-top:30px"></td></tr></table>');
	}
	if(gb == "6") {
		document.frmPopup.width.value="400";
		document.frmPopup.height.value="480";
		contents.loadContents('<table style="width:400px;height:480px;" background="/backoffice/images/popup_temp6.jpg"><tr><td valign="top" style="padding-left:40px;padding-top:50px"></td></tr></table>');
	}
	if(gb == "7") {
		document.frmPopup.width.value="420";
		document.frmPopup.height.value="480";
		contents.loadContents('<table style="width:420px;height:480px;" background="/backoffice/images/popup_temp7.jpg"><tr><td valign="top" style="padding-left:30px;padding-top:50px"></td></tr></table>');
	}
	if(gb == "8") {
		document.frmPopup.width.value="420";
		document.frmPopup.height.value="480";
		contents.loadContents('<table style="width:420px;height:480px;" background="/backoffice/images/popup_temp8.jpg"><tr><td valign="top" style="padding-left:70px;padding-top:80px"></td></tr></table>');
	}
	if(gb == "9") {
		document.frmPopup.width.value="420";
		document.frmPopup.height.value="480";
		contents.loadContents('<table style="width:420px;height:480px;" background="/backoffice/images/popup_temp9.jpg"><tr><td valign="top" style="padding-left:70px;padding-top:80px"></td></tr></table>');
	}
	if(gb == "10") {
		document.frmPopup.width.value="420";
		document.frmPopup.height.value="470";
		contents.loadContents('<table style="width:420px;height:470px;" background="/backoffice/images/popup_temp10.jpg"><tr><td valign="top" style="padding-left:30px;padding-top:30px"></td></tr></table>');
	}
	document.frmPopup.p_type[1].checked=true;
	popupCheck(HTML);
}
</script>

<form name="frmPopup" method="post" action="popup_evn.php" ENCTYPE="multipart/form-data" onsubmit="return checkform(this);">
<input type="hidden" name="evnMode" value="createPopup">

<div class="mgb5 space-right">
	<a href="popup_list.php"><img src="/backoffice/images/k_list.gif" alt="목록" /></a>
</div>

<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
  	<tr>
	  <th>표시 페이지</th>
	  <td class="space-left">
		<select name="p_lang" id="p_lang">
			<option value="0">국문</option>
			<option value="1">영문</option>
		</select>
	  </td>
	</tr>
	<tr>
	  <th>팝업제목</th>
	  <td class="space-left"><input type="text" name="subject" style="width:99%;" class="input" /></td>
	</tr>
	<tr>
	  <th>시작일</th>
	  <td class="space-left"><input type="text" name="s_date" style="width:100px;" class="input datePicker" /></td>
	</tr>
	<tr>
	  <th>종료일</th>
	  <td class="space-left"><input type="text" name="e_date" style="width:100px;" class="input datePicker" /></td>
	</tr>
	<tr>
	  <th>팝업가로</th>
	  <td class="space-left"><input type="text" name="width" style="width:40px;" class="input" /> px</td>
	</tr>
	<tr>
	  <th>팝업세로</th>
	  <td class="space-left"><input type="text" name="height" style="width:40px;" class="input" /> px</td>
	</tr>
	<tr>
	  <th>팝업위치(Top)</th>
	  <td class="space-left"><input type="text" name="pop_top" style="width:40px;" class="input" value="0" /> px</td>
	</tr>
	<tr>
	  <th>팝업위치(Left)</th>
	  <td class="space-left"><input type="text" name="pop_left" style="width:40px;" class="input" value="0" /> px</td>
	</tr>
	<tr>
		<th>팝업형태</th>
		<td class="space-left">
		  <input type="radio"  id="mode_p" name="p_mode" value="P" ><label for="mode_p">일반팝업</label> &nbsp;&nbsp;
		  <input type="radio"  id="mode_l" name="p_mode" value="L" ><label for="mode_l">레이어팝업</label> &nbsp;&nbsp;
		  <!-- <input type="radio"  id="mode_t" name="p_mode" value="T" ><label for="mode_t">레이어팝업 탬플릿</label> &nbsp;&nbsp; -->
		  <font color=blue>* 레이어팝업을 이용하여 창이아닌 레이어로 공지할 수 있습니다.</font>
		</td>
	</tr>  
	<tr style="display:none;">
		<th>배경이미지 선택</th>
		<td class="space-left">
		  <div class="popup-template">
			<ul>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp1.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t1" name="p_mode_t" value="T1" onclick="templet(1)" /><label for="mode_t1">Type1</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp2.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t2" name="p_mode_t" value="T2" onclick="templet(2)" /><label for="mode_t2">Type2</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp3.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t3" name="p_mode_t" value="T3" onclick="templet(3)" /><label for="mode_t3">Type3</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp4.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t4" name="p_mode_t" value="T4" onclick="templet(4)" /><label for="mode_t4">Type4</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp5.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t5" name="p_mode_t" value="T5" onclick="templet(5)" /><label for="mode_t5">Type5</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp6.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t6" name="p_mode_t" value="T6" onclick="templet(6)" /><label for="mode_t6">Type6</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp7.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t7" name="p_mode_t" value="T7" onclick="templet(7)" /><label for="mode_t7">Type7</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp8.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t8" name="p_mode_t" value="T8" onclick="templet(8)" /><label for="mode_t8">Type8</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp9.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t9" name="p_mode_t" value="T9" onclick="templet(9)" /><label for="mode_t9">Type9</label></li>
				<li><div class="thumb"><img src="/backoffice/images/popup_temp10.jpg" height="130" alt="" /></div> <input type="radio" id="mode_t10" name="p_mode_t" value="T10" onclick="templet(10)" /><label for="mode_t10">Type10</label></li>
			</ul>
		  </div>
		</td>
	</tr>
	<tr>
		<th>팝업타입</th>
		<td class="space-left">
		  <input type="radio"  id="radio1" name="p_type" value="IMG" onclick="popupCheck(this.value);" ><label for="radio1">이미지</label> &nbsp;&nbsp;
		  <input type="radio"  id="radio2" name="p_type" value="HTML" onclick="popupCheck(this.value);"><label for="radio2">HTML</label> &nbsp;&nbsp;
		  <font color=red>* 팝업타입이 이미지 일 경우에만 클릭시 이동주소, 클릭시 타겟이 사용됨</font>
		</td>
	</tr>
	<tr>
	  <th>팝업내용</th>
	  <td class="space-left">
		<textarea id="contents" name="contents"></textarea>
		<?	$CKContent = "contents";	include $_SERVER['DOCUMENT_ROOT'] . "/ckeditor/Editor.php";	?>
	  </td>
	</tr>
	<tr>
	  <th>팝업 이미지</th>
	  <td class="space-left"><input type="file" name="photo_file" style="width:400px;"></td>
	</tr>
	<tr>
	  <th>클릭시 이동주소</th>
	  <td class="space-left"><input type="text" name="p_url" style="width:400px;" class="input" /></td>
	</tr>
	<tr>
		<th>클릭시 타겟</th>
		<td class="space-left">
		<input type="radio"  id="radio3" name="p_target" value="O" checked><label for="radio3">부모창</label> &nbsp;&nbsp;
		<input type="radio"  id="radio4" name="p_target" value="B"><label for="radio4">새창</label>
		</td>
	</tr>
  </tbody>
</table>

<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="팝업등록" style="font-weight:bold" /></span>
		<span class="btn_pack xlarge"><input type="reset" value="등록취소" style="font-weight:bold;color:#888;" /></span>
	</div>
</div>
</form>
	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>