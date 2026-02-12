{ #header }

	<!-- Wrap -->
	<div class="wrap">

		<!-- Head -->
		<div class="head">
			<div class="mainHeader">
				<h1><a href="{BASE_URL}/"><img src="{TYPE_URL}/images/h1Logo.png" alt="세림법무법인"></a></h1>
				<div class="btnLogout">
					{ ? USERINFO['user_id'] }<a href="#" class="act_logout"><span>로그아웃</span></a>{ : }<a href="{BASE_URL}/login"><span>로그인</span></a>{ / }
				</div>
			</div>
		</div>
		<!-- //Head -->


		<!-- Container -->
		<div class="container" id="container">

			<!-- mainSlide -->
			<div class="mainSlide"><a href="/">

				<div class="swiper-container">
					<div class="swiper-wrapper">
					{ @ S_BANNER[1] }
						<div class="swiper-slide">{ .contents }</div>
					{ / }
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
				</div>

			</a>

				<div class="selim_hanpageLink">
					<a id="hanpage-link-btn" href="http://www.han-page.co.kr/406">
{*						<img src="/pages/default/images/ico/qna_icon.png" alt="qna">*}
						<span>Han Page 세무정보</span>
					</a>
				</div>

				<!-- kakao -->
				<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
				<div class="selim_kakaoLink">
					<a id="kakao-link-btn" href="javascript:sendLink()">
						<img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png"/>
						<span>앱 추천하기</span>
					</a>
				</div>
				<script type='text/javascript'>
					//<![CDATA[
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
				<!-- // kakao -->
			
			</div>
			<!-- //mainSlide -->



			<div class="grayBg">

				<!-- mainBigLink -->
				<div class="mainBigLink">
					<ul>
					{ @ range(1,4) }
						<li class="no{ .index_ }">
							{ S_CONTENTS[.value_]['CONT'] }
						</li>
					{ / }
					</ul>
				</div>
				<!-- //mainBigLink -->


				<!-- mainLink -->
				<div class="mainLink">
					<div class="tit">이용가이드</div>
					<ul>
						
						<li class="no2">
							<a href="{BASE_URL}/153">
								<img src="{TYPE_URL}/images/doc.png" alt="보수안내" />
								<span>보수안내</span>
							</a>
						</li>
						<li class="no1">
							<a href="{BASE_URL}/calc">
								<img src="{TYPE_URL}/images/cal.png" alt="계산기" />
								<span>보수계산</span>
							</a>
						</li>
						<li class="no4">
							<a href="{BASE_URL}/tax4">
								<img src="{TYPE_URL}/images/wal.png" alt="보수결제" />
								<span>보수결제</span>
							</a>
						</li>

						<li class="no3">
							<a href="{BASE_URL}/111">
								<img src="{TYPE_URL}/images/qna.png" alt="이용문의" />
								<span>이용문의</span>
							</a>
						</li>
						
					</ul>
				</div>
				<!-- //mainLink -->

			</div>

		</div>
		<!-- //Container -->



{ #footer }

	</div>
	<!-- //Wrap -->
	<div class="loader_back">
		<div class="loader_box">
			<div class="loader_dot">
				&nbsp;
			</div>
		</div>
	</div>

</body>
</html>
