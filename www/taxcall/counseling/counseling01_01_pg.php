<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_call.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/nav.php";?>

<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase();

$arrMCList = getManagerCategoryList(1);

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContainer subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				상담 센터</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>상담센터</span><span>상담 센터</span><span class="last">상담 센터</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
	</div>
	<div class="telTit pt30">
		<div class="tit01">상담 신청하기</div>
		<div class="tit02">상담하고 싶은 세무사를 선택하여 주세요.</div>
	</div>
	<div style="line-height:1.6; padding:2.0rem 3.0rem 2.0rem; background:#eaeaea; border-radius:1.0rem; margin:2.0rem auto;">
		<div style="text-align: center;">
			<a class="host_conts_onoff_btn">
				화상상담진행 <small>Open</small>
			</a>
			<p>(호스트 Process 메뉴얼)</p>
		</div>
		<div class="host_contents off">
			<p><strong>(화상상담 전 세림홈페이지의 관리자로 로그인)</strong></p><br>
			<p class="host_conts_sbj">
				1. 호스트(방장) '로그인' 및 '상담 수락' 절차
			</p>
			<p class="host_conts_cont">
				1) '화상상담' 버튼 클릭<br>
				2) Zoom Meet 알림창에서 '열기' 클릭<br>
				3) Zoom 프로그램에서 '로그인' 버튼 클릭<br>
				4) Google로 로그인 선택<br>
				5) 구글 로그인 웹페이지에서 '다른계정으로 로그인' 선택<br>
				6) 세림세무법인 계정으로 로그인<br>
				&nbsp;&nbsp;&nbsp;&nbsp;(아이디 & 비밀번호 입력)<br>
				7) 'Zoom 미팅' 클릭하여 화상채팅 방 생성<br>
				8) 클라이언트가 '입장' 요청시 확인하고 '수락' 버튼으로 연결<br>
			</p>
			<div style="padding-top:0.5rem;">
				호스트 계정은 관리자에 문의해주세요. <a href="mailto:jinwoodak@taxemail.co.kr">jinwoodak@taxemail.co.kr</a><br>
			</div>
		</div>
	</div>
	<form id="frm_tax1" name="frm_tax1" method="post">
		<input type="hidden" name="step" value="2" />
		<input type="hidden" name="etc01" value="" />
		<input type="hidden" name="mngr_idx" value="" />
		<input type="hidden" name="mngr_tel" value="" />
		<input type="hidden" name="mngr_phone" value="" />
		<input type="hidden" name="mngr_file_name" value="" />
		<input type="hidden" name="mngr_mail" value="" />
		<input type="hidden" name="category" value="" />
		<input type="hidden" name="category_name" value="" />
		<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
		<div class="teslList2 consulting">
			<ul class="consulting_list">
			<?
				if($arrList["list"]["total"] > 0){
					for($i=0;$i<$arrList["list"]["total"];$i++){
						$arr_cat_txt = array();
						$arrG_cat = explode("^",$arrList['list'][$i]['goods_category']);
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
						if(count($arr_cat_txt) < 1){
							continue;
						}
			?>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/uploaded/mngr/<?=$arrList['list'][$i]['file_name']?>" alt="<?=$arrList['list'][$i]['mngr_name']?>">
							</div>
							<div class="txt">
								<div class="tit01"><?=$arrList['list'][$i]['mngr_name']?></div>
								<div class="tit02">“<?=$arrList["list"][$i]['info1']?>”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="<?=$arrList["list"][$i]['tel']?>" data-name="<?=$arrList["list"][$i]['tel']?>" />
							<input type="hidden" class="mngr_phone" value="<?=$arrList["list"][$i]['phone']?>" data-name="<?=$arrList["list"][$i]['phone']?>" />
							<input type="hidden" class="mngr_mail" value="<?=$arrList["list"][$i]['email']?>" data-name="<?=$arrList["list"][$i]['email']?>" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<?
							for($j=0;$j<count($arr_cat_txt);$j++){
							?>
							<li class="cate_list">
								<label>
									<a><?=$arr_cat_txt[$j]?></a>
								</label>
							</li>
							<?
							}
							?>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="<?=implode('/',$arr_cat_txt)?>" />
						<input type="hidden" class="mngr_idx" value="<?=$arrList['list'][$i]['idx']?>" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a href="/counseling/counseling01_01_mail.php?mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<?if($arrList['list'][$i]['cs_zoom_use'] == "on"){?>
										<a class="counselGoZoom consultingBtn" href="<?=$arrList['list'][$i]['cs_zoom_url']?>" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
										<?}else{?>
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
										<?}?>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<?if($arrList['list'][$i]['cs_zoom_use'] == "on"){?>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : <?=$arrList['list'][$i]['cs_zoom_id']?><br>
						연결 비밀번호 : <?=$arrList['list'][$i]['cs_zoom_pw']?>
					</div>
					<?}else{?>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<?}?>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:<?=$arrList['list'][$i]['email']?>" style="color: #0269bf"><?=$arrList['list'][$i]['email']?></a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:<?=$arrList['list'][$i]['tel']?>"><?=$arrList['list'][$i]['tel']?></a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text"><?=$arrList['list'][$i]['fax']?></div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<?
											if($arrList['list'][$i]['info4'] != ""){
												$arrInfo4 = explode("\n",$arrList['list'][$i]['info4']);
												for($j=0;$j<count($arrInfo4);$j++){
													if($arrInfo4[$j] != ""){
											?>
												<li>- <?=$arrInfo4[$j]?></li>
											<?
													}
												}
											}
											?>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<?
											if($arrList['list'][$i]['info5'] != "" || $arrList['list'][$i]['info6'] != "" || $arrList['list'][$i]['info7'] != ""){
												$arrInfo5 = explode("\n",$arrList['list'][$i]['info5']);
												$arrInfo6 = explode("\n",$arrList['list'][$i]['info6']);
												$arrInfo7 = explode("\n",$arrList['list'][$i]['info7']);
												$arrMerge = array_merge($arrInfo5, $arrInfo6, $arrInfo7);
												for($j=0;$j<count($arrMerge);$j++){
													if($arrMerge[$j] != ""){
											?>
												<li>- <?=$arrMerge[$j]?></li>
											<?
													}
												}
											}
											?>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<?
							for($j=0;$j<count($arr_cat_txt);$j++){
							?>
							<li class="cate_list">
								<label>
									<a><?=$arr_cat_txt[$j]?></a>
								</label>
							</li>
							<?
							}
							?>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="<?=implode('/',$arr_cat_txt)?>" />
						<input type="hidden" class="mngr_idx" value="<?=$arrList['list'][$i]['idx']?>" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a href="/counseling/counseling01_01_mail.php?mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<?if($arrList['list'][$i]['cs_zoom_use'] == "on"){?>
										<a class="counselGoZoom consultingBtn" href="<?=$arrList['list'][$i]['cs_zoom_url']?>" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
										<?}else{?>
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
										<?}?>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<?if($arrList['list'][$i]['cs_zoom_use'] == "on"){?>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : <?=$arrList['list'][$i]['cs_zoom_id']?><br>
								연결 비밀번호 : <?=$arrList['list'][$i]['cs_zoom_pw']?>
							</div>
							<?}else{?>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
							<?}?>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<?
					}			
				}
				?>
			</ul>
		</div>
		<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
	</form>
	<div id="goTalkPop" class="goTalkPop">
		<h1>전화상담 예약 정보확인</h1>
		<form id="frm_counsel_talk" name="frm_counsel_talk" method="post">
			<input type="hidden" name="tax_nick" value="세림세무법인" />
			<input type="hidden" name="manager" value="" />
			<input type="hidden" name="manager_phone" value="" />
			<input type="hidden" name="category" value="" />
			<input type="hidden" id="loginChk" value="chk" />
			<input type="hidden" name="goods_name" value="[상담센터]" />
			<div class="gtp-wrap">
				<p><strong>상담사</strong><span class="manager_name"></span></p>
				<div class="cs_category_wrap">
					<ul class="category_li"></ul>
				</div>
				<p><strong>신청자명</strong><span><input type="text" class="req" name="name" value="" maxlength="20" title="신청자명을 입력해주세요." /></span></p>
				<p><strong>내 핸드폰</strong><span><input type="text" class="req" name="u_phone" value="" maxlength="20" title="휴대폰을 입력해주세요." /></span></p>
			</div>
			<div class="gtp-btn-wrap">
				<button class="gtp-btn talk-btn"><a>상담예약</a></button>
				<button class="gtp-btn cancel-btn"><a>취소</a></button>
			</div>
		</form>
	</div>
</div>
<!-- //subContainer -->
<script>
// consulting
	$('.host_conts_onoff_btn').on('click', function(){
		$('.host_contents').stop().slideToggle(300);
		if ( $('.host_contents').hasClass('off') ) {
			$(this).find('small').text('Close');
			$('.host_contents').removeClass('off');
			$('.host_contents').addClass('on');
		} else {
			$(this).find('small').text('Open');
			$('.host_contents').removeClass('on');
			$('.host_contents').addClass('off');
		}

	});
$(function(){

    $(".seCst #select_box label").text("예약시간 선택하기");

    var timeSelect = $(".telSca .seCst #select_box select#app_time");

    timeSelect.change(function(){
        $(this).siblings("span").text("");
    });

    var select = $("select#color");

    select.change(function(){
        var select_name = $(this).children("option:selected").text();
        $(this).siblings("label").text(select_name);
    });

    // counsel
    $(".counselGo").on("click", function(){
        var $deepBg = $("body").append("<div class='deepPopBg'></div>");
        var $openPop = $(this).attr("href");

        // value set up
        var __manager = $(this).closest( 'li.consulting_1li' ).find( '.selView .tit01' ).text();
        var __manager_phone = $(this).closest( 'li.consulting_1li' ).find( '.mngr_phone' ).val();
        var __cs_category = $(this).closest( 'li.consulting_1li' ).find( '.category_li' ).html();

        var __cs_form = $('.goTalkPop form');
        var __cs_gtp = $('.goTalkPop .gtp-wrap');
        __cs_form.find('input[name=manager]').val( __manager );
        __cs_form.find('input[name=manager_phone]').val( __manager_phone );
        __cs_form.find('input[name=category]').val( '전화상담' );
        __cs_gtp.find('.manager_name').text( __manager );
        __cs_gtp.find('.cs_category_wrap .category_li').html( __cs_category );

        $($openPop).slideDown();
    });

    // counsel mail
    $(".counselGoMail").on("click", function(){
        var __manager = $(this).closest( 'li.consulting_1li' ).find( '.selView .tit01' ).text();
        var __manager_phone = $(this).closest( 'li.consulting_1li' ).find( '.mngr_phone' ).val();
        var __cs_category = $(this).closest( 'li.consulting_1li' ).find( '.mngr_category_txt' ).val();
        var __cs_idno = $(this).closest( 'li.consulting_1li' ).find( '.mngr_idx' ).val();
        var __cs_name = '메일상담';

        var __mngr_form = $('form#frm_tax1');
        __mngr_form.find('input[name=mngr_name]').val( __manager );
        __mngr_form.find('input[name=mngr_idx]').val( __cs_idno );
        __mngr_form.find('input[name=mngr_phone]').val( __manager_phone );
        __mngr_form.find('input[name=category_name]').val( __cs_category );
        __mngr_form.find('input[name=etc01]').val( __cs_name );
    });

    $(".cancel-btn").on("click", function(){
        var $talkPop = $(this).closest("#goTalkPop");
        $($talkPop).slideUp();
        var $deepBg = $("body .deepPopBg");
        $($deepBg).remove();
        return false;
    });


    // cs li mouseover
    $('.cs_title').on('mouseover', function(){
        $(this).siblings('.category_li.cs_view').stop().slideDown(500);
    });
    $('.consulting_1li').on('mouseleave', function () {
        $(this).find('.category_li.cs_view').stop().slideUp(500);
    });

    //FAQ
    $('.faqList .qustion a').on('click',function(){
        $(this).parents('li').toggleClass('on');
        $(this).parent().siblings('.answer').slideToggle('fast');
        $(this).parents('li').siblings().removeClass('on').find('.answer').slideUp('fast');
    });

    $('.topInfo .selView .viewBtn').on('click',function(){
        if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(this).addClass("close");
        }else if($(this).hasClass("close")){
            $(this).removeClass("close");
            $(this).addClass("open");
        }
        $(this).parent().parent().siblings('.viewInfo').slideToggle('fast');
        $(this).parent().parents('li').siblings().find('.viewInfo').slideUp('fast');
        $(this).parent().parents('li').siblings().find('.close').removeClass("close").addClass("open");
    });
    // $('.teslList2 .topInfo .selView .viewBtn').on('click',function(){
    // $open_img = "/pages/mobile/images/open_view.png";
    // $close_img = "/pages/mobile/images/close_view.png";
    // if($(this).hasClass("open")){
    // $(this).removeClass("open");
    // $(this).addClass("close");
    // $(this).find("img").attr("src", $close_img);
    // }else if($(this).hasClass("close")){
    // $(this).removeClass("close");
    // $(this).addClass("open");
    // $(this).find("img").attr("src", $open_img);
    // }
    // $(this).parent().parent().siblings('.viewInfo').slideToggle('fast');
    // $(this).parent().parents('li').siblings().find('.viewInfo').slideUp('fast');
    // });

    // 상담구분
    $('.selectBtns >div label').on('click', function(){
        if($(this).hasClass('call') || $(this).hasClass('mail') ){
            $('.option li.cst-se-hdMn').removeClass('block').addClass('none');
        }else if($(this).hasClass('visit')){
            $('.option li.cst-se-hdMn').removeClass('none').addClass('block');
        }
    });
    var onVisit = function(){
        var bool = $('.selectBtns >div input#select2').prop('checked');
        if(bool == true){
            $('.option li.cst-se-hdMn').removeClass('none').addClass('block');
        }
    }
    setTimeout(onVisit, 100)

    $(document).on('keyup', 'input[name=phone], input[name=u_phone]', function() {
        $(this).val($(this).val().toTel());
    });


});

//메뉴 활성화
function gnbActive(idx){
    $('.gnb ul li').eq(idx).addClass('on');
}


//팝업 열기
function popArea(){
    $('.popArea').show();
}

//팝업 닫기
function popAreaClose(){
    $('.popArea').hide();
}
</script>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>