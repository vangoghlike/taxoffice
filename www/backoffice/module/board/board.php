<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/fckeditor/fckeditor.php";
if(!in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$scale="20";
$offset = 0;
if($_GET["offset"] != ""){
	$offset = $_GET["offset"];
}
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getArticleList($_conf_tbl["board_info"], $scale, postNullCheck('offset'), "");
//_DEBUG($arrList);
$arrLevel = getArticleList($_conf_tbl["member_level"], 0, 0, "order by level_no desc ");

for($i=0;$i<$arrLevel["total"];$i++){
	$arrayLevel[$arrLevel["list"][$i]['level_no']] = $arrLevel["list"][$i]['level_name'];
}
//DB해제
SetDisConn($dblink);

if(!isset($arrList['list']['total'])){
	$arrList['list']['total'] = 0;
}
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">게시판 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 게시판 관리 &nbsp;&gt;&nbsp; 게시판 목록</div>
	</div>

		<script language="javascript" src="/common/util.js"></script>
		<script language="javascript">
		function delBoard(idx){
			var cfm;
			cfm =false;
			cfm = confirm("이 게시판을 삭제 하시겠습니까?\n\n관련 데이터들도 모두 삭제되며 복구되지 않습니다.");
			if(cfm==true){
				document.frmBBSHidden.idx.value = idx;
				document.frmBBSHidden.submit();
			}
		}

		function CheckForm(frm){ 
			if (frm.id.value==""){
				alert("ID 를 입력하여 주십시요.");
				frm.id.focus();
				return false;
			}
			if (frm.id.value.length < 2 || frm.id.value.length > 20) {
				alert("ID는 2~20자리입니다.");
				frm.id.focus();
				return false;
			}
			if (hangul_chk(frm.id.value) != true ){
				alert("ID에 한글이나 여백은 사용할 수 없습니다.");
				frm.id.focus();
				return false;
			}

		}
		</script>
		<div class="admin-search">
		  <form name="frmBBS" method="post" action="board_evn.php" onSubmit="return CheckForm(this)">
		  <input type="hidden" name="evnMode" value="createBBS">
			<div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
			<!---->
			<div class="keyword">
			  신규 게시판 ID : <input type="text" name="id" size="20" maxlength="20" class="input" /> <span class="btn_pack medium icon"><span class="add"></span><input type="submit" value="게시판 생성"></span>
			</div>
		  </form>
		</div>
		<table class="admin-table-type1">
		<thead>
		<tr>
		  <th width="5%">No.</th>
		  <th width="10%">게시판ID</th>
		  <th width="25%">게시판명</th>
		  <th width="5%">관리자만</th>
		  <th width="5%">자료실</th>
		  <th width="5%">답글</th>
		  <th width="5%">댓글</th>
		  <th width="5%">스킨</th>
		  <!-- th width="10%">생성일</th-->
		  <th width="10%">관리</th>
		  <th width="10%">GPT</th>
		</tr>
		</thead>
		<tbody>
		<?if($arrList['list']['total'] > 0):?>

		<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
		<tr height="25" align="center" onMouseOver="this.style.backgroundColor='#f8f8f8'"  onMouseOut="this.style.backgroundColor=''">
		  <td><?=number_format($arrList['total']-$i-$offset)?></td>
		  <td><?=$arrList['list'][$i]['boardid']?></td>
		  <td align="left"><a href="board_view.php?boardid=<?=$arrList['list'][$i]['boardid']?>"> <?=$arrList['list'][$i]['boardname']?></a></td>
		  <td><?=$arrList['list'][$i]['useadminonly']?></td>
		  <td><?=$arrList['list'][$i]['usepds']?></td>
		  <td><?=$arrList['list'][$i]['usereply']?></td>
		  <td><?=$arrList['list'][$i]['usememo']?></td>
		  <td><?=$arrList['list'][$i]['skin']?></td>
		  <!-- td><?=substr($arrList['list'][$i]['wdate'],0,10)?></td-->
		  <td><a href="board_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <!-- -->| <a href="javascript:delBoard('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
          <td>
              <form action="gpt_excel_download.php?boardid=<?=$arrList['list'][$i]['boardid']?>" method="post">
                <button type="submit">GPT용 엑셀</button>
              </form>
          </td>
		</tr>
		<?}?>

		<?else:?>
		<tr height="100">
		  <td width="100%" colspan="14" >생성된 게시판이 없습니다.</td>
		</tr>
		<?endif;?>
		</tbody>
		</table>

		<div class="paginate">
		  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?>
		</div>

		<form name="frmBBSHidden" method="post" action="board_evn.php">
		<input type="hidden" name="evnMode" value="deleteBBS">
		<input type="hidden" name="idx">
		</form>


	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>
