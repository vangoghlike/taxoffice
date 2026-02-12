<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_eng.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("This page requires login.");
	location.href = "/eng/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/header.php";?>
<?
	$dblink = SetConn($_conf_db["main_db"]);

	$userInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"],"Y");
	//DB해제
	SetDisConn($dblink);

	$arrEmail = explode("@",$userInfo["list"][0]["email"]);
	$arrMobile = explode("-",$userInfo["list"][0]["mobile"]);
?>
<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<!-- sub_title end -->

<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	function frmchk(frm){
		if(frm.out_reason.value.length < 1){
			alert("탈퇴사유를 입력해 주세요.");
			frm.out_reason.focus;
			return false;
		}
		return true;
	}
</script>
<div class="subContent">
    <!-- subTopInfo -->
    <div class="subTopInfo">
        <!-- h2Wrap -->
        <div class="h2Wrap">
            <h2>withdrawal</h2>
        </div>
        <!-- //h2Wrap -->
        <!-- lnb -->
        <div class="lnb">
            <span><img src="/pages/default/images/common/home.png" alt="home"></span>
            <span class="last">withdrawal</span></div>
        <!-- //lnb -->
    </div>
    <!-- //subTopInfo -->
    <!-- contStart -->
    <div class="contStart">
         <form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="/module/member/member_evn.php" onsubmit="frmchk(document.frm_join2)">
			<input type="hidden" name="evnMode" value="out" />
            <fieldset>
                <legend class="sr-only">withdrawal form</legend>
                <table class="input_table">
                    <caption>Reason for withdrawal</caption>
                    <colgroup>
                        <col style="width:123px">
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <th>
                                <label for="out_reason">Reason for withdrawal<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                            </th>
                            <td>
                                <input id="out_reason" type="text" name="out_reason" maxlength="300" size="110" class="req" value="" title="input Reason for withdrawal" required="required">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <div class="btns_wrap mt30 pt25 text-center borer-none">
                <input class="join_blue_btn join_Btn mr10" type="submit" value="OK">
                <button class="join_black_btn join_Btn" type="button" onclick="location.href='/'">Cancel</button>
            </div>
        </form>
    </div>
    <!-- //contStart -->
</div>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
<?}?>