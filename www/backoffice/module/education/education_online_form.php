<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$dblink = SetConn($_conf_db["main_db"]);

$arrList = getEducationList("", "", 0, 0);

if($_GET[mode]=="edit") {

	$arrInfo = getEducationOnlineInfo(mysql_escape_string($_REQUEST[idx]));

	$mode = "editOnline";
	$ment = "수 정";
} else {
	$mode = "insertOnline";
	$ment = "등 록";
}

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">모집교육과정 관리</h2>

<script language="javascript">
function checkForm(frm){
	if (frm.e_idx.value==""){
		alert("교육과정을 선택해 주세요.");
		frm.e_idx.focus();
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

<strong>* 교육신청등록</strong>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>교육과정</th>
		<td class="space-left">
			<select name="e_idx">
				<option value=""> 선 택 </option>
				<?if($arrList['list']['total'] > 0):?>
				<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
				<option value="<?=$arrList["list"][$i][idx]?>"<?=$arrList["list"][$i][idx]==$arrInfo["list"][0][e_idx]?" selected":""?>><?=stripslashes($arrList["list"][$i][e_name])?> <!-- (<?=stripslashes($arrList["list"][$i][e_year])?>) --></option>
				<?}endif;?>
			</select></td>
	</tr>
	<tr>
		<th>교육차수</th>
		<td class="space-left"><input type="text" name="e_num" size="10" class="input" value="<?=$arrInfo["list"][0][e_num]?>"/></td>
	</tr>
	<tr>
		<th>교육장소</th>
		<td class="space-left"><input type="text" name="location" size="80" class="input" value="<?=stripslashes($arrInfo["list"][0][location])?>"/></td>
	</tr>
	<tr>
		<th>모집기간</th>
		<td class="space-left"><input type="text" name="r_s_date" size="10" class="input datePicker" value="<?=$arrInfo["list"][0][r_s_date]?>"/> ~ <input type="text" name="r_e_date" size="10" class="input datePicker" value="<?=$arrInfo["list"][0][r_e_date]?>"/></td>
	</tr>
	<tr>
		<th>교육기간</th>
		<td class="space-left"><input type="text" name="e_s_date" size="10" class="input datePicker" value="<?=$arrInfo["list"][0][e_s_date]?>"/> ~ <input type="text" name="e_e_date" size="10" class="input datePicker" value="<?=$arrInfo["list"][0][e_e_date]?>"/></td>
	</tr>
	<?
	$arrTime1 = explode(":", $arrInfo["list"][0][e_s_time]);
	$arrTime2 = explode(":", $arrInfo["list"][0][e_e_time]);
	?>
	<tr>
		<th>교육시간</th>
		<td class="space-left">
			<select name="s_time">
				<? for($i=7; $i<23; $i++) {
					if($i<10) $i = "0".$i;
				?>
				<option value="<?=$i?>"<?=$i==$arrTime1[0]?" selected":""?>><?=$i?></option>
				<? } ?>
			</select> : 
			<select name="s_min">
				<option value="00"<?=$arrTime1[1]=="00"?" selected":""?>>00</option>
				<option value="10"<?=$arrTime1[1]=="10"?" selected":""?>>10</option>
				<option value="20"<?=$arrTime1[1]=="20"?" selected":""?>>20</option>
				<option value="30"<?=$arrTime1[1]=="30"?" selected":""?>>30</option>
				<option value="40"<?=$arrTime1[1]=="40"?" selected":""?>>40</option>
				<option value="50"<?=$arrTime1[1]=="50"?" selected":""?>>50</option>
			</select>
			~ 
			<select name="e_time">
			<? for($i=7; $i<24; $i++) {
					if($i<10) $i = "0".$i;
				?>
				<option value="<?=$i?>"<?=$i==$arrTime2[0]?" selected":""?>><?=$i?></option>
				<? } ?>
			</select> : 
			<select name="e_min">
				<option value="00"<?=$arrTime2[1]=="00"?" selected":""?>>00</option>
				<option value="10"<?=$arrTime2[1]=="10"?" selected":""?>>10</option>
				<option value="20"<?=$arrTime2[1]=="20"?" selected":""?>>20</option>
				<option value="30"<?=$arrTime2[1]=="30"?" selected":""?>>30</option>
				<option value="40"<?=$arrTime2[1]=="40"?" selected":""?>>40</option>
				<option value="50"<?=$arrTime2[1]=="50"?" selected":""?>>50</option>
			</select></td>
	</tr>
	<tr>
		<th>총교육시간</th>
		<td class="space-left"><input type="text" name="e_all_time" size="10" class="input" value="<?=$arrInfo["list"][0][e_all_time]?>"/></td>
	</tr>
	<tr>
		<th>교육인원</th>
		<td class="space-left"><input type="text" name="person" size="20" class="input" value="<?=stripslashes($arrInfo["list"][0][person])?>"/></td>
	</tr>
	<tr>
		<th>상태설정</th>
		<td class="space-left">
			<input type="radio" name="status" value="S"<?=$arrInfo["list"][0][status]=="S"?" checked":""?>>모집대기
			<input type="radio" name="status" value="I"<?=$arrInfo["list"][0][status]=="I"?" checked":""?>>모집중
			<input type="radio" name="status" value="E"<?=$arrInfo["list"][0][status]=="E"?" checked":""?>>모집마감
			<input type="radio" name="status" value="A"<?=$arrInfo["list"][0][status]=="A"?" checked":""?>>교육중
			<input type="radio" name="status" value="B"<?=$arrInfo["list"][0][status]=="B"?" checked":""?>>교육마감
		</td>
	</tr>
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