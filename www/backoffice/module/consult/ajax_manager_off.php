<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager_off.lib.php";
//if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
//	jsMsg("권한이 없습니다.");
//	jsHistory("-1");
//endif;

if($_REQUEST['evnMode']=="list"){
	//DB연결
	$response = array();
	$dblink = SetConn($_conf_db["main_db"]);

	$info = getManagerOffRs();

	//DB해제
	SetDisConn($dblink);
	if($info !== false){
		$response = $info;
	}
	echo json_encode($response);
}else if($_REQUEST['evnMode']=="save"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);
	if($idx != ""){
		$result = updateManagerOffInfo($idx);
		$response["message"] = "수정되었습니다.";
	}else{
		$result = insertManagerOffInfo();
		$response["message"] = "등록되었습니다.";
	}

	//DB해제
	SetDisConn($dblink);
	if($result){
		$response["result"] = "success";
	}else{
		$response["result"] = "fail";
	}
	echo json_encode($response);
}else if($_REQUEST['evnMode']=="delete"){
	//DB연결
	$response = array();
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);

	$result = deleteManagerOffInfo($idx);

	//DB해제
	SetDisConn($dblink);
	if($result){
		$response["result"] = "success";
		$response["message"] = "삭제되었습니다.";
	}else{
		$response["result"] = "fail";
	}
	echo json_encode($response);
}


?>