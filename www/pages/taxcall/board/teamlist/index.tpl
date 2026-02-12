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


<style>
	.subContent .subTopInfo { margin-bottom:0px; border:none; }
	.catsWrap { text-align:center; }
	
	
	
	.catsBtn { display:inline-block; margin:16px 8px 32px; }
	.catsBtn a { display:block; position:relative; padding:16px 24px; }
	.catsBtn.on a:after { content:''; display:block; position:absolute; left:10%; bottom:2px; width:80%; height:2px; background:#ded8d8; } 
	.jb-type {margin-bottom:0;}
	.jb-type .jb-tab li {border:none;}
	.jb-type .jb-tab li a {background:#f8f9fa; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
	.jb-type .jb-tab li:first-child a {border-left:1px solid #e4e5e6;}
	.jb-type .jb-tab li.on {border:none;}
	.jb-type .jb-tab li.on a {color:#fff; background:#0b4ea2; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
	.jb-type .jb-tab li.on:first-child a {border-left:1px solid #e4e5e6;}
	
	.blist { margin:0 auto; margin-left:12px; margin-bottom:64px; width:auto; border:none; text-align:center; }
	.blist figure { display: inline-block; width:320px; margin:0px 16px 32px 16px; box-shadow:0px 0px 12px rgba(0,0,0,0.1); transition:all .6s; }
	.blist figure .pic { position:relative; width:320px; height:180px; overflow:hidden; background:#ded8d8; }
	.blist figure .pic .tl_opn_bg {
		position: absolute;
		top:0;
		left:0;
		width: 0;
		height: 0;
		border-top: 40px solid #195dae;
		border-right: 100px solid transparent;
		opacity: 0.95;
		z-index: 1;
	}
	.blist figure .pic .tl_opn {
		position:absolute;
		top:0;
		left:0;
		padding-top:4px;
		padding-left:4px;
		width:100px;
		height:40px;
		line-height:1.6;
		color:#fff;
		text-align: left;
		font-weight:600;
		z-index: 10;
	}
	.blist figure:hover { box-shadow:0px 0px 16px rgba(0,0,0,0.20); }
	.blist figure .pic img { position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); min-width:100%; max-width:480px; min-height:200px; transition:all .6s; z-index:0; }
	.blist figure:hover .pic img { max-width:560px; min-height:220px;  }
	.blist figure figcaption { padding:12px 16px; min-height:72px; }
	.blist figure figcaption p {text-align:left;}
	.blist figure figcaption p.subject { padding:4px 0px 10px; font-size:1.04rem; font-weight:600; color:#202626; text-align:left; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
	.blist figure figcaption p.writer { text-align:right; font-style:italic; font-size:0.88rem; color:#404646; }
	.writer_info {
		margin-bottom:16px;
	}
	.writer_info:after {
		clear:both;
		content:'';
		display:block

	}
	.writer_info aside.left {
		float:left;
		width:72px;
		text-align:left;
	}
	.writer_info aside.left img {
		width:64px;
		height:64px;
		border-radius:50%;
	}
	.writer_info aside.right {
		float:left;
		padding-top:12px;
		padding-left:16px;
		line-height:1.6;
	}
	.writer_info aside.right strong {
		color:#195dae;
		font-size:16px;
	}
	.blist figure figcaption .tag {
		display:inline-block;
		margin:0 4px 0 0;
		padding:2px 4px;
		border:1px solid #eaeaea;
		border-radius:4px;
	}
	.blist figure figcaption p.tl_intro {
		/* 여러 줄 자르기 추가 스타일 */
		white-space: normal;
		line-height: 1.8;
		height: 3.2rem;
		text-align: left;
		word-wrap: break-word;
		display: -webkit-box;
		-webkit-line-clamp:2;
		-webkit-box-orient: vertical;
		border-bottom:1px solid #eee;
		margin-bottom:12px;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.blist figure figcaption p.tl_info {
		display: inline-block;
		text-overflow:ellipsis;
		white-space:nowrap;
		word-wrap:normal;
		width:100%;
		overflow:hidden;
	}
	.moreBtn {
		display:block;
		margin:20px auto 4px;
		padding:8px 0;
		border:1px solid #eee;
		border-radius:4px;
		text-align: center;
		cursor:pointer;
		font-weight:600;
		transition:all .6s;
	}
	.moreBtn:hover {
		background:#12417a;
		color:#fff;
	}

	.thumb {text-align:center;}
	.thumb a {position:relative; display:block; padding:0px; text-align:left;}
	.thumb img {display:block; margin:0; max-height:112px; max-width:160px;}
	
	.thumb .txt {position:absolute; top:0px; left:0; padding: 4px 6px; display:inline-block; min-width:40px; font-size: 0.8rem; font-weight: 600; color: #fff; background:#202626; text-align:center;}
	
	.btnBbs { border:none; }
</style>

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
						    	{ ? .file[1] != null }
									<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file[1]['file_name_saved'] }" alt="썸네일 이미지"/>
								{ : }
									<img src="/pages/default/images/common/default.jpg" alt="기본 이미지"/>
								{ / }
									<div class="tl_opn_bg"></div>
									<div class="tl_opn">{ .tl_opn } 호</div>
								</div>
						    	<figcaption>
									<div class="writer_info">
										<aside class="left">
											<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file[0]['file_name_saved'] }" alt="{ .tl_name } 세무사"/>
										</aside>
										<aside class="right">
											<p>
												<strong>{ .tl_brand }</strong><br>
												{ .tl_name } 세무사
											</p>
										</aside>
									</div>
									<p class="tl_intro">{ .tl_intro }</span></p>
									<p class="tl_info" style="line-height:1.4;margin-bottom:2px;"><span class="tag">업무</span><span class="txt">{ .tl_job }</span></p>
									<p class="tl_info" style="line-height:1.4 "><span class="tag">위치</span><span class="txt">{ .tl_addr }</span></p>

									<a class="moreBtn" href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }">더 보기</a>
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
