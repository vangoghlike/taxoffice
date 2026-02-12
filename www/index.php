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

$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

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

//echo mb_convert_encoding('335f5a824b3ba309', 'ISO-8859-7', 'UTF-8');

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
<?php
if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
    include_once 'pub/include/index.slide.mobile.php';
    $_pnm_class = 'mb';
} else {
    include_once 'pub/include/index.slide.pc.php';
    $_pnm_class = 'pc';
}
?>


    <!-- helper -->
    <section class="helper <?=$_pnm_class?>">
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
                <li class="h_slide1">
                    <div class="img_wrap">
                        <img src="/pub/images/main2_sld/main2_sld1.png" alt="상담">
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=77">
                                            세무 상담
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=172">
                                            신고도움서비스
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=21">
                                            한페이지 세무정보
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="h_slide1">
                    <div class="img_wrap">
                        <img src="/pub/images/main2_sld/main2_sld2.png" alt="기장자문">
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=102">
                                            기장자문 업무
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=107">
                                            아웃소싱 업무
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=113">
                                            자문 업무
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="h_slide1">
                    <div class="img_wrap">
                        <img src="/pub/images/main2_sld/main2_sld3.png" alt="회사설립지원">
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=124">
                                            회사설립 지원
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=128">
                                            법인 설립 지원
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=255">
                                            합병분할 업무
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="h_slide1">
                    <div class="img_wrap">
                        <img src="/pub/images/main2_sld/main2_sld4.png" alt="외국인투자">
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=134">
                                            외국인투자기업 설립지원
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/sub/?cat_no=260">
                                            한국의 투자 환경
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
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
if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
    include_once 'pub/include/popup.php';
}

include_once 'pub/include/popup.newyear.php';
?>

