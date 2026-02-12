<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRISPR 건강씨앗</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="/pub/css/common.css">
	<link rel="stylesheet" type="text/css" href="/pub/css/sub.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php
	$request_uri = "{$_SERVER['REQUEST_URI']}";
	if($request_uri == '/pub/main/main.php') echo '<link rel="stylesheet" type="text/css" href="/pub/css/main.css" />'; //메인만 호출
?>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,400,500,700&amp;display=swap" rel="stylesheet">
	<script type="text/javascript" src="/pub/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
	<script type="text/javascript" src="/pub/js/common.js"></script>
</head>
<body>
	<div id="skipNavigation">
		<a href="#container">본문 바로가기</a>
		<a href="#gnb">메뉴 바로가기</a>
	</div>

	<div class="wrap">
		<!-- header -->
		<header class="header">

			<div class="hd_wrap">
				<div class="inner">
					<h1 class="logo"><a href="/pub/main/main.php"><img src="/pub/image/common/logo.png" alt="g flas">CRISPR 건강씨앗</a></h1>
					
					<button type="button" class="btn_menu">메뉴</button>
					
					<div class="gnb_wrap">
						<div class="m_hd_top">
							<h1 class="logo"><a href="/pub/main/main.php"><img src="/pub/image/common/logo.png" alt="g flas">CRISPR 건강씨앗</a></h1>
							
							<button type="button" class="btn_close"><span class="blind">닫기</span></button>
						</div>
						<ul class="gnb" id="gnb">
							<li>
								<a href="/pub/sub/intro_company.php" class="menu"><span>회사소개</span></a>
								<div class="menu_wrap">
									<ul class="submenu">
										<li><a href="/pub/sub/intro_company.php"><span>크리스퍼 건강씨앗</span></a></li>
										<li><a href="/pub/sub/intro_history.php"><span>연혁</span></a></li>
										<li><a href="/pub/sub/intro_ceo.php"><span>CEO 인사말</span></a></li>
										<li><a href="/pub/sub/intro_organ.php"><span>조직도</span></a></li>
										<li><a href="/pub/sub/intro_location.php"><span>오시는 길</span></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="/pub/sub/RnD_story.php" class="menu"><span>R&D</span></a>
								<div class="menu_wrap">
									<ul class="submenu">
										<li><a href="/pub/sub/RnD_story.php"><span>R&D 스토리</span></a></li>
										<li><a href="/pub/sub/RnD_field.php"><span>연구분야</span></a></li>
										<li><a href="/pub/sub/RnD_infra.php"><span>INFRA</span></a></li>
										<li><a href="/pub/board/patent_list.php"><span>특허 및 인증</span></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="/pub/sub/business_market.php" class="menu"><span>사업영역</span></a>
								<div class="menu_wrap">
									<ul class="submenu">
										<li><a href="/pub/sub/business_market.php"><span>무한한 시장</span></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="/pub/board/product_info_list.php" class="menu"><span>제품소개</span></a>
								<div class="menu_wrap">
									<ul class="submenu">
										<li><a href="/pub/board/product_info_list.php"><span>제품 안내</span></a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="/pub/board/notice_list.php" class="menu"><span>홍보센터</span></a>
								<div class="menu_wrap">
									<ul class="submenu">
										<li><a href="/pub/board/notice_list.php"><span>공지사항</span></a></li>
										<li><a href="/pub/board/press_list.php"><span>보도자료 및 자료실</span></a></li>
										<li><a href="/pub/board/community_list.php"><span>커뮤니티</span></a></li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- //gnb_wrap -->
					
					<ul class="lang">
						<li><a href="">ENG</a></li>
						<li class="on"><a href="">KOR</a></li>
					</ul>
				</div>
			</div>
		</header>
		<!-- //header -->
		
		<!-- container -->
		<div class="container" id="container">