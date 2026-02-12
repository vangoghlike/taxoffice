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
			<th class="nec">상담제목</th>
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
			<th>상담요청</th>
			<td colspan="3">
                <input type="text" class="txt req" style="width:150px" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>" maxlength="10" title="작성자명을 입력해주세요."  />
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
<link rel="stylesheet" href="/module/board/skin/hanpage/css/style.css?v=3">
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

	if(frm.email.value.length < 1){
        console.log("frm:",frm.email.value);
		alert('회신 이메일을 입력해 주세요.');
		frm.email.focus();
		return ;
	}

    if(frm.r_user.value.length < 1){
        alert('상담자를 선택해 주세요.');
        $('.mngr_open-btn').focus();
        return ;
    }

    // if(frm.contents.value.length < 1){
    //     alert('질문을 입력해 주세요.');
    //     frm.contents.focus();
    //     return ;
    // }

	
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
<style>
    @media (max-width: 1179px) {
        .cke_top  {
            display:none;
        }
    }
</style>

<div class="notice container">
	<h2 class="pageTitle">
        <div class="tt_txt">
            질문하기
        </div>
        <a class="tt_qna_btn" href="./index.php?cat_no=<?=$_GET['cat_no']?>&boardid=hanpage&mode=list&sk=&sw=&offset=&category=질문함">
            질문함
        </a>
    </h2>
<!--    <div style="text-align: center; padding:2.0rem; font-size:1.0rem;">-->
<!--        현재 기능 준비중입니다<br>-->
<!--        조금만 기다려주시면 감사하겠습니다!-->
<!--    </div>-->
    <div class="hp_notice_wrap">
        <div class="blue_wrap">
<!--            "개별적 상담내용은 상담센터 및 신고 도움 서비스를 이용하시고<br>-->
<!--            세무 회계에 관한 지식상담은 'Han-Page'를 이용하시면 유용합니다.<br>-->
<!--            '한페이지 세무정보'는 어떠한 질문이던 한페이지로 정리하여<br>-->
<!--            답변을 제공하는 것을 원칙으로 합니다."-->
            "'한페이지 세무상담'은<br>
            세금 지식이나 회계지식, 예규판례에 대한 해석이<br>
            필요한 경우에 질문답변하는 코너입니다.<br>
            '한페이지 세무상담'은 어떠한 질문이던 한페이지로<br>
            간단히 정리하여 답변을 드리는 것을 <br class="mb">원칙으로 하고 있습니다."
            <br>
            <p style="margin-top:0.5rem;">(개인별 민원 상담은 세무상담 또는 신고도움서비스를<br>
                이용하시기를 권장드립니다.)</p>
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
						<th>상담제목</th>
						<td colspan="3">
							<input type="text" class="ipTxt01 req ip_sbj" name="subject" id="subject" value="<?=stripslashes($arrBoardArticle["list"][0][subject])?>" placeholder="제목을 입력하세요.">	
						</td>
					</tr>
					<tr>
						<th>상담요청</th>
						<td colspan="3">
                            <?php if ( $_REQUEST[mode]=="modify" ) { ?>
                            <span>
                                <?php echo $arrBoardArticle["list"][0]['r_user']; ?>
                            </span>
                            <input type="hidden" name="r_user" value="<?php echo $arrBoardArticle["list"][0]['r_user']; ?>">
                            <!--<input type="hidden" name="email" value="<?php echo $arrBoardArticle["list"][0]['email']; ?>">-->
                            <?php } else { ?>
                            <a class="mngr_open-btn">
                                상담자 선택
                            </a>
                            <input type="hidden" name="category" id="category" value="질문함">
                            <input type="hidden" name="r_user" required="required">
                            <?php } ?>
                            <input type="hidden" name="kl_email_manager" id="kl_email_manager" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0]['kl_email_manager']?><?endif;?>" required="required">
                        </td>
					</tr>
                    <?php if ( $_REQUEST[mode]=="modify" ) { ?>
                        <?php if ( $_REQUEST[type]=="reply" || $_REQUEST[type]=="" ) { ?>
                    <tr>
                        <th>세목 선택</th>
                        <td colspan="3">
                            <select name="category">
                                <option value="양도소득세" <?php if ($arrBoardArticle["list"][0]['category']=="양도소득세"){echo 'selected="selected"';}?>>양도소득세</option>
                                <option value="상속세" <?php if ($arrBoardArticle["list"][0]['category']=="상속세"){echo 'selected="selected"';}?>>상속세</option>
                                <option value="증여세" <?php if ($arrBoardArticle["list"][0]['category']=="증여세"){echo 'selected="selected"';}?>>증여세</option>
                                <option value="주식 업무" <?php if ($arrBoardArticle["list"][0]['category']=="주식 업무"){echo 'selected="selected"';}?>>주식 관련 세금</option>
                                <option value="종합부동산세" <?php if ($arrBoardArticle["list"][0]['category']=="종합부동산세"){echo 'selected="selected"';}?>>종합부동산세</option>
                                <option value="지방세" <?php if ($arrBoardArticle["list"][0]['category']=="지방세"){echo 'selected="selected"';}?>>지방세</option>
                                <option value="소득세" <?php if ($arrBoardArticle["list"][0]['category']=="소득세"){echo 'selected="selected"';}?>>소득세</option>
                                <option value="법인세" <?php if ($arrBoardArticle["list"][0]['category']=="법인세"){echo 'selected="selected"';}?>>법인세</option>
                                <option value="부가가치세 및 수출입 세무" <?php if ($arrBoardArticle["list"][0]['category']=="부가가치세 및 수출입 세무"){echo 'selected="selected"';}?>>부가가치세(수출입세무,주세,개별소비세)</option>
                                <option value="국제조세(외투기업)" <?php if ($arrBoardArticle["list"][0]['category']=="국제조세(외투기업)"){echo 'selected="selected"';}?>>국제조세(외투기업)</option>
                                <option value="공통업무" <?php if ($arrBoardArticle["list"][0]['category']=="공통업무"){echo 'selected="selected"';}?>>세법일반(기본법,징수법 등)</option>
                                <option value="급여 및 4대보험"<?php if ($arrBoardArticle["list"][0]['category']=="급여 및 4대보험"){echo 'selected="selected"';}?> >급여 및 4대보험</option>
                                <option value="(주택) 부동산 임대" <?php if ($arrBoardArticle["list"][0]['category']=="(주택) 부동산 임대"){echo 'selected="selected"';}?>>부동산 임대</option>
                                <option value="기장실무(회계)" <?php if ($arrBoardArticle["list"][0]['category']=="기장실무(회계)"){echo 'selected="selected"';}?>>회계(기장업무)</option>
                                <!--<option value="기타세법" <?php if ($arrBoardArticle["list"][0]['category']=="기타세법"){echo 'selected="selected"';}?>>기타세법</option>-->
                            </select>
                        </td>
                    </tr>
                        <?php } ?>
                    <?php } ?>
					<tr>
                        <?php if ( $_REQUEST[mode]!="modify" ) { ?>
                            <?php if ( $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"] == '') { ?>
                        <th>작성자</th>
                        <td style="overflow-x: hidden">
                            <input style="max-width:100%;" type="text" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>">
                        </td>
                        <th>비밀번호</th>
                        <td style="overflow-x: hidden">
                            <input style="max-width:100%;" type="password" name="pass" required/>
                        </td>
                            <?php } else { ?>
                        <th>작성자</th>
                        <td colspan="3">
                            <input type="text" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>">
                        </td>
                            <?php } ?>


                        <? } else { ?>
                        <th>작성자</th>
                        <td colspan="3">
                            <input type="text" name="name" id="name" value="<?if($_REQUEST[mode]=="modify"):?><?=$arrBoardArticle["list"][0][name]?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>" readonly="readonly">
                            <input type="hidden" name="r_name" id="r_name" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?>" required>
                            <input type="hidden" name="email" value="<?=$arrBoardArticle["list"][0][email]?>">
                        </td>
                        <? } ?>
					</tr>
                    <?php if ( $_REQUEST[mode]!="modify" ) { ?>
					<tr>
						<th>회신 이메일</th>
						<td colspan="3">
                            <?php if ( $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"] == '') { ?>
                            <input type="email" name="email" required>
                            <?php } else { ?>
                            <input type="text" name="email" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"]?>" required>
                            <?php } ?>
                            <span>&nbsp;※ 답변을 회신해드립니다.</span>
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
						<th>한페이지 질문</th>
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

                    <?php if ( $_REQUEST[mode]=="modify" ) { ?>
                        <?php if ( $_REQUEST[type]=="reply" || $_REQUEST[type]=="" ) { ?>
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
                        <?php } ?>
                    <?php } ?>

					<?
					for($i=0;$i<$arrBoardArticle["total_files"];$i++){
						if(substr($arrBoardArticle["files"][$i][re_name],0,2) == "l_") {
							$listimg = "Y";
							$num = $i;
						}
					}
					?>
				</tbody>
			</table>
            <?php if ( !($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]) ) { ?>
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
            <?php } ?>
            <!-- //자동방지 -->
		</div>
	</form>
	<div class="btnBbs bbNone " >
		<div class="left">
			<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list">목록</a>
		</div>
		<div class="right">
            <?php if ( $_REQUEST[mode]=="modify" ) { ?>
                <?php if ( $_REQUEST[type]=="reply" || $_REQUEST[type]=="" ) { ?>
			    <a href="javascript:frmCheck(document.frm_write);" class="act_save">답변하기</a>
                <?php } else { ?>
                <a href="javascript:frmCheck(document.frm_write);" class="act_save">수정하기</a>
                <?php } ?>
            <?php } else { ?>
            <a href="javascript:frmCheck(document.frm_write);" class="act_save">질문하기</a>
            <?php } ?>
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

<?php
if ( $_GET["mode"] == 'write' ) {
?>
<script>
    function getCounselAjax(value){
        $.get("/module/counselling/ajax_get_counseling.php",{value:value},function(result){
            if(result){
                $(".interaction_wrap .conts").html(result);
            }
        });
    }
</script>


<div class="interaction_wrap mngr_inter_wrap">
    <div class="inner">
        <h3>
            상담요청 상담자 선택
        </h3>
        <a class="close-btn">
            <i class="fa fa-close"></i>
        </a>
        <div class="conts">
        </div>
    </div>
</div>
<div class="deep_wrap mngr_deep_wrap"></div>
<script>
    $(function() {
        $('.mngr_open-btn').on('click', function() {
            $('.mngr_inter_wrap').slideDown(500);
            $('.mngr_deep_wrap').fadeIn(300);
        });
        $('.mngr_inter_wrap .close-btn').on('click', function() {
            $(this).closest('.mngr_inter_wrap').slideUp(600);
            $(this).closest('.mngr_inter_wrap').siblings('.mngr_deep_wrap').fadeOut(800);
        });
        $('.mngr_deep_wrap').on('click', function() {
            $(this).siblings('.mngr_inter_wrap').slideUp(600);
            $(this).fadeOut(800);
        });
        var kl_email_manager = '';
        var mngr_name = '';
        $(document).on('click','.select-info .select-btn', function() {
            kl_email_manager = $(this).closest('.mngr_1li').find('.mngr_mail').attr('data-name');
            mngr_name = $(this).closest('.mngr_1li').find('.mngr_name').attr('data-name');
            $('input[name="kl_email_manager"]').val(kl_email_manager);
            $('.mngr_open-btn').text(mngr_name);
            $('input[name="r_user"]').val(mngr_name);
            $(this).closest('.mngr_inter_wrap').slideUp(600);
            $(this).closest('.mngr_inter_wrap').siblings('.mngr_deep_wrap').fadeOut(800);
        });
        $(document).on('click','.view-info__view-btn', function() {
            $(this).closest('.view-info').find('.hidden_info').slideToggle(300);
        });
    });

    getCounselAjax('all');
</script>
<?php
}
?>


