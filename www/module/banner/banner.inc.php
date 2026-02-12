<?
include_once $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include_once $_SERVER[DOCUMENT_ROOT] . "/module/banner/banner.lib.php";
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//배너목록
$arrLBannerList = getMainBannerList("0");

//DB해제
SetDisConn($dblink);
?>
<!-- S 관리자 등록 배너 L타입 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<? 
	if($arrLBannerList['list']['total'] > 0){ 
		for($i=0; $i < $arrLBannerList["list"]["total"]; $i++){
	?>
	<tr>
		<td align="center" style="padding:5px 0 0 0;">
		<a href="javascript:go_banner('<?=$arrLBannerList["list"][$i]["idx"]?>', '<?=$arrLBannerList["list"][$i]["b_url"]?>', '<?=$arrLBannerList["list"][$i]["b_target"]?>');"><img src="/uploaded/banner/<?=$arrLBannerList["list"][$i]["b_image"]?>" width="170" height="40" border="0" alt="<?=stripslashes($arrLBannerList["list"][$i]["b_subject"])?>"></a></td>
	</tr>
	<?
		}
	}
	?>
</table>
<!-- E 관리자 등록 배너 -->