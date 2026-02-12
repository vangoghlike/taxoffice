<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$scale="20";
$offset = "0";
if(postNullCheck('offset') != ""){
	$offset = postNullCheck('offset');
}
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getSectionManagerList("","",$scale, $offset);
//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
function delAdmin(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 세무사를 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmBBSHidden.idx.value = idx;
		document.frmBBSHidden.submit();
	}
}

</script>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<div class="admin-title-top">
			<h2 class="admin-title">세무사 목록</h2>
			<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 기본설정 관리 &nbsp;&gt;&nbsp; 세무사 목록</div>
		</div>

		<div class="admin-search">
			<div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
		</div>
		<table class="admin-table-type1">
		  <colgroup>
			  <col width="6%">
			  <col width="20%">
			  <col width="15%">
			  <col width="">
			  <col width="10%">
			  <col width="15%">
		  </colgroup>
		  <thead>
		  <tr>
			<th scope="col">No.</th>
			<th scope="col">사진</th>
			<th scope="col">지점명</th>
			<th scope="col">주소</th>
			<th scope="col">등록일</th>
			<th scope="col">관리</th>
		  </tr>
		  </thead>
		  <tbody>		  
		  <?if($arrList['list']['total'] > 0):?>
		  <?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
		  <tr>
			<td><?=number_format($i+1+$offset)?></td>
			<td><img src="/uploaded/mngr/<?=$arrList['list'][$i]['file_name']?>" style="margin: 6px 0;max-height: 120px;max-width: 100%;"></td>
			<td><a href="section_manager_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><?=$arrList['list'][$i]['mngr_name']?></a></td>
			<td>
				<?= $arrList['list'][$i]['info1'] ?>
			</td>
			<td><?=substr($arrList['list'][$i]['reg_date'],0,10)?></td>
			<td>
				<a href="section_manager_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a>
				<a href="javascript:delAdmin('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a>
			</td>
		  </tr>
		  <?}?>
		  <?else:?>
		  <tr height="100">
			<td width="100%" colspan="10" >생성된 관리자가 없습니다.</td>
		  </tr>
		  <?endif;?>
		  </tbody>
		</table>

		<div class="paginate">
		  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?>
		</div>
		<p class="btn_r">
			<a href="section_manager_info.php" class="btn_box act_ins">신규등록</a>
		</p>

		<form name="frmBBSHidden" method="post" action="manager_evn.php">
		<input type="hidden" name="evnMode" value="delete_SectionManager">
		<input type="hidden" name="idx">
		</form>

    </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>
