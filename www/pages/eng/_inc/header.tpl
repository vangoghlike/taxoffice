<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{SITE_INFO['doc_title']}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css?v=20210824"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="/pages/eng/images/h1Logo.ico">
{ COMMON_CSS }
{*<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" ></script>*}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.bxslider.min.js" ></script>
<script type="text/javascript" src="/common/js/common.js" ></script>
<script type="text/javascript">
var curr_menu_no = [{ @ CONTENTS['breadcrumbs'] }{ ? .index_ > 0 },{ / }'{ .idno }'{ / }];
</script>
{ COMMON_JS }
{ ? MAIN_PAGE == true }
<script type="text/javascript" src="/common/js/main.js" ></script>
{ / }
</head>
<body>

	<!-- Skip Nav -->
	<div id="skipnavigation">
		<a href="#container">Skip to content</a>
	</div>
	<!-- //Skip Nav -->

	{ ? MENU_NO == '119' }
	<div class="popup_iframe_wrap">
		<div class="pi_area">
			<h3>SAMPLE PAGE</h3><a class="pi_close_btn">×</a><iframe id="fdi_apply" class="pop_iframe" src="/pages/eng/images/pdf/fdi_apply_document.pdf"></iframe><iframe id="docu_warrant" class="pop_iframe" src="/pages/eng/images/pdf/docu_en_warrant_document.pdf"></iframe><iframe id="docu_wo_en" class="pop_iframe" src="/pages/eng/images/pdf/wo_en_document.pdf"></iframe><iframe id="docu_wo_ch" class="pop_iframe" src="/pages/eng/images/pdf/wo_ch_document.pdf"></iframe><iframe id="docu_kb_en" class="pop_iframe" src="/pages/eng/images/pdf/kb_en_document.pdf"></iframe><iframe id="docu_sh_ko" class="pop_iframe" src="/pages/eng/images/pdf/sh_ko_document.pdf"></iframe><iframe id="docu_sh_en" class="pop_iframe" src="/pages/eng/images/pdf/sh_en_document.pdf"></iframe><iframe id="docu_sh_ch" class="pop_iframe" src="/pages/eng/images/pdf/sh_ch_document.pdf"></iframe>
		</div>
	</div>
	{ / }

	<!-- Wrap -->
	<div class="wrap">

		<!-- Head -->
		<div class="head">
			
			<!-- topHead -->
			<div class="topHead">
				<div class="h1Wrap">
					<h1><a href="{ BASE_URL }/"><img src="{TYPE_URL}/images/common/h1Logo.png" alt="SeLim Law Firm"></a></h1>
				</div>
				<div class="rightArea">
					<ul class="sMenu">
						<li>
							{ ? USERINFO['user_id'] }
							<a class="hdInfoBtn"><span>{ USERINFO['user_name'] }</span>&nbsp;<img src="{TYPE_URL}/images/btn/bottomArrowBtn.png" alt="아래로"></a>
							<div class="topUserInfo off">
								<div class="info">
									<strong>Welcome to  { USERINFO['user_name'] }</strong><br>
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
					<div class="langType01">
						<ul>
							<li>
								<p class="tit current"><a href="/"><span>English</span></a></p>
							</li>
							<li>
								<p class="tit"><a href="http://taxoffice.co.kr"><span>Korean</span></a></p>
							</li>
{*							<li>*}
{*								<p class="tit"><a href="http://www.han-page.co.kr/406"><span>Han-Page</span></a></p>*}
{*							</li>*}
						</ul>
					</div>
{*					<div class="langList">*}
{*						<p class="tit"><span>English</span></p>*}
{*						<ul>*}
{*							<li><a href="http://taxoffice.co.kr">Korean</a></li>*}
{*						</ul>*}
{*					</div>*}
				</div>
			</div>
			<!-- //topHead -->

			<!-- gnbWrap -->
			<div class="gnbWrap">
				<div class="gnbList">
					<ul>
					{ @ MENU['top'] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }<div class="pointOut"></div></a>
							{ ? sizeof(MENU[.idno]) > 0 }
							<ul class="gnb_2li gnb_2li_wrap">
								{ @ MENU[.idno] }
								<li { ? sizeof(MENU[..idno]) > 0 }class="has_3li"{ / } ><a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a>
									{ ? sizeof(MENU[..idno]) > 0 }
									<ul class="gnb_3li gnb_3li_wrap">
									{ @ MENU[..idno] }
										<li><a href="{ BASE_URL }/{ ...idno }" class="subtit">{ ...menu_title }</a>
									{ / }
									</ul>
									{ / }
								</li>
								{ / }
							</ul>
							{ / }
						</li>
					{ / }
					</ul>
				</div>
				<!-- gnb_nav_all -->
				<div class="gnb_all" >
					<div class="gnb_bg"></div>

					<div class="gnb_all_wrap" >
						<ul class="gnb_1li">
							{ @ MENU['top'] }
							<li class="menu{ .idno }"><a class="menutit" href="{ BASE_URL }/{ .idno }">{ .menu_title }</a>
								<ul class="gnb_2li">
									{ @ MENU[.idno] }
									<li><a href="{ BASE_URL }/{ ..idno }" class="subtit">{ ..menu_title }</a></li>
									{ / }
								</ul>
							</li>
							{ / }
							{ ? USERINFO['user_id'] == 'admin' }
							<li class="menu adm-menu"><a class="menutit" href="http://www.taxcallcenter.com/" target="_blank">TaxCallCentern</a></li>
							{ / }
						</ul>
					</div>
				</div>
				<!-- // gnb_nav_all -->
			</div>
			<!-- //gnbWrap -->
			<button type="button" class="gnb_back_btn mb">
				{*				<i class="fa fa-arrow-left"></i>*}
				<i class="fa fa-angle-left"></i>
			</button>
			<button type="button" class="gnb_menu_btn mb">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
			<a class="gnb_lang_btn lang_ko mb" href="http://www.taxoffice.co.kr/">
				Kor
			</a>
			<a class="gnb_lang_btn lang_en mb current">
				Eng
			</a>
		</div>
		<!-- //Head -->

		<!-- gnb_nav_all -->
		<div class="gnb_mb_all">
			<div class="gnb_mb_hd">
{*				<ul class="gnb_mb_tmShortcut">*}
{*					<li><a href="http://www.taxoffice.co.kr/">Korean</a></li>*}
{*					<li><a  class="selectedLink" href="/" target="_self">English</a></li>*}
{*				</ul>*}
				<ul class="gnb_mb_user_menu">
					<li>{ ? USERINFO['user_id'] }<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>{ : }<a href="{ BASE_URL }/login">Login</a>{ / }</li>
					<li>{ ? USERINFO['user_id'] }<a href="{ BASE_URL }/userinfo">{ USERINFO['user_name'] }({ USERINFO['user_id'] })'s Page</a>{ : }<a href="{ BASE_URL }/join">Join</a>{ / }</li>
				</ul>
			</div>
			<div class="gnb_mb_mn_wrap">
				<ul class="gnb_1li">
					<li><a href="{ BASE_URL }/" class="tit">Home</a>
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
					<li><a href="{ BASE_URL }/sitemap">Sitemap</a></li>
				</ul>
			</div>

		</div>
		<!-- // gnb_nav_all -->

		<!-- deepBg -->
		<div class="deepBg">
			<button type="button" class="gnb_close_btn mb"><i class="fa fa-close"></i></button>
		</div>
		<!-- // deepBg -->
