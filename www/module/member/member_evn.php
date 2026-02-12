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

		jsGo("/member/join_step3.php","","");
	}else{
		jsMsg("회원가입에 실패 하였습니다.");
		jsHistory("-2") ;
	}

}else if($_POST['evnMode']=="edit"){
	$RS = editMember($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS==true){
		jsGo("/mypage/mypage.php","","정보를 수정 하였습니다.");
	}else{
		jsMsg("정보 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="editPw"){
	$RS = editPasswd($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS==true){
		jsGo("/member.php?goPage=Pass","","고객님의 비밀번호가 수정되었습니다.");
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
			jsGo("/member/withdrawal_ok.php","",$RS["list"][0]["user_id"] . "님 정상적으로 탈퇴 되었습니다.");
		}else{
			jsGo("/member/withdrawal_ok.php","","탈퇴처리중 오류가 발생하였습니다.");
		}
	}else{
		jsMsg("입력하신 정보가 올바르지 않습니다.");
		jsHistory("-1") ;
	}


}else if($_POST['evnMode']=="login"){

	$user_id = trim($_POST['user_id']);
    $rt_url = trim($_POST['rt_url']);
	$user_pw = shittyPassword(trim($_POST['passwd']));

	$arrInfo = getUserInfo($user_id, "Y");

	if($arrInfo["total"] < 1){
		jsMsg("해당하는 아이디가 없습니다.");
		jsHistory("-1");
	}
	$RS = loginMember($user_id, $user_pw);

	if($RS["total"] > 0){

		if($RS["list"][0]["user_level"]=="4"){
			jsMsg("탈퇴한 계정입니다.");
			jsHistory("-1") ;
		}else if($RS["list"][0]["user_level"]=="3"){
			jsMsg("휴면 계정입니다.");
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

            setcookie('login_chk', $RS["list"][0]["user_id"], time()+(3600*24*30), '/',  $_SERVER['SERVER_NAME']);
//            setcookie('login_chk', $RS["list"][0]["user_id"], time()+(3600*24*30), '/',  'www.taxoffice.co.kr', 0);
//            setcookie('login_chk', $RS["list"][0]["user_id"], time()+(3600*24*30), '/',  'www.taxcall.co.kr', 0);

			if($rt_url){
				jsGo($rt_url,"","");
			}else{
				jsGo("/","","");
			}
		}
	}else{
		jsMsg("비밀번호가 일치하지 않습니다.");
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
		jsGo($_REQUEST[rt_url],"","로그아웃 되었습니다.");
	}else{
		jsGo("/","","로그아웃 되었습니다.");
	}
}else if($_POST['evnMode']=="search_id"){
	$arrList = getUserFindID($_POST['user_name'],$_POST['email']);

	if($arrList["total"]>0){
		jsMsg($_POST['user_name']."님의 아이디는 ".$arrList['list'][0]['user_id']." 입니다.");
		jsHistory("-1") ;
	}else{
		jsMsg("아이디가 없습니다.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="search_pw"){
	$arrList = getUserFindPW($_POST['user_id'],$_POST['user_name'],$_POST['email']);

	if($arrList["total"]>0){
		$_REQUEST["email"] = $arrList["list"][0]["email"];
		$_REQUEST["mail_subject"] ="[세림세무법인] 임시비밀번호를 전달해 드립니다.";
		$_REQUEST["user_name"] = $arrList["list"][0]["user_name"];
		$_REQUEST["user_id"] = $arrList["list"][0]["user_id"];
		$type = "passwd";
		$mail = sendMailPasswdForm($type);
		jsGo("/member/login.php","","임시비밀번호를 메일로 전송했습니다.");
	}else{
		jsMsg("아이디가 없습니다.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="changepw"){
	$RS = editPasswd($_POST['user_id']);

	if($RS==true){
		jsMsg("비밀번호를 변경하였습니다.");
		jsGo("/member/login.php","","");
	}else{
		jsMsg("비밀번호 변경에 실패했습니다.");
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
			jsGo("/","",$RS["list"][0]["user_id"] . "님 정상적으로 탈퇴 되었습니다.");
		}else{
			jsGo("/","","탈퇴처리중 오류가 발생하였습니다.");
		}
	}else{
		jsMsg("탈퇴하려는 아이디가 없습니다.");
		jsHistory("-1") ;
	}
}

//DB해제
SetDisConn($dblink);
?>