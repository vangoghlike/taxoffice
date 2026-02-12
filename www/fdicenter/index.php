<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_fdicenter.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/banner/banner.lib.php");

$dblink = SetConn($_conf_db["main_db"]);
$arrSemuList = getBoardListBaseNFile("semu", "", "", "", 0, 0, 0);
$arrPCBannerList = getMainBannerList("3");
$arrMOBannerList = getMainBannerList("4");
SetDisConn($dblink);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/head.php";?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/header.php";?>

    <script>
        function getBoardAjax(boardid){
            if(boardid != ""){
                $.get("/module/board/ajax_main_info.php",{boardid:boardid},function(result){
                    if(result){
                        $("#info_contents").html(result);
                    }
                });
            }else{
                alert("준비중입니다.");
            }
        }
    </script>


    <!-- helper -->
    <section class="helper <?=$_pnm_class?>">
        <h2 class="hidden">helper</h2>
        <div class="content_wrap">
            <div class="h_txt">
                <h3>
                    <div class="tt">
                        <strong class="highlight">[ One Stop Service ]</strong>
                    </div>
                    <div>
                        · 한국 내에 투자법인이나 외국법인의 국내지사, 지점, 연락사무소를 <br/>
                    &nbsp;&nbsp;&nbsp;설치하려는 외국인투자가를 위하여<br/>
                    &nbsp;&nbsp;&nbsp;각 단계별 <strong>One Stop Service</strong>로 지원해 드립니다.<br/>
                    </div>
                </h3>
                <p>
                    <strong class="highlight">설립을 위한 사전 상담 부터… 사업자등록까지,<br/>
                        사업자등록 이후 사업 진행에 대한 세무업무까지~</strong>
                </p>
                <div class="h_btn">
                    <div class="h_prev"></div>
                    <div class="h_next"></div>
                </div>
            </div>
            <ul class="h_slide">
                <li class="h_slide1">
                    <div class="img_wrap">
                        <div class="inner">
                            <img src="/pub/images/main2_sld/main2_sld1.png" alt="상담">
                            <div class="type-label">
                                외투법인
                            </div>
                        </div>
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=8">
                                            사전 상담
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=52">
                                            서류준비안내
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=44">
                                            은행 신고 절차
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=38">
                                            등기 절차
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=33">
                                            사업자 등록
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=30">
                                            계좌개설 지원
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=26">
                                            설립이후 세무지원
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="h_slide1">
                    <div class="img_wrap">
                        <div class="inner">
                            <img src="/pub/images/main2_sld/main2_sld2.png" alt="상담">
                            <div class="type-label">
                                외국법인의 국내지사,<br/>
                                지점, 연락사무소
                            </div>
                        </div>
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=83">
                                            사전 상담
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=58">
                                            서류준비안내
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=48">
                                            은행 신고 절차
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=41">
                                            등기 절차
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=36">
                                            사업자 등록
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=31">
                                            계좌개설 지원
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdicenter/sub/?cat_no=27">
                                            설립이후 세무지원
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <script>

                $(function(){
                    var slider2 = $('.h_slide');
                    var slickOptions2 = {
                        slide: 'li',
                        slidesToShow : 1,
                        slidesToScroll : 1,
                        autoplay: true,
                        draggable: true,
                        arrows: true,
                        dots: false,
                        infinite : true,
                        prevArrow: $('.h_prev'),
                        nextArrow: $('.h_next'),

                    };

                    var slickOptions2_2 = {
                        slide: 'li',
                        slidesToShow : 1,
                        slidesToScroll : 1,
                        autoplay: true,
                        draggable: true,
                        arrows: true,
                        dots: false,
                        infinite : true,
                        prevArrow: $('.h_prev'),
                        nextArrow: $('.h_next'),

                    };

                    var slickOptions2_pc = {
                        width: 344.14,
                        slide: 'li',
                        slidesToShow : 1,
                        slidesToScroll : 1,
                        draggable: true,
                        arrows: true,
                        dots: false,
                        autoplay: true,
                        infinite : true,
                        prevArrow: $('.h_prev'),
                        nextArrow: $('.h_next'),
                    };

                    $(window).on('load resize', function() {
						var h_wh = $(window).width();

                        if(h_wh < 365) {
							slider2.filter('.slick-initialized').slick('unslick');
							slider2.not('.slick-initialized').slick(slickOptions2_2);
                        } else if(h_wh > 364 && h_wh < 500) {
							slider2.filter('.slick-initialized').slick('unslick');
                            slider2.not('.slick-initialized').slick(slickOptions2);
                        } else {
							slider2.filter('.slick-initialized').slick('unslick');
                            slider2.not('.slick-initialized').slick(slickOptions2_pc);
                        }
                    });

                });

                </script>
        </div>
    </section>
    <!-- helper end -->


    <!-- contact -->
    <section class="contact">
        <h2 class="hidden">contact</h2>
        <div class="content_wrap">
            <div class="map_wrap">
                <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.308771736229!2d126.89701421564634!3d37.4770393370055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9e27cbc9315f%3A0xff179ce4e6e07b14!2s488%20Siheung-daero%2C%20Doksan%203(sam)-dong%2C%20Geumcheon-gu%2C%20Seoul!5e0!3m2!1sen!2skr!4v1571877696895!5m2!1sen!2skr" style="width: 100%; height: 100%; border: 0px" frameborder="0" allowfullscreen=""></iframe></div>
            </div>
            <div class="contact_txt">
                <h3>CONTACT US</h3>
                <p>
                    주소 : 서울특별시 금천구 시흥대로 488(독산동)<br />
                    혜전빌딩 1본부 701호, 2본부 601호<br />
                    지하철 : 2호선 구로디지털단지역 환승센터 (1번출구)<br />
                    -> 금천구청 방면 버스 한 정거장 독산동 고개 하차<br />
                    버스 : 시내버스 5621 / 마을버스 6<br />
                    전화 : 02-854-2100<br />
                    팩스 : 02-854-2120<br />
                </p>
            </div>
        </div>
    </section>
    <!-- contact end -->
	<script>
		getBoardAjax('total');
	</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/footer.php";
?>

