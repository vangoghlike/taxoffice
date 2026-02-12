<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase("","","","",364);

$arrMCList = getManagerCategoryList(1);

//DB해제
SetDisConn($dblink);

?>

<style>
    .subTopInfo {
        display:none;
    }
    .contStart {
        padding-top:16px;
    }
    @media (min-width: 1180px) {
        .mbView {
            display:none;
        }
    }
    @media (max-width: 1179px) {
        .pcView {
            display:none;
        }
        .teslList2.consulting .consulting_list > li.consulting_1li {
            padding:0.5rem 0.75rem;
        }
    }
</style>
	<div class="telTit pt30">
		<div class="tit01">상담 신청하기</div>
		<div class="tit02">상담하고 싶은 세무사를 선택하여 주세요.
            <div class="tit03">세무 상담시 수수료가 발생할 수 있습니다.</div>
        </div>
	</div>
	<form id="frm_tax1" name="frm_tax1" method="post">
		<input type="hidden" name="step" value="2" />
		<input type="hidden" name="etc01" value="" />
		<input type="hidden" name="mngr_idx" value="" />
		<input type="hidden" name="mngr_phone" value="" />
		<input type="hidden" name="mngr_file_name" value="" />
		<input type="hidden" name="mngr_mail" value="" />
		<input type="hidden" name="category" value="" />
		<input type="hidden" name="category_name" value="" />
		<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
		<div class="teslList2 consulting none_pading">
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
				<li id="mngr_<?=$arrList['list'][$i]['idx']?>" class="consulting_1li">
					<div class="topInfo add_padding_right">
						<div class="selView">
							<div class="img img-type-<?=$arrList['list'][$i]['face_size']?>">
								<img src="/uploaded/mngr/<?=$arrList['list'][$i]['file_name']?>" alt="<?=$arrList['list'][$i]['mngr_name']?>">
							</div>
							<div class="txt">
								<div class="tit01"><?=$arrList['list'][$i]['mngr_name']?></div>
								<div class="tit02">“<?=$arrList["list"][$i]['info1']?>”</div>
							</div>
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="<?=$arrList["list"][$i]['tel']?>" data-name="<?=$arrList["list"][$i]['tel']?>" />
							<input type="hidden" class="mngr_mail" value="<?=$arrList["list"][$i]['email']?>" data-name="<?=$arrList["list"][$i]['email']?>" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
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
										<a class="counselGo consultingBtn">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>전화상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a href="?cat_no=<?=$_GET["cat_no"]?>&mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>

					<div class="viewInfo add_padding_right">
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
								<li class="carrier_li hidden_li">
									<div class="tit no3">경력</div>
									<div class="text">
                                    <?php if ( $arrList['list'][$i]['mngr_position'] == '대표' ) { ?>
                                        <ul>
                                            <?
                                            if($arrList['list'][$i]['info4'] != ""){
                                                $arrInfo4 = explode("\n",$arrList['list'][$i]['info4']);
                                                for($j=(count($arrInfo4)-1);$j>0;$j--){
                                                    if($arrInfo4[$j] != ""){
                                                        ?>
                                                        <li>- <?=$arrInfo4[$j]?></li>
                                                        <?
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php } else { ?>
                                        <ul>
                                            <?php
                                            if($arrList['list'][$i]['current_position']) :
                                                ?>
                                                <li>- <?=$arrList['list'][$i]['current_position']?></li>
                                                <?php
                                            endif;
                                            ?>
                                            <?php
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
                                    <?php } ?>

									</div>
								</li>
                                <li class="rnd_li hidden_li">
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
                            <a class="csl_info_btn close">
                                주요정보 더보기
                            </a>
						</div>
					</div>
					<div class="itemInfo pc_ver">
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
										<a class="counselGo consultingBtn goTalkPop_btn">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>전화상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a href="?cat_no=<?=$_GET["cat_no"]?>&mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
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
	</form>

	<div id="goTalkPop" class="goTalkPop">
		<h1>전화상담 예약 정보확인</h1>
		<form id="frm_counsel_talk" name="frm_counsel_talk" method="post">
			<input type="hidden" name="tax_nick" value="세림세무법인" />
			<input type="hidden" name="manager" value="" />
			<input type="hidden" name="manager_idx" value="" />
			<input type="hidden" name="category" value="" />
			<input type="hidden" id="loginChk" value="chk" />
			<input type="hidden" name="goods_name" value="[상담센터]" />
			<div class="gtp-wrap">
				<p><strong>상담자</strong><span class="manager_name"></span></p>
				<div class="cs_category_wrap">
					<ul class="category_li"></ul>
				</div>
				<p><strong>신청자명</strong><span><input type="text" class="req" required="required" name="name" value="" maxlength="20" title="신청자명을 입력해주세요." /></span></p>
				<p><strong>내 핸드폰</strong><span>
                        <input type="tel" class="req" name="u_phone" value="" required="required" placeholder="예) 010-1234-5678" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13"/>
                    </span></p>
			</div>
			<div class="gtp-btn-wrap">
				<button class="gtp-btn talk-btn"><a>상담예약</a></button>
				<button class="gtp-btn cancel-btn"><a>취소</a></button>
			</div>
		</form>
	</div>
<script>
    function autoHypenTel(str) {
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';

        if (str.substring(0, 2) == '02') {
            // 서울 전화번호일 경우 10자리까지만 나타나고 그 이상의 자리수는 자동삭제
            if (str.length < 3) {
                return str;
            } else if (str.length < 6) {
                tmp += str.substr(0, 2);
                tmp += '-';
                tmp += str.substr(2);
                return tmp;
            } else if (str.length < 10) {
                tmp += str.substr(0, 2);
                tmp += '-';
                tmp += str.substr(2, 3);
                tmp += '-';
                tmp += str.substr(5);
                return tmp;
            } else {
                tmp += str.substr(0, 2);
                tmp += '-';
                tmp += str.substr(2, 4);
                tmp += '-';
                tmp += str.substr(6, 4);
                return tmp;
            }
        } else {
            // 핸드폰 및 다른 지역 전화번호 일 경우
            if (str.length < 4) {
                return str;
            } else if (str.length < 7) {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3);
                return tmp;
            } else if (str.length < 11) {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 3);
                tmp += '-';
                tmp += str.substr(6);
                return tmp;
            } else {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 4);
                tmp += '-';
                tmp += str.substr(7);
                return tmp;
            }
        }
        return str;
    }
    $('input[name=u_phone]').keyup(function (event) {

        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenTel(_val);
    });

    // consulting
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

            // value set up
            var __manager = $(this).closest( 'li.consulting_1li' ).find( '.selView .tit01' ).text();
            var __cs_category = $(this).closest( 'li.consulting_1li' ).find( '.category_li' ).html();
            var __manager_idx = $(this).closest( 'li.consulting_1li' ).find( '.mngr_idx' ).val();

            var __cs_form = $('.goTalkPop form');
            var __cs_gtp = $('.goTalkPop .gtp-wrap');
            __cs_form.find('input[name=manager]').val( __manager );
            __cs_form.find('input[name=manager_idx]').val( __manager_idx );
            __cs_form.find('input[name=category]').val( '전화상담' );
            __cs_gtp.find('.manager_name').text( __manager );
            __cs_gtp.find('.cs_category_wrap .category_li').html( __cs_category );

            $('#goTalkPop').slideDown(300);
        });

        // counsel call
        $(document).on('submit', '#frm_counsel_talk', function() {
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    'act':'kakao_counsel',
                    'tax_nick':$(this).closest('form').find('input[name=tax_nick]').val(),
                    'manager_idx':$(this).closest('form').find('input[name=manager_idx]').val(),
                    'category':$(this).closest('form').find('input[name=category]').val(),
                    'manager':$(this).closest('form').find('input[name=manager]').val(),
                    'u_phone':$(this).closest('form').find('input[name=u_phone]').val(),
                    'name':$(this).closest('form').find('input[name=name]').val(),
                    'type':$(this).closest('form').find('input[name=goods_name]').val()
                },
                url: '/module/counselling/ajax_kakao_counsel.php',
                success: function(resp) {
                    if (resp.result == 'success') {
                        alert(resp.message);
                        location.href = '/';
                    }
                    else alert(resp.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

            $('#goTalkPop').slideUp(300);

            return false;
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
            //$(this).val($(this).val().toTel());
        });


        // move mngr
        var this_params = new URLSearchParams(window.location.search);
        var mngr_val = this_params.get('mngr');
        $('html, body').animate({
            scrollTop: $('#'+mngr_val).offset().top - 40
        }, 500);
        $('#'+mngr_val).find('.csl_info_btn').trigger('click');

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