<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_GET["mngr_idx"] != ""){
	$arrList = getManagerListBase(0,0," AND idx=".$_GET["mngr_idx"]);
}else{
?>
	<script>
		alert("잘못된 경로로 진입하셨습니다.");
		history.back();
	</script>
<?
}

$arrMCList = getManagerCategoryList(1);

$arrPolicyList = getArticleList("tbl_policy", 0, 0," WHERE 1=1 AND policy_name='policy1' order by policy_name ASC");

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
	<?
	$arr_cat_txt = array();
	$arrG_cat = explode("^",$arrList['list'][0]['goods_category']);
	for($j=0;$j<count($arrG_cat);$j++){
		if($arrG_cat[$j] !=""){
			$arrCat = explode(":",$arrG_cat[$j]);
			if($arrCat[1] != ""){
				if($arrMCList["idx"][$arrCat[1]] != ""){
					if($arrCat[1] != 346 && $arrCat[1] != 347 && $arrCat[1] != 348 && $arrCat[1] != 349 && $arrCat[1] != 350){
						array_push($arr_cat_txt,$arrMCList["idx"][$arrCat[1]]);
					}
				}
			}
		}
	}
	?>
    <form id="frm_counsel" name="frm_counsel" action="/module/mail/mail_evn.php" method="post">
		<input type="hidden" name="evnMode" value="counsel_mail">
		<input type="hidden" name="goods_idx" value="6">
		<input type="hidden" name="option_idx" value="6">
		<input type="hidden" name="goods_name" value="[상담]메일상담">
		<input type="hidden" name="mail_subject" value="[세림세무법인] 메일 상담이 전송 되었습니다.">
		<input type="hidden" name="mngr_idx" value="<?=$arrList['list'][0]['idx']?>">
        <input type="hidden" name="mngr_name" value="<?=$arrList['list'][0]['mngr_name']?>">
        <input type="hidden" name="mngr_phone" value="<?=$arrList['list'][0]['phone']?>">
		<input type="hidden" name="mngr_mail" value="<?=$arrList['list'][0]['email']?>">
		<input type="hidden" name="returnURL" value="/">
        <div class="telTit pt30">
            <div class="tit01">메일상담</div>
            <div class="tit02">상담세무사 : <?=$arrList['list'][0]['mngr_name']?><br><br>
                <tag class="white">상담센터</tag>
                <div class="csl_ca_name_wrap">
				<?for($j=0;$j<count($arr_cat_txt);$j++){?>
					<label><input type="radio" style="-webkit-appearance: auto;" value="<?=$arr_cat_txt[$j]?>" name="category_name" <?if($j==0){?>checked<?}?>>&nbsp;<?=$arr_cat_txt[$j]?></label>
				<?}?>
                </div>
            </div>
        </div>
        <div class="telSca mailList">
            <div class="userInfoZone">
                <p class="infoTitle">
                    ·신청자 정보
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
                    <div style="line-height:23px;">
						<?=$arrPolicyList["list"][0]["policy_contents"]?>
                    </div>
                </div>
                <input type="checkbox" style="-webkit-appearance: auto;" name="personalAgree" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의"> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
            </div>
            <br>
            <div class="btnCenter btn01"><a href="javascript:frmChk(document.frm_counsel)" class="act_submit">메일상담 신청</a></div>
        </div>
    </form>