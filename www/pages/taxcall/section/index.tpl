{ #header }
		<!-- Container -->
		<div class="container" id="container">
			<div class="mainSlide">
				<div class="in">
					<ul>
					{ @ S_BANNER[1] }
						<li>{ .contents }</li>
					{ / }
					</ul>
				</div>
			</div>
			
			<!-- mainContent -->
			<div class="mainContent">
				<!-- infoList -->
				<div class="infoList">
					<ul>
						{ @ range(1,6) }
						<li>{ S_CONTENTS[.value_]['CONT'] }</li>
						{ / }
					</ul>
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
							{? CATEGORY_IDNO == '60' }
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
											{? CATEGORY_IDNO != '60' }
												{? mb_strlen( ..kl_reply, 'utf-8' ) > 200 }
													{= mb_substr( strip_tags( ..kl_reply ), 0, 200, 'utf-8' ) }... 
												{ : }
													{= mb_substr( strip_tags( ..kl_reply ), 0, 200, 'utf-8' ) }
												{ / }
											{ : }
												{? mb_strlen( ..contents, 'utf-8' ) > 200 }
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
		</div>
		<!-- //Container -->

<script>
$(function() {
	$(".tabTit ul li:eq(0)").addClass("on");
});
</script>
{ #footer }