<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getOnlineInfo(mysql_escape_string($_REQUEST[idx]));

//제품분류 리스트
$arrCategory = getCategoryList(0);//1차카테고리

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">온라인예약 관리</h2>

<script language="javascript">
function checkForm(frm){
	<?if($arrInfo["list"][0][reply_type]=="EMAIL111"):?>
	if (frm.status.value=="Y"){
		cfm = false;
		cfm = confirm("답변메일 내용을 메일로 보내시겠습니까?");
		if(cfm==false){
			return false;
		}
	}
	<?endif;?>
	if (frm.re_contents.value.length < 2){
		alert("내용을 입력해 주세요.");
		frm.re_contents.focus();
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

function download(boardid,b_idx,idx){
	obj = window.open("/module/online/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"download","width=100,height=100,menubars=0, toolbars=0");
}
</script>

<!-- S 쓰기페이지 -->
<form name="memberForm" method="post" action="online_evn.php" onsubmit="return checkForm(this)">
<input type="hidden" name="evnMode" value="edit">
<input type="hidden" name="idx" value="<?=$arrInfo["list"][0][idx]?>">
<input type="hidden" name="rt_url" value="<?=$_REQUEST[listURL]?>">

<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>이름</th>
		<td class="space-left"><?=stripslashes($arrInfo["list"][0][user_name])?></td>
	</tr>
	<tr>
		<th>전화번호</th>
		<td class="space-left"><?=$arrInfo["list"][0][phone]?></td>
	</tr>
	<tr>
		<th>핸드폰</th>
		<td class="space-left"><?=$arrInfo["list"][0][mobile]?></td>
	</tr>
	<tr>
		<th>이메일</th>
		<td class="space-left"><?=stripslashes($arrInfo["list"][0][email])?></td>
	</tr>
	<tr height="100">
		<th>내용</th>
		<td class="space-left"><?=stripslashes(nl2br($arrInfo["list"][0][contents]))?></td>
	</tr>
	<tr>
		<th>파일첨부</th>
		<td class="space-left">
		<?if($arrInfo["total"] >0){?>
		<?	for($i=0;$i<$arrInfo["total"];$i++){	?>
		<a href="javascript:download('online_form','<?=$arrInfo['list'][$i][b_idx]?>','<?=$arrInfo["list"][$i][f_idx]?>');"><?=$arrInfo['list'][$i][ori_name]?>(<?=getByte($arrInfo['list'][$i][size])?>)</a>
		<a href=<?=$arrInfo["list"][$i]['re_name']?><?=$arrInfo['list'][$i][ori_name]?>>
		<br>
		<?	}	?>
		<?}?>
		</td>
	</tr>
	<!-- <tr>
		<th>답변요청방식</th>
		<td class="space-left"><?=$arrInfo["list"][0][reply_type]?></td>
	</tr> -->
	<tr>
		<th>처리상태</th>
		<td class="space-left">
			<select name="status">
			<option value="Y" style="color:blue"<?=$arrInfo["list"][0][status]=="Y"?" selected":""?>>처리완료</option>
			<option value="N" style="color:red"<?=$arrInfo["list"][0][status]=="N"?" selected":""?>>미처리</option>
			</select></td>
	</tr>
	<tr>
		<th>관리자메모</th>
		<td class="space-left"><textarea name="re_contents"  style="width: 95%;" rows="10" class="textarea"><?=stripslashes($arrInfo["list"][0][re_contents])?></textarea></td>
	</tr>
  </tbody>
</table>
<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="수정완료" style="font-weight:bold" /></span>
	</div>
</div>	

</form>
<!-- E 쓰기페이지 -->

  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>