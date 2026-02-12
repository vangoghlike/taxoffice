<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_call.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase();

$arrMCList = getManagerCategoryList(2);

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
<style>
    .h3Wrap.line {
        display:none;
    }
    .tabType02 {
        margin-bottom:12px;
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
    <div class="tit01">신고의뢰 신청하기</div>
    <div class="tit02">신고의뢰 상담을 원하는 세무사를 선택하여 주세요.</div>
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
                                    if($arrCatInfo["list"][0]["cat_report_type"] == $arrCat[1]){
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
                        <div class="topInfo add_padding_right">
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
                            <!-- <p class="mb10 tac cs_title">
                                <a>
                                    상담가능 세목
                                </a>
                            </p> -->
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
                                            <a href="?cat_no=<?=$_GET["cat_no"]?>&step=1&mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <tag><b>신고의뢰</b></tag>
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
                            <!-- <p class="mb10 tac cs_title">
                                <a>
                                    상담가능 세목
                                </a>
                            </p> -->
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
                                            <a href="?cat_no=<?=$_GET["cat_no"]?>&step=1&mngr_idx=<?=$arrList['list'][$i]['idx']?>" class="counselGoMail consultingBtn act_submit">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <tag><b>신고의뢰</b></tag>
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
    <!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
</form>
<div id="goTalkPop" class="goTalkPop">
    <h1>전화상담 예약 정보확인</h1>
    <form id="frm_counsel_talk" name="frm_counsel_talk" method="post">
        <input type="hidden" name="tax_nick" value="세림세무법인" />
        <input type="hidden" name="manager" value="" />
        <input type="hidden" name="manager_phone" value="" />
        <input type="hidden" name="category" value="" />
        <?
        for($j=0;$j<count($arr_cat_txt);$j++){
            ?>
            <input type="hidden" name="category_name" value="<?=$arr_cat_txt[$j]?>" />
            <?
        }
        ?>

        <input type="hidden" id="loginChk" value="chk" />
        <input type="hidden" name="goods_name" value="[신고도움서비스]" />
        <div class="gtp-wrap">
            <p><strong>상담사</strong><span class="manager_name"></span></p>
            <div class="cs_category_wrap">
                <ul class="category_li"></ul>
            </div>
            <p><strong>신청자명</strong><span>
                    <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                        <input type="text" class="req" name="name" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?>" maxlength="20" title="신청자명을 입력해주세요."  required="required"/>
                    <?}else{?>
                        <input type="text" class="req" name="name" value="" maxlength="20" title="신청자명을 입력해주세요."  required="required"/>
                    <?}?>
                </span></p>
            <p><strong>내 핸드폰</strong><span>
                    <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                        <input type="tel" class="req" name="u_phone" value="<?=$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["TEL"]?>" placeholder="예) 010-1234-5678" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" required="required"/>
                    <?}else{?>
                        <input type="tel" class="req" name="u_phone" value="" placeholder="예) 010-1234-5678" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" required="required"/>
                    <?}?>
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

        if (str.substring(0, 2) == 02) {
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

        // counsel call
        $(document).on('submit', '#frm_counsel_talk', function() {
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    'act':'kakao_counsel',
                    'tax_nick':$(this).closest('form').find('input[name=tax_nick]').val(),
                    'category_name':$(this).closest('form').find('input[name=category_name]').val(),
                    'manager_phone':$(this).closest('form').find('input[name=manager_phone]').val(),
                    'manager':$(this).closest('form').find('input[name=manager]').val(),
                    'u_phone':$(this).closest('form').find('input[name=u_phone]').val(),
                    'name':$(this).closest('form').find('input[name=name]').val(),
                    'type':$(this).closest('form').find('input[name=goods_name]').val()
                },
                url: '/module/counselling/ajax_kakao_request.php',
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
            return false;
        });


        // counsel mail
        $(".counselGoMail").on("click", function(){
            var __manager = $(this).closest( 'li.consulting_1li' ).find( '.selView .tit01' ).text();
            var __manager_phone = $(this).closest( 'li.consulting_1li' ).find( '.mngr_phone' ).val();
            var __cs_category = $(this).closest( 'li.consulting_1li' ).find( '.mngr_category_txt' ).val();
            var __cs_idno = $(this).closest( 'li.consulting_1li' ).find( '.mngr_idx' ).val();
            var __cs_name = '신고의뢰';

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
            //	$(this).val($(this).val().toTel());
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