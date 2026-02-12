<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consulting.lib.php";
//if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
//	jsMsg("권한이 없습니다.");
//	jsHistory("-1");
//endif;

if($_POST['evnMode']=="category_save"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['category_idx']);
	if($idx != ""){
		$RS = updateConsultCategory($idx);
		$message = "수정되었습니다.";
	}else{
		$RS = insertConsultCategory();
		$message = "저장되었습니다.";
	}
	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = $message;
	}else{
		$response["result"] = "fail"; 
	}
	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="category_delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);

	$RS = deleteConsultCatagory($idx);

	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = "삭제되었습니다.";
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="contents_save"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['category_idx']);

	$RS = updateConsultCategoryNofile($idx);

	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = "수정되었습니다.";
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="contents_save_checklist"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['category_idx']);

	$RS = updateConsultCategoryNofile($idx);

	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = "수정되었습니다.";
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="intro_save"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['consult_idx']);

	$RS = updateConsultInfo($idx);

	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = "수정되었습니다.";
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="option_save"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['option_idx']);
	if($idx != ""){
		$RS = updatePayInfo($idx);
		$message = "수정되었습니다.";
	}else{
		$RS = insertPay();
		$message = "저장되었습니다.";
	}
	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = $message;
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="option_delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);

	$RS = deletePay($idx);

	if($RS==true){
		$response["result"] = "success"; 
		$response["message"] = "삭제되었습니다.";
	}else{
		$response["result"] = "fail"; 
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}else if($_POST['evnMode']=="consulting_update"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);

	$RS = updateConsultingInfo($idx);

	if($RS==true){
		jsGo($_POST['returnURL']."?idx=".$idx,"","수정되었습니다.");
	}else{
		jsGo($_POST['returnURL']."?idx=".$idx,"","수정에 실패했습니다.");
	}

	//DB해제
	SetDisConn($dblink);
}


?>