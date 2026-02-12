{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }
			<div class="subNav subNavType2">
				<ul>
					{ @MNGR }
					<li class="mngr{ .idno } { ? MNGR_IDNO == .idno }on{ / }"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ .idno }">{ .mngr_name }</a></li>
					{ / }
				</ul>
			</div>

			<!-- subContent -->
			<div class="subContent">
				<!-- subTopInfo -->
				<div class="subTopInfo">

					<!-- h2Wrap -->
					<div class="h2Wrap">
						<h2>{ USER_TYPE } 대화방 &nbsp;&nbsp;<span class="small-tit gray">{ DATA['mngr_name'] }</span></span></h2>
					</div>
					<!-- //h2Wrap -->

					<!-- lnb -->
					<div class="lnb">
						<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
						{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span>{ .menu_title }</span>{ / }{ / }{ : }<span>{ CONTENTS['menu_title'] }</span>{ / }
						<span>{ DATA['mngr_name'] }</span><span class="last">대화방</span>
					</div>
					<!-- //lnb -->

				</div>
				<!-- //subTopInfo -->
				<!-- contStart -->
				<div class="contStart">
					<div class="tabType01">
						<ul>
							{ ? USERINFO['user_id'] != DATA['user_id'] }
							<li style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
							<li class="on" style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
							{ : }
							<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
							<li class="on" style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
							<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/info?&mid={ DATA['idno'] }">정보</a></li>
							{ / }
						</ul>
					</div>

{ #dep3 }
{ #cats }

{ CONTENTS['head_contents'] }

					<div class="side">
						<div class="left">
							<div class="countTotal">
							Total : { COUNT }
							</div>
						</div>
						<div class="right">
							<div class="searchArea">
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
						</div>
					</div>

					<div class="bbs">
						<div class="blist">
							<table cellpadding="0" cellspacing="0" summary="게시판입니다.">
								<colgroup>
									<col>
									{ ? sizeof(CATS) > 1 }<col>{ / }
									<col width="*">
									{ ? CONF['use_file_yn'] == 'Y' }<col>{ / }
									<col>
									<col>
									<col>
								</colgroup>
								<thead>
									<tr>
										<th scope="col" class="bgNo">번호</th>
										{ ? sizeof(CATS) > 1 }<th scope="col" class="mb_hd">구분 <button class="btn_ord up" data-fld="category_title"></button><button class="btn_ord down" data-fld="category_title"></button></th>{ / }
										<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
										{ ? CONF['use_file_yn'] == 'Y' }<th scope="col" class="mb_hd">첨부파일</th>{ / }
										<th scope="col">작성자 <button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
										<th scope="col">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
										<th scope="col" class="mb_hd">조회수 <button class="btn_ord up" data-fld="hits"></button><button class="btn_ord down" data-fld="hits"></button></th>
									</tr>
								</thead>
								<tbody>
								{ @ LIST }
									<tr class="{ ? .notice_yn == 'Y' }notice { / }{ ? .lev > 0 }answer { / }">
										<td class="td_num">{ ? .notice_yn == 'Y' }<img src="{TYPE_URL}/images/sub/btNotice.png" alt="Notice" />{ : }{ START_NO - .index_ }{ / }</td>
										{ ? sizeof(CATS) > 1 }<td class="w mb_hd">{ .category_title }</td>{ / }
										<td class="subject"{ ? .lev > 0 } style="padding-left:{ =30 + (20 * (.lev -1)) }px;"{ / }>{ ? .lev > 0 }<img src="{TYPE_URL}/images/sub/icon_re.png" alt="답글" class="b_icon" /> { / }{ ? .p_idno && !.lev }<span class="info_t">[답글]</span> { / }{ ? .secret_yn == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&mid={ DATA['idno'] }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">{ .subject }</a>{ ? .new_yn == 'Y' } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }</td>
										{ ? CONF['use_file_yn'] == 'Y' }
										<td class="td_file mb_hd">	{ ? sizeof(.file) }<img src="{TYPE_URL}/images/sub/icon_file.png" alt="첨부파일" class="b_icon" />{ / }</td>
										{ / }
										<td class="td_name">{ .writer_name }</td>
										<td class="td_day">{ .reg_day }</td>
										<td class="td_hit mb_hd">{ .hits }</td>
									</tr>
								{ / }
								{ ? !LIST.size_ }
									<tr class="allmerge">
										<td>등록된 게시물이 없습니다.</td>
									</tr>
								{ / }
								</tbody>
							</table>
						</div>
						<!-- //blist -->
						{ ? USERINFO['user_id'] == DATA['user_id'] }
						<div class="btnBbs ar">
							<div class="right">
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&mid={ DATA['idno'] }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
							</div>
						</div>
						{ / }
					</div>


					<div class="page_navi" data-count="{ COUNT }" data-size="{ PAGE_SIZE } " data-page="{ PAGE }" data-block="5" >
{ #paging }
					</div>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
