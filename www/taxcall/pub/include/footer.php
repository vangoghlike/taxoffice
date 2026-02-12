
    <!-- footer -->
    <footer>
        <h2 class="hidden">footer</h2>
        <div class="footer_customer">
            <div class="content_wrap">
                <div class="customer_left">
                    <h3>고객센터</h3>
                    <a href="tel:028542100">02-854-2100<span>(1본부)</span></a>
                    <a href="tel:025012155">02-501-2155<span>(2본부)</span></a>
                    <p>월~금요일 09:00~18:00 ｜ 토,일요일, 공휴일 휴무</p>
                </div>
                <div class="customer_right">
                    <a href="/taxcall/sub/?cat_no=1">세무상담<br/><span>바로가기</span></a>
                    <a href="/taxcall/sub/?cat_no=11">신고도움서비스<br/><span>바로가기</span></a>
                    <a href="/taxcall/sub/?cat_no=4">한페이지 세무상담<br/><span>바로가기</span></a><?//   원래주소:  /sub/onepage.php?>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="f_btm_top">
                <div class="content_wrap">
                    <ul class="footer_nav">
                        <li><a href="/taxcall/sub/policy.php">개인정보처리방침</a></li>
                        <li><a href="/taxcall/sub/agree.php">이용약관</a></li>
                        <li><a href="/taxcall/sub/?cat_no=55">업무 의뢰</a></li>
                    </ul>
                    <div class="footer_sns">
                        <a id="kakao-link-btn2" href="javascript:void(0)" class="ir_pm">kakao</a>
                        <a href="https://blog.naver.com/selimtaxoffice" target="_blank" class="ir_pm">blog</a>
                    </div>
                   <div class="foot_family_box">
						<ul class="foot_family_top">
							<li>패밀리사이트 <img src="/pub/images/foot_arrow.png"/></li>
						</ul>
						<ul class="foot_family_inner">
							<a href="http://www.taxoffice.co.kr/" target=""><li>세림세무법인 국문</li></a>
							<a href="http://www.etaxoffice.co.kr/" target=""><li>세림세무법인 영문</li></a>
							<a href="/"><li>한페이지 세무정보</li></a>
<!--							<a href="http://www.han-page.co.kr/hanpage/sub/?cat_no=1"><li>한페이지</li></a>-->
						</ul>
					</div>
                    <p>
                        법인명 : 세림세무법인 ｜ 대표자 : 김창진 ｜ 개인정보보호책임자 : 강삼엽<span class="br mo"></span><span class="pc1112"> ｜ </span>주소 : 서울시 금천구 시흥대로 488
                        (독산동) 혜전빌딩 701호<span class="br"></span>
                        대표번호 : 02-854-2100 ｜ 팩스 : 02-854-2120 ｜ 고객센터 : 02-854-3311<span class="br mo"></span><span class="pc1112">｜</span> 문의 :
                        taxmgt10@taxemail.co.kr ｜ 사업자번호 : 119-86-94621<span class="br mo"></span><span class="pc1112"> ｜</span>통신판매업신고 : 제
                        2012-서울금천-0062호<span class="br"></span>
                        COPYRIGHT©2017 SELIM TAX. ALL RIGHTS RESERVED.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- pc_aside -->
    <nav class="aside">
        <h2 class="hidden">quick_nav</h2>
        <ul>
            <li class="pc1112"><a href="/taxcall/sub/?cat_no=1"><img src="/pub/images/quick_btn1.png" alt="세무상담"><br><span>세무 상담</span></a></li>
            <li class="pc1112"><a href="/taxcall/sub/?cat_no=11"><img src="/pub/images/quick_btn3.png" alt="신고도움서비스"><br><span>신고도움<br>서비스</span></a></li>
            <li class="pc1112"><a style="cursor:pointer;" href="/taxcall/sub/?cat_no=4"><img src="/pub/images/quick_btn2.png" alt="한페이지"><br><span>한페이지</span></a></li><?///주소 : /sub/onepage.php?>
<!--            <li class="pc1112"><a href="http://www.taxoffice.co.kr/sub/tax4.php"><img src="/pub/images/quick_btn3.png" alt="보수결제"><br><span>보수결제</span></a></li>-->
            <li class="mo"><a href="/"><span class="img"><img src="/pub/images/mo_quick3.png" alt="홈"></span>홈</a></li>
            <li class="mo"><a href="/taxcall/sub/?cat_no=1"> <span class="img"><img src="/pub/images/mo_quick.png" alt="세무상담"/></span>세무 상담</a></li>
            <li class="mo"><a href="/taxcall/sub/?cat_no=11"><span class="img"><img src="/pub/images/mo_quick.png" alt="신고도움센터"/></span>신고 도움</a></li>
            <li class="mo"><a style="cursor:pointer;" href="/taxcall/sub/?cat_no=4"><span class="img"><img src="/pub/images/mo_quick2.png" alt="한페이지"/></span>한페이지</a></li><?///주소 : /sub/onepage.php?>
			<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
            <li class="mo"><a href="/module/member/logout.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="마이페이지"></span>로그아웃</a></li>
			<?}else{?>
			<li class="mo"><a href="/taxcall/member/login.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="마이페이지"></span>로그인</a></li>
			<?}?>
        </ul>
    </nav>
    <!-- pc_aside end -->
    <a href="javascript:void(0);" class="topbtn_new">TOP</a>

    <?if($_REQUEST["cat_no"] == 1 || $_REQUEST["cat_no"] == 11 || $_REQUEST["cat_no"] == 16 || $_REQUEST["cat_no"] == 21 || $_REQUEST["cat_no"] == 26 ||
    $_REQUEST["cat_no"] == 30 || $_REQUEST["cat_no"] == 35 ){?>
        <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
        <script type='text/javascript'>
            // // 사용할 앱의 JavaScript 키를 설정해 주세요.
            Kakao.init('272cae537887a87a3ad0bcd33aa4c9a2');
            Kakao.Link.createCustomButton({
                container: '#kakao-link-btn2',
                templateId: 62511,
                templateArgs: {
                    'title': '한페이지 세무정보 앱 추천',
                    'description': '한페이지 세무정보 앱 추천'
                }
            });
            //]]>
        </script>
    <?php } else { ?>
        <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
        <script type='text/javascript'>
            // // 사용할 앱의 JavaScript 키를 설정해 주세요.
            Kakao.init('272cae537887a87a3ad0bcd33aa4c9a2');
            <?php
            if ( defined('PAGE') == 'INDEX' ) {
            ?>
            Kakao.Link.createCustomButton({
                container: '#kakao-link-btn',
                templateId: 62511,
                templateArgs: {
                    'title': '한페이지 세무정보 앱 추천',
                    'description': '한페이지 세무정보 앱 추천'
                }
            });
            Kakao.Link.createCustomButton({
                container: '#kakao-link-btn2',
                templateId: 62511,
                templateArgs: {
                    'title': '한페이지 세무정보 앱 추천',
                    'description': '한페이지 세무정보 앱 추천'
                }
            });
            <?php
            }
            ?>
            Kakao.Link.createCustomButton({
                container: '#kakao-link-btn2',
                templateId: 62511,
                templateArgs: {
                    'title': '한페이지 세무정보 앱 추천',
                    'description': '한페이지 세무정보 앱 추천'
                }
            });
            //]]>
        </script>
    <?php } ?>

</body>
</html>