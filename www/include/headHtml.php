<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
if(isset($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"])){
        $_SESSION[$_SITE["DOMAIN"]]["SESSIONID"] = md5(rand().microtime());//쇼핑몰 고유 세션 아이디
}
//하루에 한번만 로그를 기록함

include $_SERVER['DOCUMENT_ROOT'] . "/module/log/log.lib.php";

//$checkCookie = $_COOKIE['websight_log_count']??"";
//if($checkCookie!="1"){
//	setcookie("websight_log_count", "1", time()+(86400), "/", $_SITE["DOMAIN"]);
//	$dblink = SetConn($_conf_db["main_db"]);
//	insertLog();
//	SetDisConn($dblink);
//}

//	$checkCookie = $_COOKIE['websight_log_count']??"";
if(!$_SESSION[$_SITE["DOMAIN"]]["CHECKFLAG"]){
    //setcookie("websight_log_count", "1", time()+(86400), "/", $_SITE["DOMAIN"]);
    $_SESSION[$_SITE["DOMAIN"]]["CHECKFLAG"]=true;
    $dblink = SetConn($_conf_db["main_db"]);
    insertLog();
    SetDisConn($dblink);
}
?>