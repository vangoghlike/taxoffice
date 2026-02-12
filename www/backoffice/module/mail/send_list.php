<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/mail/send.lib.php";
if(!in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getArticleList($_conf_tbl["send"], $scale, $_REQUEST[offset], "");
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="container">
	<? include "menu.php"; ?>
    <div id="content">
	<h3 class="subTitle">메일 관리</h3>

<script language="javascript">
function delSend(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 메일발송를 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmSendHidden.idx.value = idx;
		document.frmSendHidden.submit();
	}
}

function sendMailPopup(idx){
	obj = window.open("send_email.php?idx="+idx,"sendMailWin","width=400,height=300,toolbars=0,menubars=0,scrollbars=0");
}

</script>
<table border="0" width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <td><b>전체 : <?=number_format($arrList['total'])?> 개</b></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25" align="center" bgcolor="#646464">
  <td width="5%"><font color="#ffffff">No.</font></td>
  <td width="35%"><font color="#ffffff">메일제목</font></td>
  <td width="5%"><font color="#ffffff">상태</font></td>
  <td width="5%"><font color="#ffffff">발송</font></td>
  <td width="10%"><font color="#ffffff">입력일</font></td>
  <td width="10%"><font color="#ffffff">발송시작</font></td>
  <td width="10%"><font color="#ffffff">발송종료</font></td>
  <td width="10%"><font color="#ffffff">발송/전체</font></td>
  <td width="10%"><font color="#ffffff">관리</font></td>
</tr>
<?if($arrList['list']['total'] > 0):?>

<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
<tr height="25" align="center">
  <td><?=$arrList['total']-$offset-$i?></td>
  <td align="left"><a href="send_view.php?idx=<?=$arrList['list'][$i]['idx']?>"><?=stripslashes($arrList['list'][$i]['subject'])?></a></td>
  <td><?=$arrList['list'][$i]['status']?></td>
  <td>  <?if($arrList['list'][$i]['status'] !="FINISH"):?><input type="button" value="발송" onclick="sendMailPopup('<?=$arrList['list'][$i]['idx']?>')"><?else:?>완료<?endif;?></td>
  <td><?=$arrList['list'][$i]['w_date']?></td>
  <td><?=$arrList['list'][$i]['s_date']?></td>
  <td><?=$arrList['list'][$i]['e_date']?></td>
  <td><?=number_format($arrList['list'][$i]['send_total'])?> / <?=number_format($arrList['list'][$i]['total'])?></td>
  <td class="b02"><a href="send_info.php?idx=<?=$arrList['list'][$i]['idx']?>">수정</a> | <a href="javascript:delSend('<?=$arrList['list'][$i]['idx']?>');">삭제</a></td>
</tr>
<tr>
  <td colspan="10" height="1" bgcolor="646464"></td>
</tr>
<?}?>

<?else:?>
<tr height="100" align="center">
  <td width="100%" colspan="9" >메일발송 목록이 없습니다.</td>
</tr>
<tr>
  <td colspan="10" height="1" bgcolor="646464"></td>
</tr>
<?endif;?>
</table>

<br />
<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25" align="center">
  <td><?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?></td>
</tr>
</table>

<form name="frmSendHidden" method="post" action="send_evn.php">
<input type="hidden" name="evnMode" value="deleteSend">
<input type="hidden" name="idx">
</form>
	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>