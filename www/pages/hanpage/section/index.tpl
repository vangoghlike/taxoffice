{ #header }
		<!-- Container -->
		<div class="container" id="container">
			<div class="mainSlide { ? HAN_LOGO_NAME == 'taxcall_logo' }main_taxcall_slide{ / }">
				<div class="in">
					<ul { ? HAN_LOGO_NAME == 'taxcall_logo' }class="taxcall_slide"{ / }>
					{ ? HAN_LOGO_NAME == 'hanpage_logo' }
						{ @ S_BANNER[1] }
						<li>{ .contents }</li>
						{ / }
					{ : HAN_LOGO_NAME == 'taxcall_logo' }
						{ @ S_BANNER[2] }
						<li>{ .contents }</li>
						{ / }
					{ / }
					</ul>
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
					// // 사용할 앱의 JavaScript 키를 설정해 주세요.
					Kakao.init('272cae537887a87a3ad0bcd33aa4c9a2');
					// // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
					Kakao.Link.createCustomButton({
						container: '#kakao-link-btn',
						templateId: 62511,
						templateArgs: {
							'title': '앱 추천',
							'description': '세림콜센터 앱추천'
						}
					});
					//]]>
				</script>
				<!-- // kakao -->
			</div>

			<!-- mainContent -->
			<div class="mainContent">
				<!-- infoList -->
				<div class="infoList">
					{ ? HAN_LOGO_NAME == 'hanpage_logo' }
					<ul>
						{ @ range(1,6) }
						<li>{ S_CONTENTS[.value_]['CONT'] }</li>
						{ / }
					</ul>
					{ : HAN_LOGO_NAME == 'taxcall_logo' }
					<ul class="taxcall_infoList">
						{ @ range(7,9) }
						<li>{ S_CONTENTS[.value_]['CONT'] }</li>
						{ / }
					</ul>
					{ / }
				</div>
				<!-- //infoList -->
			
				<!-- top quick area -->
				<div class="quick-area" style="display: none;">
					<section class="quick-sec">
						<div class="quick-sec__board">
							<a class="qsb__wrap">
								<h3>Q&A</h3>
								<p>세금에 대한 질문을 물어보세요
								</p>
							</a>
						</div>

						<div class="quick-sec__board">
							<a class="qsb__wrap">
								<h3>Q&A</h3>
								<p>세금에 대한 질문을 물어보세요
								</p>
							</a>
						</div>

						<div class="quick-sec__board">
							<a class="qsb__wrap">
								<h3>Q&A</h3>
								<p>세금에 대한 질문을 물어보세요
								</p>
							</a>
						</div>

						<div class="quick-sec__board">
							<a class="qsb__wrap">
								<h3>Q&A</h3>
								<p>세금에 대한 질문을 물어보세요
								</p>
							</a>
						</div>

						<div class="quick-sec__board">
							<a class="qsb__wrap">
								<h3>Q&A</h3>
								<p>세금에 대한 질문을 물어보세요
								</p>
							</a>
						</div>

					</section>
				</div>
				<!-- // top quick area -->

				<!-- qna quick area -->
				<div class="qna-area" style="display:none;">
					<div class="qna-tab__wrap">
						<ul class="qna-tab__list">
							<li class="_qna_list_li { ? CATEGORY_IDNO != '60' }qt-selected{ / }">
								<a data-idno="-1" href="/">
									상담전체
								</a>
							</li>
							<li class="_qna_list_li { ? CATEGORY_IDNO == '60' }qt-selected{ / }">
								<a data-idno="60" href="?category_idno=60">
									질문함
								</a>
							</li>
						</ul>
					</div>

					{ @ range(1,1) }
					<div class="qna-contents__wrap">
						<div class="qna-contents__category-wrap">
							<div class="category-box _list-area">
								<ul class="category-list _qna_list">
									<li class="_qna_list_li { ? CATEGORY_IDNO == '' }selected{ / }">
										<a data-idno="-1" href="/">
											상담전체
										</a>
									</li>
									{ @ B_LIST['CAT_LIST'] }
									<li class="_qna_list_li { ? CATEGORY_IDNO == ..idno }selected{ / }">
										<a data-idno="{ ..idno }" href="?category_idno={ ..idno }">
											{ ..category_title }
										</a>
									</li>
									{ / }
								</ul>

							</div>
						</div>
						<div class="qna-contents__contents">
							{ ? CATEGORY_IDNO == '60' }
								{ ? USERINFO['user_auth'] != '["*"]' }
							<a class="qna-btn" target="_self" href="{ BASE_URL }/415/500/write?">
								질문 바로 작성하기
							</a>
								{ / }
							{ / }
							<ul>
								{ @ B_LIST['LIST'] }
								<li>
									<a href="{ BASE_URL }/416/501/read?idno={ ..idno }" target="_blank">
										<strong>{ ..subject }</strong><br>
										<tag class="gray_tag">상담내용</tag><span>
											{ ? CATEGORY_IDNO != '60' }
												{ ? mb_strlen( ..kl_reply, 'utf-8' ) > 200 }
													{= mb_substr( strip_tags( ..kl_reply ), 0, 200, 'utf-8' ) }... 
												{ : }
													{= mb_substr( strip_tags( ..kl_reply ), 0, 200, 'utf-8' ) }
												{ / }
											{ : }
												{ ? mb_strlen( ..contents, 'utf-8' ) > 200 }
													{= mb_substr( strip_tags( ..contents ), 0, 200, 'utf-8' ) }... 
												{ : }
													{= mb_substr( strip_tags( ..contents ), 0, 200, 'utf-8' ) }
												{ / }
											{ / }
										</span><br>
										<tag class="category_tag">#{ ..category_title }</tag>
									</a>
								</li>
								{ / }
								
								
							</ul>
							
							
							<div class="page_navi mt25" data-count="{ COUNT }" data-size="{ PAGE_SIZE } " data-page="{ PAGE }" data-block="5" >
								{ #paging }
							</div>
							
							
						</div>
					</div>
					{ / }

				</div>
				<!-- // qna quick area -->

			</div>
			<!-- //mainContent -->
			<div class="wide_section bbs_section" id="bbs_section">
				<div class="sec_contents">
					{ @ range(1,1) }
					<div class="hanpage_contents">
						<div class="conts_top_wrap">
							<h3>
								한페이지 세무정보
							</h3>
							<a class="more_btn" href="{ BASE_URL }/406">
								더보기&nbsp;&nbsp;<i class="fa fa-angle-right"></i>
							</a>
							<div style="clear:both;"></div>
						</div>
						<ul class="hanpage_li">
							{ @ S_BOARD[.value_]['LIST'] }
							{ ? ..index_ < HAN_LATEST_COUNT }
							<li>
								<a class="han_cate" href="{ BASE_URL }/406/480/?category_idno={ ..category_idno }"  target="_self">
									{ ? ..category_idno == '21' }
									양도소득세 업무
									{ : ..category_idno == '22' }
									증여세 및 상속세 업무
									{ : ..category_idno == '23' }
									지방세 업무
									{ : ..category_idno == '24' }
									종합부동산세
									{ : ..category_idno == '25' }
									주식 업무
									{ : ..category_idno == '26' }
									외국인투자기업 업무
									{ : ..category_idno == '27' }
									급여 및 4대보험 업무
									{ : ..category_idno == '28' }
									부가세 및 수출입 업무
									{ : ..category_idno == '29' }
									기장실무(회계)
									{ : ..category_idno == '30' }
									소득세 업무
									{ : ..category_idno == '31' }
									법인세 업무
									{ : ..category_idno == '32' }
									기타(미분류)
									{ / }
								</a>
								<a class="han_sbj" href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }" target="_self">{ ..subject }</a>
								<a class="han_contents" href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }" target="_self">{ ..contents }</a>
								<a class="han_date date">{ ..reg_day }</a>
							</li>
							{ / }
							{ / }
						</ul>
					</div>
					{ / }
				</div>
			</div>
		</div>
		<!-- //Container -->

<script>
$(function() {
	$(".tabTit ul li:eq(0)").addClass("on");
});
</script>
{ #footer }