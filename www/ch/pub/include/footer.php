
    <!-- footer -->
    <footer>
        <h2 class="hidden">footer</h2>
		<!--
        <div class="footer_customer">
            <div class="content_wrap">
                <div class="customer_left">
                    <h3>Contact Us</h3>
                    <a href="tel:028542100">02-854-2100<span>(Department 1)</span></a>
                    <a href="tel:025012155">02-501-2155<span>(Department 2)</span></a>
                    <p>Monday - Friday | Closed on weekends and holidays</p>
                </div>
                <div class="customer_right">
                    <a href="/eng/sub/?cat_no=77">상담센터<span>바로가기</span></a>
                    <a href="/eng/sub/?cat_no=173">신고도움서비스<span>바로가기</span></a>
                    <a href="/eng/sub/?cat_no=32">업무의뢰<span>바로가기</span></a>
                    <a href="javascript:alert('준비중입니다.');">한페이지<span>바로가기</span></a><?//   원래주소:  /sub/onepage.php?>
                </div>
            </div>
        </div>
		 -->
        <div class="footer_bottom">
            <div class="f_btm_top">
                <div class="content_wrap">
                    <ul class="footer_nav">
                        <li><a href="/eng/sub/?cat_no=12">关于我们</a></li>
                        <!--<li><a href="/eng/sub/?cat_no=72">소통공간</a></li>-->
                        <li><a href="/eng/sub/?cat_no=8">Privacy Notice</a></li>
                        <li><a href="/eng/sub/?cat_no=9">Terms and Conditions</a></li>
                        <!--<li class="mo_footer"><a href="/sub/tax4.php">보수결제</a></li>
                        <li class="mo_footer"><a href="/mypage/pay.php">내 결제정보</a></li>-->
                        <li><a href="/eng/sub/report.php">Report Home Error</a></li>
                    </ul>
                    <div class="footer_sns">
                        <a id="kakao-link-btn" href="javascript:sendLink();" class="ir_pm">kakao</a>
                        <a href="https://blog.naver.com/selimtaxoffice" class="ir_pm">blog</a>
                    </div>
                   <div class="foot_family_box">
						<ul class="foot_family_top">
							<li>FAMILY SITE<img src="/pub/images/foot_arrow.png"/></li>
						</ul>
						<ul class="foot_family_inner">
							<a href="http://www.taxoffice.co.kr/" target=""><li>SELIM KOREAN</li></a>
							<a href="/" target=""><li>SELIM ENGLISH</li></a>
							<a href="http://www.taxcallcenter.com/"><li>CALL CENTER</li></a>
							<a href="http://www.han-page.co.kr/hanpage/sub/?cat_no=1"><li>HAN-PAGE</li></a>
						</ul>
					</div>
                    <p>
<!--                         법인명 : 세림세무법인 ｜ 대표자 : 김창진 ｜ 개인정보보호책임자 : 최유정<span class="br mo"></span><span class="pc1112"> ｜ </span>주소 : 서울시 금천구 시흥대로 488
                        (독산동) 혜전빌딩 701호<span class="br"></span>
                        대표번호 : 02-854-2100 ｜ 팩스 : 02-854-2120 ｜ 고객센터 : 02-854-3311<span class="br mo"></span><span class="pc1112">｜</span>
                        						문의 : taxmgt10@taxemail.co.kr ｜ 사업자번호 : 119-86-94621<span class="br mo"></span><span class="pc1112"> ｜</span>
                        						통신판매업신고 : 제2012-서울금천-0062호<span class="br"></span>
                        COPYRIGHT©2017 SELIM TAX. ALL RIGHTS RESERVED. -->

						Company Name: Selim Tax & Accouting Firm ｜ Representative: Chang Jin Kim ｜ Privacy Officer: Yoo Jung Choi ｜ Address: Rm701, Heajeon bldg, 488 Siheung-daero, Geumcheon-gu, Seoul
						Company Number: 02-854-2100 ｜ Fax: 02-854-2120 ｜ Customer Care: 02-854-3311｜ Email: taxmgt10@taxemail.co.kr ｜ Business Number: 119-869-4621 ｜Mail-order Business No.: 제 2012-서울금천-0062호
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
            <!--<li class="pc1112"><a href="/eng/sub/?cat_no=77"><img src="/pub/images/quick_btn1.png" alt="상담센터"><br><span>Consultation</span></a></li>-->
<!--            <li class="pc1112" onclick="alert('Coming Soon')"><a style="cursor:pointer;"><img src="/pub/images/quick_btn2.png" alt="한페이지"><br><span>Tax<br> Insights</span></a></li>--><?/////주소 : /sub/onepage.php?>
            <li class="pc1112"><a href="http://www.taxoffice.co.kr/sub/tax4.php"><img src="/pub/images/quick_btn3.png" alt="Payment"><br><span>Payment</span></a></li>
            <li class="pc1112"><a href="/eng/mypage/user_info.php"><img src="/eng/pub/images/quick_btn4.png" alt="마이페이지"><br><span>My Page</span></a></li>
            <li class="mo"><a href="/"><span class="img"><img src="/eng/pub/images/mo_quick3.png" alt="Home"></span>Home</a></li>
            <li class="mo"><a href="/eng/sub/?cat_no=12"><span class="img"><img src="/pub/images/mo_quick.png" alt="About Us"></span>About Us</a></li>
            <li class="mo"><a href="http://www.taxoffice.co.kr/sub/tax4.php"><span class="img"><img src="/pub/images/quick_btn3.png" alt="Payment"></span>Payment</a></li>
            <li class="mo"><a href="/eng/mypage/user_info.php"><span class="img"><img src="/pub/images/mo_quick2.png" alt="MyPage"></span>My Page</a></li>
			<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
				<li class="mo"><a href="/module/member/eng_logout.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="Logout"></span>Logout</a></li>
			<?}else{?>
				<li class="mo"><a href="/eng/member/login.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="Login"></span>Login</a></li>
			<?}?>
        </ul>
    </nav>
    <!-- pc_aside end -->
    <a href="javascript:void(0);" class="topbtn_new">TOP</a>
	<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
	<script type='text/javascript'>
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
	//]]>
	</script>
</body>
</html>