				<!-- subTopInfo -->
				<div class="subTopInfo">

					<!-- h2Wrap -->
					<div class="h2Wrap">
						<h2>{ USER_TYPE } { ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }{ CONTENTS['breadcrumbs'][1]['menu_title'] }{ : }{ CONTENTS['menu_title'] }{ / }{ ? TABS.size_ > 1 } - { TABS[CONTENTS_NO] }{ / }

							{ ? BOARD_TYPE == 'knowledge' && BOARD_WRITE_PAGE == 'write' }
							<a class="br_h2_link" href="{ BASE_URL }/412">
								질문함
							</a>
							{ / }
						</h2>
					</div>
					<!-- //h2Wrap -->

					<!-- lnb -->
					<div class="lnb">
						<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
						{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span class="last">{ .menu_title }</span>{ / }{ / }{ : }<span class="last">{ CONTENTS['menu_title'] }</span>{ / }
					</div>
					<!-- //lnb -->


				</div>

				{ ? BOARD_KL_TYPE == 'qna' }
				<div class="blueRound" style="padding:1.5rem 0.5rem; margin: 0rem auto 1rem;">
					<ul class="lst01 qna_bbs_txt" style="margin: 0px">
						<li>
							<div class="tit01 lh23 qna_bbs_txt" style="margin: 0px; text-align: center">
								"개별적 상담내용은 상담센터 및 신고 도움 서비스를 이용하시고<br>
								세무 회계에 관한 지식상담은 'Han-Page'를 이용하시면 유용합니다.<br>
								'한페이지 세무정보'는 어떠한 질문이던 한페이지로 정리하여<br>
								답변을 제공하는 것을 원칙으로 합니다."
							</div>
						</li>
					</ul>
				</div>
				{ / }
				<!-- //subTopInfo -->
