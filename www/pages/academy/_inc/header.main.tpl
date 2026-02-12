<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta charset="UTF-8">
<!-- naver webmaster tools -->
<meta name="naver-site-verification" content="796ad1a28c544c7a29e341bb41a4e21064321767"/>
<link rel="canonical" href="/">
<meta name="robots" content="ALL" />
<meta name="keywords" content="디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문, 세무법인, 세법, 세무, 세무사, 금천구, 강남">
<meta name="classification" content="세림세무법인">
<meta name="description" content="디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문">
<meta property="og:type" content="website" />
<meta property="og:title" content="세림세무법인" />
<meta property="article:author" content="세림세무법인" />
<meta property="og:description" content="디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문" />
<meta property="og:url" content="http://www.taxoffice.co.kr/" />
<meta property="og:image" content="{TYPE_URL}/images/common/selim_thumb.jpg" />

<title>{SITE_INFO['doc_title']}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
<link rel="shortcut icon" href="/pages/default/images/h1Logo.ico">
{ COMMON_CSS }
<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.bxslider.min.js" ></script>
<script type="text/javascript" src="/common/js/common.js" ></script>
<script type="text/javascript">
var curr_menu_no = [{ @ CONTENTS['breadcrumbs'] }{ ? .index_ > 0 },{ / }'{ .idno }'{ / }];
</script>
{ COMMON_JS }
</head>
<body>

	<!-- Skip Nav -->
	<div id="skipnavigation">
		<a href="#container">본문내용 바로가기</a>
	</div>
	<!-- //Skip Nav -->

	<!-- Wrap -->
	<div class="wrap">

		<!-- Head -->
		<div class="head">
			
			<!-- topHead -->
			<div class="topHead">
				<div class="h1Wrap">
					<h1><a href="{ BASE_URL }/"><img src="{TYPE_URL}/images/common/h1Logo.png" alt="세림법무법인"></a></h1>
				</div>
				<div class="rightArea">
					<ul class="sMenu">
						<li>
							{ ? USERINFO['user_id'] }
							<a class="hdInfoBtn"><span>{ USERINFO['user_name'] } 님</span>&nbsp;<img src="{TYPE_URL}/images/btn/bottomArrowBtn.png" alt="아래로"></a>
							<div class="topUserInfo off">
								<div class="info">
									<strong>{ USERINFO['user_name'] }님</strong> 환영합니다.<br>
									{ USERINFO['user_email'] }
								</div>
								<div class="act">
									<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>
									<a href="{ BASE_URL }/userinfo">MyPage</a>
								</div>
							</div>
							{ : }<a href="{ BASE_URL }/login">Login</a>{ / }
						</li>
						<li><a href="{ BASE_URL }/sitemap">Sitemap</a></li>
					</ul>
					<form id="frm_search" action="{ BASE_URL }/158/" name="frm_search" class="top_search" method="get">
						<input type="hidden" name="category_idno" value="{ _GET.category_idno }" />
						<input type="hidden" name="ord" value="{ _GET.ord }" />
						{ ? _GET.ord }<a href="#" class="btn_box green btn_ord init">기본순서로</a>{ / }
						<select title="검색어 분류" name="search_fld" style="display:none;">
							<option value="subject" selected="selected">제목</option>
						</select>
						<input type="text" name="search" value="{ =htmlspecialchars( _GET.search ) }" title="검색어를 입력하세요." placeholder="검색어 입력" />
						<button><a class="sbtn hd_act_board_search"/><img src="{TYPE_URL}/images/btn/searchBtn.png" alt="검색"></a></button>
					</form>
					<div class="langList">
						<p class="tit"><span>Korea</span></p>
						<ul>
							<li><a href="http://www.etaxoffice.co.kr">English</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- //topHead -->

			<!-- gnbWrap -->
			<div class="gnbWrap">
				<div class="gnbList">
					<ul>
					{ @ MENU['top'] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }<div class="pointOut"></div></a></li>
					{ / }
					</ul>
				</div>
			</div>
			<!-- //gnbWrap -->

		</div>
		<!-- //Head -->
