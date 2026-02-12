<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
if(!in_array("shop_good_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_REQUEST[st]=="1"){
	$order_by = " A.sort_num DESC, A.idx DESC ";
}else{
	$order_by = " A.idx DESC ";
}

//상품 리스트
$arrList = getGoodListBaseNFileFromCat(
	mysql_escape_string($_REQUEST[cat_no]), 
	$order_by, 
	mysql_escape_string($_REQUEST[sw]), 
	mysql_escape_string($_REQUEST[sk]), 
	$scale, $_REQUEST[offset],"");

//전체 카테고리 가져오기
$arrAllCategory = getCategoryAll();

//상품분류 리스트
$arrCategory = getCategoryList(0);//1차카테고리

$arrCategoryInfo = getCategoryInfo(mysql_escape_string($_REQUEST[cat_no]));

//카테고리 정보
$arrCatCode = explode("/", $arrCategoryInfo["list"][0][cat_code]);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu_good.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">상품 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 상품 관리 &nbsp;&gt;&nbsp; 상품 목록</div>
	</div>

<script language="javascript">
<?
for($j=1;$j<$_SITE["PRODUCT"]["CATEGORY_DEPTH"]+1;$j++){ //카테고리 $_SITE["PRODUCT"]["CATEGORY_DEPTH"]차까지 만듬
?>
//카테고리 초기화
function initCat<?=$j?>(){
	for(i=$("cat<?=$j?>").length; i >= 0; i--){
		$("cat<?=$j?>").options[i] = null;
	}
	$("cat<?=$j?>").options[0] = new Option("=====<?=$j?>차분류=====","");
}

//카테고리 가져오기
function getCat<?=$j?>(cat,selected_idx){
	//선택된 값 이후 카테고리는 초기화
	//마지막 $_SITE["PRODUCT"]["CATEGORY_DEPTH"]차 이후는 셀렉트 박스가 없으므로 try 로 씀
	<?for($k=$j;$k<$_SITE["PRODUCT"]["CATEGORY_DEPTH"];$k++){?>
	try{ initCat<?=$k+1?>(); }catch(e){}
	<?}?>

	new Ajax.Request('/module/category/ajax_get_cat.php',
	{
		method: 'get',
		asynchronous: this.asynchronous,
		contentType: 'application/x-www-form-urlencoded',
		encoding: 'utf-8',
		parameters: {cat_no: cat},

		onSuccess: function(transport){
			var response = transport.responseText; 
			setCat<?=$j?>(response,selected_idx);
			//카테고리 번호 설정
			$("cat_no").value = cat;
		},
		
		onFailure: function(){ 
			alert('Something went wrong...') 
		}   
	});

}

//카테고리 설정하기
function setCat<?=$j?>(txt,selected_idx){
	if(txt !=""){
		var opt = new Array();
		var opt2 = new Array();
		opt = txt.split("||");
		for(i=0; i<opt.length; i++){
			opt2 = opt[i].split("**");
			//마지막 $_SITE["PRODUCT"]["CATEGORY_DEPTH"]차 이후는 셀렉트 박스가 없으므로 try 로 씀
			try{
				if(selected_idx==opt2[0]){
					$("cat<?=$j+1?>").options[i+1] = new Option(opt2[1],opt2[0],true,true);
				}else{
					$("cat<?=$j+1?>").options[i+1] = new Option(opt2[1],opt2[0]);
				}
			}catch(e){}
		}
	}
}
<?
} //카테고리 js 끝
?>
</script>

<script language="javascript">
function delGood(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 상품을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}

function copyGood(idx){
	if(confirm("선택한 상품을 복사하시겠습니까?")){
		document.location = "good_evn.php?evnMode=copy&idx="+idx;
	}
}

function changeShow(idx,gb) {
	document.frmListHidden.evnMode.value = "changeshow";
	document.frmListHidden.idx.value = idx;
	document.frmListHidden.gb.value = gb;
	document.frmListHidden.submit();
}
</script>

<form name="frmSort" method="get" action="<?=$_SERVER[PHP_SELF]?>">
<h3 class="admin-title-middle">상품검색</h3>
<input type="hidden" name="cat_no" id="cat_no">
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
	  <th>분류선택</th>
	  <td class="space-left">
		<select name="cat" id="cat" onchange="getCat1(this.value);">
		<option value="">==========1차분류==========</option>
		<?for($i=0;$i<7;$i++){?>
		<option value="<?=$arrCategory["list"][$i][cat_no]?>"<?=$arrCatCode[0]==$arrCategory["list"][$i][cat_no]?" selected":""?>><?=$arrCategory["list"][$i][cat_name]?></option>
		<?}?>
		</select>

		<?
		for($i=2;$i<$_SITE["PRODUCT"]["CATEGORY_DEPTH"]+1;$i++){ //카테고리 $_SITE["PRODUCT"]["CATEGORY_DEPTH"]차까지 만듬 => 1차 초기화는 따로위에서 함
		?>
		<select name="cat<?=$i?>" id="cat<?=$i?>" onchange="getCat<?=$i?>(this.value);">
		<option value="">==========<?=$i?>차분류==========</option>
		</select>
		<?
		}
		?>
	  </td>
	</tr>
	<tr>
	  <th>노출여부</th>
	  <td class="space-left">
	    <input type="radio" name="isshow" value="" <?=$_REQUEST[isshow]==""?" checked":""?>><font color="black">전체</font>
		<input type="radio" name="isshow" value="Y" <?=$_REQUEST[isshow]=="Y"?" checked":""?>><font color="blue">진열함</font>
		<input type="radio" name="isshow" value="N"<?=$_REQUEST[isshow]=="N"?" checked":""?>><font color="red">진열안함</font>
		</select>
	  </td>
	</tr>
	<tr>
	  <th>메인노출</th>
	  <td class="space-left">
	    <input type="checkbox" name="show1" value="Y"<?=$_REQUEST[show1]=="Y"?" checked":""?>>MAIN
		<!-- <input type="checkbox" name="show2" value="Y"<?=$_REQUEST[show2]=="Y"?" checked":""?>>
		<input type="checkbox" name="show3" value="Y"<?=$_REQUEST[show3]=="Y"?" checked":""?>>
		<input type="checkbox" name="show4" value="Y"<?=$_REQUEST[show4]=="Y"?" checked":""?>>  -->
	  </td>
	</tr>
	<tr>
	  <th>정렬</th>
	  <td class="space-left">
	    <select name="st">
		<option value="0"<?=$_REQUEST[st]=="0"?" selected":""?>>상품번호 역순</option>
		<option value="1"<?=$_REQUEST[st]=="1"?" selected":""?>>정렬번호 역순</option>
		</select>
	  </td>
	</tr>
	<tr>
	  <th>상품명</th>
	  <td class="space-left"><input type="text" name="sk" value="<?=$_REQUEST[sk]?>" class="input" style="width:300px;" /> <input type="image" src="/backoffice/images/btn_search.gif" alt="검색"/></td>
	</tr>
  </tbody>
</table>
</form>

<br />

<div class="mgb5">
	<div class="fl">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
	<div class="fr"> <a href="javascript:window.open('good_upload_pop.php','upload_csv','width=400 height=300')">.</a> <span class="btn_pack medium icon"><span class="download"></span><a href="/backoffice/module/shop/good_to_csv.php?sk=&st=&show_yn=" target="_blank">상품목록 CSV로 받기</a></span></div>
	<div class="clear"></div>
</div>

<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="45">No.</th>
	  <th width="45">사진</th>
	  <th width="160">상품분류</th>
	  <th width="*">상품명</th>
	  <th width="65">소비자가</th>
	  <th width="65">판매가</th>
	  <th width="65">재고관리</th>
	  <th width="90">메인노출</th>
	  <th width="60">정렬번호</th>
	  <th width="120">등록일</th>
	  <th width="120">관리</th>
	  <th width="80">노출여부</th>
	</tr>
  </thead>
  <tbody>
<?if($arrList['list']['total'] > 0):?>

<?for ($i=0;$i<$arrList['list']['total'];$i++) {
	//카테고리 정보
	$arrThisCatCode = explode("/", $arrList["list"][$i][cat_code]);

	if($arrList['list'][$i]['image_s']) {
		$simg = "/uploaded/shop_good/".$arrList['list'][$i]['idx']."/".$arrList['list'][$i]['image_s'];
	} else {
		$simg = "/images/shop/no_img.jpg";
	}
?>
<tr>
	<td><?=$arrList["total"]-$i-$_GET[offset]?></td>
	<td><!-- <a href="/shop.php?goPage=GoodDetail&idx=<?=$arrList['list'][$i]['idx']?>" target="_blank"> --><img src="<?=$simg?>" width="45"></a></td>
	<td class="space-left">
	<?for($j=0; $j <count($arrThisCatCode)-1;$j++){?>
	<!-- <a href="/shop.php?goPage=GoodList&cat_no=<?=$arrThisCatCode[$j]?>" target="_blank"> --><?=$arrAllCategory[$arrThisCatCode[$j]]?></a>
	<?=($j < count($arrThisCatCode)-2)?" ><br>":""?>
	<?}?>
	</td>
	<td class="space-left"><?=stripslashes($arrList['list'][$i]['g_name'])?></td>
	<td><?=number_format($arrList['list'][$i]['sale_price'])?></td>
	<td><?=number_format($arrList['list'][$i]['price'])?></td>
	<td>
	<?if($arrList['list'][$i]['stock_type']=="2"):?>
	일반관리<br><?=number_format($arrList['list'][$i]['stock'])?> 개
	<?elseif($arrList['list'][$i]['stock_type']=="3"):?>
	연계관리<br>최소: <?=number_format($arrList['list'][$i]['min_stock'])?>
	<?else:?>
	관리안함
	<?endif;?>
	</td>
	<td><? if($arrList['list'][$i]['main_show']=="Y") echo "MAIN<br>"; ?>
		<? if($arrList['list'][$i]['brand_show']=="Y") echo "Brand Pick<br>"; ?>
		<? if($arrList['list'][$i]['special_show']=="Y") echo "SPECIAL Pick<br>"; ?>
		<? if($arrList['list'][$i]['best_show']=="Y") echo "BEST PRODUCT<br>"; ?></td>
	<td><?=$arrList['list'][$i]['sort_num']?></td>
	<td><?=$arrList['list'][$i]['wdate']?></td>
	<td><a href="javascript:copyGood(<?=$arrList['list'][$i]['idx']?>)">복사</a> | <a href="good_info.php?idx=<?=$arrList['list'][$i]['idx']?>&listURL=<?=urlencode($_SERVER[REQUEST_URI])?>"><img src="/backoffice/images/k_modify.gif" alt="수정" /></a> <a href="javascript:delGood('<?=$arrList['list'][$i]['idx']?>');"><img src="/backoffice/images/k_delete.gif" alt="삭제" /></a></td>
	<td><input type="radio" name="is_show_<?=$arrList['list'][$i]['idx']?>" value="Y" <?=$arrList['list'][$i]['is_show']=="Y"?" checked":""?> onclick="changeShow('<?=$arrList['list'][$i]['idx']?>','Y')">Y
		<input type="radio" name="is_show_<?=$arrList['list'][$i]['idx']?>" value="N" <?=$arrList['list'][$i]['is_show']=="N"?" checked":""?> onclick="changeShow('<?=$arrList['list'][$i]['idx']?>','N')">N
	</td>
</tr>
<?}?>

<?else:?>
<tr height="100">
  <td colspan="12" >등록된 상품이 없습니다.</td>
</tr>

<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$_REQUEST[offset],"cat_no=".$_REQUEST[cat_no]."&sw=".$_REQUEST[sw]."&sk=".$_REQUEST[sk]."&st=".$_REQUEST[st]."&isshow=".$_REQUEST[isshow]."&show1=".$_REQUEST[show1]."&show2=".$_REQUEST[show2]."&show3=".$_REQUEST[show3]."&show4=".$_REQUEST[show4])?>
</div>

<form name="frmListHidden" method="post" action="good_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
<input type="hidden" name="gb">
<input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">
</form>


<script language="javascript">
<?
for($i=0;$i<count($arrCatCode)-1;$i++){
?>
getCat<?=$i+1?>('<?=$arrCatCode[$i]?>','<?=$arrCatCode[$i+1]?>');
<?
}
?>
</script>
</div>
</div>

<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php" ;
?>
