<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="insert"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = joinMemberAdmin();
	
	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		jsGo("member.php","","회원가입되었습니다.");
	}else{
		jsMsg("정보 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = editMemberAdmin($_REQUEST["user_id"]);
	
	var_dump($_POST);
	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
		//jsGo("member.php","","정보를 수정하였습니다.");
	}else{
	//	jsMsg("정보 수정에 실패 하였습니다.");
	//	jsHistory("-1") ;
	}

}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS2 = deleteMember($_REQUEST["user_id"]);
	if($RS2 == true){
		if($_POST[returnURL]){
			jsGo($_POST[returnURL],"",$_REQUEST["user_id"] . "님 정상적으로 탈퇴처리되었습니다.");
		}else{
			jsGo("member.php","",$_REQUEST["user_id"] . "님 정상적으로 탈퇴처리되었습니다.");
		}
	}else{
		jsGo("member.php","","삭제중 오류가 발생하였습니다.");
	}


	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="out"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS2 = outMember($_REQUEST["user_id"]);
	if($RS2 == true){
		if($_POST[returnURL]){
			jsGo($_POST[returnURL],"",$_REQUEST["user_id"] . "님 정상적으로 삭제 되었습니다.");
		}else{
			jsGo("member_out.php","",$_REQUEST["user_id"] . "님 정상적으로 삭제 되었습니다.");
		}
	}else{
		jsGo("member_out.php","","삭제중 오류가 발생하였습니다.");
	}


	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="point_add"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$result = pointAdd();
	
	if($result){
		if($_POST[returnURL]){
			jsGo($_POST[returnURL],"","포인트가 정상적으로 지급/회수 되었습니다.");
		}else{
			jsGo("member.php","","포인트가 정상적으로 지급/회수 되었습니다.");
		}
	}else{
		jsGo($_POST[returnURL],"","포인트 지급/회수 중 오류가 발생하였습니다.");
	}


	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="level_change"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$result = memberLevelChange($_REQUEST["user_id"],$_REQUEST["level"]);

	if($result){
		echo "success";
	}else{
		echo "fail";
	}

	//DB해제
	SetDisConn($dblink);

}
?>