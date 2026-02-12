<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category_fdicenter.lib.php";
if(!in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//현재카테고리 정보
$arrInfo = getCategoryInfo($_REQUEST["cat_no"],$_REQUEST["cat_gubun"]);
//현재카테고리 패쓰
$arrPath = getCategoryPath($_REQUEST["cat_no"],$_REQUEST["cat_gubun"]);
//카테고리 목록
$arrList = getCategoryList($_REQUEST["cat_no"],$_REQUEST["cat_gubun"]);

//_DEBUG($arrList);
//DB해제
SetDisConn($dblink);

$arrCate = explode("/", $arrInfo["list"][0]['cat_code']);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">메뉴 관리</h2>
	</div>

		<div class="admin-search">
			<form action="category_evn.php" method="post" name="categoryFrm">
			<input type="hidden" name="evnMode" value="createCategory4">
			<input type="hidden" name="s_cat_gubun" value='<?=$arrInfo["list"][0]["cat_gubun"]?>'>
			<input type="hidden" name="s_cat_no" value='<?=$arrInfo["list"][0]["cat_no"]?>'>
			<input type="hidden" name="s_category" value='<?=$arrInfo["list"][0]["cat_code"]?>'>
			<input type="hidden" name="s_depth" value='<?=($arrInfo["list"][0]["cat_no"]?$arrInfo["list"][0]["cat_depth"]+1:$arrInfo["list"][0]["cat_depth"])?>'>
			<div class="total">&nbsp;<strong>
			카테고리 관리
			 > <a href="category.php?&cat_gubun=<?=$arrInfo["list"][0]["cat_gubun"]?>"><?=$arrPath['list'][0]['cat_name']?></a>
			 > <a href="category2.php?cat_no=<?=$arrPath['list'][0]['cat_no']?>&cat_gubun=<?=$arrInfo["list"][0]["cat_gubun"]?>"><?=$arrPath['list'][1]['cat_name']?></a>
			  > <a href="category3.php?cat_no=<?=$arrPath['list'][1]['cat_no']?>&cat_gubun=<?=$arrInfo["list"][0]["cat_gubun"]?>"><?=$arrPath['list'][2]['cat_name']?></a> >
			</strong>
			</div>
			<div class="keyword">
				<input size="50" type=text name=new_name onBlur="FillField(this)" onFocus="ClearField(this)" value="새로운 프로그램" class="input" /> <input type="image" src="/backoffice/images/btn_add_cat.gif" alt='신규생성' />
			</div>
			</form>
		</div>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="70" />
		  <!-- <col width="100" />
		  <col width="170" /> -->
		  <col width="*" />
		  <col width="70" />
		  <col width="130" />
		  </colgroup>
		  <thead>
			<tr>
			  <th>No.</th>
			  <!-- <th>하위</th>
			  <th>하위보기</th> -->
			  <th>카테고리명</th>
			  <th>사용여부</th>
			  <th>관리</th>
			</tr>
		  </thead>
		  <tbody>
		<?
		if($arrList["total"]>0){
			for($i=0; $i<$arrList["total"]; $i++){
		?>
			<tr>
				<td><?=$arrList["list"][$i][cat_no]?></td>
				<!-- <td><?=number_format($arrList["list"][$i]['total_sub'])?></td>
				<td><a href="category3.php?cat_no=<?=$arrList["list"][$i]['cat_no']?>&cat_gubun=<?=$_GET['cat_gubun']?>"><img src="./images/btn_view.gif" border=0 alt="<?=$arrList["list"][$i]['cat_name']?>"></a></td> -->
				<td><?=stripslashes($arrList["list"][$i][cat_name])?></td>
				<td><?=stripslashes($arrList["list"][$i]['cat_is_show'])?></td>
				<td><a href="category_info2.php?cat_no=<?=$arrList["list"][$i][cat_no]?>&cat_gubun=<?=$arrInfo["list"][0]["cat_gubun"]?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a>
				 <a href="category_evn.php?evnMode=deleteCategory2&cat_no=<?=$arrList["list"][$i]['cat_no']?>&s_cat_no=<?=$arrInfo["list"][0]["cat_no"]?>&s_cat_gubun=<?=$arrInfo["list"][0]["cat_gubun"]?>" onclick="if(confirm('[<?=$arrList["list"][$i][cat_no]?>] 번호 카테고리를 정말 삭제 하시겠습니까?')){return true;}else{return false;}"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
			</tr>
		<?
			}
		}else{
			echo"
			<tr height=100>
				<td colspan=7>카테고리가 존재하지 않습니다.</td>
			</tr>
			";
		}
		?>
		  </tbody>
		</table>
	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php" ;
?>