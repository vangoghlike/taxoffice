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

<style>
	.jb-type {margin-bottom:0;}
	.jb-type .jb-tab li {border:none;}
	.jb-type .jb-tab li a {background:#f8f9fa; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
	.jb-type .jb-tab li:first-child a {border-left:1px solid #e4e5e6;}
	.jb-type .jb-tab li.on {border:none;}
	.jb-type .jb-tab li.on a {color:#fff; background:#0b4ea2; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
	.jb-type .jb-tab li.on:first-child a {border-left:1px solid #e4e5e6;}
	
	.jb_deadline {display:block; margin-bottom:6px; padding:3px 4px; border:1px solid #3399ff; color:#fff; background:#3399ff;}
	.jb_deadline.d-day {border:1px solid #ccc; color:#fff; background:#ccc;}
	.jb_d-cate  {display:inline-block; padding:6px 8px; border:1px solid #3399ff; color:#3399ff;}
	.jb_d-cate.d-day {border:1px solid #ccc; color:#ccc; background:#fafbfc;}
	.jb-bbs .blist {padding:16px 24px; border:1px solid #e4e5e6;}
	.jb-bbs .blist table thead { border-radius:4px; box-shadow:0px 2px 4px rgba(160,170,180,.2); }
	.jb-bbs .blist table thead th {font-weight:600; background:#f7f8f9; border:none; }
	.jb-bbs .blist table tbody tr td {padding:24px 8px; height:128px; border-bottom:1px solid #e4e5e6; line-height:1.6;}
	.jb-bbs .blist table tbody tr:last-child td {border-bottom:none;}
	.jb-bbs .blist table tbody tr td.company {font-weight:600; font-size:1.12rem;}
	.jb-bbs .blist table tbody tr td.company div {margin-bottom:16px; color:#12417a;}
	.jb-bbs .blist table tbody tr td.company img {max-width:80%; max-height:24px;}
	.jb-bbs .blist table tbody tr td.subject .cont-sbj {font-weight:600; font-size:1.12rem; color:#12417a;}
	.jb-bbs .blist table tbody tr td.subject .cont-tag {padding-top:16px;}
	.jb-bbs .blist table tbody tr td.subject .cont-tag span {display:inline-block; margin-right:4px; padding:4px 6px; font-size:0.8rem; font-weight:400; color:#fff; border-radius:3px; background:#babbbc;}
	.jb-bbs .btnBbs {border-bottom:none;}
	.jb-sch {margin-top:40px;}
	.jb-sch form {display:flex; justify-content:center;} 
</style>

{ #cats }

{ CONTENTS['head_contents'] }

					<div class="bbs jb-bbs">
						<div class="blist">
							<table cellpadding="0" cellspacing="0" summary="게시판입니다.">
								<colgroup>
										<col width="18%">
										<col width="*">
										<col width="11%">
										<col width="11%">
										<col width="11%">
								</colgroup>
								<thead>
									<tr>
										<th scope="col" class="bgNo">기업명 <button class="btn_ord up" data-fld="cpny_name"></button><button class="btn_ord down" data-fld="cpny_name"></button></th>
										<th scope="col">구인내용 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
										<th scope="col">지원자격 </th>
										<th scope="col">근무형태 </th>
										<th scope="col">마감일 <button class="btn_ord up" data-fld="deadline"></button><button class="btn_ord down" data-fld="deadline"></button></th>
									</tr>
								</thead>
								<tbody>
								{ @ LIST }
									<tr class="{ ? .lev > 0 }answer { / }">
										<td class="company">
											<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }"" class="{ ? CAN_READ != 'Y' }no_auth{ / }" data-idno="{ .idno }">
												<div class="txt">{ .cpny_name }</div>
												{ ? .file[0] != null }
												<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file[0]['file_name_saved'] }" alt="썸네일 이미지"/>
												{ / }
											</a>
										</td>
										<td class="subject">
											<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" data-idno="{ .idno }">
												<p class="cont-sbj">
												{ .subject }{ ? .new_yn == 'Y' }&nbsp;<img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }
												{ ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }
												</p>
												<p class="cont-tag">
													<span>{ .cpny_rnum } 명 모집</span>
												</p>
											</a>
										</td>
										<td class="cont-career">
											<strong>{ .cpny_career }</strong><br>
											<span>{ .cpny_qualify }</span><br>
											<span>{ .cpny_edu }</span>
										</td>
										<td>{ .cpny_type }</td>
										<td>
										<span class="jb_deadline { ? .category_title == '마감' }d-day{ / }">{ .deadline }</span>
										<span class="jb_d-cate { ? .category_title == '마감' }d-day{ / }">{ .category_title }</span>
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
						{ ? USERINFO['division'] == 'c' }
						<div class="btnBbs ar">
							<div class="right">
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
							</div>
						</div>
						{ / }
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
