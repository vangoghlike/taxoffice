{ #header }
		<!-- Container -->
		<div class="container" id="container">

			<!-- subTop -->
			<div class="subTop company mng">
				<div class="text">{ USER_TYPE } { ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }{ CONTENTS['breadcrumbs'][1]['menu_title'] }{ : }{ CONTENTS['menu_title'] }{ / }{ ? TABS.size_ > 1 } - { TABS[CONTENTS_NO] }{ / }</div>
				
				<!-- lnb -->
				<div class="lnb">
					<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
					{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span class="last">{ .menu_title }</span>{ / }{ / }{ : }<span class="last">{ CONTENTS['menu_title'] }</span>{ / }
				</div>
				<!-- //lnb -->
			</div>
			<!-- //subTop -->

{#dep2}
			<!-- subContent -->
			<div class="subContent">
				
				<div class="subTopInfo">

					

				</div>
				<!-- //subTopInfo -->

				<!-- contStart -->
				<div class="contStart">


{ ? CATS.size_ > 1 }
			<div class="catsWrap">
				{ @ CATS }
					<div class="{ ? .key_ == CATEGORY_IDNO }on{ / } catsBtn"><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></div>
				{ / }
			</div>
{ / }

{ CONTENTS['head_contents'] }

					<div class="bbs jb-bbs">
						<div class="blist">
							{ @ LIST }
							<figure>
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }">
						    	<div class="pic">
						    	{ ? .file[0] != null }
									<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file[0]['file_name_saved'] }" alt="썸네일 이미지"/>
								{ : }
									{ ? .category_title == '지혜&참말씀' }
									<img src="/pages/default/images/bbs/thumb_wisdom{ .wise_img_num }.jpg" alt="기본 이미지"/>
									{ : .category_title == '교육&가정' }
									<img src="/pages/default/images/bbs/thumb_edu{ .wise_img_num }.jpg" alt="기본 이미지"/>
									{ : .category_title == '건강' }
									<img src="/pages/default/images/bbs/thumb_health{ .wise_img_num }.jpg" alt="기본 이미지"/>
									{ : .category_title == '리더십&성공' }
									<img src="/pages/default/images/bbs/thumb_leader{ .wise_img_num }.jpg" alt="기본 이미지"/>
									{ : .category_title == '경영&이재' }
									<img src="/pages/default/images/bbs/thumb_manage{ .wise_img_num }.jpg" alt="기본 이미지"/>
									{ / }
								{ / }
								</div>
						    	<figcaption>
						    		<p class="subject">{ .subject }</p>
						    		<p class="writer"><span>by { .writer_name }</span></p>
						    	</figcaption>
						    	</a>
						   	</figure>						
							{ / }
							{ ? !LIST.size_ }
								<div class="allmerge">
									<span>등록된 게시물이 없습니다.</span>
								</div>
							{ / }
						</div>
						<!-- //blist --> 
						<div class="btnBbs ar">
							<div class="right">
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
							</div>
						</div>
					</div>


					<div class="page_navi" data-count="{ COUNT }" data-size="{ PAGE_SIZE } " data-page="{ PAGE }" data-block="5" >
{ #paging }
					</div>
					
					<div class="jb-sch searchArea">
						<form id="frm_search" name="frm_search" method="get">
						<input type="hidden" name="category_idno" value="{ _GET.category_idno }" />
						<input type="hidden" name="ord" value="{ _GET.ord }" />
						{ ? _GET.ord }<a href="#" class="btn_box green btn_ord init">기본순서로</a>{ / }
						<select title="검색어 분류" name="search_fld">
							<option value="all"{ ? _GET.search_fld == 'all' } selected="selected"{ / }>전체</option>
							<option value="subject"{ ? _GET.search_fld == 'subject' } selected="selected"{ / }>제목</option>
							<option value="contents"{ ? _GET.search_fld == 'contents' } selected="selected"{ / }>내용</option>
							<option value="writer_name"{ ? _GET.search_fld == 'writer_name' } selected="selected"{ / }>작성자</option>
						</select>
						<input type="text" name="search" value="{ =htmlspecialchars( _GET.search ) }" title="검색어를 입력하세요." placeholder="검색어를 입력하세요." />
						<a href="#" class="sbtn act_board_search">검색</a>
						</form>
					</div>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
