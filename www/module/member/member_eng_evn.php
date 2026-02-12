<?session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/common/conf/dbconfig.inc.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/mail/mail.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_POST['evnMode']=="join"){
//	include_once $_SERVER['DOCUMENT_ROOT'] . "/_securimage/securimage.php";
//	$img = new Securimage();
//	$valid = $img->check($_POST['code']);
//	if($valid == true) {
//	} else {
//		jsMsg("자동등록방지 입력 오류");
//		jsHistory("-1") ;
//		exit;
//	}
	$RS = joinMember();

	//메일발송용
//	$arrInfo = getUserInfo($_POST['user_id']);

	if($RS==true){
		//로그인 세션 만듬
		/*
		$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] = $arrInfo["list"][0]["user_id"];
		$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"] = $arrInfo["list"][0]["user_name"];
		$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"] = $arrInfo["list"][0]["email"];
		$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["LEVEL"] = $arrInfo["list"][0]["user_level"];
		*/
		//회원에게 메일발송
		//$arrMailInfo = getMailConfig("join");
		//sendMailMemberInfo($arrInfo, $arrMailInfo);

		//$point = setPlusPoint($_POST[member_id], $_SITE["SHOP"]["POINT"]["JOIN"] , "회원가입 포인트");

		jsGo("/eng/member/join_step3.php","","");
	}else{
		jsMsg("registration failed.");
		jsHistory("-2") ;
	}

}else if($_POST['evnMode']=="edit"){
	$RS = editMember($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS==true){
		jsGo("/eng/mypage/mypage.php","","Information has been corrected.");
	}else{
		jsMsg("Failed to edit information.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="editPw"){
	$RS = editPasswd($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS==true){
		jsGo("/eng/member.php?goPage=Pass","","고객님의 비밀번호가 수정되었습니다.");
	}else{
		jsMsg("기존 비밀번호가 일치하지 않습니다.");
		jsHistory("-1") ;
	}


}else if($_POST['evnMode']=="withdrawal"){

	//메일발송용
	//$arrInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
	//회원탈퇴
	$RS = withdrawalMember($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS["total"] > 0){
		$RS2 = deleteMember($RS["list"][0]["user_id"]);
		//$RS2 = outMember($RS["list"][0]["user_id"]);
		if($RS2 == true){
			session_destroy();
			jsGo("/eng/member/withdrawal_ok.php","","'". $RS["list"][0]["user_id"] . "' have been withdrawn normally.");
		}else{
			jsGo("/eng/member/withdrawal_ok.php","","An error occurred during the withdrawal process.");
		}
	}else{
		jsMsg("입력하신 정보가 올바르지 않습니다.");
		jsHistory("-1") ;
	}


}else if($_POST['evnMode']=="login"){

	$user_id = trim($_POST['user_id']);
	$user_pw = shittyPassword(trim($_POST['passwd']));

	$arrInfo = getUserInfo($user_id, "Y");

	if($arrInfo["total"] < 1){
		jsMsg("There is no corresponding ID.");
		jsHistory("-1");
	}
	$RS = loginMember($user_id, $user_pw);

	if($RS["total"] > 0){

		if($RS["list"][0]["user_level"]=="4"){
			jsMsg("This account has been withdrawn.");
			jsHistory("-1") ;
		}else if($RS["list"][0]["user_level"]=="3"){
			jsMsg("This is a dormant account.");
			jsHistory("-1") ;
		}else{
			$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] = $RS["list"][0]["user_id"];
			$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"] = $RS["list"][0]["user_name"];
			$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["EMAIL"] = $RS["list"][0]["email"];
			$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["TEL"] = $RS["list"][0]["mobile"];
			$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["LEVEL"] = $RS["list"][0]["user_level"];

			if($_REQUEST['save_id']=="Y"){
				setcookie("login_id", $RS["list"][0]["user_id"], time()+(3600*24*30), "/", $_SERVER[SERVER_NAME]);
			}else{
				setcookie("login_id", "", time()+(3600*24*30), "/", $_SERVER[SERVER_NAME]);
			}

			if($_REQUEST['rt_url']){
				jsGo($_REQUEST['rt_url'],"","");
			}else{
				jsGo("/eng","","");
			}
		}
	}else{
		jsMsg("Passwords do not match.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="login_guest"){

	$_SESSION[$_SITE["DOMAIN"]]["GUEST"]["NAME"] = mysql_escape_string(trim($_POST[name]));

	if($_REQUEST[rt_url]){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsGo("/","","");
	}

}else if($_REQUEST[evnMode]=="logout"){
	session_destroy();
	if($_REQUEST[rt_url]){
		jsGo($_REQUEST[rt_url],"","You are logged out.");
	}else{
		jsGo("/","","You are logged out.");
	}
}else if($_POST['evnMode']=="search_id"){
	$arrList = getUserFindID($_POST['user_name'],$_POST['email']);

	if($arrList["total"]>0){
		jsMsg($_POST['user_name']."'s ID is '".$arrList['list'][0]['user_id']."'.");
		jsHistory("-1") ;
	}else{
		jsMsg("ID not found.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="search_pw"){
	$arrList = getUserFindPW($_POST['user_id'],$_POST['user_name'],$_POST['email']);

	if($arrList["total"]>0){
		$_REQUEST["email"] = $arrList["list"][0]["email"];
		$_REQUEST["mail_subject"] ="[selim] We will send you a temporary password.";
		$_REQUEST["user_name"] = $arrList["list"][0]["user_name"];
		$_REQUEST["user_id"] = $arrList["list"][0]["user_id"];
		$type = "passwd";
		$mail = sendMailPasswdForm($type);
		jsGo("/eng/member/login.php","","A temporary password has been sent to you by e-mail.");
	}else{
		jsMsg("ID not found.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="changepw"){
	$RS = editPasswd($_POST['user_id']);

	if($RS==true){
		jsMsg("changed your password.");
		jsGo("/member/login.php","","");
	}else{
		jsMsg("Failed to change password.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="duple"){
	$user_id = $_REQUEST["user_id"];

	$arrInfo = getUserInfo($user_id, "Y");

	if($arrInfo["total"] < 1){
		echo "true";
	}else{
		echo "false";
	}
}else if($_POST['evnMode']=="out"){
	$user_id = $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"];

	//$RS = out_Member($user_id);

	$RS = withdrawalMember($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS["total"] > 0){
		$RS2 = out_Member($RS["list"][0]["user_id"]);
		if($RS2 == true){
			session_destroy();
			jsGo("/","",$RS["list"][0]["user_id"] . "has been withdrawn normally.");
		}else{
			jsGo("/","","An error occurred during the withdrawal process.");
		}
	}else{
		jsMsg("There is no ID to withdraw from.");
		jsHistory("-1") ;
	}
}

//DB해제
SetDisConn($dblink);
?>