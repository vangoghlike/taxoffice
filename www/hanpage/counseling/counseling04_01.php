<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/nav.php";?>
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
				세금이야기</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>상담센터</span><span class="last">세금이야기</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="side">
			<div class="left">
				<div class="countTotal">
					Total : 126</div>
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
							<td class="td_num">126</td>
							<td class="subject"><a href="/451/526/read?&idno=30258" class="" data-idno="30258">[웹진] 지식산업센터</a> <img src="/pages/default/images/sub/icon_new.png" alt="새글" class="b_icon" /></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-11-09</td>
							<td class="td_hit mb_hd">69</td>
						</tr>
						<tr class="">
							<td class="td_num">125</td>
							<td class="subject"><a href="/451/526/read?&idno=30243" class="" data-idno="30243">[웹진] 임원의 퇴직금과 직원의 퇴직금 검토 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-10-10</td>
							<td class="td_hit mb_hd">284</td>
						</tr>
						<tr class="">
							<td class="td_num">124</td>
							<td class="subject"><a href="/451/526/read?&idno=30225" class="" data-idno="30225">[웹진] 외국인의 국내 부동산 취득 양도 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-09-08</td>
							<td class="td_hit mb_hd">674</td>
						</tr>
						<tr class="">
							<td class="td_num">123</td>
							<td class="subject"><a href="/451/526/read?&idno=30160" class="" data-idno="30160">[웹진] 거주자 및 비거주자 구분에 따른 상속공제와 증여공제 범위 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-08-09</td>
							<td class="td_hit mb_hd">362</td>
						</tr>
						<tr class="">
							<td class="td_num">122</td>
							<td class="subject"><a href="/451/526/read?&idno=30121" class="" data-idno="30121">[웹진] 주택시장안정을 위한 세제개선안 내용 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-07-08</td>
							<td class="td_hit mb_hd">392</td>
						</tr>
						<tr class="">
							<td class="td_num">121</td>
							<td class="subject"><a href="/451/526/read?&idno=30088" class="" data-idno="30088">[웹진] 주택에 적용되는 각종 세율 모음 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-06-13</td>
							<td class="td_hit mb_hd">509</td>
						</tr>
						<tr class="">
							<td class="td_num">120</td>
							<td class="subject"><a href="/451/526/read?&idno=30032" class="" data-idno="30032">[웹진] 종합소득세 과세 체계</a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-05-10</td>
							<td class="td_hit mb_hd">631</td>
						</tr>
						<tr class="">
							<td class="td_num">119</td>
							<td class="subject"><a href="/451/526/read?&idno=30031" class="" data-idno="30031">[웹진] 가산세 정리 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-05-10</td>
							<td class="td_hit mb_hd">359</td>
						</tr>
						<tr class="">
							<td class="td_num">118</td>
							<td class="subject"><a href="/451/526/read?&idno=30029" class="" data-idno="30029">[웹진] 소득공제 및 세액공제 정리 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-05-10</td>
							<td class="td_hit mb_hd">424</td>
						</tr>
						<tr class="">
							<td class="td_num">117</td>
							<td class="subject"><a href="/451/526/read?&idno=29989" class="" data-idno="29989">[웹진] 부동산 거래 신고와 자금조달 계획서 제출 </a></td>
							<td class="td_file mb_hd"> <img src="/pages/default/images/sub/icon_file.png" alt="첨부파일" class="b_icon" /></td>
							<td class="td_name">관리자</td>
							<td class="td_day">2021-04-09</td>
							<td class="td_hit mb_hd">455</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- //blist -->
			<div class="btnBbs ar">
				<div class="right">
					<a href="/451/526/write?" class="no_authM">글쓰기</a>
				</div>
			</div>
		</div>
		<div class="page_navi" data-count="126" data-size="10 " data-page="1" data-block="5">
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