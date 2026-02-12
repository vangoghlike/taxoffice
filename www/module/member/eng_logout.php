<?
@session_start();
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
	session_destroy();
	if($_REQUEST[rt_url]){
		jsGo($_REQUEST[rt_url],"","You are logged out.");
	}else{
		jsGo("/eng","","You are logged out.");
	}
?>