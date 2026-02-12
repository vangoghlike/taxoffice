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
		<tr>
			<th class="nec">YouTube</th>
			<td colspan="3">
				<input type="text" class="txt" name="etc_1" value="<?=stripslashes($arrBoardArticle["list"][0][etc_1])?>" maxlength="100" title="키워드를 입력해주세요." style="width:70%" />
			</td>
		</tr>
		<tr>
			<th class="nec">날짜</th>
			<td colspan="3">
				<input type="text" name="schedule_date" class="txt calendar" value="<?=stripslashes($arrBoardArticle["list"][0][schedule_date])?>" /> 
			</td>
		</tr>
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
							<td align='left' width='100%' style="border: 0px solid #aaa;text-align:left;">
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
	$policy_info = getArticleList("tbl_policy", 0, 0, " where policy_name = 'policy3' ");
?>
<!-- 글쓰기페이지 START -->
<script language="javascript">



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

function reloadCode(){
	var rand = Math.random();
	document.getElementById('siimage').src = '/_securimage/securimage_show.php?sid=' + rand;
	document.getElementById('siaudio').src = '/_securimage/securimage_play.php?sid=' + rand;
	return false
}

function playAudio(){
	const siAudio = document.getElementById("siaudio");
	siAudio.play(); 
}

//첨부파일 열 추가
</script>
<script src="/backoffice/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/datePicker/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/datePicker/jquery-ui.css" />
<script>
function frmCheck(frm){
	if(frm.subject.value.length < 1){
		alert('제목을 입력해 주세요.');
		frm.subject.focus();
		return ;
	}

	if(frm.name.value.length < 1){
		alert('이름을 입력해 주세요.');
		frm.name.focus();
		return ;
	}

	if(frm.str_email01.value.length < 1){
		alert('이메일을 입력해 주세요.');
		frm.str_email01.focus();
		return ;
	}

	if(frm.str_email02.value.length < 1){
		alert('이메일을 입력해 주세요.');
		frm.str_email02.focus();
		return ;
	}

	if(!document.getElementById("personalAgree").checked){
		alert('개인정보 이용 수집 동의를 해주세요.');
		return ;
	}

	frm.str_email02.disabled = false;
	try{ contents.outputBodyHTML(); } catch(e){ }

	frm.submit();

}
</script>

<form id="frm_write" name="frm_write" method="post" action="/module/board/board_evn.php" ENCTYPE="multipart/form-data">
    <input type="hidden" name="evnMode" value="write">
    <input type="hidden" name="category" value="<?=$arrCatInfo["list"][0]["cat_name"]?>">
	<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
	<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
    <div class="tblType03" style="margin-bottom: 10px;">
        <table>
            <tbody>
                <tr>
                    <th>제목</th>
                    <td colspan="3">
                        <input type="text" class="ipTxt01 req ip_sbj" name="subject" value="" maxlength="100" title="제목을 입력해주세요.">
                    </td>
                </tr>
                <tr class="mb_col_tf mb_col_wr">
                    <th>작성자</th>
                    <td class="mb_col_wr_td" colspan="1">
                        <input type="text" class="ipTxt02 req" name="name" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?>" maxlength="100" title="작성자명을 입력해주세요.">
                    </td>
                    <th class="mb_col_move">이메일</th>
                    <td class="mb_col_move" colspan="1">
                        <div class="for-mailform" data-name="email" data-class="ipTxt02 req,ipTxt02 req,sel01" data-attr="" style="display: none;"></div><input type="text" class="femail ipTxt02 req" id="str_email01" name="str_email01" value="" maxlength="100" title="이메일주소를 입력해주세요.">&nbsp;@&nbsp;<input type="text" class="femail ipTxt02 req" id="str_email02" name="str_email02" value="" maxlength="100" title="이메일주소를 입력해주세요.">&nbsp;<select class="femail sel01" name="email_select_domain" id="selectEmail" title="이메일주소를 입력해주세요.">
                            <option value="">직접입력</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="naver.com">naver.com</option>
                            <option value="paran.com">paran.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                        </select>
                    </td>
                </tr>
                <tr class="mb_col_st mb_col_em">
                </tr>
                <tr>
                    <th class="th_cont">
                        <label class="lb_cont">
                            내용
                        </label>
                    </th>
                    <td colspan="4" class="td_cont">
                        <textarea id="contents" name="contents" title="내용을 입력해주세요." class="req"></textarea>
                    </td>
                </tr>
				<tr>
					<th>첨부파일</th>
					<td colspan="3">
						<table id="files_table" border="0" cellpadding="3" cellspacing="1" width="100%" style="padding:1%">
							<tbody>
								<tr height="25">
									<td align='left' width='100%'>
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
        <!-- 자동방지 -->
		<? $sid = md5(time()); // 같은 값을 주기 위함?>
        <div class="automatic_wrap clearfix">
            <div class="automatic_img_wrap">
                <div>
                   <img id="siimage"  style="height:144;width:42" src="/_securimage/securimage_show.php?sid=<?=$sid?>" alt="">
                </div>
                <div class="btn_area">
                    <a tabindex="-1" style="display:inline-block;margin-bottom:5px;cursor:pointer;" title="Refresh Image" onclick="reloadCode()">
						<img height="35" width="126" src="/pub/images/btn_automatic_reset.png" alt="Refresh Image"  style="border: 0px; vertical-align: bottom">
                    </a>
                    <div id="captcha_image_audio_div" style="display:block;max-height:37px;overflow:hidden;">
                        <audio id="siaudio" src="/_securimage/securimage_play.php?sid=<?=$sid?>" style="display:hidden"></audio>
                    </div>
                    <div id="captcha_image_audio_controls">
                        <a tabindex="-1" class="captcha_play_button" href="/common/securimage/securimage_play.php?id=278" onclick="return false">
                            <img class="captcha_play_image" height="35" width="126" src="/pub/images/btn_automatic_voice.png" alt="Play CAPTCHA Audio" onclick="playAudio()" style="border: 0px">
                            <img class="captcha_loading_image rotating" height="32" width="32" src="/common/securimage/images/loading.png" alt="Loading audio" style="display: none">
                        </a>
                        <noscript>Enable Javascript for audio controls</noscript>
                    </div>
                </div>
            </div>
            <div class="automatic_input_wrap">
                <div>
                    <p>자동입력 방지 숫자를 입력하여 주세요.</p>
                    <input type="text" name="code" maxlength="6" title="자동입력 방지 숫자를 입력하여 주세요." class="ipTxt02 req">
                </div>
            </div>
        </div>
        <!-- //자동방지 -->
        <div class="personalWrap">
            <div class="top">
                <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
            </div>
            <div class="textScroll">
                <?=nl2br($policy_info["list"][0]["policy_contents"])?>
			</div>
            <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의"> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
        </div>
		<div class="btnBbs bbNone ">
			<div class="right qna_dep_btn">
				<a href="javascript:frmCheck(document.frm_write);" class="act_save">전송</a>
				<a href="javascript:history.back();" class="act_back">취소</a>
			</div>
		</div>
    </div>
</form>

<script>
$('#selectEmail').change(function(){
	$("#selectEmail option:selected").each(function () {
		if($(this).val()== '1'){ //직접입력일 경우
			$("#str_email02").val(''); //값 초기화
			$("#str_email02").attr("disabled",false); //활성화
		}else{ //직접입력이 아닐경우
			$("#str_email02").val($(this).text()); //선택값 입력
			$("#str_email02").attr("disabled",true); //비활성화
		}
	});
});
</script>
<?
else:
jsMsg("관리자만 등록/수정/삭제 할 수 있는 게시판 입니다.");
jsHistory("-1");
endif;
?>
<?}?>