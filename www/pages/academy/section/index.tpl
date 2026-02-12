{ #header }

		<!-- Container -->
		<div class="container" id="container">
			<div class="mobileMenu mb">
				<ul class="mm1dp">
					<li>
						<a href="{ BASE_URL }/12" target="_self">법인 소개</a>
					</li>
					<li class="2dptm">
						<a>법인 설립지원</a>
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
								<a href="{ BASE_URL }/21" target="_self">세무실무 사례</a>
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

			</div>
			<!-- //mainSlide -->

			<!-- mainContent -->
			<div class="mainContent">

				<div class="mainTab">

					<div class="left">
						<div class="tabList mainTab">
							<div class="tabTit">
								<ul>
								<li style="display: none"><a href="#">조세뉴스</a></li>

								{ @ range(1,1) }
									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 0 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
								{ / }
								<li><a href="#">조세뉴스</a></li>
{*								{ @ range(3,3) }*}
{*									{ ? S_BOARD[.value_]['NAME'] }<li { ? .index_ == 1 }class="on"{ / }	 ><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }*}
{*								{ / }*}
								<li><a href="http://www.han-page.com/416">한페이지</a></li>
								</ul>
							</div>
							<div class="tabContent">
								<div class="tabCont" style="display: none">
									<ul id="josenews" class="jose_list">
										<li style="display:none;">... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>

							{ @ range(1,1) }
								<div class="tabCont">
									<ul>
									{ @ S_BOARD[.value_]['LIST'] }
									{ ? ..index_ < 5 }
										<li>
											<a href="http://{ TYPE_DOMAIN }{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
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
								{ @ range(3,3) }
								<div class="tabCont">
									<ul>
										{ @ S_BOARD[.value_]['LIST'] }
										{ ? ..index_ < 5 }
										<li>
											{ ? .index_ == '0' }
{*											<a href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>*}
											<a target="_blank" href="http://www.han-page.co.kr/406/480/read?idno={ ..idno }">{ ..subject }</a>
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

					<div class="right">
						<div class="customerBox">
							<div class="tit">세림아카데미 고객안내</div>
{*							<div class="phon">02-854-2100 (1본부)</div>*}
{*							<div class="phon">02-501-2155 (2본부)</div>*}
							<div class="dam">{ S_LINK[9]['SUB'] }</div>
							<div class="btnGo"><a href="{ S_LINK[7]['URL'] }" { ? S_LINK[7]['TARGET'] } target="{ S_LINK[7]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{TYPE_URL}/images/main/btnQus.png" alt="문의하기"></a></div>
						</div>
					</div>

					{ @ range(2,2) }
					<div class="mainSection gallery video_gallery">
						<ul>
							{ @ S_BOARD[.value_]['LIST'] }
							{ ? ..index_ < 6 }
							<li>
								<a href="http://{ TYPE_DOMAIN }{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }" data-idno="{ .idno }">
									<div class="img">
										<img src="https://i.ytimg.com/vi/{ ..utv_url_id }/maxresdefault.jpg" alt="썸네일 이미지" width="320" height="180" />
									</div>
									<div class="txt">{ ..subject }</div>
								</a>
							</li>
							{ / }
							{ / }
						</ul>
					</div>
					{ / }




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
	$('.tabList .tabTit ul li:first-child, .tabList .tabTit ul li:nth-child(3)').on('click', function() {
		$_news_value = "";

		if ( $(this).index() == 0 ) {
			$_news_value = "joseexam";
			$_news_link = '320';
		} else if ( $(this).index() == 2 ) {
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

	// $(".tabTit ul li:eq(3)").addClass("on");
	$(".tabContent .tabCont:eq(1)").css({"display":"block"});
});
</script>
{ #footer }
