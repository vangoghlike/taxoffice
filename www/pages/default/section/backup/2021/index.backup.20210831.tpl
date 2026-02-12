{ #header }

		<!-- Container -->
		<div class="container" id="container">
			<div class="mobileMenu mb">
				<ul class="mm1dp">
					<li>
						<a href="{ BASE_URL }/12" target="_self">법인 소개</a>
					</li>
					<li class="2dptm">
						<a>회사 설립지원</a>
						<ul class="mm2dp">
							<li>
								<a href="{ BASE_URL }/339" target="_self">회사설립 절차</a>
							</li>
							<li>
								<a href="{ BASE_URL }/54" target="_self">법인 설립 지원</a>
							</li>
							<li>
								<a href="{ BASE_URL }/316" target="_self">개인사업 법인전환</a>
							</li>
							<li>
								<a href="{ BASE_URL }/64" target="_self">업무 의뢰</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{ BASE_URL }/59" target="_self">외국인투자기업지원</a>
					</li>
					<li class="2dptm">
						<a>세무실무 사례</a>
						<ul class="mm2dp">
							<li>
								<a href="{ BASE_URL }/21" target="_self">Topic별 세무</a>
							</li>
							<li>
								<a href="{ BASE_URL }/296" target="_self">업종별 세무</a>
							</li>
							<li>
								<a href="{ BASE_URL }/157" target="_self">벤처·스타트업</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- mainSlide -->
			<div class="mainSlide">
				<div class="in">
					<ul>
					{ @ S_BANNER[1] }
						<li>{ .contents }</li>
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

			<!-- mainContent -->
			<div class="mainContent">
			
				<!-- mainLink -->
{*				<div class="mainLink pc">*}
{*					<ul>*}
{*					{ @ range(1,6) }*}
{*						<li { ? .index_ == '1' }class="tcal_li"{ / }><a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+1 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a></li>*}
{*					{ / }*}
{*					</ul>*}
{*				</div>*}
				<div class="mainLink2 pc">
					<ul>
					{ @ range(10,14) }
						<li><a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/main_mid_link_img{ =sprintf('%02d', .index_+1 ) }.jpg{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a></li>
					{ / }
					</ul>
				</div>
				{ ? IS_MOBILE_CHK == 1 }
				<div class="mainMobileLink mb">
					<ul>
						<li>
							<a href="http://www.taxcallcenter.com/498">
								<img src="{ TYPE_URL }/images/main/mb_main_call.png">
								상담센터
							</a>
						</li>
						<li>
							<a href="http://www.taxcallcenter.com/506">
								<img src="{ TYPE_URL }/images/main/mb_main_taxhelp.png">
								신고도우미
							</a>
						</li>
						<li>
							<a href="{ BASE_URL }/19">
								<img src="{ TYPE_URL }/images/main/mb_main_tax.png">
								기장자문
							</a>
						</li>
						<li class="deepColor">
							<a href="http://www.han-page.co.kr/406">
								<img src="{ TYPE_URL }/images/main/mb_main_page.png">
								Han-page 세무정보
							</a>
						</li>
						<li class="deepColor">
							<a href="{ BASE_URL }/146">
								<img src="{ TYPE_URL }/images/main/mb_main_location.png">
								찾아오시는 길
							</a>
						</li>
						<li class="deepColor">
							<a href="https://blog.naver.com/selimtaxoffice">
								<img src="{ TYPE_URL }/images/main/mb_main_blog.png">
								블로그
							</a>
						</li>
					</ul>
				</div>
				{ / }
{*				<div class="mainLink mb">*}
{*					<ul>*}
{*						{ @ range(1,4) }*}
{*						<li { ? .index_ == '1' }class="tcal_li"{ / }><a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }>*}
{*							{ ? .index_ == '0' }*}
{*							<img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+1 ) }_02.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a>*}
{*							{ : }*}
{*							<img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+1 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a>*}
{*							{ / }*}
{*							<img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+1 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a>*}
{*						</li>*}
{*						{ / }*}
{*						{ @ range(7,7) }*}
{*						<li>*}
{*							<a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }>*}
{*								<img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+7 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }">*}
{*							</a>*}
{*						</li>*}
{*						{ / }*}
{*						{ @ range(6,6) }*}
{*						<li>*}
{*							<a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }>*}
{*							<img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+6 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }">*}
{*							</a>*}
{*						</li>*}
{*						{ / }*}
{*					</ul>*}
{*				</div>*}
				<!-- //mainLink -->

				<!-- mainTab -->
				<div class="mainTab">

					<div class="left pc">
						<div class="tabList mainTab">
							<div class="tabTit">
								<ul>
								<li style="display: none"><a href="#">조세뉴스</a></li>

								{ @ range(1,2) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 0 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
								{ / }
								<li><a href="#">조세뉴스</a></li>
								{ @ range(3,3) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 1 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
								{ / }
								<li><a href="http://www.han-page.com/416">한페이지</a></li>
								</ul>
							</div>

							<div class="tabContent">
								<div class="tabCont" style="display: none">
									<ul id="josenews_pc_no" class="jose_list">
										<li style="display:none;">... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>

							{ @ range(1,2) }
								<div class="tabCont">
									<ul>
									{ @ S_BOARD[.value_]['LIST'] }
									{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											<span class="date">{ ..reg_day }</span>
										</li>
									{ / }
									{ / }
									</ul>
								</div>
							{ / }
								<div class="tabCont">
									<ul id="josenews" class="jose_list">
										<li style="display:none;">... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>
								{ @ range(3,4) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											{ ? .index_ == '1' }
{*											<a href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>*}
											<a href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>
											{ : }
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											{ / }
											<span class="date">{ ..reg_day }</span>
										</li>
										{ / }
										{ / }
									</ul>
								</div>
								{ / }

							</div>
						</div>
					</div>

					<div class="left mb">
						<div class="tabList mainTab">
							<div class="tabTit">
								<ul>
									<li style="display: none"><a href="#">조세뉴스</a></li>
									{ @ range(1,1) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 0 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
									{ / }
									<li><a href="http://www.han-page.com/416">한페이지</a></li>
									{ @ range(2,2) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 1 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
									{ / }
									<li><a href="#">조세뉴스</a></li>
									{ @ range(3,3) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 1 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
									{ / }

								</ul>
							</div>

							<div class="tabContent">
								<div class="tabCont" style="display: none">
									<ul id="josenews_mobile_no" class="jose_list">
										<li style="display:none;">... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>

								{ @ range(1,1) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											<span class="date">{ ..reg_day }</span>
										</li>
										{ / }
										{ / }
									</ul>
								</div>
								{ / }
								{ @ range(4,4) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											{ ? .index_ == '0' }
											{*											<a href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>*}
											<a href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>
											{ : }
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											{ / }
											<span class="date">{ ..reg_day }</span>
										</li>
										{ / }
										{ / }
									</ul>
								</div>
								{ / }
								{ @ range(2,2) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											<span class="date">{ ..reg_day }</span>
										</li>
										{ / }
										{ / }
									</ul>
								</div>
								{ / }
								<div class="tabCont">
									<ul id="josenews_mobile" class="jose_list">
										<li style="display:none;">... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>
								{ @ range(3,3) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											<span class="date">{ ..reg_day }</span>
										</li>
										{ / }
										{ / }
									</ul>
								</div>
								{ / }

							</div>
						</div>
					</div>

					<div class="right">
						<div class="customerBox">
							<div class="tit">세림세무법인 고객안내</div>
{*							<div class="phon">02-854-2100 (1본부)</div>*}
{*							<div class="phon">02-501-2155 (2본부)</div>*}
							<div class="dam">{ S_LINK[9]['SUB'] }</div>
							<div class="btnGo"><a href="{ S_LINK[9]['URL'] }" { ? S_LINK[9]['TARGET'] } target="{ S_LINK[9]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{TYPE_URL}/images/main/btnQus.png" alt="문의하기"></a></div>
						</div>
					</div>

				</div>
				<!-- //mainTab -->

				<!-- infoList -->
				<div class="infoList">
					<ul>
					{ @ range(1,4) }
						<li>{ S_CONTENTS[.value_]['CONT'] }</li>
					{ / }
					</ul>
				</div>
				<!-- //infoList -->

			</div>
			<!-- //mainContent -->

		</div>
		<!-- //Container -->

<script>
$(function() {
	$('.left.pc .tabList .tabTit ul li:first-child,.left.pc .tabList .tabTit ul li:nth-child(4)').on('click', function() {
		$_news_value = "";
		if ( $(this).index() == 0 ) {
			$_news_value = "joseexam";
			$_news_link = '320';
		} else if ( $(this).index() == 3 ) {
			$_news_value = "josenews";
			$_news_link = '319';
		}

		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'page':1, 'news_code': $_news_value },
			url: '/common/board/ajax_joseilbo.php',
			success: function(resp) {
				if (resp.data.length > 0) {
					$('.jose_list#'+$_news_value).empty();
					var total = parseInt(resp.total.count.toString());
					$.each(resp.data, function(idx, data) {
						if (idx >= 5) return false;
						$('.jose_list#'+$_news_value).append('<li>'+
							'<a href="/'+$_news_link+'?page=1&idno='+data.id+'">'+data.title+'</a>'+
							'<span class="date">'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</span>'+
							'</li>'
						);
					});
				}
				else {
					//$('#list').append('');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
	$('.tabList .tabTit ul li.tcal_li').on('click', function(e) {
		location.href = $(this).find('a').attr('href');
	});

	$('.left.mb .tabList .tabTit ul li:first-child,.left.mb .tabList .tabTit ul li:nth-child(5)').on('click', function() {
		$_news_value = "";
		if ( $(this).index() == 0 ) {
			$_news_value = "joseexam";
			$_news_link = '320';
		} else if ( $(this).index() == 4 ) {
			$_news_value = "josenews_mobile";
			$_news_link = '319';
		}

		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'page':1, 'news_code': $_news_value },
			url: '/common/board/ajax_joseilbo.php',
			success: function(resp) {
				if (resp.data.length > 0) {
					$('.jose_list#'+$_news_value).empty();
					var total = parseInt(resp.total.count.toString());
					$.each(resp.data, function(idx, data) {
						if (idx >= 5) return false;
						$('.jose_list#'+$_news_value).append('<li>'+
								'<a href="/'+$_news_link+'?page=1&idno='+data.id+'">'+data.title+'</a>'+
								'<span class="date">'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</span>'+
								'</li>'
						);
					});
				}
				else {
					//$('#list').append('');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	// $(".tabTit ul li:eq(3)").addClass("on");
	$(".left.pc .tabContent .tabCont:eq(1)").css({"display":"block"});
	$(".left.mb .tabContent .tabCont:eq(1)").css({"display":"block"});
});
</script>
{ #footer }
