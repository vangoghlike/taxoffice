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

					<div class="gallery video_gallery">
						<ul>
						{ @ LIST }
							{ ? LIST.id.kind == 'youtube#video' }
							<li>
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&videoId={ LIST.id.videoId }&title={ LIST.snippet.title }" class="{ ? CAN_READ != 'Y' }no_auth{ / }" data-idno="{ .idno }">
									<div class="img">
										<img src="{ LIST.snippet.thumbnails.medium.url }" alt="썸네일 이미지" width="320" height="180" />
									</div>
									<div class="txt">{ LIST.snippet.title } &nbsp;
									<a class="pop-btn" href="https://www.youtube.com/watch?v={ LIST.id.videoId }">
										<i class="fa fa-youtube-play" aria-hidden="true"></i>&nbsp;팝업창 보기
									</a>
										<br>
{*										<span>{ =date('Y-m-d', LIST.snippet.publishedAt) }</span>*}
									</div>
								</a>
							</li>
							{ / }
						{ / }
						{ ? !LIST.size_ }
							<li>등록된 게시물이 없습니다.</li>
						{ / }
						</ul>
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
		<link rel="stylesheet" type="text/css" href="{ TYPE_URL }/css/YouTubePopUp.css"  media="all" />
		<script type="text/javascript" src="{ TYPE_URL }/js/YouTubePopUp.jquery.js" ></script>
		<script type="text/javascript" src="{ TYPE_URL }/js/board.youtube.js" ></script>
{ #footer }
