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
$get_mngr_type = $_GET['mngr_type'];
if ( $get_mngr_type == '' ) {
    $get_mngr_type = 'mngr';
}
$_db_mngr_type = 'mngrtype_'.$get_mngr_type;

$arrList = getManagerListBase($scale, $offset, $_db_mngr_type);

$arrMCList[1] = getManagerCategoryList(1);
$arrMCList[2] = getManagerCategoryList(2);
$arrMCTitle = array("","상담예약","신고의뢰");

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

        <div class="mngr_type_area">
            <a href="?mngr_type=mngr" <?php if ($_GET['mngr_type'] == 'mngr' || $_GET['mngr_type'] == ''){echo 'class="on"';}?>>
                세무사
            </a>
            <a href="?mngr_type=normal" <?php if ($_GET['mngr_type'] == 'normal'){echo 'class="on"';}?>>
                직원
            </a>
        </div>

		<div class="admin-search">
			<input type="hidden" name="evnMode" value="createAdmin">
			<div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
		</div>
		<table class="admin-table-type1">
		  <colgroup>
			  <col width="5%" />
			  <col width="10%" />
			  <col width="10%" />
			  <col width="*" />
			  <col width="20%" />
			  <col width="10%" />
			  <col width="10%" />
		  </colgroup>
		  <thead>
		  <tr>
			<th scope="col">No.</th>
			<th scope="col">사진</th>
			<th scope="col">성명</th>
			<th scope="col">상담업무</th>
			<th scope="col">연락처/이메일</th>
			<th scope="col">등록일</th>
			<th scope="col">관리</th>
		  </tr>
		  </thead>
		  <tbody>		  
		  <?if($arrList['list']['total'] > 0):?>
		  <?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
		  <tr>
			<td><?=number_format($i+1+$offset)?></td>
			<td><img src="/uploaded/mngr/<?=$arrList['list'][$i]['file_name']?>" style="width:100%;"></td>
			<td><a href="manager_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><?=$arrList['list'][$i]['mngr_name']?></a></td>
			<td>
			<?
			if($arrList['list'][$i]['goods_category'] != ""){
				$arrG_cat = explode("^",$arrList['list'][$i]['goods_category']);
				for($k=1;$k<3;$k++){
			?>
				<div style="float:left;text-align:left;line-height:18px;width:48%;">
					<b><?=$arrMCTitle[$k]?></b>
					<ul style="margin-left:10px">
			<?
					for($j=0;$j<count($arrG_cat);$j++){
						if($arrG_cat[$j] !=""){
							$arrCat = explode(":",$arrG_cat[$j]);
							if($arrMCList[$k]["idx"][$arrCat[1]] != ""){
			?>
							<li>-<?=$arrMCList[$k]["idx"][$arrCat[1]]?></li>
			<?
							}
						}
					}
			?>
					</ul>
				</div>
			<?
				}
			}
			?>
				<!-- 상담업무 -->
			</td>
			<td class="space-left">
				<?= isset($arrList['list'][$i]['tel'])?'<div class="mngr_dinfo_wrap"><span class="mngr_tag">전화번호</span> '.$arrList['list'][$i]['tel'].'</div>' : ''; ?>
				<?= isset($arrList['list'][$i]['phone'])?'<div class="mngr_dinfo_wrap"><span class="mngr_tag">핸드폰</span> '.$arrList['list'][$i]['phone'].'</div>' : ''; ?>
				<?= isset($arrList['list'][$i]['fax'])?'<div class="mngr_dinfo_wrap"><span class="mngr_tag">팩스</span> '.$arrList['list'][$i]['fax'].'</div>' : ''; ?>
				<?= isset($arrList['list'][$i]['email'])?'<div class="mngr_dinfo_wrap"><span class="mngr_tag">이메일</span> '.$arrList['list'][$i]['email'].'</div>' : ''; ?>
				<!-- 연락처/이메일 -->
			</td>
			<td><?=substr($arrList['list'][$i]['reg_date'],0,10)?></td>
			<td>
				<a href="manager_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a>
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
			<a href="manager_info.php" class="btn_box act_ins">신규등록</a>
		</p>

		<form name="frmBBSHidden" method="post" action="manager_evn.php">
		<input type="hidden" name="evnMode" value="delete">
		<input type="hidden" name="idx">
		</form>

    </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>
