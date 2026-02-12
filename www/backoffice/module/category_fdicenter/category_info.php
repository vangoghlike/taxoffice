<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category_fdicenter.lib.php";
if(!in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getCategoryInfo($_GET['cat_no']);

//DB해제
SetDisConn($dblink);

$chkSns=array();
if($arrInfo["total_sns"]>0){
for($i=0; $i<$arrInfo["total_sns"]; $i++){
	array_push($chkSns, $arrInfo["sns"][$i]["s_cat_no"]);

	$arraySns[$arrInfo["sns"][$i]["s_cat_no"]] = $arrInfo["sns"][$i]["sns_url"];
}
}

$arrCate = explode("/", $arrInfo["list"][0][cat_code]);

if($arrCate[4]) {
	$currCatno = $arrCate[3];
} else if($arrCate[3]) {
	$currCatno = $arrCate[2];
} else if($arrCate[2]) {
	$currCatno = $arrCate[1];
} else if($arrCate[1]) {
	$currCatno = $arrCate[0];
} else if($arrCate[0]) {
	$currCatno = "";
}
?>

<style>
.mgb5 {
    height: 20px;
}
</style>

<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">분류 수정</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 상품 관리 &nbsp;&gt;&nbsp; 분류 수정<?=$arrInfo["list"][0]['cat_code']?></div>
	</div>

	<form name="frmInfo" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
		<input type="hidden" name="evnMode" value="editCategory">
		<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]?>">
		<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
		<input type="hidden" name="cat_code" value="<?=$arrInfo["list"][0]['cat_code']?>">
		<input type="hidden" name="cat_gubun" value="<?=$_GET["cat_gubun"]?>">

		<div class="clfix mgb5">
		  <div class="fl">&nbsp; <strong><font color="red"><?=$arrInfo["list"][0]['cat_name']?> 수정</font></strong></div>
		  <div class="fr"><a href="category.php"><img src="/backoffice/images/k_list.gif" alt="목록" /></a></div>
		</div>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="140" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
			  <th>카테고리명</th>
			  <td class="space-left"><input type="text" name="cat_name" value="<?=$arrInfo["list"][0]['cat_name']?>" style="width:200px;" class="input" /></td>
			</tr>
			<tr>
			  <th>연결 idx</th>
			  <td class="space-left"><input type="text" name="cat_link_idx" value="<?=$arrInfo["list"][0]['cat_link_idx']?>" style="width:200px;" class="input" /></td>
			</tr>
			<tr>
			  <th>사용여부</th>
			  <td class="space-left">
				<select name="cat_is_show" id="cat_is_show" style="width:200px;" class="input" />
					<option <?if($arrInfo["list"][0]['cat_is_show']=="Y"){echo "selected";}?> value="Y">Y</option>
					<option <?if($arrInfo["list"][0]['cat_is_show']=="N"){echo "selected";}?> value="N">N</option>
				</select>
			</td>
			</tr>
		  </tbody>
		</table>
		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="정보수정" style="font-weight:bold" /></span> &nbsp;
				<span class="btn_pack xlarge"><input type="button" value="현재목록" style="font-weight:bold" onclick="document.location.href='category.php?cat_no=<?=$currCatno?>&cat_gubun=<?=$_GET["cat_gubun"]?>'" /></span>
			</div>
		</div>

</form>
<form name="frmListHidden" method="post" action="category_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
<input type="hidden" name="cat_no" value="<?=$_GET['cat_no']?>">
</form>

	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php" ;
?>