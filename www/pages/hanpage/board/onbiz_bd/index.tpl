{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }
{ #cats }

{ CONTENTS['head_contents'] }
					<ul>
                    { @MNGR }
                    <li>
                        <div class="topInfo">
                            <div class="selView">
                                <div class="img">
                                    <img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .mngr_name }">
                                </div>
                                <div class="txt">
                                    <div class="tit01">{ .mngr_name }</div>
                                    <div class="tit02">“{ .info1 }”</div>
                                </div>
                                <div class="viewBtn open">
                                    <span>Info</span>
                                </div>
                                <!--<div class="viewBtn open">
                                    <img src="{ TYPE_URL }/images/counsel/open_view.png" alt="세무사정보 보기" />
                                </div>-->
                            </div>
                            <div class="btn">
                                <input type="hidden" class="mngr_tel" value="{ .tel }" data-name="{ .tel }" />
                                <input type="hidden" class="mngr_phone" value="{ .phone }" data-name="{ .phone }" />
                                <input type="hidden" class="mngr_mail" value="{ .email }" data-name="{ .email }" />
                                <input type="radio" name="mngr" id="tax{ .idno }" value="{ .idno }" data-name="{ .mngr_name }" /> <label for="tax{ .idno }">선택</label>
                            </div>
                        </div>
                        <div class="viewInfo">
                            <div class="in">
                                <ul>
                                    { ? .email != '' }
                                    <li>
                                        <div class="tit no4">이메일</div>
                                        <div class="text">
											<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:{ .email }" style="color: #0269bf">{ .email }</a>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .tel != '' }
                                    <li>
                                        <div class="tit no1">전화번호</div>
                                        <div class="text">
											<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:{ .tel }" >{ .tel }</a>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .fax != '' }
                                    <li>
                                        <div class="tit no5">FAX</div>
                                        <div class="text">
                                            { .fax }
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info2 != '' }
                                    <li>
                                        <div class="tit no1">학력</div>
                                        <div class="text">
                                            <ul>
                                                { @.info2_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info3 != '' }
                                    <li>
                                        <div class="tit no2">연구과제</div>
                                        <div class="text">
                                            <ul>
                                                { @.info3_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info4 != '' }
                                    <li>
                                        <div class="tit no3">경력</div>
                                        <div class="text">
                                            <ul>
                                                { @.info4_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                </ul>
                            </div>
                        </div>
                    </li>
                    { / }
                </ul>	
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
										<td class="subject"{ ? .lev > 0 } style="padding-left:{ =30 + (20 * (.lev -1)) }px;"{ / }>{ ? .lev > 0 }<img src="{TYPE_URL}/images/sub/icon_re.png" alt="답글" class="b_icon" /> { / }{ ? .p_idno && !.lev }<span class="info_t">[답글]</span> { / }{ ? .secret_yn == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">{ .subject }</a>{ ? .new_yn == 'Y' } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }</td>
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

						<div class="btnBbs ar">
							<div class="right">
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
							</div>
						</div>
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
