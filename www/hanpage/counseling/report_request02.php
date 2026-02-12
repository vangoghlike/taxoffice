<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_call.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase(0,0," AND idx=".$_REQUEST["mngr_idx"]);
//이미 위에서 카테고리에 대한 내용을 받아왔으므로 $arrCatInfo 사용가능
$consult_info = getArticleList("tbl_consult_category", 0, 0, " where idx=".$arrCatInfo["list"][0]["cat_report_type"]." ");
$policy_info = getArticleList("tbl_policy", 0, 0, " where policy_name = 'policy3' ");
//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
    <script>
		function frmChk(frm){
			if(frm.user_name.value.length < 1){
				alert("이름을 입력해 주세요.");
				frm.user_name.focus();
				return;
			}
			if(frm.email.value.length < 1){
				alert("이메일을 입력해 주세요.");
				frm.email.focus();
				return;
			}
			if(frm.phone.value.length < 1){
				alert("휴대폰 번호를 입력해 주세요.");
				frm.phone.focus();
				return;
			}
			if(frm.contents.value.length < 1){
				alert("문의 내용을 입력해 주세요.");
				frm.contents.focus();
				return;
			}
			if(!frm.personalAgree.checked){
				alert("개인정보 수집 및 이용에 동의 해주세요.");
				frm.personalAgree.focus();
				return;
			}
			frm.submit();
		}
	</script>
    <div class="telTit pt30">
        <div class="tit01">신고의뢰</div>
        <div class="tit02">상담세무사 : <?=$arrList["list"][0]["mngr_name"]?><br><br>
            <tag class="white">신고의뢰</tag>
            <tag><?=$consult_info["list"][0]["category_name"]?></tag>
        </div>
    </div>
    <div id="contents" class="tcs_contents1 show-on">
		<?=$consult_info["list"][0]["contents"]?>
        <div>
		<a class="btnDownload" href="/uploaded/consult_category/<?=$consult_info["list"][0]['file_name_saved']?>" download="<?=$consult_info["list"][0]['file_name']?>"><?=$consult_info["list"][0]['file_name']?></a>
		</div>
    </div>
    <div id="contents1" class="show-off tcs_contents2">
        <?=$consult_info["list"][0]["contents1"]?>
    </div>
    <div id="contents2" class="show-off taxconsulting">
        <form id="frm_counsel" name="frm_counsel" method="post" action="/module/mail/mail_evn.php">
            <input type="hidden" name="evnMode" value="counsel_mail">
            <input type="hidden" name="step" value="3">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="pay_status" value="1">
            <input type="hidden" name="goods_idx" value="6">
            <input type="hidden" name="tax_nick" value="세림세무법인">
            <input type="hidden" name="goods_name" value="신고의뢰">
            <input type="hidden" name="category" value="<?=$consult_info["list"][0]["idx"]?>">
            <input type="hidden" name="category_name" value="<?=$consult_info["list"][0]["category_name"]?>">
            <input type="hidden" name="etc01" value="신고의뢰">
			<input type="hidden" name="mail_subject" value="[세림세무법인] 신고의뢰가 전송 되었습니다.">
            <input type="hidden" name="mngr_idx" value="<?=$arrList["list"][0]["idx"]?>">
            <input type="hidden" name="manager" value="<?=$arrList["list"][0]["mngr_name"]?>">
            <input type="hidden" name="mngr_name" value="<?=$arrList["list"][0]["mngr_name"]?>">
            <input type="hidden" name="mngr_phone" value="<?=$arrList["list"][0]["phone"]?>">
            <input type="hidden" name="mngr_mail" value="<?=$arrList["list"][0]["email"]?>">
            <input type="hidden" name="mngr_fax" value="<?=$arrList["list"][0]["fax"]?>">
			<input type="hidden" name="returnURL" value="/counseling/mail_result.php">
            <input type="hidden" id="loginChk" value="chk">
            <div class="telSca mailList">
                <div class="userInfoZone">
                    <p class="infoTitle">
                        <strong>·신청자 정보</strong>
                    </p>
                    <p>
                        <span class="infoTt">이름</span>
                        <span><input type="text" class="req" name="user_name" value="" maxlength="25" title="이름을 입력해주세요."></span>
                    </p>
                    <p>
                        <span class="infoTt">이메일</span>
                        <span><input type="text" class="req" name="email" value="" maxlength="100" title="이메일을 입력해주세요."></span>
                    </p>
                    <p>
                        <span class="infoTt">휴대폰</span>
                        <span><input type="text" class="req" name="phone" value="" maxlength="20" title="휴대폰을 입력해주세요."></span>
                    </p>
                    <p class="infoTitle mt20">
                        <strong>·전송할 자료 리스트</strong>
                    </p>
                    <ul class="tableLsit">
					<?
					$arrChecklist = explode("\n",$consult_info["list"][0]["checklist"]);
						for($i=0;$i<count($arrChecklist);$i++){
					?>
						<li>
                            <p>
                                <input type="checkbox" id="list<?=$i?>" name="checklist[]" value="<?=$arrChecklist[$i]?>" class="checklist" title="전송할 자료 리스트를 모두 확인해주세요!">
                                <label for="list<?=$i?>"><?=$arrChecklist[$i]?> </label>
                            </p>
                        </li>
					<?
						}	
					?>
                    </ul>
                    <div class="infoTitle mt20">
                        <strong>·서류 상담방법</strong>&nbsp;
                        <div class="howSelect">
                            <input type="radio" id="mail" name="method" value="email" checked="checked">
                            <label id="mail_label" for="mail">
                                <span>메일</span>&nbsp;
                            </label>
                            <input type="radio" id="fax" name="method" value="fax">
                            <label id="fax_label" for="fax">
                                <span>팩스</span>&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="selectZone">
                        <div class="mailSelect slz on">
                            <div class="tit no4">이메일</div>
                            <div class="text">
                                <span><?=$arrList["list"][0]["email"]?></span>
                            </div>
                        </div>
                        <div class="faxSelect slz">
                            <div class="tit no5">팩스</div>
                            <div class="text">
                                <span><?=$arrList["list"][0]["fax"]?></span>
                            </div>
                        </div>
                    </div>
                    <!--추가 테이블-->
                </div>
                <div class="line text">
                    <div class="textZone">
                        <textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
                    </div>
                </div>
                <div class="whiteBox2 mb10 personalWrap">
                    <div class="top">
                        <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                        <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
                    </div>
                    <div class="textScroll">
                        <?=nl2br($policy_info["list"][0]["policy_contents"])?>
                    </div>
                    <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의"> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
                </div>
                <br>
                <div class="btnCenter btn01"><a style="cursor:pointer;" class="act_submit" onclick="frmChk(document.frm_counsel)">상담 신청하기</a></div>
            </div>
        </form>
    </div>
    <div class="btnCenter btn01 taxconsulting" style=""><a style="cursor:pointer;" onclick="nextStep(this)" class="act_submit">다음</a></div>
	<script>
	function nextStep(obj){
		if ($('#contents').hasClass('show-on')) {
            $('#contents').removeClass('show-on').addClass('show-off');
            $('#contents1').removeClass('show-off').addClass('show-on');
        }else if ($('#contents1').hasClass('show-on')) {
            $('#contents1').removeClass('show-on').addClass('show-off');
            $('#contents2').removeClass('show-off').addClass('show-on');
			obj.style.display = "none";
        }
	}
	$("input[name=method]").on("change",function(){
		var method = "";
		for( var i = 0; i < $("input[name=method]" ).length; i++){
			if ($("input[name=method]")[i].checked == true ){
				method = $("input[name=method]")[i].value;
			}
		}
		if(method == "fax"){
			$(".mailSelect").removeClass("on");
			$(".faxSelect").addClass("on");
		}else if(method == "email"){
			$(".faxSelect").removeClass("on");
			$(".mailSelect").addClass("on");
		}
	});
	</script>