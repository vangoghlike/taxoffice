		<!-- Footer -->
		<div class="footer">
			<div class="in">
				<div class="footNav">
					<ul>
{*						<li><a href="http://192.168.0.190/"><strong>NAS</strong></a></li>*}
						<li><a href="{ BASE_URL }/policy">개인정보취급방침</a></li>
						<li><a href="{ BASE_URL }/agree">이용약관</a></li>
						<li><a href="{ BASE_URL }/16">오시는 길</a></li>
						<li><a href="{ BASE_URL }/194">홈페이지 오류 신고</a></li>
{*						<li><a href="{ BASE_URL }/tax4">보수결제</a></li>*}
{*						<li><a href="{ BASE_URL }/rsorder">내결제정보</a></li>*}
					</ul>
				</div>
				<div class="addWrap">
				법인명 : 세림세무법인   주소 : 서울시 금천구 시흥대로 488(독산동)혜전빌딩 701호  ｜  대표자 : 김창진 <br />
				개인정보보호책임자 : 최유정 ｜ 대표번호 : 02-854-2100  ｜  팩스 : 02-854-2120  ｜  고객센터 : 02-854-3311  ｜  문의 : taxmgt10@taxemail.co.kr   <br />
				사업자번호 : 119-86-94621 ｜  통신판매업신고 : 제 2012-서울금천-0062호  ｜  COPYRIGHT©2017 SELIM TAX. ALL RIGHTS RESERVED.
				</div>
			</div>
		</div>
		<!-- //Footer -->

	</div>
	<!-- //Wrap -->
	<div id="qmenu" class="qmenu">
		<img src="{ TYPE_URL }/images/common/qm_top.jpg"/>
		<a href="{ BASE_URL }217">
			<i class="fa fa-phone"></i>
			상담센터
		</a>
		<a href="{ BASE_URL }/205">
			<i class="fa fa-user-circle"></i>
			기장상담문의
		</a>
		<a href="{ BASE_URL }/20">
			<i class="fa fa-table"></i>
			업무보수표
		</a>
		<a href="{ BASE_URL }/335">
			<i class="fa fa-image"></i>
			세림 웹진
		</a>
		<a href="{ BASE_URL }/542" target="_self">
			<i class="fa fa-question"></i>
			한페이지<br>
			세금세무질문
		</a>
		<div class="info">
			<span>
				<i class="fa fa-phone"></i>&nbsp;고객센터<br>
			</span>
			<strong>
				02-854-3311
			</strong>
		</div>
		<a id="top">
			△ TOP
		</a>
	</div>

	<footer id="mb_ft">
		<ul class="ft_link_list">
			<li { ? MENU_PAGE_NAME != 'rsorder' && MENU_PAGE_NAME != 'tax4' && MENU_PAGE_NAME != 'mypage'  }class="on"{ / }>
				<a href="http://www.taxoffice.co.kr/" target="_self">
					<img src="{ TYPE_URL }/images/common/nav_home_{ ? MENU_PAGE_NAME != 'rsorder' && MENU_PAGE_NAME != 'tax4' && MENU_PAGE_NAME != 'mypage'  }on{ : }off{ / }.png"/>
					<span>홈</span>
				</a>
			</li>
			<li { ? MENU_PAGE_NAME == 'tax4' }class="on"{ / }>
			<a href="{ BASE_URL }/tax4" target="_self">
				<img src="{ TYPE_URL }/images/common/nav_qna_{ ? MENU_PAGE_NAME == 'tax4' }on{ : }off{ / }.png"/>
				<span>보수결제</span>
			</a>
			</li>
			<li { ? MENU_PAGE_NAME == 'rsorder' }class="on"{ / }>
			<a href="{ BASE_URL }/rsorder" target="_self">
				<img src="{ TYPE_URL }/images/common/nav_qna_{ ? MENU_PAGE_NAME == 'rsorder' }on{ : }off{ / }.png"/>
				<span>내결제정보</span>
			</a>
			</li>
			{ ? USERINFO['user_id'] == '' }
			<li { ? MENU_PAGE_NAME == 'login' }class="on"{ / }>
			<a href="{ BASE_URL }/login" target="_self">
				<img src="{ TYPE_URL }/images/common/nav_qna_{ ? MENU_PAGE_NAME == 'login' }on{ : }off{ / }.png"/>
				<span>로그인</span>
			</a>
			</li>
			{ : }
			<li { ? MENU_PAGE_NAME == 'mypage' }class="on"{ / }>
			<a href="{ BASE_URL }/mypage" target="_self">
				<img src="{ TYPE_URL }/images/common/nav_qna_{ ? MENU_PAGE_NAME == 'mypage' }on{ : }off{ / }.png"/>
				<span>마이페이지</span>
			</a>
			</li>
			{ / }
		</ul>
	</footer>
</body>
</html>



