<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="insert"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = insertEducation($idx);

	if($RS==true){
		jsGo("education.php","","");
	}else{
		jsMsg("입력중 실패하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}else if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = editEducation($idx);

	if($RS==true){
		jsGo("education.php","","");
	}else{
		jsMsg("정보수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteEducation($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("정보삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

} else if($_POST[evnMode]=="insertOnline"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertEducationOnline();

	if($RS==true){
		jsGo("education_online.php","","");
	}else{
		jsMsg("입력중 실패하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="editOnline"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = editEducationOnline($idx);

	if($RS==true){
		jsGo("education_online.php","","");
	}else{
		jsMsg("정보수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="deleteOnline"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteEducationOnline($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("정보삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="deleteMemberOnline"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteEducationMemberOnline($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("정보삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="changeMemberOnlineStatus"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = changeEducationMemberOnlineStatus($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("상태수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="editCompletion"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = editOnlineComplet($idx);

	if($RS==true){
		jsGo("education_completion.php?idx=".$idx,"","");
	}else{
		jsMsg("수료상태 변경 실패하였습니다.");
		jsHistory("-1");
	}

	//DB해제
	SetDisConn($dblink);

}
?>