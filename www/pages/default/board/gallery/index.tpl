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

					<div class="gallery">
						<ul>
						{ @ LIST }
							<li>
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }"" class="{ ? CAN_READ != 'Y' }no_auth{ / }" data-idno="{ .idno }">
									<div class="img">
										<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file[0]['file_name_saved'] }" alt="썸네일 이미지" width="240" height="180" />
									</div>
									<div class="txt">{ .subject }</div>
								</a>
							</li>
						{ / }
						{ ? !LIST.size_ }
							<li>등록된 게시물이 없습니다.</li>
						{ / }
						</ul>
					</div>

					<div class="btnBbs ar">
						<div class="right">
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }"{ ? CAN_WRITE != 'Y' } class="no_auth{ CONF['auth_write'] }"{ / }>글쓰기</a>
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
