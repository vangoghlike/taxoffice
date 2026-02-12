<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<!-- sub_title end -->

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
				검색결과</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">검색결과</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="side">
			<div class="left">
				<div class="countTotal">
					Total : 31</div>
			</div>
		</div>
		<div class="bbs">
			<div class="blist">
				<table cellpadding="0" cellspacing="0" summary="게시판입니다.">
					<colgroup>
						<col>
						<col>
						<col width="*">
						<col />
						<col>
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="bgNo">번호</th>
							<th scope="col">게시판명</th>
							<th scope="col">제목 <button class="btn_ord up" data-fld="subject"></button><button class="btn_ord down" data-fld="subject"></button></th>

							<th scope="col">작성자 <button class="btn_ord up" data-fld="writer_name"></button><button class="btn_ord down" data-fld="writer_name"></button></th>
							<th scope="col" class="mb_hd">날짜 <button class="btn_ord up" data-fld="reg_date"></button><button class="btn_ord down" data-fld="reg_date"></button></th>
						</tr>
					</thead>
					<tbody>
						<tr class="notice ">
							<td class="td_num"><img src="/pages/default/images/sub/btNotice.png" alt="Notice" /></td>
							<td><a href="/341" target="_blank">외투기업 업무 (게시판)<br>(외국인투자과세)&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/341/415/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29493" class="" data-idno="29493">외국인의 국내투자업무 안내(1)</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2019-12-16</td>
						</tr>
						<tr class="">
							<td class="td_num">30</td>
							<td><a href="/341" target="_blank">외투기업 업무 (게시판)<br>(외국인투자과세)&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/341/415/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=30226" class="" data-idno="30226">외국인의 국내부동산 취득 양도 </a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2021-09-08</td>
						</tr>
						<tr class="">
							<td class="td_num">29</td>
							<td><a href="/86" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/86/114/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=30225" class="" data-idno="30225">[웹진] 외국인의 국내 부동산 취득 양도 </a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2021-09-08</td>
						</tr>
						<tr class="">
							<td class="td_num">28</td>
							<td><a href="/451" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/451/526/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=30225" class="" data-idno="30225">[웹진] 외국인의 국내 부동산 취득 양도 </a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2021-09-08</td>
						</tr>
						<tr class="">
							<td class="td_num">27</td>
							<td><a href="/86" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/86/114/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29756" class="" data-idno="29756">[웹진] 외국인의 국내투자 업무 안내 <1></a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2020-11-10</td>
						</tr>
						<tr class="">
							<td class="td_num">26</td>
							<td><a href="/451" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/451/526/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29756" class="" data-idno="29756">[웹진] 외국인의 국내투자 업무 안내 <1></a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2020-11-10</td>
						</tr>
						<tr class="">
							<td class="td_num">25</td>
							<td><a href="/341" target="_blank">외투기업 업무 (게시판)<br>(외국인투자과세)&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/341/415/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29653" class="" data-idno="29653">외국인 투자기업 자주 묻는 질문사례(FAQ)</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2020-06-26</td>
						</tr>
						<tr class="">
							<td class="td_num">24</td>
							<td><a href="/168" target="_blank">인사급여. 4대보험업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/168/231/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29631" class="" data-idno="29631">건강보험 외국인 피부양자 등록</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2020-05-15</td>
						</tr>
						<tr class="">
							<td class="td_num">23</td>
							<td><a href="/169" target="_blank">인사급여업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/169/234/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=29631" class="" data-idno="29631">건강보험 외국인 피부양자 등록</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2020-05-15</td>
						</tr>
						<tr class="">
							<td class="td_num">22</td>
							<td><a href="/86" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/86/114/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=2654" class="" data-idno="2654">[웹진] 외국인의 국내투자 업무 안내</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2019-01-14</td>
						</tr>
						<tr class="">
							<td class="td_num">21</td>
							<td><a href="/451" target="_blank">세금이야기&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/451/526/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=2654" class="" data-idno="2654">[웹진] 외국인의 국내투자 업무 안내</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2019-01-14</td>
						</tr>
						<tr class="">
							<td class="td_num">20</td>
							<td><a href="/62" target="_blank">외투 법인 설립 업무 사례&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/62/78/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=2181" class="" data-idno="2181">외국인의 국내 투자 신고 절차 흐름도</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2017-06-16</td>
						</tr>
						<tr class="">
							<td class="td_num">19</td>
							<td><a href="/452" target="_blank">외투법인설립(게시판)(no)&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/452/527/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=2181" class="" data-idno="2181">외국인의 국내 투자 신고 절차 흐름도</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2017-06-16</td>
						</tr>
						<tr class="">
							<td class="td_num">18</td>
							<td><a href="/179" target="_blank">양도소득세&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/179/244/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=1426" class="" data-idno="1426">외국인의 부동산취득절차와 영주권취득</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2012-01-25</td>
						</tr>
						<tr class="">
							<td class="td_num">17</td>
							<td><a href="/331" target="_blank">양도소득세 상담 사례&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/331/405/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=1426" class="" data-idno="1426">외국인의 부동산취득절차와 영주권취득</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2012-01-25</td>
						</tr>
						<tr class="">
							<td class="td_num">16</td>
							<td><a href="/177" target="_blank">법인세&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/177/242/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=978" class="" data-idno="978">외국인 또는 비거주자에게 인적용역 등 지급 시 해당 규정 검토</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2007-09-08</td>
						</tr>
						<tr class="">
							<td class="td_num">15</td>
							<td><a href="/168" target="_blank">인사급여. 4대보험업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/168/231/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=611" class="" data-idno="611">외국인근로자의 소득세검토(특례세율과 일반세율의 적용)</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2016-05-02</td>
						</tr>
						<tr class="">
							<td class="td_num">14</td>
							<td><a href="/169" target="_blank">인사급여업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/169/234/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=611" class="" data-idno="611">외국인근로자의 소득세검토(특례세율과 일반세율의 적용)</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2016-05-02</td>
						</tr>
						<tr class="">
							<td class="td_num">13</td>
							<td><a href="/168" target="_blank">인사급여. 4대보험업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/168/231/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=598" class="" data-idno="598">국내 체류 및 내국법인에 근무 중인 외국인에 대한 4 대 보험의 처리</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2014-06-17</td>
						</tr>
						<tr class="">
							<td class="td_num">12</td>
							<td><a href="/169" target="_blank">인사급여업무&nbsp;<img src="/pages/default/images/btn/shortcutIcon.png" alt="바로가기 아이콘" /></a></td>
							<td class="subject"><a target="_blank" href="/169/234/read?&search_fld=subject&search=%EC%99%B8%EA%B5%AD%EC%9D%B8&idno=598" class="" data-idno="598">국내 체류 및 내국법인에 근무 중인 외국인에 대한 4 대 보험의 처리</a></td>
							
							<td class="td_name">관리자</td>
							<td class="mb_hd">2014-06-17</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- //blist -->
		</div>
		<div class="page_navi" data-count="31" data-size="20 " data-page="1" data-block="5">
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