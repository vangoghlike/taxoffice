<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrPolicyList = getArticleList("tbl_policy", 0, 0," WHERE 1=1 AND policy_name='policy2' order by policy_name ASC");

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
<div class="subContainer subContent">
    <!-- subTopInfo -->
    <div class="subTopInfo">
        <!-- h2Wrap -->
        <div class="h2Wrap">
            <h2>개인정보 취급방침</h2>
        </div>
        <!-- //h2Wrap -->
        <!-- lnb -->
        <div class="lnb">
            <span><img src="/pages/default/images/common/home.png" alt="home"></span>
            <span>개인정보 취급방침</span>
		</div>
        <!-- //lnb -->
    </div>
    <!-- //subTopInfo -->
    <!-- //subTopInfo -->
    <!-- contStart -->
    <div class="contStart">
    </div>
	<?=nl2br($arrPolicyList["list"][0]["policy_contents"])?>
</div>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>