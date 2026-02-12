<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/admin.lib.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

if(isset($_REQUEST['idx'])){
    $idx = $_REQUEST['idx'];
}else{
    $idx = "";
}

if($_POST['evnMode']=="createAdmin"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $RS = inputAdmin();

    if($RS==true){
        jsGo("admin.php","","");
    }else{
//		jsMsg("관리자 등록에 실패 하였습니다.");
//		jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);


}else if($_POST['evnMode']=="updateAdmin"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $RS = updateAdmin($idx);
    if($RS==true){
        jsGo("admin.php","","");
    }else{
        jsMsg("관리자 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);


}else if($_POST['evnMode']=="deleteAdmin"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $RS = deleteAdmin($idx);

    if($RS==true){
        jsGo("admin.php","","");
    }else{
        jsMsg("관리자 삭제에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST['evnMode']=="setAdmin"){

    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $RS = updateShopSet($idx);

    //DB해제
    SetDisConn($dblink);

    if($RS==true){
        jsGo("admin_set.php","","");
    }else{
        jsMsg("기본정보설정 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

}else if($_POST['evnMode']=="setPolicy"){

    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $RS = updatePolicySet($_REQUEST['policy_name']);

    //DB해제
    SetDisConn($dblink);

    if($RS==true){
        jsGo("admin_set.php","","");
    }else{
        jsMsg("개인정보 동의 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

}
?>