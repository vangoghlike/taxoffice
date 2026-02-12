<? 
session_start();
include_once $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php"; 
include_once $_SERVER[DOCUMENT_ROOT] . "/module/intranet/intranet_auth.php"; 
?>
<!--ÄÁÅÙÃ÷½ÃÀÛ -->
<?
$boardid="intranet1";
include ($_SERVER[DOCUMENT_ROOT] . "/module/board/board.php");
?>
