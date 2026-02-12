<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_fdi_eng.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/banner/banner.lib.php");

$dblink = SetConn($_conf_db["main_db"]);
	$arrSemuList = getBoardListBaseNFile("semu", "", "", "", 0, 0, 0);
	$arrPCBannerList = getMainBannerList("3");
	$arrMOBannerList = getMainBannerList("4");
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

<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/header.php";?>


<script>
	function getBoardAjax(boardid){
		if(boardid != ""){
			$.get("/module/board/ajax_main_eng_info.php",{boardid:boardid},function(result){
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
            <ul class="h_slide">
                <li class="h_slide1">
                    <div class="img_wrap">
                        <div class="inner">
                            <img src="/pub/images/main2_sld/main2_sld1.png" alt="상담">
                            <div class="type-label">
<!--                                Foreign-Invested<br/>-->
<!--                                Company-->
                                FDI
                            </div>
                        </div>
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=68">
                                            Consultation
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=75">
                                            Docs Support / Docs Guide
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=32">
                                            Investment Reporting
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=60">
                                            Incorporation
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=43">
                                            Biz Registration
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=22">
                                            Bank Account
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=51">
                                            Tax Support
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
<!--                                Domestic Branch,<br/>-->
<!--                                or Liaison Office of a Foreign Corporation-->
                                Branch &<br/>
                                Liaison Office
                            </div>
                        </div>
                    </div>
                    <div class="in">
                        <ul>
                            <li>
                                <div class="wr">
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=72">
                                            Consultation
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=27">
                                            Docs Support / Docs Guide
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=36">
                                            Investment Reporting
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=40">
                                            Incorporation
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=46">
                                            Biz Registration
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=23">
                                            Bank Account
                                        </a>
                                    </div>
                                    <div class="link_wrap">
                                        <a href="/fdi_eng/sub/?cat_no=54">
                                            Tax Support
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

            <div class="h_txt">
                <h3>
                    <div class="tt"><strong class="highlight">One Stop Service</strong></div>
                </h3>

                <div class="desc">
                    <strong>Your gateway to business in Korea.</strong>
                </div>
                <div class="desc">
                    From first consultation to registration and ongoing operations,<br/>
                    we support foreign investors at every step.<br/><br/><br/>
                </div>
                <div class="h_btn">
                    <div class="h_prev"></div>
                    <div class="h_next"></div>
                </div>
            </div>
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
					Address: Rm601 and Rm701, Heajeon bldg,<br />
					488 Siheung-daero, Geumcheon-gu, Seoul, Korea<br />
					Directions: Transfer Stop at Exit 1 of Line 2 Guro Digital Complex <br />
					-> One more stop to Doksandong Gogae <br />
					Bus: Seoul Bus 5621 / Public Light Bus 6<br />
					Phone: 02-854-2100<br />
					Fax: 02-854-2120<br />
                </p>
            </div>
        </div>
    </section>
    <!-- contact end -->
	<script>
		getBoardAjax('en_latest');
	</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/footer.php";
?>
