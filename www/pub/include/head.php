<?
/// 도메인에 따라서 페이지 이동 작업 할 것
$arrDomain = array(
'taxoffice.co.kr',
'etaxoffice.co.kr',
'taxoffice.cn',
'selimacademy.co.kr',
'taxcall.co.kr',
'taxcallcenter.com',
'semucall.com',
'han-page.co.kr',
'fdioffice.co.kr',
'fdihelpcenter.co.kr',
'fdihelpcenter.com',
'www.taxoffice.co.kr',
'www.etaxoffice.co.kr',
'www.taxoffice.cn',
'www.selimacademy.co.kr',
'www.taxcall.co.kr',
'www.taxcallcenter.com',
'www.semucall.com',
'www.han-page.co.kr',
'www.fdioffice.co.kr',
'www.fdihelpcenter.co.kr',
'www.fdihelpcenter.com',
);
if (in_array($_SERVER['SERVER_NAME'], $arrDomain)) {
	if ($_SERVER['SERVER_NAME'] == 'etaxoffice.co.kr') {
		header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/eng');
		exit;
	}else if ($_SERVER['SERVER_NAME'] == 'www.etaxoffice.co.kr') {
		header('Location:http://'.$_SERVER['SERVER_NAME'].'/eng');
		exit;
	}else if ($_SERVER['SERVER_NAME'] == 'fdioffice.co.kr') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/eng');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.fdioffice.co.kr') {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/eng');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'fdihelpcenter.co.kr') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/fdicenter');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.fdihelpcenter.co.kr') {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/fdicenter');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'fdihelpcenter.com') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/fdi_eng');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.fdihelpcenter.com') {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/fdi_eng');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'taxoffice.cn') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/ch');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.taxoffice.cn' ) {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/ch');
        exit;
    }

    else if ($_SERVER['SERVER_NAME'] == 'taxcall.co.kr' || $_SERVER['SERVER_NAME'] == 'taxcallcenter.com' ) {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/taxcall');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.taxcall.co.kr' || $_SERVER['SERVER_NAME'] == 'www.taxcallcenter.com' ) {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/taxcall');
        exit;
    }
    else if ($_SERVER['SERVER_NAME'] == 'han-page.co.kr' ) {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/taxcall');
        exit;
    }else if ($_SERVER['SERVER_NAME'] == 'www.han-page.co.kr' ) {
        header('Location:http://'.$_SERVER['SERVER_NAME'].'/taxcall');
        exit;
    }

    else if ($_SERVER['SERVER_NAME'] == 'semucall.com' || $_SERVER['SERVER_NAME'] == 'han-page.co.kr') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/');
        exit;
    }
    else if ($_SERVER['SERVER_NAME'] == 'taxcall.co.kr') {
        header('Location:http://www.'.$_SERVER['SERVER_NAME'].'/');
        exit;
    }
}

if ( $_SERVER['SERVER_NAME'] == 'taxoffice.co.kr' || $_SERVER['SERVER_NAME'] == 'www.taxoffice.co.kr' ) {
    // https 강제 이동
    if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
    {
        //Tell the browser to redirect to the HTTPS URL.
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
        //Prevent the rest of the script from executing.
        exit;
    }

}

// 현재 페이지의 cat_no 값을 가져옴
$cat_no = isset($_REQUEST['cat_no']) ? $_REQUEST['cat_no'] : '';
?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="세림세무법인">
    <meta property="og:type" content="website">
    <meta property="og:description" content="세림세무법인 웹사이트입니다.">
	<meta property="og:image" content="/pub/images/open_logo_selim.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2, minimum-scale=1, user-scalable=yes, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" href="/pub/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/pub/favicon.png"/>

    <!-- naver searchadvisor tag -->
    <meta name="naver-site-verification" content="ead4e477815a966e5e4570cb5506163e4969a88c" />

<?php if ($cat_no == 134): ?>
    <!-- 외국인투자기업 세무 페이지 전용 메타 태그 -->
    <title>세림세무법인 | 외국인투자기업 세무 | 해외 법인 조세 전문</title>
    <meta name="description" content="외국인 투자 기업 및 해외 법인의 세무, 조세 조약, 법인 설립 절차를 전문적으로 지원합니다. 세림세무법인에서 정확하고 신뢰할 수 있는 세금 컨설팅을 받아보세요.">
    <meta name="keywords" content="외국인투자기업 전문, 외국인투자기업 세무사, 외국인투자기업 세무법인, 외국인 투자기업 세무, 해외 법인 조세, 외국 법인 설립, 세금 컨설팅, 외국 기업 법인세, 외국인투자기업 전문세무법인">
    <meta property="og:title" content="외국인투자기업 세무 | 해외 법인 조세 전문 | 세림세무법인">
    <meta property="og:description" content="외국 법인 및 투자 기업의 세무 조언과 컨설팅을 제공합니다. 세림세무법인에서 정확하고 신뢰할 수 있는 세금 컨설팅을 받아보세요.">
    <meta property="og:url" content="https://www.taxoffice.co.kr/sub/?cat_no=134">
<?php else: ?>
    <!-- 기본 메타 태그 -->
    <title>세림세무법인</title>
    <meta name="description" content="세림세무법인에서 정확하고 신뢰할 수 있는 세금 컨설팅을 받아보세요. 외국인 투자 기업 및 법인의 세무, 조세 조약, 법인 설립 절차 지원">
    <meta name="keywords" content="세무법인, 외국인 투자기업, 외국 법인 세무, 한국 법인 설립, 세무 컨설팅, 조세 조약, 법인세">
    <meta property="og:title" content="세림세무법인 | 외국인 투자기업 세무 및 법인 설립 지원">
    <meta property="og:description" content="세림세무법인에서 정확하고 신뢰할 수 있는 세금 컨설팅을 받아보세요. 외국인 투자 기업 및 법인의 세무, 조세 조약, 법인 설립 절차 지원">
    <meta property="og:url" content="https://www.taxoffice.co.kr">
<?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.taxoffice.co.kr/pub/images/logo2.png">

    <link rel="canonical" href="https://www.taxoffice.co.kr/">
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="language" content="ko">

    <!-- 이 예제에서는 필요한 js, css 를 링크걸어 사용 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="/pub/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/pub/css/slick-theme.css"/>
    
	<link href='//fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/pub/css/reset.css?v=2024050203">
    <link rel="stylesheet" href="/pub/css/__animation.css?v=2024050204">
    <link rel="stylesheet" href="/pub/css/style.css?v=20230202032">
    <link rel="stylesheet" href="/pub/css/reactive.css?v=20220723043">
	
	<!-- sub -->
<!--    <script src="//kit.fontawesome.com/22fe7a24e1.js" crossorigin="anonymous"></script>-->
<!--    <script src="https://kit.fontawesome.com/fbfef8fc8a.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="/pub/css/sub.css?v=2022040410">

    <script src="/pub/js/jquery-3.6.0.min.js"></script>
    <script src="/pub/js/slick.min.js"></script>
    <script src="/pub/js/main.js?v=14"></script>
</head>
<body>