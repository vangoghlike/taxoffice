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
			<th>상담요청(답변처리)</th>
			<td colspan="3">
                <input type="text" class="txt req" style="width:150px" name="r_user" id="r_user"
                       value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][r_user]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?"FDI Manager":$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["R_USER"]?><?endif;?>" maxlength="10" title="작성자명을 입력해주세요."  />
            </td>
		</tr>
		<tr>
			<th>상담자 메일</th>
			<td colspan="3">
                <input type="text" class="txt req" style="width:150px" name="kl_email_manager" id="kl_email_manager"
                       value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][kl_email_manager]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?"selim77@taxemail.co.kr":$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["KL_EMAIL_MANAGER"]?><?endif;?>" maxlength="10" title="메일을 입력해주세요." readonly />
            </td>
		</tr>
        <tr>
            <th>세목 선택</th>
            <td colspan="3">
                <select name="category">
                    <option value="TransferIncomeTax"
                        <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="TransferIncomeTax"):?>selected="selected"<?endif;?>>Transfer Income Tax</option>
                    <option value="InheritanceTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="InheritanceTax"):?>selected="selected"<?endif;?>>Inheritance Tax</option>
                    <option value="GiftTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="GiftTax"):?>selected="selected"<?endif;?>>Gift Tax</option>
                    <option value="LocalTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="LocalTax"):?>selected="selected"<?endif;?>>Local Tax</option>
                    <option value="ComprehensiveRealEstateHoldingTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="ComprehensiveRealEstateHoldingTax"):?>selected="selected"<?endif;?>>Estate Holding Tax</option>
                    <option value="IncomeTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="IncomeTax"):?>selected="selected"<?endif;?>>Income Tax</option>
                    <option value="CorporateTax"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="CorporateTax"):?>selected="selected"<?endif;?>>Corporate Tax</option>
                    <option value="VAT_ExImport"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="VAT_ExImport"):?>selected="selected"<?endif;?>>VAT & Ex/Import</option>
                    <option value="Payroll_4SocialInsurance"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="Payroll_4SocialInsurance"):?>selected="selected"<?endif;?>>Payroll & 4 Social Insurance</option>
                    <option value="Bookkeeping"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="Bookkeeping"):?>selected="selected"<?endif;?>>Bookkeeping (accounting)</option>
                    <option value="FDI"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="FDI"):?>selected="selected"<?endif;?>>FDI</option>
                    <option value="Stocks"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="Stocks"):?>selected="selected"<?endif;?>>Stocks</option>
                    <option value="RealEstateLease"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="RealEstateLease"):?>selected="selected"<?endif;?>>(Housing) Real Estate Lease</option>
                    <option value="GeneralAffairs"
                            <?if($_REQUEST[mode]=="modify" && $arrBoardArticle["list"][0][category]=="GeneralAffairs"):?>selected="selected"<?endif;?>>General Affairs</option>
                </select>
            </td>
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
			<th class="nec">한페이지 질문</th>
			<td colspan="3">
				<textarea id="contents" name="contents"><?=stripslashes($arrBoardArticle["list"][0][contents])?></textarea>
				<?
				$CKContent = "contents";
				include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
				?>
			</td>
		</tr>

        <tr class="kl_table">
            <th class="th_cont"><label class="lb_cont">한페이지 답변 내용</label></th>
            <td colspan="3" class="td_cont">
                <textarea name="r_contents" cols="30" rows="10" style="height:200px;" title="내용">
                <?php
                echo stripslashes($arrBoardArticle["list"][0]['r_contents']) ;
                ?></textarea>
                <?
                $CKContent = "r_contents";
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
// 스팸방지 새로고침
function reloadCode(){
    var rand = Math.random();
    document.getElementById('siimage').src = '/_securimage/securimage_show.php?sid=' + rand;
    document.getElementById('siaudio').src = '/_securimage/securimage_play.php?sid=' + rand;
    return false
}
// 스팸방지 듣기
function playAudio(){
    const siAudio = document.getElementById("siaudio");
    siAudio.play();
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
    <?php
        if ( $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == 'admin' ) {
            $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"] = 'ADMIN';
        }
    ?>
<div class="notice container">
    <h2 class="pageTitle">
        <div class="tt_txt">
            Submit Your Inquiry
        </div>
        <!--<a class="tt_qna_btn" href="./index.php?cat_no=<?=$_GET['cat_no']?>&boardid=hanpage&mode=list&sk=&sw=&offset=&category=질문함">
            Asked
        </a>-->
    </h2>
    <div class="hp_notice_wrap">
        <div class="blue_wrap">
            <p style="font-size:1.5rem; color:#000;">
                Welcome to Selim’s Client Inquiry Center!
            </p>
            <p style="font-size:1.125rem; margin-top:0.5rem;">
                For general tax information at your fingertips, explore 'Tax Info at a Glance' to find what you need or <br/>
                submit your inquiries about taxes, accounting, or interpretation of precedents, and more.
            </p>
            <p style="font-size:1.0rem; margin-top:0.5rem;">
                For in-depth tax counseling and reporting-related services for specific requests, leave your inquiry at 'Inquire Now’ on the top.
            </p>

        </div>
    </div>
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
						<th>Subject</th>
						<td colspan="3">
							<input type="text" class="ipTxt01 req ip_sbj" name="subject" id="subject" value="<?=stripslashes($arrBoardArticle["list"][0][subject])?>" placeholder="Please enter a title.">
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td colspan="3"><input type="text" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>"></td>
					</tr>
                    <?php if ( $_REQUEST[mode]!="modify" ) { ?>
                        <tr>
                            <th>Reply email</th>
                            <td colspan="3">
                                <?php if ( $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"] == '') { ?>
                                    <input type="email" name="email" required>
                                <?php } else { ?>
                                    <input type="text" name="email" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"]?>" required>
                                <?php } ?>
                            </td>
                            <script>
                                $('input[name=email]').on('change', function(){
                                    theform = document.frm_write;
                                    var isEmailBool = isEmail($(this).val());
                                    if ( isEmailBool == false ) {
                                        alert('이메일 형식이 아닙니다');
                                        return theform.email.focus();
                                    }
                                });

                                function isEmail(asValue) {
                                    var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

                                    return regExp.test(asValue);
                                }
                            </script>
                        </tr>
                    <?php } ?>
					<tr>
						<th>Contents</th>
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

				</tbody>
			</table>
		</div>
        <!-- 자동방지 -->
        <? $sid = md5(time()); // 같은 값을 주기 위함?>
        <div class="automatic_wrap clearfix">
            <div class="automatic_img_wrap">
                <div>
                    <img id="siimage"  style="height:144;width:42" src="/_securimage/securimage_show.php?sid=<?=$sid?>" alt="">
                </div>
                <div class="btn_area">
                    <a tabindex="-1" style="display:inline-block;margin-bottom:5px;cursor:pointer;" title="Refresh Image" onclick="reloadCode()">
                        <img height="35" width="126" src="/pub/images/btn_automatic_reset_eng.png" alt="Refresh Image"  style="border: 0px; vertical-align: bottom">
                    </a>
                    <div id="captcha_image_audio_div" style="display:block;max-height:37px;overflow:hidden;">
                        <audio id="siaudio" src="/_securimage/securimage_play.php?sid=<?=$sid?>" style="display:hidden"></audio>
                    </div>
                    <div id="captcha_image_audio_controls">
                        <a tabindex="-1" class="captcha_play_button" href="/common/securimage/securimage_play.php?id=278" onclick="return false">
                            <img class="captcha_play_image" height="35" width="126" src="/pub/images/btn_automatic_voice_eng.png" alt="Play CAPTCHA Audio" onclick="playAudio()" style="border: 0px">
                            <img class="captcha_loading_image rotating" height="32" width="32" src="/common/securimage/images/loading.png" alt="Loading audio" style="display: none">
                        </a>
                        <noscript>Enable Javascript for audio controls</noscript>
                    </div>
                </div>
            </div>
            <div class="automatic_input_wrap">
                <div>
                    <p>Please enter a number to prevent automatic input.</p>
                    <input type="text" name="code" maxlength="6" title="Please enter a number to prevent automatic input." class="ipTxt02 req">
                </div>
            </div>
        </div>
        <!-- //자동방지 -->
	</form>
	<div class="btnBbs bbNone ">
		<div class="left">
			<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list">List</a>
		</div>
		<div class="right">
			<a href="javascript:frmCheck(document.frm_write);" class="act_save">Submit</a>
			<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list" class="act_back">Cancel</a>
		</div>
	</div>
</div>
<?
else:
jsMsg("This is a bulletin board that only administrators can register/modify/delete.");
jsHistory("-1");
endif;
?>
<?}?>