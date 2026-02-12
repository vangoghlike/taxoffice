<?if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER[PHP_SELF]=="/backoffice/module/board/board_view.php"){
###################################################### 관리자 페이지 ######################################################?>
<?if($_GET[mode]=="write"){$inputText="글쓰기";}else{$inputText="수정";}?>
<script language="javascript">
function frmCheck(frm){
	if(frm.subject.value.length < 1){
		alert('제목을 입력해 주세요.');
		frm.subject.focus();
		return ;
	}
	
	try{ contents.outputBodyHTML(); } catch(e){ }

	frm.submit();

}
$(document).ready(function() {
	$.each($('input.calendar'), function() {
		set_datepicker($(this));
	});	
});
function set_datepicker($cont) {
	$cont.prop('readonly', true).datepicker({
		closeText: '닫기',
		prevText: '',
		nextText: '',
		currentText: '오늘',
		monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd',
		defaultDate: '+1w',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '년 ',
		changeMonth: true,
		changeYear: true,
		yearRange: '1921:c+5'
	});
}

//첨부파일 열 추가
var rowcount = 0;
function append() {   
	var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
	var html1 = "<input name='upfiles[]' type='file' style='width: 400px;'>";  
	var row = document.createElement("tr"); 
	var col1 = document.createElement("td");   
	row.appendChild(col1);  
	col1.innerHTML = html1;  
	tbl.appendChild(row);  
	rowcount++;
}
var filecount = 0;
function appendfile(){
	filecount++;
	$("#filetd"+filecount).css("display","");	
}
function removefile(){
	$("#filetd"+filecount).css("display","none");	
	if(filecount>0){
		filecount--;
	}
}
function remove() {  
	if(rowcount > 0){
		var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
		if (tbl.hasChildNodes()) {      
			tbl.removeChild(tbl.lastChild);     // 마지막 로우   //tbl.removeChild(tbl.firstChild);  // 첫번째 로우  
		}
		rowcount--;
	}
}
//첨부파일 열 추가
</script>
	
<div id="admin-content">
	<h2 class="admin-title"><?=$arrBoardInfo["list"][0]["boardname"]?> <?=$inputText?></h2>
	<form name="form1" method="post" action="/module/board/board_evn.php" ENCTYPE="multipart/form-data">
	<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
	<input type="hidden" name="returnURL" value="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET[category]?>">
	<input type="hidden" name="idx" value="<?=$arrBoardArticle["list"][0]["idx"]?>">
	<input type="hidden" name="category" value="<?=$arrBoardArticle["list"][0]["category"]?$arrBoardArticle["list"][0]["category"]:$_GET[category]?>">
	<input type="hidden" name="usehtml" value="Y">
	<?if($_REQUEST[mode]=="reply"):?>
	<input type="hidden" name="evnMode" value="reply">
	<?elseif($_REQUEST[mode]=="modify"):?>
	<input type="hidden" name="evnMode" value="modify">
	<?else:?>
	<input type="hidden" name="evnMode" value="write">
	<?endif;?>

	<table class="writeTable">
		<colgroup><col width="120px" /><col width="*" /><col width="120px" /><col width="*" /></colgroup>
		<tbody>
			<tr>
			<th class="nec">제목</th>
			<td colspan="3">
				<input type="text" class="txt req" style="width:70%" name="subject" id="subject" value="<?=stripslashes($arrBoardArticle["list"][0][subject])?>" maxlength="250" title="제목을 입력해주세요." />
				<div class="subject_notice"></div>
			</td>
		</tr>
		<tr>
			<th>작성자명</th>
			<td colspan="3"><input type="text" class="txt req" style="width:150px" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>" maxlength="10" title="작성자명을 입력해주세요."  /></td>
		</tr>
		<!-- <tr>
			<th class="nec">YouTube</th>
			<td colspan="3">
				<input type="text" class="txt" name="etc_1" value="<?=stripslashes($arrBoardArticle["list"][0][etc_1])?>" maxlength="100" title="키워드를 입력해주세요." style="width:70%" />
			</td>
		</tr> -->
		<!-- <tr>
			<th class="nec">날짜</th>
			<td colspan="3">
				<input type="text" name="schedule_date" class="txt calendar" value="<?=stripslashes($arrBoardArticle["list"][0][schedule_date])?>" /> 
			</td>
		</tr> -->
		<tr>
			<th class="nec">내용</th>
			<td colspan="3">
				<textarea id="contents" name="contents"><?=stripslashes($arrBoardArticle["list"][0][contents])?></textarea>
				<?
				$CKContent = "contents";
				include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
				?>
			</td>
		</tr>
		<?
		for($i=0;$i<$arrBoardArticle["total_files"];$i++){
			if(substr($arrBoardArticle["files"][$i][re_name],0,2) == "l_") {
				$listimg = "Y";
				$num = $i;
			}
		}
		?>
		<tr>
			<th>리스트 이미지</th>
			<td colspan="3">
				<? if($listimg == "Y") {?>
				<input type="checkbox" name="filedel[]" value="<?=$arrBoardArticle["files"][$num][idx]?>" id="filedel_99"><label for="filedel_99">삭제</label> : <?=$arrBoardArticle["files"][$num][ori_name]?>
				<?}else{?>
				<input name="upfiles[]" type="file" class="type01"  style="width: 400px;"><input type="hidden" name="memo_name[]" value="l"> <!--최적사이즈: 230px * 144px -->
				<?}?>
			</td>
		</tr>

		<tr>
			<th>첨부파일</th>
			<td colspan="3">
				<table id="files_table" border="0" cellpadding="0" cellspacing="0" width="500" style="padding:10px;border: 0px solid #aaa;">
					<tbody>
						<tr height="25">
							<td align='left' width='100%' style="border: 0px solid #aaa;">
								<input name="upfiles[]" type="file" class="type01"  style="width: 400px;">
								<!--
								<a href="javascript:appendfile();"><img src="/common/images/btnPlus3.png" alt="파일추가" style="width:20px;"></a>
								<a href="javascript:removefile();"><img src="/common/images/btnMin3.png" alt="파일삭제" style="width:20px;"></a>
								-->
							</td>
						</tr>
						<?for($i=1;$i<6;$i++){?>
						<tr>
							<td align='left' width='100%' id="filetd<?=$i?>" style="display:none;">
							<input name="upfiles[]" type="file" class="type01"  style="width: 400px;">
							</td>
						</tr>
						<?}?>
					</tbody>
				</table>
				<?
				if($arrBoardArticle["total_files"]>0 && $_REQUEST[mode]=="modify"){
				?>
				<table id="files_list" border="0" cellpadding="3" cellspacing="1" width="100%" style="padding:1%">
					<tbody>
					<?
					for($i=0;$i<$arrBoardArticle["total_files"];$i++){
						if(substr($arrBoardArticle["files"][$i][re_name],0,2) != "l_") {
					?>
						<tr> 
							<td style="text-align:left;"><input type="checkbox" name="filedel[]" value="<?=$arrBoardArticle["files"][$i][idx]?>" id="filedel_<?=$i?>"><label for="filedel_<?=$i?>">삭제</label> : <?=$arrBoardArticle["files"][$i][ori_name]?></td>
						</tr>

						
					<?
						}
					}?>
					</tbody>
				</table>
				<?}?>
			</td>
		</tr>
		</tbody>
	</table>

	</form>
	<p class="btn_l">
		<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET[category]?>" class="btn_box black act_list">목록보기</a>
	</p>
	<p class="btn_r">
		<a href="javascript:void(0);" onclick="frmCheck(document.form1);" class="btn_box act_save">저장</a>
		<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET[category]?>" class="btn_box black act_back">취소</a>
	</p>
</div>
<?}else{###################################################### 사용자 페이지 ######################################################?>
<?
//관리자만 글쓰기 기능 체크
if($arrBoardInfo["list"][0]["useadminonly"] !="Y" || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]):
	if($_REQUEST[mode]=="reply" && $arrBoardInfo["list"][0]["usereply"] !="Y"):
		jsMsg("답글쓰기가 제한된 게시판 입니다.");
		jsHistory("-1");
		exit;
	endif;
?>
<!-- 글쓰기페이지 START -->
<script language="javascript">
function frmCheck(frm){
	if(frm.name.value.length < 1){
		alert('이름을 입력해 주세요.');
		frm.name.focus();
		return ;
	}

	if(frm.subject.value.length < 1){
		alert('제목을 입력해 주세요.');
		frm.subject.focus();
		return ;
	}

	
	try{ contents.outputBodyHTML(); } catch(e){ }

	frm.submit();

}


//첨부파일 열 추가
var rowcount = 0;
function append() {   
	if(rowcount < 2){
		var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
		var html1 = "<input name='upfiles[]' type='file' style='width: 400px;'>";  
		var row = document.createElement("tr"); 
		var col1 = document.createElement("td");   
		row.appendChild(col1);  
		col1.innerHTML = html1;  
		tbl.appendChild(row);  
		rowcount++;
	}else{
		alert("파일은 최대 3개 까지 등록 가능합니다.");
	}
}

function appendfile(){
	$("#filetd").html("<input name='upfiles[]' type='file' style='width: 400px;'>");	
}

function remove() {  
	if(rowcount > 0){
		var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
		if (tbl.hasChildNodes()) {      
			tbl.removeChild(tbl.lastChild);     // 마지막 로우   //tbl.removeChild(tbl.firstChild);  // 첫번째 로우  
		}
		rowcount--;
	}
}
//첨부파일 열 추가
</script>
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

<div class="notice container">
	<h2 class="pageTitle">입력 & 수정</h2>
	<!--Write   ST-->
	<form id="frm_write" name="frm_write" method="post" action="/module/board/board_evn.php" enctype="multipart/form-data">
		<?if($_REQUEST[mode]=="reply"):?>
		<input type="hidden" name="evnMode" value="reply">
		<?elseif($_REQUEST[mode]=="modify"):?>
		<input type="hidden" name="evnMode" value="modify">
		<?else:?>
		<input type="hidden" name="evnMode" value="write">
		<?endif;?>

		<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
		<input type="hidden" name="returnURL" value="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list">
		<input type="hidden" name="idx" value="<?=$arrBoardArticle["list"][0]["idx"]?>">
		<input type="hidden" name="category" value="<?=$arrBoardArticle["list"][0]["category"]?$arrBoardArticle["list"][0]["category"]:$_GET[category]?>">
		<? if($arrBoardInfo["list"][0]["boardid"]=="qna" && ($_GET[category]||$arrBoardArticle["list"][0]["category"])) {?>
		<input type="hidden" name="usehtml" value="N">
		<?}else{?>
		<input type="hidden" name="usehtml" value="Y">
		<?}?>
		<div class="tblType03 " style="margin-bottom:10px;">
			<table>
				<tbody>
					<tr>
						<th>제목</th>
						<td colspan="3">
							<input type="text" class="ipTxt01 req ip_sbj" name="subject" id="subject" value="<?=stripslashes($arrBoardArticle["list"][0][subject])?>" placeholder="제목을 입력하세요.">	
							<label class="lb_sbj"><input type="checkbox" name="is_notice" value="Y" title="상단공지 여부를 선택해주세요."> 상단공지</label>
						</td>
					</tr>
					<tr>
						<th>작성자</th>
						<td colspan="3"><input type="text" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>"></td>
					</tr>
					<tr>
						<th>내용</th>
						<td colspan="3">
							<? if($arrBoardInfo["list"][0]["boardid"]=="qna" && ($_GET[category]||$arrBoardArticle["list"][0]["category"])) {?>
								<textarea name="contents1" cols="30" rows="10" style="height:200px;" title="내용"><?
								if($_REQUEST[mode]=="reply"):
								echo "\n\n======================\n>>" . $arrBoardArticle["list"][0][name] . "님 글" . stripslashes($arrBoardArticle["list"][0][contents]) ;
								else:
								echo stripslashes($arrBoardArticle["list"][0][contents]) ;
								endif;
								?></textarea>
							<?}else{?>						
								<? if($_REQUEST[mode]=="reply"):?>
								<? $edit_content = "<p>&nbsp;</p>======================<br>>>".$arrBoardArticle["list"][0][name]."님 글<br><br>".stripslashes($arrBoardArticle["list"][0][contents]); ?>
								<?else:?>
								<? $edit_content = stripslashes($arrBoardArticle["list"][0][contents]); ?>
								<?endif;?>
								<textarea id="contents" name="contents"><?=$edit_content?></textarea>
								<?
								$CKContent = "contents";
								include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
								?>
							<?}?>
						</td>
					</tr>
					<?
					for($i=0;$i<$arrBoardArticle["total_files"];$i++){
						if(substr($arrBoardArticle["files"][$i][re_name],0,2) == "l_") {
							$listimg = "Y";
							$num = $i;
						}
					}
					?>
					<tr>
						<th>리스트 표시 이미지</th>
						<td colspan="3">
							<? if($listimg == "Y") {?>
							<input type="checkbox" name="filedel[]" value="<?=$arrBoardArticle["files"][$num][idx]?>" id="filedel_99"><label for="filedel_99">삭제</label> : <?=$arrBoardArticle["files"][$num][ori_name]?>
							<?}else{?>
							<input name="upfiles[]" type="file" class="type01"  style="width: 400px;"><input type="hidden" name="memo_name[]" value="l"> <!--최적사이즈: 230px * 144px -->
							<?}?>
						</td>
					</tr>
					<tr>
						<th>첨부파일</th>
						<td colspan="3">
							<table id="files_table" border="0" cellpadding="3" cellspacing="1" width="100%" style="padding:1%;border-top:none;">
								<tbody>
									<tr height="25">
										<td align='left' width='100%' style="border-bottom:none;">
											<input name="upfiles[]" type="file" class="type01"  style="width: 400px;">
											<a class="addfile" href="javascript:append();">추가</a>
											<a class="delfile" href="javascript:remove();">삭제</a>
										</td>
									</tr>
								</tbody>
							</table>
							<?
							if($arrBoardArticle["total_files"]>0 && $_REQUEST[mode]=="modify"){
							?>
							<table id="files_list" border="0" cellpadding="3" cellspacing="1" width="100%" style="padding:1%">
								<tbody>
									<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
										<tr> 
											<td>
												<select name="filedel[]">	
													<option value=""><?=$arrBoardArticle["files"][$i][ori_name]?></option>											
													<option value="<?=$arrBoardArticle["files"][$i][idx]?>">파일삭제</option>
												</select>
											</td>
										</tr>
									<?}?>
								</tbody>
							</table>
							<?}?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<div class="btnBbs bbNone ">
		<div class="left">
			<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list">목록</a>
		</div>
		<div class="right">
			<a href="javascript:frmCheck(document.frm_write);" class="act_save">저장</a>
			<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list" class="act_back">취소</a>
		</div>
	</div>
</div>
<?
else:
jsMsg("관리자만 등록/수정/삭제 할 수 있는 게시판 입니다.");
jsHistory("-1");
endif;
?>
<?}?>