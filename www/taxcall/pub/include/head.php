<?
/// 도메인에 따라서 페이지 이동 작업 할 것
$arrDomain = array(
'taxoffice.co.kr',
'etaxoffice.co.kr',
'taxoffice.cn',
'selimacademy.co.kr',
'taxcall.co.kr',
'semucall.com',
'han-page.co.kr',
'www.taxoffice.co.kr',
'www.etaxoffice.co.kr',
'www.taxoffice.cn',
'www.selimacademy.co.kr',
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
    <meta property="og:title" content="세림콜센터, 세림세무법인">
    <meta property="og:type" content="website">
    <meta property="og:description" content="세림세무법인, 세림콜센터 입니다. 양도세, 소득세, 부가가치세, 법인세, 외투업무에 대한 문의 성심성의껏 해결해드립니다.">
    <!-- 키워드 -->
    <meta name="keywords" content="세림세무법인, 콜센터, 세무, 세금, 세금납부, 절세정보, 양도세, 소득세, 부가가치세, 법인세, 외투기업, 아웃소싱" />
    <!-- 페이지 설명 -->
    <meta name="description" content="세림세무법인, 세림콜센터 입니다. 양도세, 소득세, 부가가치세, 법인세, 외투업무에 대한 문의 성심성의껏 해결해드립니다." />
    <!-- Open Graph URL -->
    <meta property="og:url" content="http://www.han-page.co.kr/">
    <!-- 선호 URL -->
    <link rel="canonical" href="http://www.han-page.co.kr/">

    <meta property="og:image" content="/taxcall/pub/images/open_logo_selim.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, minimum-scale=1, user-scalable=yes, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="naver-site-verification" content="4e5c9a1e93af88171533d75821dd5b1f55548212" />
    <title>한페이지 상담센터</title>
    <link rel="icon" href="/taxcall/pub/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/pub/favicon.png"/>

    <!-- 이 예제에서는 필요한 js, css 를 링크걸어 사용 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="/taxcall/pub/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/taxcall/pub/css/slick-theme.css"/>
    
	<link href='//fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/taxcall/pub/css/reset.css">
    <link rel="stylesheet" href="/taxcall/pub/css/style.css?v=18">
    <link rel="stylesheet" href="/taxcall/pub/css/reactive.css?v=17">
	
	<!-- sub -->
    <!--    <script src="//kit.fontawesome.com/22fe7a24e1.js" crossorigin="anonymous"></script>-->
    <!--    <script src="https://kit.fontawesome.com/fbfef8fc8a.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="/taxcall/pub/css/sub.css?v=1">

    <script src="/taxcall/pub/js/jquery-3.6.0.min.js"></script>
    <script src="/taxcall/pub/js/slick.min.js"></script>
    <script src="/taxcall/pub/js/main.js?v=12"></script>
</head>
<body>