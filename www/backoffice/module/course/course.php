<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/course/course.lib.php";
if(!in_array("course_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale = 20;

//제품 리스트
$arrList = getCourseList($scale, $_REQUEST[offset]);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">코스/시설 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 코스/시설관리 &nbsp;&gt;&nbsp; 코스/시설 목록</div>
	</div>

<script language="javascript">
function delCourse(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 코스/시설를 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
</script>
<div class="admin-search">
<form name="frm" method="get" action="<?=$_SEVER[PHP_SELF]?>">
	<div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
	<div class="keyword">코스/시설구분: <select name="b_type">
			<option value="">== 선택 ==</option>
			<option value="1"<?=$_REQUEST[b_type]=="1"?" selected":""?>>1. 코스 - 김유정</option>
			<option value="2"<?=$_REQUEST[b_type]=="2"?" selected":""?>>2. 코스 - 경강</option>
			<option value="3"<?=$_REQUEST[b_type]=="3"?" selected":""?>>3. 코스 - 가평</option>
			<option value="4"<?=$_REQUEST[b_type]=="4"?" selected":""?>>4. 시설 - 김유정</option>
			<option value="5"<?=$_REQUEST[b_type]=="5"?" selected":""?>>5. 시설 - 낭구마을</option>
			<option value="6"<?=$_REQUEST[b_type]=="6"?" selected":""?>>6. 시설 - 경강</option>
			<option value="7"<?=$_REQUEST[b_type]=="7"?" selected":""?>>7. 시설 - 가평</option>
		</select>
		<select name="st">
			<option value="1"<?=$_REQUEST[st]=="1"?" selected":""?>>정렬역순</option>
			<option value="2"<?=$_REQUEST[st]=="2"?" selected":""?>>등록순</option>
		</select>
		<input type="image" src="/backoffice/images/btn_search.gif" name="btn" alt="검색" />
	</div>
</form>
</div>

<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <th width="20%">코스/시설</th>
	  <th width="25%">제목</th>
	  <th width="5%">타입</th>
	  <th width="5%">타겟</th>
	  <th width="5%">보임</th>
	  <th width="5%">정렬</th>
	  <th width="5%">클릭</th>
	  <th width="15%">등록일</th>
	  <th width="10%">관리</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr height="60">
		<td><?=$arrList['list'][$i]['idx']?></td>
		<td><a href="<?=$arrList['list'][$i]['b_url']?>" target="_blank"><img src="/uploaded/course/<?=$arrList['list'][$i]['b_image']?>" height="40"></a></td>
		<td><?=$arrList['list'][$i]['b_subject']?></td>
		<td><?=$arrList['list'][$i]['b_type']?></td>
		<td><?=$arrList['list'][$i]['b_target']?></td>
		<td><?=$arrList['list'][$i]['b_show']?></td>
		<td><?=$arrList['list'][$i]['b_sort']?></td>
		<td><?=number_format($arrList['list'][$i]['b_hit'])?></td>
		<td><?=$arrList['list'][$i]['b_date']?></td>
		<td><a href="course_info.php?idx=<?=$arrList['list'][$i]['idx']?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delCourse('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="12" >등록된 데이타가 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$_REQUEST[offset],"")?>
</div>

<form name="frmListHidden" method="post" action="course_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
</form>
  </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>