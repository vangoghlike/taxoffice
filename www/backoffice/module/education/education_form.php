<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_GET[mode]=="edit") {
	$dblink = SetConn($_conf_db["main_db"]);

	$arrInfo = getEducationInfo(mysql_escape_string($_REQUEST[idx]));

	//DB해제
	SetDisConn($dblink);

	$mode = "edit";
	$ment = "수 정";
} else {
	$mode = "insert";
	$ment = "등 록";
}
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">모집교육과정 관리</h2>

<script language="javascript">
function checkForm(frm){
	if (frm.e_name.value.length < 2){
		alert("교육명을 입력해 주세요.");
		frm.e_name.focus();
		return false;
	}

	try{ e_contents.outputBodyHTML(); } catch(e){ }
}

function download(boardid,b_idx,idx){
	obj = window.open("/module/online/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"download","width=100,height=100,menubars=0, toolbars=0");
}
</script>

<!-- S 쓰기페이지 -->
<form name="memberForm" method="post" action="education_evn.php" ENCTYPE="multipart/form-data" onsubmit="return checkForm(this)">
<input type="hidden" name="evnMode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$arrInfo["list"][0][idx]?>">

<strong>* 교육개요</strong>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<!-- <tr>
		<th>년도</th>
		<td class="space-left">
			<select name="e_year">
				<? for($i=date("Y")+1; $i>"2013"; $i--) {?>
				<option value="<?=$i?>"<?=$arrInfo["list"][0][e_year]==$i?" selected":""?>><?=$i?></option>
				<?}?>
			</select></td>
	</tr> -->
	<tr>
		<th>교육명</th>
		<td class="space-left"><input type="text" name="e_name" size="80" class="input" value="<?=stripslashes($arrInfo["list"][0][e_name])?>"/></td>
	</tr>
	<tr>
		<th>교육일수</th>
		<td class="space-left"><input type="text" name="e_day" size="20" class="input" value="<?=stripslashes($arrInfo["list"][0][e_day])?>"/></td>
	</tr>
	<!-- <tr>
		<th>교육인원</th>
		<td class="space-left"><input type="text" name="e_member" size="20" class="input" value="<?=stripslashes($arrInfo["list"][0][e_member])?>"/></td>
	</tr> -->
	<tr>
		<th>수강료</th>
		<td class="space-left"><input type="text" name="e_price" size="20" class="input" value="<?=stripslashes($arrInfo["list"][0][e_price])?>"/> (숫자만 입력하세요)</td>
	</tr>
	<tr>
		<th>특이사항</th>
		<td class="space-left"><input type="text" name="e_memo" size="80" class="input" value="<?=stripslashes($arrInfo["list"][0][e_memo])?>"/></td>
	</tr>
</table>
<br><br>
<strong>* 교육내용</strong>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>교육개요</th>
		<td class="space-left"><textarea name="e_object" cols="120" rows="4"><?=stripslashes($arrInfo["list"][0][e_object])?></textarea></td>
	</tr>
	<tr height="100">
		<th>교육내용</th>
		<td class="space-left">
			<? 
			$edit_content = stripslashes($arrInfo["list"][0][e_contents]); 
			$edit_height="200"; 
			$edit_name="e_contents"; 
			include $_SERVER[DOCUMENT_ROOT] . "/webedit/Editor.html";
			?>		
		</td>
	</tr>
	<tr>
		<th>첨부파일</th>
		<td class="space-left">
			<?
			if($arrInfo["total_files"]>0) {
			for($i=0;$i<$arrInfo["total_files"];$i++){?>
			<input type="checkbox" name="filedel[]" value="<?=$arrInfo["files"][$i][idx]?>" id="filedel_<?=$i?>"><label for="filedel_<?=$i?>">삭제</label> : <?=$arrInfo["files"][$i][ori_name]?>
			<?}} else {?>
			<input type="file" name="photo_file[]" size="40">
			<?}?>
		</td>
	</tr>
  </tbody>
</table>
<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value=" <?=$ment?> " style="font-weight:bold" /></span>
	</div>
</div>	

</form>
<!-- E 쓰기페이지 -->

  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>