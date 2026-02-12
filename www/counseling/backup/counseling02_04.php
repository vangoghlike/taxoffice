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
				신고 도움 서비스</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>상담센터</span><span>신고 도움 서비스</span><span>양도 소득세 신고</span><span class="last">업무게시판</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="tabType01 type suitable">
			<ul>
				<li class="menu246 on" style="width:16.6666666667%"><a href="/246">양도 소득세 신고</a></li>
				<li class="menu247" style="width:16.6666666667%"><a href="/247">증여세 신고</a></li>
				<li class="menu248" style="width:16.6666666667%"><a href="/248">상속세 신고</a></li>
				<li class="menu249" style="width:16.6666666667%"><a href="/249">부가가치세 신고</a></li>
				<li class="menu250" style="width:16.6666666667%"><a href="/250">소득세 신고</a></li>
				<li class="menu251" style="width:16.6666666667%"><a href="/251">법인세 신고</a></li>
			</ul>
		</div>
		<div class="tabType02 suitable">
			<ul>
				<li class="menu270" style="width:25%"><a href="/270"><strong>신고 의뢰</strong></a></li>
				<li class="menu252" style="width:25%"><a href="/252">기본개념</a></li>
				<li class="menu258" style="width:25%"><a href="/258">필요서류 안내</a></li>
				<li class="menu276 on" style="width:25%"><a href="/276">업무게시판</a></li>
			</ul>
		</div>
		<div class="h3Wrap line">
			<h3>
				업무게시판</h3>
		</div>
		<div class="side">
			<div class="left">
				<div class="countTotal">
					Total : 24</div>
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
							<td class="td_num">24</td>
							<td class="subject"><a href="/276/350/read?&idno=30260" class="" data-idno="30260">건축인허가 받은 토지 양도시 비사업용토지여부</a> <img src="/pages/default/images/sub/icon_new.png" alt="새글" class="b_icon" /></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">정혜미</td>
							<td class="td_day">2021-11-10</td>
							<td class="td_hit mb_hd">77</td>
						</tr>
						<tr class="">
							<td class="td_num">23</td>
							<td class="subject"><a href="/276/350/read?&idno=30255" class="" data-idno="30255">주택으로 양도 ? 상가로 양도 ?</a> <img src="/pages/default/images/sub/icon_new.png" alt="새글" class="b_icon" /></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">배호영</td>
							<td class="td_day">2021-11-05</td>
							<td class="td_hit mb_hd">48</td>
						</tr>
						<tr class="">
							<td class="td_num">22</td>
							<td class="subject"><a href="/276/350/read?&idno=30236" class="" data-idno="30236">조정대상지역 1세대 1주택 보유기간 계산</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">장호연</td>
							<td class="td_day">2021-09-24</td>
							<td class="td_hit mb_hd">299</td>
						</tr>
						<tr class="">
							<td class="td_num">21</td>
							<td class="subject"><a href="/276/350/read?&idno=30209" class="" data-idno="30209">증여받은 후 신축판매 시 이월과세 적용여부</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">최유정</td>
							<td class="td_day">2021-08-31</td>
							<td class="td_hit mb_hd">347</td>
						</tr>
						<tr class="">
							<td class="td_num">20</td>
							<td class="subject"><a href="/276/350/read?&idno=30168" class="" data-idno="30168">증여공제 및 증여세율 적용에 관한 질문</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">김대원</td>
							<td class="td_day">2021-08-20</td>
							<td class="td_hit mb_hd">315</td>
						</tr>
						<tr class="">
							<td class="td_num">19</td>
							<td class="subject"><a href="/276/350/read?&idno=30154" class="" data-idno="30154">한 해에 아파트 2채 매도시 양도소득세 </a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">배호영</td>
							<td class="td_day">2021-08-05</td>
							<td class="td_hit mb_hd">316</td>
						</tr>
						<tr class="">
							<td class="td_num">18</td>
							<td class="subject"><a href="/276/350/read?&idno=30123" class="" data-idno="30123">도시개발구역 지정 토지의 비사업용 여부</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">김지홍</td>
							<td class="td_day">2021-07-08</td>
							<td class="td_hit mb_hd">338</td>
						</tr>
						<tr class="">
							<td class="td_num">17</td>
							<td class="subject"><a href="/276/350/read?&idno=30120" class="" data-idno="30120">배우자로 증여받은 경우 보유기간</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">장호연</td>
							<td class="td_day">2021-07-08</td>
							<td class="td_hit mb_hd">299</td>
						</tr>
						<tr class="">
							<td class="td_num">16</td>
							<td class="subject"><a href="/276/350/read?&idno=30109" class="" data-idno="30109">다가구주택의 1세대 1주택 비과세</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">김지홍</td>
							<td class="td_day">2021-06-24</td>
							<td class="td_hit mb_hd">458</td>
						</tr>
						<tr class="">
							<td class="td_num">15</td>
							<td class="subject"><a href="/276/350/read?&idno=30089" class="" data-idno="30089">법률상 이혼시 1세대 1주택 비과세</a></td>
							<td class="td_file mb_hd"> </td>
							<td class="td_name">장호연</td>
							<td class="td_day">2021-06-14</td>
							<td class="td_hit mb_hd">366</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- //blist -->
			<div class="btnBbs ar">
				<div class="right">
					<a href="/276/350/write?" class="no_authA">글쓰기</a>
				</div>
			</div>
		</div>
		<div class="page_navi" data-count="24" data-size="10 " data-page="1" data-block="5">
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