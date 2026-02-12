<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category_call.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/contents/contents.lib.php";

if(!in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

if($_POST[evnMode]=="createCategory"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $makeRS = addCategory($_POST["s_category"], $_POST["s_depth"], $_POST["new_name"], $_POST["s_cat_gubun"]);

    if($makeRS==true){
        jsGo("category.php?cat_no=".$_POST["s_cat_no"]."&cat_gubun=".$_POST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 생성에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="createCategory2"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $makeRS = addCategory($_POST["s_category"], $_POST["s_depth"], $_POST["new_name"], $_POST["s_cat_gubun"]);

    if($makeRS==true){
        jsGo("category2.php?cat_no=".$_POST["s_cat_no"]."&cat_gubun=".$_POST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 생성에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="createCategory3"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $makeRS = addCategory($_POST["s_category"], $_POST["s_depth"], $_POST["new_name"], $_POST["s_cat_gubun"]);

    if($makeRS==true){
        jsGo("category3.php?cat_no=".$_POST["s_cat_no"]."&cat_gubun=".$_POST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 생성에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="createCategory4"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $makeRS = addCategory($_POST["s_category"], $_POST["s_depth"], $_POST["new_name"], $_POST["s_cat_gubun"]);

    if($makeRS==true){
        jsGo("category4.php?cat_no=".$_POST["s_cat_no"]."&cat_gubun=".$_POST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 생성에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="editCategory"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editCategory($_POST['cat_no'], $_POST['cat_name'], $_POST['cat_link_idx'], $_POST['cat_is_show']);

    if($editRS==true){
        jsGo($_POST["returnURL"],"","수정하였습니다.");
    }else{
        jsMsg("정보수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="editCategory2"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editCategory($_POST['cat_no'], $_POST['cat_name'], $_POST['cat_is_show']);

    if($editRS==true){
        jsGo("category_info2.php?cat_no=".$_POST['cat_no']."&cat_gubun=".$_POST["cat_gubun"],"","수정하였습니다.");
    }else{
        jsMsg("정보수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_POST[evnMode]=="editCategoryNew"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editCategoryNew($_POST['cat_no'], $_POST['cat_name'], $_POST['cat_use_type'], $_POST['cat_is_show'],$_POST['cat_board_id'],$_POST['cat_news_id'],$_POST['cat_cont_idx']);

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("정보수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="deleteCategory"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = deleteCategory($_REQUEST[cat_no]);

    if($editRS==true){
        jsGo("category.php?cat_no=".$_REQUEST["s_cat_no"]."&cat_gubun=".$_REQUEST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 삭제에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="deleteCategory2"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = deleteCategory($_REQUEST['cat_no']);

    if($editRS==true){
        jsGo("category2.php?cat_no=".$_REQUEST["s_cat_no"]."&cat_gubun=".$_REQUEST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 삭제에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="deleteCategory3"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = deleteCategory($_REQUEST['cat_no']);

    if($editRS==true){
        jsGo("category3.php?cat_no=".$_REQUEST["s_cat_no"]."&cat_gubun=".$_REQUEST["s_cat_gubun"],"","");
    }else{
        jsMsg("카테고리 삭제에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="sort_up"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = sortupCategory($_REQUEST[cat_no]);

    if($editRS==true){
        jsGo("category.php?cat_no=".$_REQUEST["s_cat_no"],"","");
    }else{
        jsMsg("정렬순서 변경에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="sort_down"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = sortdownCategory($_REQUEST[cat_no]);

    if($editRS==true){
        jsGo("category.php?cat_no=".$_REQUEST["s_cat_no"],"","");
    }else{
        jsMsg("정렬순서 변경에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="editContents"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editContents();

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("콘텐츠 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);

}else if($_REQUEST[evnMode]=="editLocation"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editLocation();

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("위치 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);
}else if($_REQUEST[evnMode]=="edit_cat_content"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = edit_cat_content();

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("상단 표시 내용 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);
}else if($_REQUEST[evnMode]=="edit_cat_work_request"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = edit_cat_work_request("tbl_category_call");

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("상단 표시 내용 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);
}else if($_REQUEST[evnMode]=="editReport"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    $editRS = editReport();

    if($editRS==true){
        jsGo($_POST['returnURL'],"","수정하였습니다.");
    }else{
        jsMsg("신고의뢰 수정에 실패 하였습니다.");
        jsHistory("-1") ;
    }

    //DB해제
    SetDisConn($dblink);
}
?>