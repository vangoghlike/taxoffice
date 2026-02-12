<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/course/course.lib.php";
if(!in_array("course_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="insert"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertCourse();

	if($RS==true){
		jsGo("course.php","","");
	}else{
		jsMsg("코스/시설 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST[evnMode]=="update"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_POST[idx]));

	$RS = updateCourse($idx);
	if($RS==true){
		jsGo("course.php","","");
	}else{
		jsMsg("코스/시설 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteCourse($idx);

	if($RS==true){
		jsGo("course.php","","");
	}else{
		jsMsg("코스/시설 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>