
    <!-- footer -->
    <footer>
        <h2 class="hidden">footer</h2>
        <div class="footer_customer">
            <div class="content_wrap">
                <div class="customer_left">
                    <h3>고객센터</h3>
                    <a href="tel:028542100">02-854-2100<span>(1본부)</span></a>
                    <a href="tel:025012155">02-501-2155<span>(2본부)</span></a>
                    <p>월~금요일 09:00~18:00<br><small style="display:block; color:#787878; margin-bottom:4px;">(점심시간 : 12:00 - 13:00)</small>토,일요일, 공휴일 휴무</p>
                </div>
                <div class="customer_right">
                    <a href="http://www.han-page.co.kr/taxcall/sub/?cat_no=1">세무상담<br/><span>바로가기</span></a>
                    <a href="http://www.han-page.co.kr/taxcall/sub/?cat_no=13">신고 도움<br/><span>바로가기</span></a>
                    <a href="https://www.taxoffice.co.kr/sub/?cat_no=21">한페이지 <br class="print_br"/>세무상담<br/><span>바로가기</span></a><?//   원래주소:  /sub/onepage.php?>
                    <a href="https://www.taxoffice.co.kr/sub/?cat_no=102">업무의뢰<br/><span>바로가기</span></a>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="f_btm_top">
                <div class="content_wrap">
                    <ul class="footer_nav">
                        <li><a href="/fdicenter/sub/?cat_no=69">법인소개</a></li>
                        <li><a href="/fdicenter/sub/?cat_no=74">소통공간</a></li>
                        <li><a href="/fdicenter/sub/policy.php">개인정보처리방침</a></li>
                        <li><a href="/fdicenter/sub/agree.php">이용약관</a></li>
                    </ul>
                    <div class="footer_sns">
                        <a id="kakao-link-btn2" href="javascript:sendLink()" class="ir_pm">kakao</a>
                        <a href="https://blog.naver.com/selimtaxoffice" target="_blank" class="ir_pm">blog</a>
                    </div>
                   <div class="foot_family_box">
						<ul class="foot_family_top">
							<li>패밀리사이트 <img src="/pub/images/foot_arrow.png"/></li>
						</ul>
						<ul class="foot_family_inner">
							<a href="http://taxoffice.co.kr/" target=""><li>세림세무법인 국문</li></a>
							<a href="http://etaxoffice.co.kr/" target=""><li>세림세무법인 영문</li></a>
							<a href="http://han-page.co.kr/"><li>한페이지 세무정보</li></a>
<!--							<a href="http://www.taxcall.co.kr/taxcall/sub/?cat_no=4"><li>한페이지</li></a>-->
						</ul>
					</div>
                    <p>
                        법인명 : 세림세무법인 ｜ 대표자 : 김창진 ｜ 개인정보보호책임자 : 강삼엽<span class="br mo"></span><span class="pc1112"> ｜ </span>주소 : 서울시 금천구 시흥대로 488
                        (독산동) 혜전빌딩 701호<span class="br"></span>
                        대표번호 : 02-854-2100 ｜ 팩스 : 02-854-2120 ｜ 고객센터 : <a href="tel:02-854-2133">02-854-2133</a><span class="br mo"></span><span class="pc1112">｜</span> 문의 :
                        <a href="mailto:sykang@taxemail.co.kr">sykang@taxemail.co.kr</a> ｜ 사업자번호 : 119-86-94621<span class="br mo"></span><span class="pc1112"> ｜</span>통신판매업신고 : 제
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
            <li class="pc1112"><a href="http://www.han-page.co.kr/taxcall/sub/?cat_no=1"><img src="/pub/images/quick_btn1.png" alt="세무상담"><br><span>세무상담</span></a></li>
            <li class="pc1112"><a href="http://www.han-page.co.kr/taxcall/sub/?cat_no=13"><img src="/pub/images/quick_btn3.png" alt="신고도움센터"><br><span>신고 도움</span></a></li>
            <li class="pc1112"><a style="cursor:pointer;" href="https://www.taxoffice.co.kr/sub/?cat_no=21"><img src="/pub/images/quick_btn2.png" alt="한페이지"><br><span>한페이지<br>세무정보</span></a></li><?///주소 : /sub/onepage.php?>
<!--            <li class="pc1112"><a href="/mypage/mypage.php"><img src="/pub/images/quick_btn4.png" alt="마이페이지"><br><span>마이페이지</span></a></li>-->
<!--            <li class="pc1112"><a href="http://pf.kakao.com/_xmWxjnj/chat"><img src="/pub/images/quick_btn5.png" alt="마이페이지"><br><span>카카오 문의</span></a></li>-->
            <li class="mo"><a href="/"><span class="img"><img src="/pub/images/mo_quick3.png" alt="마이페이지"></span>홈</a></li>
            <li class="mo"><a href="/fdicenter/sub/?cat_no=69"><span class="img"><img src="/pub/images/mo_quick.png" alt="마이페이지"></span>법인 소개</a></li>
            <li class="mo"><a href="https://www.taxoffice.co.kr/sub/tax4.php"><span class="img"><img src="/pub/images/quick_btn3.png" alt="마이페이지"></span>보수 결제</a></li>
            <li class="mo"><a href="https://www.taxoffice.co.kr/mypage/pay.php"><span class="img"><img src="/pub/images/mo_quick2.png" alt="마이페이지"></span>내 결제정보</a></li>
			<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
            <li class="mo"><a href="/module/member/logout.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="마이페이지"></span>로그아웃</a></li>
			<?}else{?>
			<li class="mo"><a href="/fdicenter/member/login.php"><span class="img"><img src="/pub/images/quick_btn4.png" alt="마이페이지"></span>로그인</a></li>
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
		// Kakao.Link.createCustomButton({
		// 	container: '#kakao-link-btn',
		// 	templateId: 32859,
		// 	templateArgs: {
		// 		'title': '앱 추천',
		// 		'description': '세림세무법인 앱추천'
		// 	}
		// });

		Kakao.Link.createCustomButton({
			container: '#kakao-link-btn2',
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