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
            화상회의실
<!--            <small>Open</small>-->
        </a>
        <p><br>
            각 본부 회의실 버튼을 클릭시 zoom 화상회의로 연결됩니다.<br>
            미설치시 인터넷 화면에서 설치버튼을 누른 이후<br>
            완료되면 정상적으로 이용가능합니다.<br>
            무설치 브라우저로 이용하고 싶을경우엔 아래 브라우저로 이용 버튼을 눌러주세요.
            <br><br>
            * 회의 암호 요청시 아래의 각 회의실별 암호를 입력해주세요.
        </p>
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

<div class="zoom_wr">
    <ul class="zoom_list">
        <li>
            <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/7811215759?pwd=dFM3ZXFQRTZKS2djRGl3VzE1VWlMQT09" target="_blank">
<!--            <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/wc/join/7811215759" target="_blank">-->
                <span class="icon_wr"><i class="fas fa-video"></i></span>
                <span class="txt">1 회의실</span>
                <br>
                <span>암호 : selim1</span>
            </a>
            <br>
            <a href="https://us05web.zoom.us/wc/join/7811215759" target="_blank">
                브라우저로 이용<br>(1 회의실)
            </a>
        </li>
        <li>
<!--            <a href="javascript:alert('준비중입니다.');">-->
            <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/4993305249?pwd=d084cWVYL1kwTDBXYUJuRmpFaEcxUT09" target="_blank">
<!--            <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/wc/join/4993305249" target="_blank">-->
                <span class="icon_wr"><i class="fas fa-video"></i></span>
                <span class="txt">2 회의실</span>
                <br>
                <span>암호 : selim2</span>
            </a>
            <br>
            <a href="https://us05web.zoom.us/wc/join/4993305249" target="_blank">
                브라우저로 이용<br>(2 회의실)
            </a>
        </li>
    </ul>
</div>
<!---->
<!--<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">-->
<!--    <strong style="color:#235ba6">ZOOM 화상통화</strong><br>-->
<!--    ZOOM ID : --><?//=$arrList['list'][$i]['cs_zoom_id']?><!--<br>-->
<!--    연결 비밀번호 : --><?//=$arrList['list'][$i]['cs_zoom_pw']?>
<!--</div>-->
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
            <p><strong>상담자</strong><span class="manager_name"></span></p>
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