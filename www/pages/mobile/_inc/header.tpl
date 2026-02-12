<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>{SITE_INFO['doc_title']}</title>
<link rel="canonical" href="http://www.taxoffice.co.kr/">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
<link href="{TYPE_URL}/css/base/jquery-ui-1.9.2.custom.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css?v=t<?php echo date('YmdHis'); ?>"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/animate.css"  media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{ ? MENU_PAGE_NAME == 'userinfo' || MENU_PAGE_NAME == 'join' }
<link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/addrlink.css"  media="all" />
{ / }
<link rel="shortcut icon" href="/pages/mobile/images/h1Logo.ico">
{ COMMON_CSS }
{ ? CONTENTS['cont_type'] == 'consulting' }
<link rel="stylesheet" type="text/css" href="/pages/mobile/css/consulting.css" media="all">
{ : CONTENTS['cont_type'] == 'taxconsulting' }
<link rel="stylesheet" type="text/css" href="/pages/mobile/css/tcs.css" media="all">
{ / }
{*<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" ></script>*}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{*<script type="text/javascript" src="/common/js/jquery-ui.min.js"></script>*}
<script src="//code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/common/js/swiper.min.js" ></script>
<script type="text/javascript" src="{TYPE_URL}/js/common.js" ></script>
{ ? MENU_PAGE_NAME == 'calc' || MENU_PAGE_NAME == 'mytax' }
<script type="text/javascript" src="{TYPE_URL}/js/jquery.number.js" ></script>
<script type="text/javascript" src="{TYPE_URL}/js/{ MENU_PAGE_NAME }.js"></script>
{ / }
<script type="text/javascript">
var curr_menu_no = ['{ MOBILE_MENU_NO }'];
$(document).ready(function() {gnbActive(3);});
</script>
{ ? MENU_PAGE_NAME != 'calculate' }
{ COMMON_JS }
{ / }
{ ? MAIN_PAGE == true }
<script type="text/javascript" src="/common/js/jquery.bxslider.min.js" ></script>
<script type="text/javascript" src="/common/js/main.js" ></script>
{ / }
</head>
<body>
	<!-- Skip Nav -->
	<div id="skipnavigation">
		<a href="#container">본문내용 바로가기</a>
	</div>
	<!-- //Skip Nav -->

