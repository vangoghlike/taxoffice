<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/banner/banner.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");
?>
<?
$dblink = SetConn($_conf_db["main_db"]);
$arrSemuList = getBoardListBaseNFile("semu", "", "", "", 0, 0, 0);
$arrPCBannerList = getMainBannerList("1");
$arrMOBannerList = getMainBannerList("2");
$arrManagerList = getManagerListBase();
$arrMCList = getManagerCategoryList(1);
SetDisConn($dblink);

$bannerTotal = $arrPCBannerList['list']["total"]>$arrMOBannerList['list']["total"]?$arrPCBannerList['list']["total"]:$arrMOBannerList['list']["total"];

$bannerTotal = $bannerTotal==""?1:$bannerTotal;

$bannerTotal = 3;

if($arrPCBannerList['list']["total"] > 0){
    for($i=0;$i<$arrPCBannerList['list']["total"];$i++){
        if($arrPCBannerList["list"][0]["b_image"] == ""){
            $pcImg[$i] = "/uploaded/banner/".$arrPCBannerList["list"][0]["b_image"];
        }else{
            $pcImg[$i] = "/uploaded/banner/".$arrPCBannerList["list"][$i]["b_image"];
        }
    }
}else{
    $pcImg[0] = "/pub/images/main_img1.png";
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
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>

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
<!-- visual -->
<style>
    .v_slide {
        display:flex;
        justify-content: center;
        margin:0 auto;
        backround:#d4ecfd;
        width:100%;
        max-width:1180px;
    }
    .v_slide .left {
        padding:2.0rem 0 5.5rem 50px;
        width:50%;
        overflow-x:hidden;
        overflow-y:hidden;
        box-sizing:border-box;
    }
    .v_slide .left .swiper-wrap {
        width:100%;
        overflow-x:hidden;
    }
    .visual .v_slide .left .swiper-slide {
        padding-bottom:1.0rem;
        background:#fff;
        border-radius:1.0rem;
        overflow: hidden;
    }
    .visual .v_slide .left .swiper-slide.slogan {
        background:none;
    }
    .visual .v_slide .left .swiper-slide.slogan p {
        padding:1.0rem;
        font-size:1.75rem;
        line-height:1.65;
    }
    .visual .v_slide .left .swiper-slide a.view_area {
        display:block;
        padding:0;
    }
    .visual .v_slide .left .swiper-slide a.view_area p.empha {
        padding:0.75rem 1.25rem 0.5rem 1.25rem;
        font-size:1.125rem;
        font-weight:600;
        color:#2274c4;
        background:#f1f2f3;
    }
    .visual .v_slide .left .swiper-slide a.view_area p {
        position:relative;
        top:unset;
        left:unset;
        padding:1.0rem 1.0rem 1.0rem 1.0rem;
        font-size:1.0rem;
        line-height:1.5;
    }
    .visual .v_slide .left .swiper-slide a.more_btn {
        margin:0 auto;
        padding:0.275rem;
        width:10.0rem;
        border:1px solid #ddd;
        text-align: center;
        transition:all 0.3s;
        cursor:pointer;
    }
    .visual .v_slide .left .swiper-slide a.more_btn:hover {
        background:#444;
        color:#fff;
    }
    .v_slide .right {
        width:50%;
    }
    .v_slide .right img {
        max-width:100%;
    }
    .v_btn_wrap {
        top:calc(50% + 96px);
    }
</style>
<section class="visual k_link_box">
    <div class="selim_kakaoLink">
        <a id="kakao-link-btn" href="javascript:sendLink()">
            <img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png">
            <span>앱 추천하기</span>
        </a>
    </div>
    <div class="">
        <div class="v_slide">
            <div class="left">
                <div class="swiper-wrap">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a class="view_area" href="http://www.taxoffice.co.kr/sub/index.php?cat_no=220&boardid=info_gifttax&mode=view&idx=244&sk=&sw=&offset=&category=">
                                <div class="inner">
                                    <p class="empha">
                                        부동산 증여에 의한 취득세 과세표준이 2023년부터 달라집니다.<br>
                                    </p>
                                    <p>
                                        &nbsp;현행 지방세법에서는 증여취득 시 시가표준액으로 과세표준을 결정해왔지만 2023년부터는 증여취득시 과세표준을 시가인정액으로 하는 것으로 개정되어,
                                        2023년이후 증여취득에 대해서는 취득세 부담이 매우 커질 것으로 예상됩니다.<br><br>
                                        &nbsp;따라서, 부동산을 증여할 계획을 갖고 있으시다면 이를 고려하여 증여 계획을 세우시는 것이 좋을 것 같습니다.
                                    </p>
                                </div>
                            </a>
                            <a class="more_btn" href="http://www.taxoffice.co.kr/sub/index.php?cat_no=161&boardid=etc1&mode=view&idx=73&sk=&sw=&offset=&category=">
                                자세히 보기
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="view_area" href="http://www.taxoffice.co.kr/sub/index.php?cat_no=161&boardid=etc1&mode=view&idx=73&sk=&sw=&offset=&category=">
                                <p class="empha">
                                    민간임대주택 사업자는 12월9일 까지 부기등록하셔야 합니다.<br>
                                    <!--                민간임대주택 사업자의 부기등기 (2022.11.10.)<br>-->
                                </p>
                                <p>
                                    1. 부기의무대상자 : 민간임대주택법 제5조에 따라 시군구청장에 등록을 신청하여 등록된 모든 민간임대주택사업자(오피스텔 포함)<br>
                                    2. 시행시기 : 2020.12.10. 이후 등록한 민간임대주택은 지체 없이 등기해야 합니다.<br>
                                    다만, 시행일 이전에 등록한 민간임대주택의 경우 2022.12.09. 까지 부기등기하면 됩니다. (2년유예 기간 적용)<br>
                                    3. 위반시 제재 : 과태료 200만원 ~ 500만원 발생
                                </p>
                            </a>
                            <a class="more_btn" href="http://www.taxoffice.co.kr/sub/index.php?cat_no=161&boardid=etc1&mode=view&idx=73&sk=&sw=&offset=&category=">
                               자세히 보기
                            </a>
                        </div>
                        <div class="swiper-slide slogan">
                            <p>
                                처음부터 끝까지<span class="br"></span>
                                <strong>고객을 위하여<span class="br mo"></span> 내 가족의 일처럼,<span class="br"></span></strong>
                                세림세무법인의 이념입니다.<span class="br"></span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="right">
                <div class="img_wrap">
                    <img src="/pub/images/new/index2_img.jpg" alt="이미지"/>
                </div>
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
                <a href="/sub/?cat_no=102" class="q3">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>기장/Pay roll</span><br>
                        <span>업무의뢰</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=32" class="q1">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>회사설립<br />업무의뢰</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=139" class="q7">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>외투기업</span><br>
                        <span>업무의뢰</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=29" class="q4">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>업무보수표</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=22" class="pc_view q8">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세금이야기</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=145" class="q1">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세무실무<br>사례</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=22" class="mb_view q8">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세금이야기</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=211" class="pc_view q2">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>가업승계<br />상속·증여</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=45" class="pc_view q6">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>신축·시행사<br />업무</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=118" class="mb_view q5">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세무조사 및<br />조세불복</span>
                    </div>
                </a>

            </div>

            <div class="q_slide mo">
                <a href="/sub/?cat_no=77">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>상담센터</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=172">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>신고도우미</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=21">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>한페이지<br>세무정보</span>
                    </div>
                </a>

                <a href="https://blog.naver.com/selimtaxoffice">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>블로그</span>
                    </div>
                </a>

                <div class="inner_row">
                    <a href="/sub/?cat_no=124">
                        <div class="ir_pm q_img"></div>
                        <div class="q_txt">
                            <span>회사설립지원</span>
                        </div>
                    </a>

                    <a href="/sub/?cat_no=134">
                        <div class="ir_pm q_img"></div>
                        <div class="q_txt">
                            <span>외국인투자기업 설립지원</span>
                        </div>
                    </a>
                </div>
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




    var mySwiper = new Swiper('.v_slide .swiper-wrap',{
        spaceBetween:20,
        speed: 2000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loop: true,
        loopedSlides: 1,
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



    $(".stop").click(function(){
        if($(this).hasClass("on")){
            $(this).removeClass("on");
            mySwiper.autoplay.start();
        } else {
            $(this).addClass("on");
            mySwiper.autoplay.stop();
        }
    });

    // 메인 카카오 앱 추천
    // // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('74546251e56d8047240891a67beafc9c');
    // // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
    Kakao.Link.createCustomButton({
        container: '#kakao-link-btn',
        templateId: 32859,
        templateArgs: {
            'title': '앱 추천',
            'description': '세림세무법인 앱추천'
        }
    });

</script>

<!-- visual end -->


<!-- helper -->
<section class="helper">
    <h2 class="hidden">helper</h2>
    <div class="content_wrap">
        <div class="h_txt">
            <h3>
                <strong class="highlight">분야별 전문성</strong>을 가진<span class="br pc1112"></span>
                세림의<span class="br mo"></span> 세무사들이<span class="br pc1112"></span>
                고객님의 업무를<span class="br"></span>
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
            if($arrManagerList["total"] > 0){
                for($i=0;$i<$arrManagerList["total"];$i++){
                    $arr_cat_txt = array();
                    $arrG_cat = explode("^",$arrManagerList['list'][$i]['goods_category']);
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

                    $imgsrc[$i] = "/uploaded/board/semu/".$arrManagerList["list"][$i]["re_name"];
                    ?>
                    <li class="h_slide1">
                        <div class="img_wrap">
                            <img src="/uploaded/mngr/<?=$arrManagerList['list'][$i]['file_name']?>" style="width:100%;" alt="<?=$arrManagerList["list"][$i]["mngr_name"]?>">
                        </div>
                        <h3><?=$arrManagerList["list"][$i]["mngr_name"]?></h3>
                        <div class="in">
                            <ul>
                                <li>
                                    <div class="wr">
                                        <div class="tit no4">이메일</div>
                                        <div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:<?=$arrManagerList['list'][$i]['email']?>" style="color: #0269bf"><?=$arrManagerList['list'][$i]['email']?></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wr">
                                        <div class="tit no1">전화번호</div>
                                        <div class="text">
                                            <span style="text-decoration: underline; text-decoration-color: #0269bf;">
                                                <a href="tel:<?=$arrManagerList['list'][$i]['tel']?>"><?=$arrManagerList['list'][$i]['tel']?></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wr">
                                        <div class="tit no5">FAX</div>
                                        <div class="text"><?=$arrManagerList['list'][$i]['fax']?></div>
                                    </div>
                                </li>
                                <li class="carrier_li hidden_li">
                                    <div class="wr">
                                        <div class="tit no3">경력</div>
                                        <div class="text">
                                            <ul>
                                                <?
                                                if($arrManagerList['list'][$i]['info4'] != ""){
                                                    $arrInfo4 = explode("\n",$arrManagerList['list'][$i]['info4']);
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
                                    </div>
                                </li>
                                <li class="rnd_li hidden_li">
                                    <div class="wr">
                                        <div class="tit no3 last">연구 &<br>관심분야</div>
                                        <div class="text">
                                            <ul>
                                                <?
                                                if($arrManagerList['list'][$i]['info5'] != "" || $arrManagerList['list'][$i]['info6'] != "" || $arrManagerList['list'][$i]['info7'] != ""){
                                                    $arrInfo5 = explode("\n",$arrManagerList['list'][$i]['info5']);
                                                    $arrInfo6 = explode("\n",$arrManagerList['list'][$i]['info6']);
                                                    $arrInfo7 = explode("\n",$arrManagerList['list'][$i]['info7']);
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
                                    </div>
                                </li>
                            </ul>
                            <a class="csl_info_btn close">
                                주요정보 더보기
                            </a>
                        </div>
                        <a class="csl_go_btn" href="http://taxoffice.co.kr/sub/?cat_no=77&mngr=mngr_<?=$arrManagerList['list'][$i]['idx']?>">상담의뢰</a>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.308771736229!2d126.89701421564634!3d37.4770393370055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9e27cbc9315f%3A0xff179ce4e6e07b14!2s488%20Siheung-daero%2C%20Doksan%203(sam)-dong%2C%20Geumcheon-gu%2C%20Seoul!5e0!3m2!1sen!2skr!4v1571877696895!5m2!1sen!2skr" style="width: 100%; height: 100%; border: 0px" frameborder="0" allowfullscreen=""></iframe></div>
            <!--                <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=1cfc3fe5c4d305d777567e24223d37df"></script>-->
            <!--                <script>-->
            <!--                    var mapContainer = document.getElementById('map'), // 지도를 표시할 div -->
            <!--                    mapOption = { -->
            <!--                            center: new kakao.maps.LatLng(37.47721456710156, 126.89927261330581), // 지도의 중심좌표-->
            <!--                            level: 5 // 지도의 확대 레벨-->
            <!--                        };-->
            <!---->
            <!--                    var map = new kakao.maps.Map(mapContainer, mapOption);-->
            <!---->
            <!--                    // 커스텀 오버레이에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다-->
            <!--                    var content = '<div class="customoverlay">' +-->
            <!--                        '  <a href="http://kko.to/xOL0PMxfM" target="_blank">' +-->
            <!--                        '    <span class="title">서울특별시 금천구 시흥대로 488</span>' +-->
            <!--                        '  </a>' +-->
            <!--                        '</div>';-->
            <!---->
            <!--                    // 커스텀 오버레이가 표시될 위치입니다 -->
            <!--                    var position = new kakao.maps.LatLng(37.47721456710160, 126.89927261330581);  -->
            <!---->
            <!--                    // 커스텀 오버레이를 생성합니다-->
            <!--                    var customOverlay = new kakao.maps.CustomOverlay({-->
            <!--                        map: map,-->
            <!--                        position: position,-->
            <!--                        content: content-->
            <!--                    });-->
            <!--					customOverlay.setMap(map);-->
            <!--                </script>-->
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
include 'pub/include/footer.php';
?>
<?php
//include_once 'pub/include/popup.php';
?>

