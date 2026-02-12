<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/point/point.lib.php";
if(!in_array("point_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$scale = "20";
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getPointListAdmin(
	mysql_escape_string($_REQUEST[sw]), 
	mysql_escape_string($_REQUEST[sk]), 
	mysql_escape_string($_REQUEST[type]), 
	mysql_escape_string($_REQUEST[s_date]),
	mysql_escape_string($_REQUEST[e_date]),
	$scale, mysql_escape_string($_REQUEST[offset])
	);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "../member/menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">적립금 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 프로모션 &nbsp;&gt;&nbsp; 적립금 목록</div>
	</div>

<h3 class="admin-title-middle">회원검색</h3>
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<form name="frmSort" method="get" action="point_list.php">
	<tr>
		<th>분류</th>
		<td class="space-left">
			<select name="type">
				<option value="all"<?=$_REQUEST[type]=="all"?" selected":""?>>전체</option>
				<option value="plus"<?=$_REQUEST[type]=="plus"?" selected":""?>>지급</option>
				<option value="minus"<?=$_REQUEST[type]=="minus"?" selected":""?>>사용</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<th>사용/적립일자</th>
		<td class="space-left"><input type="text" name="s_date" style="width:80px;" onclick="popUpCalendar(this, s_date, 'yyyy-mm-dd')" value="<?=$_REQUEST[s_date]?>" class="input" /> ~ <input type="text" name="e_date" style="width:80px;" onclick="popUpCalendar(this, e_date, 'yyyy-mm-dd')" value="<?=$_REQUEST[e_date]?>" class="input" /></td>
	</tr>
	<tr>
		<th>검색</th>
		<td class="space-left">
			<select name="sw">
				<option value="all"<?=$_REQUEST[sw]=="all"?" selected":""?>>전체</option>
				<option value="name"<?=$_REQUEST[sw]=="name"?" selected":""?>>이름</option>
				<option value="id"<?=$_REQUEST[sw]=="id"?" selected":""?>>아이디</option>
			</select>
		
		<input type="text" name="sk" value="<?=$_REQUEST[sk]?>" style="width:220px;" class="input" /> <input type="image" src="/backoffice/images/btn_search.gif" alt="검색" /></td>
	</tr>
	</form>
  </tbody>
</table>
<br />
<div class="mgb5">
  &nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong>
</div>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="5%">No.</th>
	  <th width="8%">회원명</th>
	  <th width="12%">회원아이디</th>
	  <th width="10%">사용</th>
	  <th width="10%">지급</th>
	  <th width="10%">잔액</th>
	  <th width="20%">내용</th>
	  <th width="10%">IP</th>
	  <th width="15%">사용/지급일</th>
	  <th width="10%">사용/지급일</th>
	</tr>
  </thead>
  <tbody>
	<?if($arrList['list']['total'] > 0):?>

	<?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
	<tr>
	  <td><?=$arrList['total']-$offset-$i?></td>
	  <td><a href="/backoffice/module/member/member_info.php?user_id=<?=$arrList['list'][$i]['user_id']?>"><?=$arrList['list'][$i]['user_name']?></a></td>
	  <td><a href="/backoffice/module/member/member_info.php?user_id=<?=$arrList['list'][$i]['user_id']?>"><?=$arrList['list'][$i]['user_id']?></a></td>
	  <td><?=number_format($arrList['list'][$i]['minus'])?></td>
	  <td><?=number_format($arrList['list'][$i]['plus'])?></td>
	  <td><?=number_format($arrList['list'][$i]['nowpoint'])?></td>
	  <td class="space-left"><?=stripslashes($arrList['list'][$i]['contents'])?></td>
	  <td><?=$arrList['list'][$i]['ip']?></td>
	  <td><?=$arrList['list'][$i]['wdate']?></td>
	  <td><span class="btn_pack medium icon"><span class="add"></span><a href="/backoffice/module/point/point_add.php?user_id=<?=$arrList['list'][$i]['user_id']?>">지급/사용 추가</a></span></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="10" >적립금 기록이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"sw=".$_REQUEST[sw]."&sk=".$_REQUEST[sk]."&type=".$_REQUEST[type]."&s_date=".$_REQUEST[s_date]."&e_date=".$_REQUEST[e_date])?>
</div>


</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>