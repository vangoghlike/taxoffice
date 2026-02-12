<!-- visual -->
<section class="visual k_link_box one_row_visual">
    <div class="selim_kakaoLink">
        <a id="kakao-link-btn" href="javascript:sendLink()">
            <img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png">
            <span>앱 추천하기</span>
        </a>
    </div>
    <div class="">
        <div class="v_slide">
            <div class="swiper-wrapper">
                <div class="swiper-slide notice_wrap">
                    <a class="view_area" href="/sub/?cat_no=327">
                        <div class="inner">
                            <p class="empha">
                                종합부동산세 정리 (2024)
                            </p>
                            <p>
                                - 종합부동산세 정의 및 특징<br/>
                                - 납세 정의<br/>
                                - 과세 표준
                                <br/>
                                <br/>
                            </p>

                            <span class="more_btn">
                                자세히 보기
                            </span>
                        </div>
                    </a>
<!--                    <a class="more_btn" href="/sub/index.php?cat_no=221&boardid=revisedtaxlaw&mode=view&idx=22&sk=&sw=&offset=&category=">-->
<!--                        자세히 보기-->
<!--                    </a>-->
<!--                    <img class="absol_img" src="/pub/images/main/budget.png" alt="이미지"/>-->
                </div>
                <div class="swiper-slide notice_wrap">
                    <a class="view_area" href="/sub/index.php?cat_no=22&boardid=Column&mode=view&idx=424&sk=&sw=&offset=&category=">
                        <div class="inner">
                            <p class="empha">
                                실질적 절세를 위한 가업승계 요건
                            </p>
                            <p>
                                - 가업승계 증여 및 창업자금의 증여 특례<br/>
                                - 가업승계 상속<br/>
                                <br/>
                                <br/>
                            </p>

                            <span class="more_btn">
                                자세히 보기
                            </span>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide notice_wrap">
                    <a class="view_area" href="/sub/?cat_no=280">
                        <div class="inner">
                            <p class="empha">
                                세율표
                            </p>
                            <p>
                                <span style="width:100px; display: inline-block;">
                                    1. 법인세율
                                </span>&nbsp;&nbsp;
                                <span style="width:100px; display: inline-block;">
                                    2. 소득세율
                                </span>
                                <br/>
                                <span style="width:100px; display: inline-block;">
                                    3. 양도소득세율
                                </span>&nbsp;&nbsp;
                                <span style="width:100px; display: inline-block;">
                                    4. 상속증여세율
                                </span>
                                <br/>
                                5. 지방세(취득세율)
                                <br>
                                <br>
                            </p>

                            <span class="more_btn">
                                자세히 보기
                            </span>
                        </div>

                    </a>
                    <!--                    <a class="more_btn" href="/sub/index.php?cat_no=221&boardid=revisedtaxlaw&mode=view&idx=22&sk=&sw=&offset=&category=">-->
                    <!--                        자세히 보기-->
                    <!--                    </a>-->
                    <!--                    <img class="absol_img" src="/pub/images/main/budget.png" alt="이미지"/>-->
                </div>
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
                                <img src="<?=$pcImg[$i]?>" class="pc_vw pc_mv">
                                <img src="<?=$moImg[$i]?>" class="mo_vw mo_mv">
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
                        <div class="num all" id="all_number">0<?=($bannerTotal+3)?></div>
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

                <a href="/sub/?cat_no=280" class="q1">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세율표</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=22" class="pc_view q8">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세금이야기</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=22" class="mb_view q8">
                    <div class="ir_pm q_img"></div>
                    <div class="q_txt">
                        <span>세금이야기</span>
                    </div>
                </a>

                <a href="/sub/?cat_no=240" class="pc_view q2">
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