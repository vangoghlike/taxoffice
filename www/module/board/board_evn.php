<?
session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/point/point.lib.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/mail/mail.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardInfo = getBoardInfo($_conf_tbl['board_info'], $_REQUEST['boardid']);

if($_POST['evnMode']=="write"){
	###############################################자동등록방지############################################ //ST
	if($_POST['boardid']=="020" || $_POST['boardid']=="017" || $_POST['boardid']=="hanpage" || $_POST['boardid']=="eng_hanpage"){
		include_once $_SERVER['DOCUMENT_ROOT'] . "/_securimage/securimage.php";
		$img = new Securimage();
		$valid = $img->check($_POST['code']);
        if ( $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"] || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] ) {
            $valid = true;
        }
		if($valid == true) {
		} else {
			jsMsg("자동등록방지 입력 오류" . $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]);
			jsHistory("-1") ;
			exit;
		}
	}
	###############################################자동등록방지############################################ //ED
	if($arrBoardInfo["list"][0]["useadminonly"] =="Y" && !$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]){
		jsMsg("관리자만 글을 쓸 수 있는 게시판 입니다.");
		jsHistory("-1") ;
		exit;
	}

	//게시물 등록
    if ( $_POST['boardid'] == 'hanpage' ) {
        $_POST['wdate'] = date("Y-m-d H:i:s");
    }

	$writeRS = insertBoardArticle($_POST['boardid'],$arrBoardInfo["list"][0]["thumwidth"]);

	if($_POST['boardid']=="online" ){
		$_SESSION["MEMBER"]["NAME"]			= $_POST['name'];
		$_SESSION["MEMBER"]["COMPANY"]		= $_POST['company'];
	}

	if($writeRS==true){
		###############################################답변 메일발송 & 문자발송############################################ //ST
		if($_POST['boardid']=="020" ){
			$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
			if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
				$mail_form = "m_board_cate"; // 모바일일때
			}else{
				$mail_form = "p_board_cate"; // PC일때
			}
			$_REQUEST["email"] = $_REQUEST["str_email01"]."@".$_REQUEST["str_email02"];
			$rs = sendMailSetForm($mail_form);
			$mngr_rs = sendMailSetFormMngr($mail_form);
		}
		###############################################답변 메일발송 & 문자발송############################################ //ED

        ###############################################한페이지 메일발송 & 문자발송############################################ //ST
        if($_POST['boardid']=="hanpage" ){
            $mail_form = "kl_request";
            $_REQUEST["kl_email_manager"] = $_POST["kl_email_manager"];
            $_REQUEST["mail_subject"] = '한페이지 세무정보에 ' . $_POST["name"] . '님이 질문을 등록했습니다.';
            $_REQUEST["idx"] = getBoardHanpageIdx($_POST['boardid'],'wdate',$_POST['wdate']);
            $mngr_rs = sendMailSetFormHanMngr($mail_form);
        }
        ###############################################한페이지 메일발송 & 문자발송############################################ //ED

		jsGo($_POST['returnURL'],"","등록되었습니다.");
	}else{
			jsMsg("게시물 등록에 실패하였습니다.");
			jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="reply"){
	if($arrBoardInfo["list"][0]["useadminonly"] =="Y" && !$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]){
		jsMsg("관리자만 글을 쓸 수 있는 게시판 입니다.");
		jsHistory("-1") ;
		exit;
	}
	if($_POST['evnMode']=="reply" && $arrBoardInfo["list"][0]["usereply"] !="Y"){
		jsMsg("답글쓰기가 제한된 게시판 입니다.");
		jsHistory("-1");
		exit;
	}
	//게시물 등록
	$replyRS = insertBoardArticleReply($_POST['boardid'], $_POST['idx'], $arrBoardInfo["list"][0]["thumwidth"]);

	if($replyRS==true){
		jsGo($_POST['returnURL'],"","게시물을 등록하였습니다.");
	}else{
		jsMsg("게시물 등록에 실패하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="modify"){
	if($arrBoardInfo["list"][0]["useadminonly"] =="Y" && !$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]){
		jsMsg("관리자만 글을 쓸 수 있는 게시판 입니다.");
		jsHistory("-1") ;
		exit;
	}
	//게시물 수정
	$modifyRS = modifyBoardArticle($_POST['boardid'], $_POST['idx'], $arrBoardInfo["list"][0]["thumwidth"]);

	if($modifyRS==true){
		###############################################답변 메일발송 & 문자발송############################################ //ST
		if($_POST['boardid']=="qnafaq") {
            $arrInfo["list"][0]["name"] = $_POST["name"];
            $arrInfo["list"][0]["email"] = $_POST["email"];
            $arrInfo["list"][0]["subject"] = $_POST["subject"];
            $arrInfo["list"][0]["tel"] = $_POST["etc_2"] . "-" . $_POST["etc_3"] . "-" . $_POST["etc_4"];
            $arrInfo["list"][0]["etc_5"] = $_POST["etc_5"];
            $arrInfo["list"][0]["contents"] = $_POST["contents"];
            sendMailAsk("email", $arrInfo);
            jsGo($_POST['returnURL'], "", "답변내용을 메일(" . $_POST["email"] . ")로 발송하였습니다.");

        } else if ($_POST['boardid']=='hanpage') {
            ###############################################한페이지 메일발송 & 문자발송############################################ //ST
            $mail_form = "kl_reply";

            $arrInfo["list"][0]["email"] = $_POST["email"];

            $_REQUEST["email"] = $_POST["email"];
            $_REQUEST["mail_subject"] = '[한페이지 세무정보] '. $_POST["name"] . '님에 대한 답변이 등록되었습니다.';
            $_REQUEST["idx"] = $_POST["idx"];
            $_REQUEST["r_contents"] = $_POST["r_contents"];
            $_REQUEST["category"] = $_POST["category"];

            if ($_REQUEST["r_contents"]) {
                $mngr_rs = sendMailSetFormHanUser($mail_form);

                jsGo($_POST['returnURL'], "", "답변내용을 메일(" . $_POST["email"] . ")로 발송하였습니다.");
            } else {
                jsGo($_POST['returnURL'], "", "게시글 내용 수정하였습니다.");
            }
            ###############################################한페이지 메일발송 & 문자발송############################################ //ED
		} else {
			jsGo($_POST['returnURL'],"","수정하였습니다.");
		}
		###############################################답변 메일발송 & 문자발송############################################ //ED
	}else{
		jsMsg("게시물 수정에 실패하였습니다.");
		//jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="delete"){
	//게시물 삭제
	$deleteRS = deleteBoardArticle($_POST['boardid'], $_POST['idx']);

	if($deleteRS==true){
	//	jsGo($_POST['returnURL'],"","게시물을 삭제하였습니다.");
	}else{
		jsMsg("게시물 삭제에 실패하였습니다.");
		//jsHistory("-1") ;
	}


}elseif($_POST['evnMode']=="unlock"){

	$checkRS = unlockBoardArticle($_POST['boardid'], $_POST['idx'], $_POST['pass']);

	if($checkRS==true){
		//글잠금일경우 세션만들기
		$_SESSION[$_SITE[DOMAIN]][$_POST[boardid]."|".$_POST[idx]] = TRUE;

		if($_POST["category"] && $_POST[boardid]=="qna") {
			jsGo("/shop.php?goPage=GoodDetail&idx=".$_POST["category"]."#qna","","");
		} else if($_POST[sw]=="e" && $_POST[boardid]=="after") {
			jsGo("/shop.php?goPage=GoodDetail&idx=".$_POST["sk"]."#detail02","","");
		} else {
			jsGo($_POST[returnURL],"","");
		}
	}else{
		jsMsg("비밀번호가 일치하지 않습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="comment_write"){

	$RS = insertComment(mysql_escape_string($_POST[boardid]), mysql_escape_string($_POST[board_idx]));

	if($RS==true){
		jsGo($_POST[returnURL],"","댓글을 등록 하였습니다.");
	}else{
		jsMsg("댓글 등록에 실패하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="comment_modify"){

	$RS = updateComment(mysql_escape_string($_POST[boardid]), mysql_escape_string($_POST[board_idx]), mysql_escape_string($_POST[comm_idx]));

	if($RS==true){
		jsGo($_POST[returnURL],"","댓글을 수정 하였습니다.");
	}else{
		jsMsg("댓글 수정에 실패하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="comment_reply"){

	$RS = replyComment(mysql_escape_string($_POST[boardid]), mysql_escape_string($_POST[board_idx]), mysql_escape_string($_POST[comm_idx]));

	if($RS==true){
		jsGo($_POST[returnURL],"","댓글을 등록 하였습니다.");
	}else{
		jsMsg("댓글 등록에 실패하였습니다.");
		jsHistory("-1") ;
	}


}else if($_REQUEST['evnMode']=="comment_delete"){

	$RS = deleteComment(mysql_escape_string(mysql_escape_string($_REQUEST[idx])));

	if($RS==true){
		jsGo($_REQUEST[returnURL],"","댓글을 삭제 하였습니다.");
	}else{
		jsMsg("댓글 삭제에 실패하였습니다.");
		jsHistory("-1") ;
	}
}

//DB해제
SetDisConn($dblink);
?>