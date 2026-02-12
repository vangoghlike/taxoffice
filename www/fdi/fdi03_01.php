<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				조세조약</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>외국인투자기업업무</span><span class="last">조세조약</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="side">
			<div class="left">
				<div class="countTotal">
					Total : 7</div>
			</div>
			<div class="right">
				<div class="searchArea">
					<form id="frm_search" name="frm_search" method="get">
						<input type="hidden" name="category_idno" value="" />
						<input type="hidden" name="ord" value="" />
						<select title="검색어 분류" name="search_fld">
							<option value="all">전체</option>
							<option value="subject">제목</option>
							<option value="contents">내용</option>
							<option value="writer_name">작성자</option>
						</select>
						<input type="text" name="search" value="" title="검색어를 입력하세요." placeholder="검색어를 입력하세요." />
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
						<col width="*">
						<col>
						<col>
						<col>
						<col>
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="bgNo">번호</th>
							<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>
							<th scope="col" class="mb_hd">첨부파일</th>
							<th scope="col">작성자 <button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
							<th scope="col">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
							<th scope="col" class="mb_hd">조회수 <button class="btn_ord up" data-fld="hits"></button><button class="btn_ord down" data-fld="hits"></button></th>
						</tr>
					</thead>
					<tbody>
						<tr class="">
							<td class="td_num">7</td>
							<td class="subject"><a href="/342/416/read?&idno=29980" class="" data-idno="29980">한눈에 보는 나라별 제한세율표 (주요국)</a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-03-29</td>
							<td class="td_hit mb_hd">424</td>
						</tr>
						<tr class="">
							<td class="td_num">6</td>
							<td class="subject"><a href="/342/416/read?&idno=29930" class="" data-idno="29930">아포스티유 협약 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">배호영</td>
							<td class="td_day">2021-02-03</td>
							<td class="td_hit mb_hd">405</td>
						</tr>
						<tr class="">
							<td class="td_num">5</td>
							<td class="subject"><a href="/342/416/read?&idno=2960" class="" data-idno="2960">외국법인의 과세체계(조세조약)</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">관리자</td>
							<td class="td_day">2019-11-26</td>
							<td class="td_hit mb_hd">677</td>
						</tr>
						<tr class="">
							<td class="td_num">4</td>
							<td class="subject"><a href="/342/416/read?&idno=2666" class="" data-idno="2666">인적용역소득과 사용료소득</a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2019-02-12</td>
							<td class="td_hit mb_hd">831</td>
						</tr>
						<tr class="">
							<td class="td_num">3</td>
							<td class="subject"><a href="/342/416/read?&idno=2491" class="" data-idno="2491">비거주자 및 외국법인의 국내원천소득에 대한 제한세율 정리</a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2018-05-03</td>
							<td class="td_hit mb_hd">801</td>
						</tr>
						<tr class="">
							<td class="td_num">2</td>
							<td class="subject"><a href="/342/416/read?&idno=414" class="" data-idno="414">소프트웨어 도입시 국제조세(미국)</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">관리자</td>
							<td class="td_day">2010-08-04</td>
							<td class="td_hit mb_hd">3187</td>
						</tr>
						<tr class="">
							<td class="td_num">1</td>
							<td class="subject"><a href="/342/416/read?&idno=411" class="" data-idno="411">S/W도입시 A/S관련 용역재공대가 소득구분</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">관리자</td>
							<td class="td_day">2010-07-09</td>
							<td class="td_hit mb_hd">2454</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- //blist -->
			<div class="btnBbs ar">
				<div class="right">
					<a href="/342/416/write?" class="no_authM">글쓰기</a>
				</div>
			</div>
		</div>
		<div class="page_navi" data-count="7" data-size="10 " data-page="1" data-block="5">
			<div class="paging paging_group">
				<a href="#" class="first pn_first"><span class="skip">처음 페이지</span></a>
				<a href="#" class="prev pn_prev"><span class="skip">이전 페이지</span></a>
				<span class="num">
					<a href="#" class="pn_paging_set pn_paging pn_page">1</a>
				</span>
				<a href="#" class="next pn_next"><span class="skip">다음 페이지</span></a>
				<a href="#" class="last pn_last"><span class="skip">마지막 페이지</span></a>
			</div>
		</div>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>