<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>{SITE_INFO['doc_title']}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
<!-- naver serch -->
{*<meta name="naver-site-verification" content="de83ffae6849e85e3581f80d9b2a547f76cf8d07"/>*}
<meta name="keywords" content="한페이지, 디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문, 세무법인, 세법, 세무, 세무사, 금천구, 강남">
<meta name="classification" content="한페이지">
<meta name="description" content="한페이지, 디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문">
<meta property="og:type" content="website" />
<meta property="og:title" content="한페이지" />
<meta property="article:author" content="한페이지" />
<meta property="og:description" content="한페이지, 디지털단지, 벤처기업 창업, 외투기업설립, 재무보고, 가업승계 자문" />
<meta property="og:url" content="http://www.han-page.co.kr">
<link rel="canonical" href="http://www.han-page.co.kr">
<!-- // naver serch -->
<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="/pages/default/images/h1Logo.ico">
{ COMMON_CSS }
{*<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" ></script>*}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
{ ? MAIN_PAGE == true }
<script type="text/javascript" src="/common/js/jquery.bxslider.min.js" ></script>
{ / }
<script type="text/javascript" src="/common/js/common.js" ></script>
<script type="text/javascript" src="{TYPE_URL}/js/common.js" ></script>
<script type="text/javascript">
var curr_menu_no = [{ @ CONTENTS['breadcrumbs'] }{ ? .index_ > 0 },{ / }'{ .idno }'{ / }];
</script>
{ COMMON_JS }
{ ? MAIN_PAGE == true }
	<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/page_main.css"  media="all" />
	<script type="text/javascript" src="/common/js/main.js" ></script>
{ / }

</head>
<body class="{ ? MENU_ORD_NO == '0' }no_subtop{ / }">
	<!-- Skip Nav -->
	<div id="skipnavigation">
		<a href="#container">본문내용 바로가기</a>
	</div>
	<!-- //Skip Nav -->
	<!-- Wrap -->
	<div class="wrap">

		<!-- Head -->
		<div class="head">
			<!-- topMenu -->
			<div class="topMenu">
				<div class="tmWrap">
					<ul class="sMenu">
						<li><a href="{ BASE_URL }/{ HAN_PAGE_MAIN_URL }">Home</a></li>
						<li>{ ? USERINFO['user_id'] }<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>{ : }<a href="{ BASE_URL }/login">Login</a>{ / }</li>
						<li>{ ? USERINFO['user_id'] }<a href="{ BASE_URL }/userinfo">MyPage</a>{ : }<a href="{ BASE_URL }/joind">Join</a>{ / }</li>
						<li><a href="{ BASE_URL }/sitemap">Sitemap</a></li>
						{ ? USERINFO['user_id'] }<li><span>{ USERINFO['user_name'] }({ USERINFO['user_id'] })님 접속중</span></li>{ / }
					</ul>
					<ul class="tmShortcut">
{*				        <li><a href="http://www.taxcallcenter.com" target="_self"><strong>온비즈 택스</strong><br>*}
{*				Tax Call Center</a></li>*}
				        <li class="linkSelect" style="display:none;">
				            <a class="selectedLink">공유사무실&nbsp;<i class="fa fa-angle-down"></i></a>
				            <ul class="subLink">
				                <li>
				                    <a href="http://www.selimbiz.co.kr/" target="_self">금천센터&nbsp;</a>
				                </li>
				                <li>
				                    <a href="http://www.selimbiz.co.kr/" target="_self">aa센터&nbsp;</a>
				                </li>
				                <li>
				                    <a href="http://www.selimbiz.co.kr/" target="_self">bb센터&nbsp;</a>
				                </li>
				                <li class="slClose">
				                    <a>접기</a>
				                </li>
				            </ul>
				        </li>
{*				        <li><a href="http://www.taxoffice.co.kr" target="_self"><strong>세림세무법인</strong><br>*}
{*				            SELIM</a></li>*}
				        <li><a href="http://www.taxoffice.co.kr" target="_self">
							<img src="{ TYPE_URL }/images/common/h1Logo.png" alt="세림세무법인"/>
							</a>
						</li>
{*				        <li><a href="http://www.taxbizinfo.com" target="_self"><strong>세무경영정보</strong><br>*}
{*				            TaxBiz Info</a></li>*}
{*				        <li><a href="/" target="_self"><strong>한페이지 세무정보</strong><br>*}
{*				            Han-page</a></li>*}
{*				        <li style="display:none;"><a href="http://www.taxquiz.co.kr" target="_self"><strong>지식마당</strong><br>*}
{*											Tax Academy</a></li>*}
{*				        <li style="display:none;"><a onclick="javascript:alert('준비중입니다')">세무인·회계맨</a></li>*}
				    </ul>
					
					
					
				</div>
			</div>
			<!-- topHead -->
			<div class="topHead">
				<div class="h1Wrap">
					<h1><a href="{ BASE_URL }/{ HAN_PAGE_MAIN_URL }"><img src="{TYPE_URL}/images/common/taxcall_logo.png.png" alt="한페이지"></a></h1>
				</div>
				<a class="mb_selim_link" href="http://www.taxoffice.co.kr" target="_self">
					<img src="{ TYPE_URL }/images/common/h1Logo.png" alt="세림세무법인"/>
				</a>
				<!-- gnbWrap -->
				<div class="gnbWrap">

					<div class="gnbList">
						<ul>
							{ @ MENU['top'] }
							<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
							{ / }
{*							<li class="gnb_nav"><button type="button" class="gnb_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i></button></li>*}
						</ul>

						<!--
						<ul>
						{ @ MENU['top'] }
							{ ? .index_ < 3 }
							<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }"> { .menu_title }</a></li>
							{ / }
						{ / }
						</ul>
						<ul>
						{ @ MENU['top'] }
							{ ? .index_ < 3 }
								{ ? .index_ == 0 }
							<li class="menu{ .idno } menuSelect" style="display:none;">
								<a href="{ BASE_URL }/{ .idno }">{ .menu_title }&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
								<ul class="submenu">
								{ : .index_ == 1 }
									<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }"> { .menu_title }</a></li>
								{ : .index_ == 2 }
									<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }"> { .menu_title }</a></li>
								</ul>
							</li>
								{ / }
							{ : }
							<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }"> { .menu_title }</a></li>
							{ / }
						{ / }
						</ul>-->
					</div>
					<div class="menu-btn__wrap">
						<a class="menu-btn hp-btn" target="_self" href="{ BASE_URL }/406">
							한페이지 세무정보
						</a>
					</div>
{*					<div class="menu-btn__wrap">*}
{*						{ ? USERINFO['user_auth'] == '["*"]' }*}
{*						<a class="menu-btn qna-btn" target="_self" href="{ BASE_URL }/412">*}
{*							질문함*}
{*						</a>*}
{*						{ : }*}
{*						<a class="menu-btn qna-btn" target="_self" href="{ BASE_URL }/411/485/write?">*}
{*							질문함*}
{*						</a>*}
{*						{ / }*}
{*					</div>*}
				</div>
				<!-- //gnbWrap -->
			</div>
			<!-- //topHead -->

			<button type="button" class="gnb_menu_btn mb"><i class="fa fa-bars" aria-hidden="true"></i></button>
			<!-- gnb_nav_all -->
			<div class="gnb_all">
				<div class="gnb_bg"></div>

				<div class="gnb_all_wrap">
					{ @ MENU['top'] }
					{ ? .index_ %4 == 0 }{ ? .index_ }</ul>{ / }<ul class="gnb_1li">{ / }
						<li><a href="{ BASE_URL }/{ .idno }" class="tit">{ .menu_title }</a>
							<ul class="gnb_2li">
							{ @ MENU[.idno] }
								<li><a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a>
								{ ? sizeof(MENU[..idno]) > 0 }
									<ul class="gnb_3li">
									{ @ MENU[..idno] }
										<li>- <a href="{ BASE_URL }/{ ...idno }">{ ...menu_title }</a></li>
									{ / }
									</ul>
								{ / }
								</li>
							{ / }
							{ ? !sizeof(MENU[.idno]) }
							{ @ MENU['top'][.key_]['tabs'] }
								<li><a href="{ BASE_URL }/{ .idno }/{ ..key_ }" class="subtit">{ ..value_ }</a></li>
							{ / }
							{ / }
							</ul>
						</li>
					{ / }
					</ul>
				</div>
			</div>
			<!-- // gnb_nav_all -->
		</div>
		<!-- //Head -->

		<!-- gnb_nav_all -->
		<div class="gnb_mb_all">
			<div class="gnb_mb_hd">
				<ul class="gnb_mb_tmShortcut">
					<li><a href="http://www.taxoffice.co.kr/" target="_self">세림세무법인</a></li>
					<li><a href="/" target="_self">한페이지 세무정보</a></li>
{*					<li><a onclick="javascript:alert('준비중입니다')">세무인·회계맨</a></li>*}
				</ul>
				<ul class="gnb_mb_user_menu">
					<li>{ ? USERINFO['user_id'] }<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>{ : }<a href="{ BASE_URL }/login">Login</a>{ / }</li>
					<li>{ ? USERINFO['user_id'] }<a href="{ BASE_URL }/userinfo">{ USERINFO['user_name'] }({ USERINFO['user_id'] })님 Page</a>{ : }<a href="{ BASE_URL }/joind">Join</a>{ / }</li>
				</ul>
			</div>
			<div class="gnb_mb_mn_wrap">
				<ul class="gnb_1li">
					<li><a href="{ BASE_URL }/" class="tit">Home</a></li>
					<li class="qna_li">
						{ ? USERINFO['user_auth'] == '["*"]' }
						<a href="{ BASE_URL }/412">
							질문함
						</a>
						{ : }
						<a href="{ BASE_URL }/411/485/write?">
							질문함
						</a>
						{ / }
					</li>
					<li class="han_li"><a href="{ BASE_URL }/406">한페이지 세무정보</a></li>
						{ @ MENU['top'] }
					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }" class="tit">{ .menu_title }</a>
						{ ? sizeof(MENU[.idno]) > 0 }<span class="gnb_1li_more">+</span>{ / }
						{ @ MENU[.idno] }
						<ul class="gnb_2li">
							<li class="menu{ .idno }"><a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a>
								{ ? sizeof(MENU[..idno]) > 0 }<span class="gnb_2li_more">+</span>{ / }
								{ ? sizeof(MENU[..idno]) > 0 }
								{ @ MENU[..idno] }
								<ul class="gnb_3li">
									<li class="menu{ .idno }"><a href="{ BASE_URL }/{ ...idno }">- { ...menu_title }</a></li>
								</ul>
								{ / }
								{ / }
							</li>
						</ul>
						{ / }
					</li>
					{ / }

				</ul>
			</div>
		</div>
		<!-- // gnb_nav_all -->

		<!-- deepBg -->
		<div class="deepBg">
			<button type="button" class="gnb_close_btn mb"><i class="fa fa-close"></i></button>
		</div>
		<!-- // deepBg -->