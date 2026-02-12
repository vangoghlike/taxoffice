<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/mail/send.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/common/fckeditor/fckeditor.php";
if(!in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["send"], $_REQUEST[idx]);
//_DEBUG($arrInfo);

//DB해제
SetDisConn($dblink);
?>
<div id="container">
	<? include "menu.php"; ?>
    <div id="content">
	<h3 class="subTitle">메일 관리</h3>

<script language="javascript">
function checkform(f){
	if(f.subject.value==""){
		alert("메일 제목을 입력하세요.");
		f.subject.focus();
		return false;
	}
	alert("회원이 많을경우 시간이 조금 걸릴 수 있으니 잠시만 기다려 주세요.");
}

</script>

<form name="frmSend" method="post" action="send_evn.php" ENCTYPE="multipart/form-data" onsubmit="return checkform(this);">
<input type="hidden" name="evnMode" value="createSend">

<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25">
  <td width="50%"><b><font color="red">등록</font></b></td>
  <td width="50%" align="right"><b><font color="red"><a href="send_list.php">목록으로 돌아가기</a></font></b></td>
</tr>
<tr height="25">
  <td width="100%">메일제목과 내용중에 {NAME} 입력시 회원이름으로 변경되어 발송됩니다.</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td colspan="2" height="1" bgcolor="#CCCCCC"></td></tr>
<tr height="25">
  <td align="right" bgcolor="#000000"><font color=white><b>메일제목</b></font></td>
  <td>&nbsp;<input type="text" name="subject" style="width:400px;"><input type="checkbox" name="chk" value="Y" checked>메일수신신동의 회원만</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#CCCCCC"></td></tr>
<tr height="25">
  <td align="right" bgcolor="#000000"><font color=white><b>메일내용</b></font></td>
  <td>&nbsp;
	<?php
	$oFCKeditor = new FCKeditor('contents') ;
	$oFCKeditor->BasePath = '/common/fckeditor/' ;
	$oFCKeditor->Height = '500' ;
	$oFCKeditor->ToolbarSet = 'Mini';
	$oFCKeditor->Config['EnterMode'] = 'br';
	$oFCKeditor->Config['SkinPath'] = $oFCKeditor->BasePath . 'editor/skins/silver/' ;
	$oFCKeditor->Value = stripslashes($arrInfo["list"][0]["contents"]) ;
	$oFCKeditor->Create() ;
	?>
  </td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#CCCCCC"></td></tr>
</table>
<p align="center">
<input type="submit" value="메일발송등록" style="width:100px;height:50px;color:blue;font-weight:bold"> <input type="reset" value="등록취소" style="width:100px;height:50px;color:red;font-weight:bold">
</p>
</form>
</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>