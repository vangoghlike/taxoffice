{ #header }

		<!-- Container -->
		<div class="container" id="container">

			<!-- subContent -->
			<div class="subContent">
				
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
						
					</div>

					<div class="bbs">
						<div class="blist">
							<table cellpadding="0" cellspacing="0" summary="게시판입니다.">
								<colgroup>
										<col width="9%">
										{ ? sizeof(CATS) > 1 }<col width="10%" />{ / }
										<col width="15%">
										<col width="*">
										{ ? CONF['use_file_yn'] == 'Y' }<col width="7%" />{ / }
										<col width="11%">
										<col width="11%">
								</colgroup>
								<thead>
									<tr>
										<th scope="col" class="bgNo">번호</th>
										<th scope="col">게시판명</th>
										{ ? sizeof(CATS) > 1 }<th scope="col">구분 <button class="btn_ord up" data-fld="category_title"></button><button class="btn_ord down" data-fld="category_title"></button></th>{ / }
										<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
										{ ? CONF['use_file_yn'] == 'Y' }<th scope="col">첨부파일</th>{ / }
										
										<th scope="col">작성자 <button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
										<th scope="col">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
										
									</tr>
								</thead>
								<tbody>
								{ @ LIST }
									<tr class="{ ? .notice_yn == 'Y' }notice { / }{ ? .lev > 0 }answer { / }">
										<td>{ ? .notice_yn == 'Y' }<img src="{TYPE_URL}/images/sub/btNotice.png" alt="Notice" />{ : }{ START_NO - .index_ }{ / }</td>
										{ ? sizeof(CATS) > 1 }<td class="w">{ .category_title }</td>{ / }
										<td><a href="{ BASE_URL }/{ .menu_idno }" target="_blank">{ .menu_title }&nbsp;<img src="{ TYPE_URL }/images/btn/shortcutIcon.png" alt="바로가기 아이콘"/></a></td>
										<td class="subject"{ ? .lev > 0 } style="padding-left:{ =30 + (20 * (.lev -1)) }px;"{ / }>{ ? .lev > 0 }<img src="{TYPE_URL}/images/sub/icon_re.png" alt="답글" class="b_icon" /> { / }{ ? .secret_yn == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }<a target="_blank" href="{ BASE_URL }/{ .sub_link_idno }/{ .link_idno }/read?{ QS }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">{ .subject }</a>{ ? .new_yn == 'Y' } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }</td>
										{ ? CONF['use_file_yn'] == 'Y' }
										<td>	{ ? sizeof(.file) }<img src="{TYPE_URL}/images/sub/icon_file.png" alt="첨부파일" class="b_icon" />{ / }</td>
										{ / } 
										
										<td>{ .writer_name }</td>
										<td>{ .reg_day }</td>
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
