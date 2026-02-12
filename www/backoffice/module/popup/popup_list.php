<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/popup/popup.lib.php";
if(!in_array("popup_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale = 20;

if(!isset($_REQUEST['offset'])){
	$_REQUEST['offset']=0;
	$offset = "0";
}else{
	$offset = $_REQUEST['offset'];
}

$arrList = getArticleList($_conf_tbl["popup"], $scale, $_REQUEST['offset'], "");
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">팝업 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 팝업관리 &nbsp;&gt;&nbsp; 팝업 목록</div>
	</div>


<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delPopup(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 팝업를 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmPopupHidden.idx.value = idx;
		document.frmPopupHidden.submit();
	}
}

function popupView(idx){
	obj = window.open("/module/popup/popup.php?idx="+idx,"popup","width=100,height=100,toolbars=0,menubars=0,scrollbars=0");
}
</script>
<div class="mgb5">
  &nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <th width="10%">이미지</th>
	  <th width="5%">표시페이지</th>
	  <th width="25%">팝업제목</th>
	  <th width="10%">팝업타입</th>
	  <th width="10%">시작일</th>
	  <th width="10%">종료일</th>
	  <th width="15%">생성일</th>
	  <th width="10%">관리</th>
	</tr>
  </thead>
  <tbody>
  	<?$arrLang = array("국문","영문");?>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=$arrList['total']-$offset-$i?></td>
	  <td><img src="/uploaded/popup/<?=$arrList['list'][$i]['p_image']?>" height="60"></td> 
	  <td><?=$arrLang[$arrList['list'][$i]['p_lang']]?></td>
	  <td class="space-left"><?=stripslashes($arrList['list'][$i]['subject'])?></td>
	  <td><?=$arrList['list'][$i]['p_type']?></td>
	  <td><?=$arrList['list'][$i]['s_date']?></td>
	  <td><?=$arrList['list'][$i]['e_date']?></td>
	  <td><?=$arrList['list'][$i]['w_date']?></td>
	  <td><a href="popup_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delPopup('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="8" >생성된 팝업이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?>
</div>

<form name="frmPopupHidden" method="post" action="popup_evn.php">
<input type="hidden" name="evnMode" value="deletePopup">
<input type="hidden" name="idx">
</form>
	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>