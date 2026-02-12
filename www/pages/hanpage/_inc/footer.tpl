
		
		<!-- Footer -->
		<div class="footer">

			<div class="in">
				<div class="footNav">
					<ul>
						<li><a href="{ BASE_URL }/policy">개인정보취급방침</a></li>
						<li><a href="{ BASE_URL }/agree">이용약관</a></li>
						<li><a href="{ BASE_URL }/146">오시는 길</a></li>
						
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
	<footer id="mb_ft">
		<ul class="ft_link_list">
			<li>
				<a href="http://www.taxoffice.co.kr/" target="_self">
					<img src="{ TYPE_URL }/images/common/nav_home_off.png"/>
					<span>세림세무법인</span>
				</a>
			</li>
			<li>
				<a href="http://www.taxoffice.co.kr/542" target="_self">
					<img src="{ TYPE_URL }/images/common/nav_qna_off.png"/>
					<span>한페이지</span>
				</a>
			</li>
			<li { ? HAN_LOGO_NAME == 'taxcall_logo' }class="on"{ / }>
				<a href="http://www.taxcallcenter.com" target="_self">
					<img src="{ TYPE_URL }/images/common/nav_qna_{ ? HAN_LOGO_NAME == 'taxcall_logo' }on{ : }off{ / }.png"/>
					<span>세림 CallCenter</span>
				</a>
			</li>
		</ul>
	</footer>

	<script>
	$(function(){
		$_menu_idno = { CONTENTS['menu_idno'] };
		$_location_path = $(location).attr('pathname');
		$_menu_420 = $('.subNav.tp2 ul li.menu420');
		if ( $_menu_420.find('a').attr('href') == '/420') {
			$_menu_420.find('a').attr('href','/420/505/write?');
		}
		if ( $_menu_idno != '' && $_menu_idno == '420' && $_location_path == '/420' ) {
			location.href = '/420/505/write?';
		}
		if ( $_location_path == '/420/505' ) {
			location.href = '/419';
		}

	});
	</script>
</body>
</html>



