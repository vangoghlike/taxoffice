<?
//관리자만 글쓰기 기능 체크
if($arrBoardInfo["list"][0]["useadminonly"] !="Y" || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]):
?>
<!-- S 삭제 페이지 -->
<div id="contents_tab">
<form name="form1" method="post" action="/module/board/board_evn.php">
  <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
	<?if($_REQUEST[mode]=="delete")://글 삭제하려고 할경우?>
	<input type="hidden" name="evnMode" value="delete">
	<input type="hidden" name="returnURL" value="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET[category]?>">

	<?elseif($_REQUEST[mode]=="unlock")://글 잠금해제 하려고 할경우?>
	<input type="hidden" name="evnMode" value="unlock">
	<input type="hidden" name="returnURL" value="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$_REQUEST["idx"]?>&category=<?=$_GET[category]?>">

	<?endif;?>

	<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
	<input type="hidden" name="idx" value="<?=$_REQUEST["idx"]?>">
	<input type="hidden" name="category" value="<?=$_REQUEST["category"]?>">
	
	<?	if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]){ ?>
	<tr>
	  <th><span class="spanbb">해당 게시물을 삭제 합니다. 삭제를 진행 하시겠습니까?</span><input type="image" src="<?=$_SITE["BOARD_SKIN_URL"]?>/default/images/btn_delete.gif" align="absmiddle"  border="0"></th>
	</tr>
	<?}else{?>
	<tr>
	  <th><span class="spanbb">최초 글등록시에 입력하였던 비밀번호를 입력하세요.</span></th>
	</tr>
	<tr>
		<td align="center">비밀번호
		<input name="pass" type="password" class="input" size="20">
		<input type="image" src="<?=$_SITE["BOARD_SKIN_URL"]?>/<?=$arrBoardInfo["list"][0]["skin"]?>/images/btn_save.gif" align="absmiddle"  border="0"></td>
	</tr>
	<?}?>
</table>
</form>
</div>

<?
else:
jsMsg("관리자만 글을 쓸 수 있는 게시판 입니다.");
jsHistory("-1");
endif;
?>