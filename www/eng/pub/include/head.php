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
	if ($_SERVER['SERVER_NAME'] == 'taxoffice.co.kr') {
		header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/');
		exit;
	}else if ($_SERVER['SERVER_NAME'] == 'www.taxoffice.co.kr') {
		header('Location:http://'.$_SERVER['SERVER_NAME'].'/');
		exit;
	}
}
?>
<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="SELIM">
    <meta property="og:type" content="website">
    <meta property="og:description" content="SELIM">
	<meta property="og:image" content="/pub/images/open_logo_selim.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, minimum-scale=1, user-scalable=yes, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <title>SELIM</title>
	<link rel="icon" href="/pub/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/pub/favicon.png"/>

    <!-- 이 예제에서는 필요한 js, css 를 링크걸어 사용 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="/eng/pub/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/eng/pub/css/slick-theme.css"/>
    
	<link href='//fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/eng/pub/css/reset.css">
    <link rel="stylesheet" href="/pub/css/__animation.css?v=2024050204">
    <link rel="stylesheet" href="/eng/pub/css/style.css?v=20220522">
    <link rel="stylesheet" href="/eng/pub/css/reactive.css?v=20220521">
	
	<!-- sub -->
    <!--    <script src="//kit.fontawesome.com/22fe7a24e1.js" crossorigin="anonymous"></script>-->
    <!--    <script src="https://kit.fontawesome.com/fbfef8fc8a.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="/eng/pub/css/sub.css?v=2023031004">

    <script src="/eng/pub/js/jquery-3.6.0.min.js"></script>
    <script src="/eng/pub/js/slick.min.js"></script>
    <script src="/eng/pub/js/main.js?v=2022"></script>
</head>
<body>