<!DOCTYPE HTML>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <title>{SITE_INFO['doc_title']}</title>
    <link rel="canonical" href="http://www.taxoffice.co.kr/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <link href="{TYPE_URL}/css/base/jquery-ui-1.9.2.custom.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/common.css?v=t<?php echo date('YmdHis'); ?>"  media="all" />
    <link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/dev.css"  media="all" />
    <link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/animate.css"  media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php // cst-serim :: version1.00 :: user-info list update
$now_dir = $_SERVER['REQUEST_URI'];
$now_dirname = explode("/", $now_dir);
if($now_dirname[2] == 'userinfo' || $now_dirname[2] == 'join'){?>
    <link rel="stylesheet" type="text/css" href="{TYPE_URL}/css/addrlink.css"  media="all" />
    <?php } ?>

    <link rel="shortcut icon" href="/pages/mobile/images/h1Logo.ico">
    { COMMON_CSS }
    <script type="text/javascript" src="/common/js/jquery-1.11.3.min.js" zz></script>
    <script type="text/javascript" src="/common/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/common/js/jquery.easing.1.3.js" ></script>
    <script type="text/javascript" src="/common/js/jquery.placeholder.min.js"></script>
    <script type="text/javascript" src="/common/js/swiper.min.js" ></script>
    <script type="text/javascript" src="{TYPE_URL}/js/common.js" ></script>
    <?php if( (strpos($now_dirname[2], 'calc') !== false) || (strpos($now_dirname[2], 'mytax') !== false) ){?>
    <script type="text/javascript" src="{TYPE_URL}/js/jquery.number.js" ></script>
    <?php if((strpos($now_dirname[2], 'mytax') !== false)) {$now_dirname[2] = 'mytax';}
    else if((strpos($now_dirname[2], 'calculate') !== false)) {$now_dirname[2] = 'calculate';} ?>
    <script type="text/javascript" src="{TYPE_URL}/js/<?php echo $now_dirname[2]; ?>.js"></script>
    <?php } ?>
    <script type="text/javascript">
        var curr_menu_no = ['{ MOBILE_MENU_NO }'];
        //$(document).ready(function() {gnbActive(3);});
    </script>
    <?php if((strpos($now_dirname[2], 'calculate') !== true)){ ?>
    { COMMON_JS }
    <? } ?>
</head>
<body>
<!-- Skip Nav -->
<div id="skipnavigation">
    <a href="#container">본문내용 바로가기</a>
</div>
<!-- //Skip Nav -->

