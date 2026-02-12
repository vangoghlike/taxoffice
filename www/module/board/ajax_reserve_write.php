<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
?>
<script type="text/javascript">
<!--
function frmCheck(frm){	
	if(frm.subject.value.length < 1){
		alert('지도교수를 입력해 주세요.');
		frm.subject.focus();
		return ;
	}
	if(frm.etc_3.value.length < 1){
		alert('인원을 입력해 주세요.');
		frm.etc_3.focus();
		return ;
	}
	if(frm.contents.value.length < 1){
		alert('내용을 입력해 주세요.');
		frm.contents.focus();
		return ;
	}

	
	try{ contents.outputBodyHTML(); } catch(e){ }

	frm.submit();

}	
//-->
</script>
<form name="form1" method="post" action="/module/board/board_evn.php" ENCTYPE="multipart/form-data"  class="adminForm">
	<input type="hidden" name="evnMode" value="write">
	<input type="hidden" name="boardid" value="<?=$_REQUEST["boardid"]?>">
	<input type="hidden" name="returnURL" value="/service/reservation.php?boardid=<?=$_REQUEST["boardid"]?>&mode=mlist&category=<?=$_REQUEST["category"]?>">
	<input type="hidden" name="schedule_date" value="<?=$_REQUEST["g_idx"]?>">
	<input type="hidden" name="category" value="<?=$_REQUEST["category"]?>">
	<input type="hidden" name="usehtml" value="Y">
	<input type="hidden" name="r_user_id" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]?>">
	<input type="hidden" name="name" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?>">
	<input type="hidden" name="homepage" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["TEL"]?>">
	<table class="commonTable text-left">		
		<colgroup>
			<col style="width:180px">
			<col style="width:251px">
			<col style="width:180px">
			<col style="width:*">
		</colgroup>
		<tbody>
			<tr>
				<th>이름</th>
				<td><?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?></td>
				<th>연락처</th>
				<td><?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["TEL"]?></td>
			</tr>
			<tr>
				<th>지도교수</th>
				<td><input type="text" name="subject" style="width:150px"></td>
				<th>인원</th>
				<td><input type="text" name="etc_3" style="width:63px">명</td>
			</tr>
			<tr>
				<th>시간(S)</th>
				<td>
					<select name="time_sh">
					<?
					for($i=6;$i<23;$i++){
						if(strlen($i)==1){$sh="0".$i;}else{$sh=$i;}
						if(substr($arrBoardArticle["list"][0][etc_1],0,2)==$sh){$optionSelect="selected";}else{$optionSelect="";}
						echo "<option value=\"".$sh."\" ".$optionSelect.">".$sh."</option>";
					}
					?>
					</select> :
					<select name="time_sm">
					<?
					for($i=0;$i<2;$i++){
						if($i==0){$sm="00";}else{$sm=$i*30;}
						if(substr($arrBoardArticle["list"][0][etc_1],2,2)==$sm){$optionSelect="selected";}else{$optionSelect="";}
						echo "<option value=\"".$sm."\" ".$optionSelect.">".$sm."</option>";
					}
					?>
					</select>					
				</td>
				<th>시간(E)</th>
				<td>
					<select name="time_eh">
					<?
					for($i=7;$i<24;$i++){
						if(strlen($i)==1){$eh="0".$i;}else{$eh=$i;}
						if(substr($arrBoardArticle["list"][0][etc_2],0,2)==$eh){$optionSelect="selected";}else{$optionSelect="";}
						echo "<option value=\"".$eh."\" ".$optionSelect.">".$eh."</option>";
					}
					?>
					</select> :
					<select name="time_em">
					<?
					for($i=0;$i<2;$i++){
						if($i==0){$em="00";}else{$em=$i*30;}
						if(substr($arrBoardArticle["list"][0][etc_2],2,2)==$em){$optionSelect="selected";}else{$optionSelect="";}
						echo "<option value=\"".$em."\" ".$optionSelect.">".$em."</option>";
					}
					?>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="deatilInfo text-left">
		<textarea name="contents" rows="8" cols="80"></textarea>
		<div class="text-center">
			<button class="redBtn" type="button" name="button" onclick="frmCheck(document.form1);">예약하기</button>
		</div>
	</div>
</form>