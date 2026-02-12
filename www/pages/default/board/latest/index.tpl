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
							<!--<th scope="col">게시판명</th>-->
							{ ? sizeof(CATS) > 1 }<th scope="col">구분 <button class="btn_ord up" data-fld="category_title"></button><button class="btn_ord down" data-fld="category_title"></button></th>{ / }
							{*										<th scope="col">게시판명</th>*}
							<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
							<th scope="col">작성자 <button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
							<th scope="col">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
							<th scope="col" class="mb_hd">조회수 <button class="btn_ord up" data-fld="hits"></button><button class="btn_ord down" data-fld="hits"></button></th>
						</tr>
						</thead>
						<tbody>
						{ @ LIST }
						<tr>
							<td class="td_num">{ ? .notice_yn == 'Y' }{ START_NO - .index_ }{ : }{ START_NO - .index_ }{ / }</td>
							<!--<td>{ .menu_title }</td>-->
							{ ? sizeof(CATS) > 1 }<td class="w">{ .category_title }</td>{ / }
							{*										<td><a href="{ BASE_URL }/{ .menu_idno }" target="_blank">{ .menu_title }&nbsp;<img src="{ TYPE_URL }/images/btn/shortcutIcon.png" alt="바로가기 아이콘"/></a></td>*}
							<td class="subject"{ ? .lev > 0 } style="padding-left:{ =30 + (20 * (.lev -1)) }px;"{ / }>{ ? .lev > 0 }<img src="{TYPE_URL}/images/sub/icon_re.png" alt="답글" class="b_icon" /> { / }{ ? .p_idno && !.lev }<span class="info_t">[답글]</span> { / }{ ? .secret_yn == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">{ .subject }</a>{ ? .new_yn == 'Y' } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }</td>
							<td class="td_name">
								{ ? .board_code == 'hanpage' }
									{ ? mb_strlen( .writer_name, 'utf-8') > 2 }
									{ =iconv_substr( .writer_name,0, 2, 'utf-8' ) }*
									{ : }
									{ =iconv_substr( .writer_name,0, 1, 'utf-8' ) }*
									{ / }
								{ : }
									{ .writer_name }
								{ / }
							</td>
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
