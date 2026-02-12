<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>{SITE_INFO['doc_title']}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="/pages/default/images/h1Logo.ico">
{ COMMON_CSS }
<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.bxslider.min.js" ></script>
<script type="text/javascript" src="/common/js/common.js" ></script>
<script type="text/javascript" src="{TYPE_URL}/js/common.js" ></script>
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
			<!-- topMenu -->
			<div class="topMenu">
				<div class="tmWrap">
					<ul class="sMenu">
						<li><a href="{ BASE_URL }/">Home</a></li>
						<li>{ ? USERINFO['user_id'] }<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>{ : }<a href="{ BASE_URL }/login">Login</a>{ / }</li>
						<li>{ ? USERINFO['user_id'] }<a href="{ BASE_URL }/userinfo">MyPage</a>{ : }<a href="{ BASE_URL }/joind">Join</a>{ / }</li>
						<li><a href="{ BASE_URL }/sitemap">Sitemap</a></li>
						{ ? USERINFO['user_id'] }<li><span>{ USERINFO['user_name'] }({ USERINFO['user_id'] })님 접속중</span></li>{ / }
					</ul>
					<ul class="tmShortcut">
						<li><a href="/" target="_self"><strong>온비즈 택스</strong><br>
							Tax Call Center</a></li>
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
						<li><a href="http://www.taxbizinfo.com" target="_self"><strong>세무정보</strong><br>
							TaxBiz Info</a></li>
						<li><a href="http://www.taxquiz.co.kr" target="_self"><strong>지식마당</strong><br>
							Tax Academy</a></li>
						<li style="display:none;"><a onclick="javascript:alert('준비중입니다')">세무인·회계맨</a></li>
					</ul>
				</div>
			</div>
			<!-- topHead -->
			<div class="topHead">
				<div class="h1Wrap">
					<h1><a href="{ BASE_URL }/"><img src="{TYPE_URL}/images/common/selimbiz_logo.png" alt="세림비즈"></a></h1>
				</div>
				<!-- gnbWrap -->
				<div class="gnbWrap">
					<div class="gnbList">
						<ul>
							<li class="menu369"><a href="{ BASE_URL }/369">Taxcallcenter 안내</a></li>
							<li class="menu counsel cc"><a href="{ BASE_URL }/counsel?tp=call">전화상담(Tax Callcenter)</a></li>
							<li class="menu counsel cm"><a href="{ BASE_URL }/counsel?tp=mail">메일상담(Tax e-Mail)</a></li>
							<li class="menu counsel cv"><a href="{ BASE_URL }/counsel?tp=visit">방문상담(예약센터)</a></li>
							{ @ MENU['top'] }
							<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
							{ / }
							<li class="gnb_nav"><button type="button" class="gnb_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i></button></li>
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
					<li><a>온비즈 택스</a></li>
{*					<li><a href="http://www.selimbiz.co.kr/" target="_self">공유사무실</a></li>*}
					<li><a href="http://www.taxbizinfo.com" target="_self">택스인포</a></li>
					<li><a href="http://www.taxquiz.co.kr" target="_self">택스 아카데미</a></li>
{*					<li><a onclick="javascript:alert('준비중입니다')">세무인·회계맨</a></li>*}
				</ul>
				<ul class="gnb_mb_user_menu">
					<li>{ ? USERINFO['user_id'] }<a href="/common/member/logout.php?url={ BASE_URL }/">Logout</a>{ : }<a href="{ BASE_URL }/login">Login</a>{ / }</li>
					<li>{ ? USERINFO['user_id'] }<a href="{ BASE_URL }/userinfo">{ USERINFO['user_name'] }({ USERINFO['user_id'] })님 Page</a>{ : }<a href="{ BASE_URL }/joind">Join</a>{ / }</li>
				</ul>
			</div>
			<div class="gnb_mb_mn_wrap">
				<ul class="gnb_1li">
					<li><a href="{ BASE_URL }/" class="tit">Home</a>
					<li class="menu369"><a href="{ BASE_URL }/369">Taxcallcenter 안내</a></li>
					<li class="menu counsel cc"><a href="{ BASE_URL }/counsel?tp=call">전화상담(Tax Callcenter)</a></li>
					<li class="menu counsel cm"><a href="{ BASE_URL }/counsel?tp=mail">메일상담(Tax e-Mail)</a></li>
					<li class="menu counsel cv"><a href="{ BASE_URL }/counsel?tp=visit">방문상담(예약센터)</a></li>
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