<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/poll/poll.lib.php";
if(!in_array("poll_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["poll_info"], mysql_escape_string($_REQUEST[idx]));

//_DEBUG($arrInfo);

$arrAnswerList = getPollAnswerList($arrInfo["list"][0][idx],"");

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">투표 수정</h2>

<script language="javascript">
function CheckForm(frm){
	if (frm.subject.value==""){
		alert("제목을 입력해 주십시요.");
		frm.subject.focus();
		return false;
	}
	if (frm.sdate.value==""){
		alert("시작일을 입력해 주십시요.");
		frm.sdate.focus();
		return false;
	}
	if (frm.edate.value==""){
		alert("종료일을 입력해 주십시요.");
		frm.edate.focus();
		return false;
	}
}

//투표항목 추가정보 열 추가
var rowcount = 0;
function append() {   
 var tbl = document.getElementById("poll_answer").getElementsByTagName("TBODY")[0];  
 var html1 = "<div class='space-left'><input type='text' name='answer[]' style='width:500px' maxlength='100' class='input' /></div>";  
 var row = document.createElement("tr"); 
 var col1 = document.createElement("td");   
 row.appendChild(col1);  
 col1.innerHTML = html1;  
 tbl.appendChild(row);  
 rowcount++;
}

function remove() {  
	if(rowcount > 0){
		var tbl = document.getElementById("poll_answer").getElementsByTagName("TBODY")[0];  
		if (tbl.hasChildNodes()) {      
			tbl.removeChild(tbl.lastChild);     // 마지막 로우   //tbl.removeChild(tbl.firstChild);  // 첫번째 로우  
		}
		rowcount--;
	}
}
//투표항목 추가정보 열 추가
</script>
<form name="frmInfo" method="post" action="poll_evn.php" ENCTYPE="multipart/form-data" onSubmit="return CheckForm(this)">
<input type="hidden" name="evnMode" value="edit">
<input type="hidden" name="idx" value="<?=$arrInfo["list"][0][idx]?>">

		<!-- 기본정보 -->
		<h3 class="admin-title-middle">기본정보</h3>
		<table class="admin-table-type1">
		  <colgroup>
		  	<col width="140" />
		  	<col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>투표제목</th>
				<td class="space-left"><input type="text" name="subject" style="width:99%" maxlength="200" value="<?=stripslashes($arrInfo["list"][0][subject])?>" class="input" /></td>
			</tr>
			<tr>
				<th>로그인사용</th>
				<td class="space-left">
				<input type="radio" name="use_login" id="loginY" value="Y"<?=$arrInfo["list"][0][use_login]=="Y"?" checked":""?>><label for="loginY">로그인후 투표가능</label> &nbsp;&nbsp;
				<input type="radio" name="use_login" id="loginN" value="N"<?=$arrInfo["list"][0][use_login]=="N"?" checked":""?>><label for="loginN">아무나 투표가능</label>
				</td>
			</tr>
			<tr>
				<th>보이기</th>
				<td class="space-left">
				<input type="radio" name="is_show" id="showY" value="Y"<?=$arrInfo["list"][0][is_show]=="Y"?" checked":""?>><label for="showY">투표보이기</label> &nbsp;&nbsp;
				<input type="radio" name="is_show" id="showN" value="N"<?=$arrInfo["list"][0][is_show]=="N"?" checked":""?>><label for="showN">투표숨김</label>
				</td>
			</tr>
			<tr>
				<th>시작일</th>
				<td class="space-left"><input type="text" name="sdate" readonly onclick="popUpCalendar(this, sdate, 'yyyy-mm-dd')" value='<?=$arrInfo["list"][0][sdate]?>' class="input" /></td>
			</tr>
			<tr>
				<th>종료일</th>
				<td class="space-left"><input type="text" name="edate" readonly onclick="popUpCalendar(this, edate, 'yyyy-mm-dd')" value='<?=$arrInfo["list"][0][edate]?>' class="input" /></td>
			</tr>
			<tr>
				<th>등록일</th>
				<td class="space-left"><?=$arrInfo["list"][0][wdate]?></td>
			</tr>
		  </tbody>
		</table>

		<br />

		<!-- 투표항목 -->

		<h3 class="admin-title-middle">투표항목 &nbsp; <a href="javascript:append();"><img src="/backoffice/images/k_add.gif" alt="추가" align="top" /></a> <a href="javascript:remove();"><img src="/backoffice/images/k_delete.gif" alt="삭제" align="top" /></a></h3>
		<table id="poll_answer" class="admin-table-type1">
		  <tbody>
			<tr>
				<th>답안</th>				
			</tr>
			<?
			for($i=0;$i<$arrAnswerList["total"];$i++){
			?>
			<tr>
				<td class="space-left"><label for="delAnswer<?=$i?>">삭제</label><input type="checkbox" name="del_answer[]" id="delAnswer<?=$i?>" value="<?=$arrAnswerList["list"][$i][idx]?>"> <input type='text' name='answer_list[<?=$arrAnswerList["list"][$i][idx]?>]' style='width:500px' class='input' maxlength='100' value="<?=stripslashes($arrAnswerList["list"][$i][answer])?>"></td></tr>
			<?
			}
			?>
		  </tbody>
		</table>

		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="투표수정" style="font-weight:bold" /></span>
			</div>
		</div>

</form>


	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>