<?
/// 도메인에 따라서 페이지 이동 작업 할 것
$arrDomain = array(
'taxoffice.co.kr',
'etaxoffice.co.kr',
'taxoffice.cn',
'selimacademy.co.kr',
'taxcallcenter.com',
'taxcall.co.kr',
'semucall.com',
'han-page.co.kr',
'www.taxoffice.co.kr',
'www.etaxoffice.co.kr',
'www.taxoffice.cn',
'www.selimacademy.co.kr',
'www.taxcallcenter.com',
'www.taxcall.co.kr',
'www.semucall.com',
'www.han-page.co.kr'
);
if (in_array($_SERVER['SERVER_NAME'], $arrDomain)) {
	if ($_SERVER['SERVER_NAME'] == 'taxoffice.co.kr' ) {
		header('Location:http://www.'.$_SERVER['SERVER_NAME']);
		exit;
	}else if ($_SERVER['SERVER_NAME'] == 'www.taxoffice.co.kr' ) {
		header('Location:http://'.$_SERVER['SERVER_NAME']);
		exit;
	}
}
?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="세림콜센터">
    <meta property="og:type" content="website">
    <meta property="og:description" content="세림콜센터 웹사이트입니다.">
	<meta property="og:image" content="/hanpage/pub/images/open_logo_selim.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, minimum-scale=1, user-scalable=yes, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <title>세림세무법인</title>
    <link rel="icon" href="/hanpage/pub/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/pub/favicon.png"/>

    <!-- 이 예제에서는 필요한 js, css 를 링크걸어 사용 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="/hanpage/pub/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/hanpage/pub/css/slick-theme.css"/>
    
	<link href='//fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/hanpage/pub/css/reset.css">
    <link rel="stylesheet" href="/hanpage/pub/css/style.css?v=3">
    <link rel="stylesheet" href="/hanpage/pub/css/reactive.css?v=3">
	
	<!-- sub -->
    <script src="//kit.fontawesome.com/22fe7a24e1.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/hanpage/pub/css/sub.css">

    <script src="/hanpage/pub/js/jquery-3.6.0.min.js"></script>
    <script src="/hanpage/pub/js/slick.min.js"></script>
    <script src="/hanpage/pub/js/main.js"></script>
</head>
<body>