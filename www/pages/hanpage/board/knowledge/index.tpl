{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">

				{ ? CATEGORY_IDNO == '33' }
				<div class="tabType01 kl-type kl-write kl-list">
					<div class="kl-cate-wr">
						<ul>
							<li><a href="{ BASE_URL }/406">Han-Page</a></li>
							<li class="qna_li { ? KL_CATS_IDNO == ''}on{ / }">
								<a href="{ BASE_URL }/411/485/write?">질문함</a>
							</li>

							<li>
								<a href="http://www.taxcallcenter.com/498">상담센터</a>
							</li>
						</ul>
					</div>
				</div>
				{ / }
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

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
									{ ? _GET.category_idno == null }{ ? sizeof(CATS) > 1 }<col>{ / }{ / }
									<col width="*">
									{ ? CONF['use_file_yn'] == 'Y' }<col>{ / }
									<col>
									<col>
									<col>
								</colgroup>
								<thead>
									<tr>
										<th scope="col" class="bgNo">번호</th>
										{ ? _GET.category_idno == null }
										{ ? sizeof(CATS) > 1 }<th scope="col" class="mb_hd">구분 <button class="btn_ord up" data-fld="category_title"></button><button class="btn_ord down" data-fld="category_title"></button></th>{ / }
										{ / }
										<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
										{ ? CONF['use_file_yn'] == 'Y' }<th scope="col" class="mb_hd">첨부파일</th>{ / }
										<th scope="col">
											{ ? CATEGORY_IDNO == '33' }
											작성자
											{ : }
											상담세무사
											{ / }
											&nbsp;<button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
										<th scope="col">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
										<th scope="col" class="mb_hd">조회수 <button class="btn_ord up" data-fld="hits"></button><button class="btn_ord down" data-fld="hits"></button></th>
{*										<th scope="col" class="mb_hd">답변처리 <button class="btn_ord up" data-fld="kl_status"></button><button class="btn_ord down" data-fld="kl_status"></button></th>*}
									</tr>
								</thead>
								<tbody>
								{ @ LIST }
									<tr class="{ ? .notice_yn == 'Y' }notice { / }{ ? .lev > 0 }answer { / }">
										<td class="td_num">{ ? .notice_yn == 'Y' }<img src="{TYPE_URL}/images/sub/btNotice.png" alt="Notice" />{ : }{ START_NO - .index_ }{ / }</td>
										{ ? _GET.category_idno == null }
										{ ? sizeof(CATS) > 1 }
										<td class="w mb_hd">
											{ ? BOARD_KL_TYPE == 'qna' }
											<tag class="gray_tag">답변대기</tag>
											{ : }
											{ .category_title }
											{ / }
										</td>
										{ / }
										{ / }
										<td class="subject"{ ? .lev > 0 } style="padding-left:{ =30 + (20 * (.lev -1)) }px;"{ / }>{ ? .lev > 0 }<img src="{TYPE_URL}/images/sub/icon_re.png" alt="답글" class="b_icon" /> { / }{ ? .p_idno && !.lev }<span class="info_t">[답글]</span> { / }{ ? .secret_yn == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">{ .subject }</a>{ ? .new_yn == 'Y' } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }</td>
										{ ? CONF['use_file_yn'] == 'Y' }
										<td class="td_file mb_hd">	{ ? sizeof(.file) }<img src="{TYPE_URL}/images/sub/icon_file.png" alt="첨부파일" class="b_icon" />{ / }</td>
										{ / }
										{ ? .category_idno != '33' }
										<td class="td_name">
										{ ? .kl_manager_name == '' }
											{ ? .kl_email_manager == 'taxmgt10@taxemail.co.kr' }
											최유정 세무사
											{ : .kl_email_manager == 'taxmgt15@taxemail.co.kr' }
											권다희 세무사
											{ : .kl_email_manager == 'sykang@taxemail.co.kr' }
											강삼엽 이사
											{ : .kl_email_manager == 'syyi@taxemail.co.kr' }
											이선영 실장
											{ : .kl_email_manager == 'taxmgt8@taxemail.co.kr' }
											김대원 세무사
											{ : .kl_email_manager == 'taxmgt13@taxemail.co.kr' }
											하유정 세무사
											{ : .kl_email_manager == 'taxmgt3@taxemail.co.kr' }
											박태형 세무사
											{ : .kl_email_manager == 'taxmgt9@taxemail.co.kr' }
											배호영 세무사
											{ : .kl_email_manager == 'taxmgt6@taxemail.co.kr' }
											정혜미 세무사
											{ : .kl_email_manager == 'taxmgt5@taxemail.co.kr' }
											김지홍 세무사
											{ : .kl_email_manager == 'taxmgt4@taxemail.co.kr' }
											장호연 세무사
											{ : .kl_email_manager == 'taxmgt@taxemail.co.kr' }
											김창진 세무사
											{ : .kl_email_manager == 'jinwoodak@taxemail.co.kr' }
											상담자
											{ : .kl_email_manager == '' }
											관리자
											{ / }
										{ : }
											{ .kl_manager_name }
										{ / }
										</td>
										{ : }
										<td class="td_name">{ .writer_name }</td>
										{ / }
										<td class="td_day">{ .reg_day }</td>
										<td class="td_hit mb_hd">{ .hits }</td>
{*										<td class="td_status mb_hd">*}
{*											{ ? .kl_status == 'N' }*}
{*											<tag class="gray_tag">답변대기</tag>*}
{*											{ : }*}
{*											<tag>답변완료</tag>*}
{*											{ / }*}
{*										</td>*}
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

						{ ? MENU_NO == '420' || MENU_NO == '419' }
						<div class="btnBbs ar">
							<div class="right">
								{ ? USERINFO['user_auth'] != '["*"]' }
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
								{ / }
							</div>
						</div>
						{ / }
					</div>


					<div class="page_navi" data-count="{ COUNT }" data-size="{ PAGE_SIZE } " data-page="{ PAGE }" data-block="5" >
{ #paging }
					</div>


					<div class="han_notice_wrap han_bottom">
						<a class="han_notice_btn">※ 한페이지 세무정보 상담내용 제한사항 등 공지<!--&nbsp;&nbsp;&nbsp;<span class="onoff_txt">open</span>--></a>
						<div class="han_notice">
							&nbsp;한페이지 세무정보에서 상담 답변하는 내용은 세림세무법인의 소속 세무사인 상담자의 개인적 견해를 담아서 상담 답변하는 것으로서<br>
							상담자가 현재까지 확인된 예규나 심판례 등을 기초로 최선 상태로 답변하지만 권한 있는 기관(과세관청이나 법원)의 유권해석과는 별개의 것으로 <br>
							차이가 있을 수 있음을 감안하여 활용하시기 바랍니다.<br>
							&nbsp;또한 본 세무정보에 의한 내용과 관련하여 발생되는 결과에 대하여 법적 책임이 없음을 유의하시기 바랍니다.<br><br>

							&nbsp;한페이지 세무정보는 개인별 정보가 공개되는 상담을 등록하실 수 없고 단지 세무정보에 관련된 상담만 가능합니다.<br>
							&nbsp;본 상담란에 등록한 모든 상담은 공개됨을 미리 공지합니다.
						</div>
					</div>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
