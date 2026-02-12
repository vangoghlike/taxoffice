<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_call.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase();

$arrMCList = getManagerCategoryList(1);

//_DEBUG($arrMenuList);

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
<div class="pcView" style="line-height:1.6; padding:2.0rem 3.0rem 2.0rem; background:#eaeaea; border-radius:1.0rem; margin:2.0rem auto;">
    <div style="text-align: center;">
        <a class="host_conts_onoff_btn">
            화상상담진행 <small>Open</small>
        </a>
<!--        <p>(호스트 Process 메뉴얼)</p>-->
    </div>
<!--    <div class="host_contents off">-->
<!--        <p><strong>(화상상담 전 세림홈페이지의 관리자로 로그인)</strong></p><br>-->
<!--        <p class="host_conts_sbj">-->
<!--            1. 호스트(방장) '로그인' 및 '상담 수락' 절차-->
<!--        </p>-->
<!--        <p class="host_conts_cont">-->
<!--            1) '화상상담' 버튼 클릭<br>-->
<!--            2) Zoom Meet 알림창에서 '열기' 클릭<br>-->
<!--            3) Zoom 프로그램에서 '로그인' 버튼 클릭<br>-->
<!--            4) Google로 로그인 선택<br>-->
<!--            5) 구글 로그인 웹페이지에서 '다른계정으로 로그인' 선택<br>-->
<!--            6) 세림세무법인 계정으로 로그인<br>-->
<!--            &nbsp;&nbsp;&nbsp;&nbsp;(아이디 & 비밀번호 입력)<br>-->
<!--            7) 'Zoom 미팅' 클릭하여 화상채팅 방 생성<br>-->
<!--            8) 클라이언트가 '입장' 요청시 확인하고 '수락' 버튼으로 연결<br>-->
<!--        </p>-->
<!--        <div style="padding-top:0.5rem;">-->
<!--            호스트 계정은 관리자에 문의해주세요. <a href="mailto:jinwoodak@taxemail.co.kr">jinwoodak@taxemail.co.kr</a><br>-->
<!--        </div>-->
<!--    </div>-->
</div>

<div>
    <ul>
        <li>
            <a>
                1번 회의실
            </a>
        </li>
        <li>
            <a>
                2번 회의실
            </a>
        </li>
    </ul>
</div>

<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
    <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
    ZOOM ID : <?=$arrList['list'][$i]['cs_zoom_id']?><br>
    연결 비밀번호 : <?=$arrList['list'][$i]['cs_zoom_pw']?>
</div>
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
            <p><strong>내 핸드폰</strong><span>
                        <input type="tel" class="req" name="u_phone" value="" placeholder="예) 010-1234-5678" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13"/>
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
                    'category':$(this).closest('form').find('input[name=category]').val(),
                    'manager_phone':$(this).closest('form').find('input[name=manager_phone]').val(),
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
            //$(this).val($(this).val().toTel());
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