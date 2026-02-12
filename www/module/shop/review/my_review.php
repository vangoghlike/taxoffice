<?
//로그인확인
include_once $_SERVER[DOCUMENT_ROOT] . "/module/member/auth.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getMyReviewList($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $scale, mysql_escape_string($_REQUEST[offset]));

//DB해제
SetDisConn($dblink);
?>
내가 작성한 이용후기
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <td valign="top">
  
	<div id="list_tab">
	  <table width="100%" align="center" cellpadding="0" cellspacing="0">
		<colgroup>
		<col width="*" align="left" />
		<col width="80" align="center" />
		</colgroup>
		  <tr>
			<th align="center">제목</th>
			<th>등록일</th>
		  </tr>
		<?
		if($arrList["total"]>0){
			for($i=0;$i<$arrList["list"]["total"];$i++){
		?>
		  <tr>
			<td><a href="/shop.php?goPage=MyReviewView&idx=<?=$arrList["list"][$i][idx]?>" onFocus="this.blur()" ><?=stripslashes($arrList["list"][$i][subject])?></a></td>
			<td><?=substr($arrList["list"][$i][wdate],0,10)?></td>
		  </tr>
		<?	
			}
		?>
		<?
		}else{
		?>
		<tr height="100">
			<td colspan="2" align="center">작성된 이용후기가 없습니다.</td>
		</tr>
		<?}?>
	  </table>
	</div>

	<table width="100%" align="center">
	  <tr>
		<td height="50" align="center"><?=pageNavigation($arrList["total"],$scale,$pagescale,$_GET[offset],"")?></td>
	  </tr>
	</table>
	</td>
</tr>
</table>