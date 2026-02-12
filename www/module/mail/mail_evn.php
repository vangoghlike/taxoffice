<?
session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/mail/mail.lib.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consulting.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);


if($_POST['evnMode']=="write"){
	###############################################자동등록방지############################################ //ST
	if($_POST['boardid']=="ktoaspace" || $_POST['boardid']=="ktoaworkspace" ){
		include_once $_SERVER['DOCUMENT_ROOT'] . "/_securimage/securimage.php";
		$img = new Securimage();
		$valid = $img->check($_POST['code']);
		if($valid == true) {
		} else {
			jsMsg("자동등록방지 입력 오류");
			jsHistory("-1") ;
			exit;
		}
	}
	###############################################자동등록방지############################################ //ED
	
	
	$arrInfo["list"][0]["name"]		= $_POST["name"];
	$arrInfo["list"][0]["subject"]	= $_POST["subject"];
	$arrInfo["list"][0]["tel"]		= $_POST["homepage"];
	$arrInfo["list"][0]["contents"] = $_POST["contents"];
	$arrInfo["list"][0]["sdate"]	= $_POST["schedule_date"];
	$arrInfo["list"][0]["stime"]	= $_POST["etc_2"];
	
	$rs = sendMailAsk("email",$arrInfo);

	if($rs){
		jsGo($_POST['returnURL'],"","등록되었습니다.");
	}else{
		jsMsg("메일 전송에 실패하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="counsel_mail"){
	
	if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){
		$save = insertConsultingInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]); // 성공시 idx를 돌려줌
	}else{
		$save = insertConsultingInfoGuest(); // 성공시 idx를 돌려줌
	}
	if($save){
		$rs = sendMailSetForm("mail_counsel");
		$mngr_rs = sendMailSetFormMngr("mail_counsel");

		if($rs){
			jsGo($_POST['returnURL']."?idx=".$save,"","등록 및 메일전송에 성공했습니다.");
		}else{
		//	jsMsg("등록에 성공했지만 메일 전송에 실패하였습니다.");
		//	jsHistory("-1") ;
			jsGo($_POST['returnURL']."?idx=".$save,"","등록에 성공했지만 메일 전송에 실패하였습니다.");
		}
	}else{
		jsMsg("해당 내용을 저장하는데 실패했습니다.");
		jsHistory("-1") ;
	}
}else if($_POST['evnMode']=="cancel"){
	
	$update = updateConsultingInfo($_REQUEST["idx"]); // 바뀐 내용업로드

	if($update){
		$arrInfo = getArticleList("tbl_consulting", 0, 0, " where idx =".$_REQUEST["idx"]." ");
		$arrManagerInfo = getArticleList("tbl_manager", 0, 0, " where idx =".$arrInfo["list"][0]["mngr_idx"]." ");


		$arrInfo["list"][0]["mail_subject"] = $_REQUEST["mail_subject"]; // 메일 제목 설정

		$rs = sendMailSetFormNinfo("cancel_counsel",$arrInfo);
		$mngr_rs = sendMailSetFormMngrNinfo("cancel_counsel",$arrInfo);

		if($rs){
			jsGo($_POST['returnURL']."?idx=".$_REQUEST["idx"],"","취소 및 메일전송에 성공했습니다.");
		}else{
		//	jsMsg("등록에 성공했지만 메일 전송에 실패하였습니다.");
		//	jsHistory("-1") ;
			jsGo($_POST['returnURL']."?idx=".$_REQUEST["idx"],"","취소에 성공했지만 메일 전송에 실패하였습니다.");
		}
	}else{
		jsMsg("해당 내용을 취소하는데 실패했습니다.");
		jsHistory("-1") ;
	}
}

//DB해제
SetDisConn($dblink);
?>