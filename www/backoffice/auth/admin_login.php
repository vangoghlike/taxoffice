<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/admin.lib.php";

if(isset($_POST['evnMode'])=='Login'){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);
	$arrInfo = getAdminInfo($_POST["ID"]);

	if($arrInfo["total"] < 1){
		//로그인정보 기록
		setAdminLoginLog($_POST["ID"],"N");

		jsMsg("해당하는 아이디가 없습니다.");
		jsHistory("-1");
	}
	$arrInfoPW = getAdminPass($_POST['Password']);

	//echo $arrInfoPW['list'][0]['pw'];

//	if($arrInfo["list"][0]["a_pw"] == $arrInfoPW['list'][0]['pw']) {
if($arrInfo["list"][0]["a_pw"] == $_POST['Password']) {
		//로그인정보 기록
		setAdminLoginLog($arrInfo["list"][0]["a_id"],"Y");

		// 로그인 정보로 세션을 생성
		$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] = $arrInfo["list"][0]["a_id"];
		$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"] = $arrInfo["list"][0]["a_name"];
		$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["CLASS"] = $arrInfo["list"][0]["a_class"];
		$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"] = $arrInfo["list"][0]["a_grade"];
		$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"] = explode(",",$arrInfo["list"][0]["a_auth"]);

		metaGo("/backoffice/");

	}else{
		//로그인정보 기록
		//setAdminLoginLog(mysql_escape_string($_POST["ID"]),"N");

		jsMsg("비밀번호가 일치하지 않습니다.");
		jsHistory("-1");
	}

	//DB해제
	SetDisConn($dblink);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<title><?=$_SITE["NAME"]?> 관리자 : 로그인</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language='JavaScript'>
<!--
function CheckForm(Form){
	if (Form.ID.value==''){
		alert('ID를 입력하여 주십시요.');
		Form.ID.focus();
		return false;
	}
	if (Form.Password.value==''){
		alert('비밀번호를 입력하여 주십시요.');
		Form.Password.focus();
		return false;
	}
}
//-->
</script>
</head>

<body>
<div id="wrapper">

	<div id="loginArea">
        <div class="memberLogin">
            <fieldset class="loginField">
            	<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="login" onsubmit='return CheckForm(this)'>
				<input type="hidden" name="evnMode" value="Login">
				<input type='hidden' name='Prev_URL' value='<?=$Prev_URL?>'>
                <legend>로그인</legend>
              <div class="id">
                    <label for="id" onclick="click(this);"><img src="../images/login_id.gif" alt="아이디" /></label>
                    <input type="text" id="id" name="ID" class="loginInput" maxlength="15"/>
                </div>
                <div class="pw">
                    <label for="pw" onclick="click(this);"><img src="../images/login_pw.gif" alt="비밀번호" /></label>
                    <input type="password" id="pw" name="Password" class="loginInput" maxlength="15"/>
                </div>
                <input type="image" src="../images/btn_login.jpg" alt="로그인" class="btnLogin"/>
                </form>
            </fieldset>
            <div class="loginText">
            ※ 관리자 페이지로 접속합니다.<br />
            ※ 공공장소에서의 로그인시 정보 유출에 주의하시기 바랍니다.
            </div>
        </div>
        <div class="copyright">COPYRIGHT <?=date("Y")?> © <?=$_SITE["NAME"]?> All RIGHTS RESERVED.</div>
	</div>


</div>
<script language="javascript">
document.login.id.focus();
</script>
</body>
</html>
