<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php";
//if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
//	jsMsg("권한이 없습니다.");
//	jsHistory("-1");
//endif;

if($_POST['evnMode']=="category_contents"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = trim($_REQUEST['idx']);

	$info = getConsultCatInfo($idx);

	if($info["total"] > 0){
		$response["result"] = "success";
		$response["contents"] = $info["list"][0][$_REQUEST["fld"]];
		//echo '{"result":"success","contents":"'.str_replace("\"","'",$info["list"][0][$_REQUEST["fld"]]).'"}';
		
	}else{
		$response["result"] = "fail";
	}

	//DB해제
	SetDisConn($dblink);
	echo json_encode($response);
}


?>