<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_hanpage.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/banner/banner.lib.php");
?>
<?
$dblink = SetConn($_conf_db["main_db"]);
$arrSemuList = getBoardListBaseNFile("semu", "", "", "", 0, 0, 0);
$arrPCBannerList = getMainBannerList("1");
$arrMOBannerList = getMainBannerList("2");
SetDisConn($dblink);

$bannerTotal = $arrPCBannerList['list']["total"]>$arrMOBannerList['list']["total"]?$arrPCBannerList['list']["total"]:$arrMOBannerList['list']["total"];

$bannerTotal = $bannerTotal==""?1:$bannerTotal;

if($arrPCBannerList['list']["total"] > 0){
    for($i=0;$i<$arrPCBannerList['list']["total"];$i++){
        if($arrPCBannerList["list"][0]["b_image"] == ""){
            $pcImg[$i] = "/uploaded/banner/".$arrPCBannerList["list"][0]["b_image"];
        }else{
            $pcImg[$i] = "/uploaded/banner/".$arrPCBannerList["list"][$i]["b_image"];
        }
    }
}else{
    $pcImg[0] = "/hanpage/pub/images/main_img1.png";
}

if($arrMOBannerList['list']["total"] > 0){
    for($i=0;$i<$arrMOBannerList['list']["total"];$i++){
        if($arrMOBannerList["list"][0]["b_image"] == ""){
            $moImg[$i] = "/uploaded/banner/".$arrMOBannerList["list"][0]["b_image"];
        }else{
            $moImg[$i] = "/uploaded/banner/".$arrMOBannerList["list"][$i]["b_image"];
        }
    }
}else{
    $moImg[0] = "/pub/images/main_img1.png";
}
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/header.php";?>

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
<section class="visual k_link_box">
    <!--    <div class="selim_kakaoLink">-->
    <!--        <a id="kakao-link-btn" href="javascript:sendLink()">-->
    <!--            <img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png">-->
    <!--            <span>앱 추천하기</span>-->
    <!--        </a>-->
    <!--    </div>-->
    <div class="">
        <div class="v_slide">
            <div class="swiper-wrapper">
                <?
                if($bannerTotal > 0){
                    for($i=0;$i<$bannerTotal;$i++){
                        if($pcImg[$i] == ""){
                            $pcImg[$i] = $pcImg[0];
                        }
                        if($moImg[$i] == ""){
                            $moImg[$i] = $moImg[0];
                        }
                        ?>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);">
                                <?php
                                if ( $i == 0 ) {
                                    $_imgMain = '/hanpage/img/hanpage_banner_1.jpg';
                                    $_imgMainMb = '/hanpage/img/hanpage_banner_1_m.jpg';
                                } else if ( $i == 1 ) {
                                    $_imgMain = '/hanpage/img/hanpage_banner_2.jpg';
                                    $_imgMainMb = '/hanpage/img/hanpage_banner_2_m.jpg';
                                }
                                ?>
                                <img src="<?=$_imgMain?>" class="pc_vw pc_mv">
                                <img src="<?=$_imgMainMb?>" class="mo_vw mo_mv">
                                <!-- <p>
                                    처음부터 끝까지<span class="br"></span>
                                    <strong>고객을 위하여<span class="br mo"></span> 내 가족의 일처럼,<span class="br"></span></strong>
                                    세림세무법인의 이념입니다.<span class="br"></span>
                                </p> -->
                            </a>
                        </div>
                        <?
                    }
                }else{
                    ?>
                    <div class="swiper-slide">
                        <a href="javascript:void(0);">
                            <p>
                                처음부터 끝까지<span class="br"></span>
                                <strong>고객을 위하여<span class="br mo"></span> 내 가족의 일처럼,<span class="br"></span></strong>
                                세림세무법인의 이념입니다.<span class="br"></span>
                            </p>
                        </a>
                    </div>
                    <?
                }
                ?>
                <!-- <div class="swiper-slide">
                    <a href="javascript:void(0);">
                        <p>
                            처음부터 끝까지<span class="br"></span>
                            <strong>고객을 위하여<span class="br mo"></span> 내 가족의 일처럼,<span class="br"></span></strong>
                            세림세무법인의 이념입니다.<span class="br"></span>
                        </p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:void(0);">
                        <p>
                            처음부터 끝까지<span class="br"></span>
                            <strong>고객을 위하여<span class="br mo"></span> 내 가족의 일처럼,<span class="br"></span></strong>
                            세림세무법인의 이념입니다.<span class="br"></span>
                        </p>
                    </a>
                </div> -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <div class="v_btn_wrap">
                <div class="v_btn">
                    <div class="swiper-button-prev"></div>
                    <div class="slide_num">
                        <div class="num now" id="page_number">01</div>
                        <div class="num all" id="all_number">0<?=$bannerTotal?></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="stop"></div>
                </div>
            </div>
        </div>
        <div class="v_quick content_wrap">
            <div class="q_slide q_pc pc_view">
                <a href="/hanpage/sub/?cat_no=1">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>한페이지</span>
                    </div>
                </a>
                
                <a href="http://www.taxcallcenter.com//taxcall/sub/?cat_no=1">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>상담센터</span>
                    </div>
                </a>

                <a href="http://www.taxcallcenter.com//taxcall/sub/?cat_no=11">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>신고도우미</span>
                    </div>
                </a>

                <a href="http://www.taxoffice.co.kr/sub/?cat_no=68" class="q7">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>업무 안내</span>
                    </div>
                </a>

                <a href="http://www.taxoffice.co.kr/sub/?cat_no=29" class="q8">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>업무보수표</span>
                    </div>
                </a>

                <a href="http://www.taxoffice.co.kr/sub/?cat_no=134" class="q2">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>외투기업</span>
                    </div>
                </a>

                <a href="http://www.taxoffice.co.kr/sub/?cat_no=102" class="q3">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>기장자문</span>
                    </div>
                </a>

                <a href="https://blog.naver.com/selimtaxoffice" target="_blank">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>블로그</span>
                    </div>
                </a>

            </div>
            <script>

                $(function(){
                    var slider = $('.v_quick');
                    var slickOptions = {
                        slide: 'div',
                        slidesToShow : 1,
                        slidesToScroll : 1,
                        arrows: false,
                        dots: true
                    };

                    $(window).on('load resize', function() {
                        if($(window).width() < 751) {
                            slider.not('.slick-initialized').slick(slickOptions);
                        }else{
                            slider.filter('.slick-initialized').slick('unslick');

                        }
                    });

                });

            </script>
        </div>

    </div>
</section>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
    var mySwiper = new Swiper('.v_slide',{
        speed: 2000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loop: true,
        loopedSlides: 1,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
            clickable: true,
        },
        navigation : { // 네비게이션
            nextEl : '.swiper-button-next', // 다음 버튼 클래스명
            prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
        },
    })

    mySwiper.on("slideChangeTransitionEnd", function () {
        //var page_number = String(document.querySelector(".swiper-slide-active").getAttribute("aria-label"));
        //var new_num = page_number.slice(0,1);

        var page_number = parseInt(document.querySelector(".swiper-slide-active").getAttribute("data-swiper-slide-index"));
        page_number++;

        document.getElementById("page_number").innerHTML = '0' + page_number;
    });
</script>


<!-- helper -->
<section class="helper">
    <h2 class="hidden">helper</h2>
    <div class="content_wrap">
        <div class="h_txt">
            <h3>
                <strong class="highlight">분야별 전문성</strong> 을 가진<span class="br pc1112"></span>
                세림의<span class="br mo"></span> 세무사들이<span class="br pc1112"></span>
                고객님의 세무업무를<span class="br"></span>
                도와드리겠습니다.
            </h3>
            <p>
                여러분의 세무도우미,<span class="br"></span>
                세림세무법인의 MANPOWER
            </p>
            <div class="h_btn">
                <div class="h_prev"></div>
                <div class="h_next"></div>
            </div>
        </div>
        <ul class="h_slide">
            <?
            if($arrSemuList["total"] > 0){
                for($i=0;$i<$arrSemuList["total"];$i++){
                    $imgsrc[$i] = "/uploaded/board/semu/".$arrSemuList["list"][$i]["re_name"];
                    ?>
                    <li>
                        <div class="img_wrap">
                            <img src="<?=$imgsrc[$i]?>" style="width:100%;" alt="<?=$arrSemuList["list"][$i]["name"]?>">
                        </div>
                        <h3><?=$arrSemuList["list"][$i]["name"]?></h3>
                        <!-- <span class="line"></span>
						"<?=$arrSemuList["list"][$i]["subject"]?>"<br> -->
                        <div class="hash_box">
                            <?if($arrSemuList["list"][$i]["etc_1"] != ""){?>
                                <span class="hash"><?=$arrSemuList["list"][$i]["etc_1"]?></span>
                            <?}?>
                            <?if($arrSemuList["list"][$i]["etc_2"] != ""){?>
                                <span class="hash"><?=$arrSemuList["list"][$i]["etc_2"]?></span>
                            <?}?>
                            <?if($arrSemuList["list"][$i]["etc_4"] != ""){?>
                                <br><span class="hash"><?=$arrSemuList["list"][$i]["etc_4"]?></span>
                            <?}?>
                            <?if($arrSemuList["list"][$i]["etc_5"] != ""){?>
                                <span class="hash"><?=$arrSemuList["list"][$i]["etc_5"]?></span>
                            <?}?>
                        </div>
                        <a href="http://www.taxcallcenter.com/taxcall/sub/?cat_no=1">상담의뢰</a>
                    </li>
                    <?
                }
            }
            ?>
            <!-- <li>
                <img src="/pub/images/helper1.png" alt="홍길동 업무이사">
                <h3>홍길동 업무이사</h3>
                <span class="line"></span>
                "고객과 함께하겠습니다."<br>
                <span class="hash">기장업무</span>
                <span class="hash">수출입업무</span>
                <a href="javascript:void(0);">상담의뢰</a>
            </li>
            <li>
                <img src="/pub/images/helper2.png" alt="김철수 업무이사">
                <h3>김철수 업무이사</h3>
                <span class="line"></span>
                "고객과 함께하겠습니다."<br>
                <span class="hash">기장업무</span>
                <span class="hash">수출입업무</span>
                <a href="javascript:void(0);">상담의뢰</a>
            </li>
            <li>
                <img src="/pub/images/helper2.png" alt="김철수 업무이사">
                <h3>김철수 업무이사</h3>
                <span class="line"></span>
                "고객과 함께하겠습니다."<br>
                <span class="hash">기장업무</span>
                <span class="hash">수출입업무</span>
                <a href="javascript:void(0);">상담의뢰</a>
            </li>
            <li>
                <img src="/pub/images/helper2.png" alt="김철수 업무이사">
                <h3>김철수 업무이사</h3>
                <span class="line"></span>
                "고객과 함께하겠습니다."<br>
                <span class="hash">기장업무</span>
                <span class="hash">수출입업무</span>
                <a href="javascript:void(0);">상담의뢰</a>
            </li> -->
        </ul>
        <script>

            $(function(){
                var slider2 = $('.h_slide');
                var slickOptions2 = {
                    slide: 'li',
                    slidesToShow : 1.6,
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
                    slidesToShow : 2,
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


<!-- info -->
<section class="info info_main">
    <h2 class="hidden">info</h2>
    <div class="content_wrap" id="info_contents">
        <?// 해당 부분은 jquery로 받아 들입니다. getBoardAjax(boardid)를 참고 하세요!?>
    </div>
</section>
<!-- info end -->


<!-- contact -->
<section class="contact">
    <h2 class="hidden">contact</h2>
    <div class="content_wrap">
        <div class="map_wrap">
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.308771736229!2d126.89701421564634!3d37.4770393370055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9e27cbc9315f%3A0xff179ce4e6e07b14!2s488%20Siheung-daero%2C%20Doksan%203(sam)-dong%2C%20Geumcheon-gu%2C%20Seoul!5e0!3m2!1sen!2skr!4v1571877696895!5m2!1sen!2skr" style="width: 100%; height: 100%; border: 0px" frameborder="0" allowfullscreen=""></iframe>
            </div>
            
        </div>
        <div class="contact_txt">
            <h3>CONTACT US</h3>
            <p>
                주소 : 서울특별시 금천구 시흥대로 488(독산동)<br />
                혜전빌딩 1본부 701호, 2본부 601호<br />
                지하철 : 2호선 구로디지털단지역 환승센터 (1번출구)<br />
                -> 안양방면 버스 한 정거장 독산동 고개 하차<br />
                버스 : 시내버스 5621 / 마을버스 6<br />
                전화 : 02-854-2100<br />
                팩스 : 02-854-2120<br />
            </p>
        </div>
    </div>
</section>
<!-- contact end -->
<script>
    getBoardAjax('Column');
</script>
<?php
    include 'pub/include/footer.php';
?>
