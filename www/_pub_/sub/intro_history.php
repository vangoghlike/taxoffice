<?php include "../include/_header.php" ?>
	
	<div class="sub_visual intro">
		<div class="inner">
			<h2 class="title">회사소개</h2>
		</div>
	</div>
	
	<div class="sub_content_wrap">
		<?php include "../include/_snb_intro.php" ?>
		
		<div class="sub_content">
			<div class="title_wrap">
				<h3 class="page_title">연혁</h3>
			</div>
			
			<div class="content_wrap history">
			
				<div class="history_list">
					<div class="list_item active">
						<p class="year">2020 ~ 2019</p>
						<dl>
							<dt>2020 ~ 2019</dt>
							<dd class="img"><img src="/pub/image/sub/img_history_2020.jpg" alt=""></dd>
							<dd>
								<ul class="detail_list">
									<li>중소벤처기업부 ‘2020 예비유니콘 기업’ 선정</li>
									<li>산업통상자원부 ‘녹색기술’ 인증</li>
									<li>중소벤처기업부 ‘발명의날’ 장관 표창</li>
									<li><em>CRISPR PLUS® 유전자가위 특허 2건 등록</em></li>
									<li><em>신형 gfCas12a 유전자가위 특허 1건 등록</em></li>
									<li><em>식품의약품안전처 ‘식물기반 백신의 안전성 및 유효성 평가연구과제’ 선정</em></li>
									<li>특허청 ‘지식재산경영’ 인증</li>
									<li>연구개발특구진흥재단 ‘과학벨트성과확산 지원사업 (2단계)’선정</li>
									<li>오송캠퍼스 1단계 준공(식물연구동, 온실, 식물호텔)</li>
									<li><em>CRISPR Cancerase® 특허 등록</em></li>
									<li>산업통상자원부 ‘R&D 재발견프로젝트 사업’ 선정</li>
									<li><em>식물호텔 시스템 특허 1건 추가 등록</em></li>
								</ul>
							</dd>
						</dl>
					</div>
					<div class="list_item">
						<p class="year">2018 ~  2017</p>
						<dl>
							<dt>2018 ~  2017</dt>
							<dd class="img"><img src="/pub/image/sub/img_history_2018.jpg" alt=""></dd>
							<dd>
								<ul class="detail_list">
									<li>미국법인 Naturegenic Inc. 100% 자회사 편입</li>
									<li>IBS 기술이전 – ‘Non-GMO 유전자가위기술’</li>
									<li>연구개발특구진흥재단 ‘과학벨트성과확산 지원사업’ 선정</li>
									<li><em>식물호텔 시스템 특허 3건 등록</em></li>
									<li>중소벤처기업부 ‘디딤돌 창업과제지원사업’ 선정</li>
									<li><em>리보핵단백질을 식물원형질체로 전달하는 방법 특허 등록</em></li>
									<li><em>미국 Biopact사와 유전자가위 전달물질 도입 및 공동연구 실시</em></li>
									<li>지점 설립 – 오송 첨복단지 내 ‘지플러스 오송 유전자가위 신약연구소’</li>
									<li>본사 이전 – 낙성대 R&D Center 입주</li>
								</ul>
							</dd>
						</dl>
					</div>
					<div class="list_item">
						<p class="year">2017 ~ 2015</p>
						<dl>
							<dt>2017 ~ 2015</dt>
							<dd class="img"><img src="/pub/image/sub/img_history_2017.jpg" alt=""></dd>
							<dd>
								<ul class="detail_list">
									<li>미국 에볼라 항체 생산 글로벌 리더 KBP사와 공동연구 실시</li>
									<li><em>식물기반 단백질 발현 시스템 글로벌 리더 독일 NOMAD사와 공동연구 실시</em></li>
									<li><em>오송 첨단의료 복합단지 입주 기업 선정 및 자산 매입(토지, 5000평)</em></li>
									<li>중소기업벤처부 ‘TIPS 민간공동 창업자 발굴육성사업’ 선정</li>
									<li>벤처기업 선정 및 기업부설연구소 설립</li>
									<li>중소기업벤처부 ‘TIPS 민간주도형 기술창업지원 사업’ 선정</li>
									<li><em>최성화 박사 Nature Biotechnology 저널 ‘식물유전자가위’ 논문 발표</em></li>
								</ul>
							</dd>
						</dl>
					</div>
					<div class="list_item">
						<p class="year">2014</p>
						<dl>
							<dt>2014</dt>
							<dd class="img"><img src="/pub/image/sub/img_history_2014.jpg" alt=""></dd>
							<dd>
								<ul class="detail_list">
									<li><em>서울대학교 차세대융합 기술연구원과 공동연구 개시</em></li>
									<li><em>㈜지플러스생명과학 설립</em></li>
									<li>미국법인 네이처제닉(Naturegenic Inc.) 설립</li>
								</ul>
							</dd>
						</dl>
					</div>
				</div>
				<!-- //history_list -->
				
			</div>
			<!-- //content_wrap -->
			
		</div>
		<!-- //sub_content -->
	
	</div>
	
<script>
// submenu
$(function(){
	ui.subMenu(0,1);
})

 $(document).ready(function() {

	$(window).scroll(function(){
		var idx = $(window).scrollTop() + 600;

		$('.tab_content.active .history_list > li').each(function(){
			var el = $(this).offset().top;

			if(el < idx){
				$(this).addClass('active');
				$(this).parents('.history_list').addClass('active');

				if(!$(this).hasClass('first')){
					var elPrev = $(this).prev();
					if (elPrev.length) {
						elPrev = elPrev.offset().top;
					}
					var lineHeight = el - elPrev;
				}
				
				$(this).find('.line').height(lineHeight)
				
				if(idx == 1){
					$('.history_list').addClass('active');
				}

			}else{
				$(this).find('.line').height(0);
				$(this).removeClass('active');
				
			}

		})
		
		if(($(window).scrollTop() + $(window).height()) + 100 >= $(document).height()){
			$('.tab_content.active .history_list > li').addClass('active');
		}
	})

});
</script>
<?php include "../include/_footer.php" ?>