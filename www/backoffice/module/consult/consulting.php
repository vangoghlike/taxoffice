<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consulting.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
############################################## 변수 선언 ################################################ST
$b_type = $_REQUEST['b_type'] ?? "";


//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_GET[offset] == ""){
	$_GET[offset] = 0;
}
//제품 리스트
$arrList = getConsultingList(10, $_GET[offset]);
if($_REQUEST["idx"] != ""){
	$consult_idx = $_REQUEST["idx"];
	$arrInfo = getConsultInfo($_REQUEST["idx"]);
}

//DB해제
SetDisConn($dblink);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script language="javascript">
function delconsultCat(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 업무구분을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.evnMode.value = "";
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
function delPay(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 이용권을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.evnMode.value = "";
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
function formchk(obj){
	if(obj[0].category_name.value.length < 1){
		alert("업무구분명을 입력해 주세요.");
		return false;
	}
	return true;
}
function form_val_chk(obj){
	if(obj[0].price.value.length < 1){
		alert("가격을 입력해 주세요.");
		return false;
	}
	return true;
}
</script>
<style>
.btn_icon.cont {
    background: #5a971f;
}
</style>
<div id="admin-container">
	<? include "menu.php"; ?>
	<div id="admin-content">
		<div class="admin-title-top">
			<h2 class="admin-title">상담정보 관리</h2>
			<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 세무상담관리 &nbsp;&gt;&nbsp; 상담정보 관리</div>
		</div>
		<table class="listTable">
			<colgroup>
				<col width="3%">
				<col width="6%">
				<col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="*">
				<col width="10%">
				<col width="10%">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="check_all" value="Y"></th>
					<th>번호</th>
					<th>상담 종류</th>
					<th>상담 구분</th>
					<th>보수결제(금액)</th>
					<th>담당 세무사</th>
					<th>상담명</th>
                    <th>요청일시</th>
					<th>상담자(ID)</th>
					<th>관리</th>
				</tr>
			</thead>
			<tbody>
				<?
				if($arrList["list"]["total"] > 0){
					for($i=0;$i<$arrList["list"]["total"];$i++){
						//신규글 표시
						if(strtotime($arrList["list"][$i][wdate])+($arrBoardInfo["list"][0]["newmark"]*86400) > mktime()){
							$newImage ='<span class="icoNew">new</span>';	// new 이미지
						}else{
							$newImage ='';
						}
						//글잠금 표시
						if($arrList["list"][$i][uselock] == "Y"){
							$lockImage ="";	// 글잠금표시
						}else{
							$lockImage ="";
						}
						//댓글수 표시
						if($arrList["list"][$i][cmt_count] > 0){
							$cmt_count = "[".number_format($arrList["list"][$i][cmt_count])."]";
						}else{
							$cmt_count = "";
						}
						//공지				
						$categoryTitle = $arrList["total"]-$i-$_GET[offset];					
						$TrClass="";
						$noticeMo="";
						if($arrList["list"][$i][no]=="0"){
							$TrClass="class=\"notice\"";	// 공지글 표시
							$categoryTitle = '<span class="notiTit">공지</span>';
							$noticeMo = '<span class="notiTit">공지</span>';
						}
						//파일
						$fileImg = "";
						if($arrList["list"][$i][re_name]){
							$fileImg = '<span class="icoFile">파일</span>';
						}
				?>
					<tr>
						<td><input type="checkbox" class="chk_list" value="<?=$arrList["list"][$i][idx]?>" name="chk_list" /></td>
						<td><?=$categoryTitle?></td>
						<td class="goods_name" style="font-weight:bolder"><?=$arrList["list"][$i]["goods_name"]?></td>
						<td class="category_name" style="font-weight:bolder"><?=$arrList["list"][$i]["category_name"]?></td>
						<td class="pay" style="font-weight:bolder">
                            <?php if ( $arrList["list"][$i]["pay_price"] ) { ?>
                                결제금액 : <?=number_format($arrList["list"][$i]["pay_price"])?>원<br>
                                포인트적립 : <?=number_format($arrList["list"][$i]["save_point"])?>원<br>
                            <?php } ?>
                        </td>
						<td class="mngr_name" style="font-weight:bolder"><?=$arrList["list"][$i]["mngr_name"]?></td>
						<td class="subject" style="font-weight:bolder"><?=$arrList["list"][$i]["subject"]?></td>
                        <td class="reg_date" style="font-weight:bolder"><?=$arrList["list"][$i]["reg_date"]?></td>
						<td class="user_name" style="font-weight:bolder">
                            <?php if ( $arrList["list"][$i]["user_id"] == '' ) { ?>
                                <?=$arrList["list"][$i]["user_name"]?>
                            <?php } else { ?>
                                <?php
                                $dblink = SetConn($_conf_db["main_db"]);

                                $memInfo = getUserInfo($arrList["list"][$i]["user_id"]);
                                echo $memInfo["list"][0]['user_name'];

                                SetDisConn($dblink);
                                ?>
                            <?php } ?>
                            <?php if ( $arrList["list"][$i]["user_id"] == '' ) { ?>
                            <?php } else { ?>
                                (<?=$arrList["list"][$i]["user_id"]?>)
                            <?php } ?>
                            </td>
						<td><a href="consulting_info.php?idx=<?=$arrList["list"][$i][idx]?>" class="btn_icon modify act_category_modi">수정</a><a class="btn_icon del act_category_del" href="#">삭제</a></td>
					</tr>
				<?}}else{?>
				<tr>
					<td colspan="8" align="center">등록된 글이 없습니다</td>
				</tr>
				<?}?>
			</tbody>
		</table>
		<p class="paging"><a href="<?=$_SERVER[PHP_SELF]?>">Total</a> : <b><?=$arrList["total"]?></b></p>
		<p class="pagination">
			<?=pageNavigationGlobal($arrList["total"],10,5,$_GET[offset],"sk=".$_GET[sk]."&sw=".$_GET[sw]."&category=".$_GET[category]."&page_size=".$_GET[page_size]."&s_date=".$_GET[s_date]."&e_date=".$_GET[e_date])?>
		</p>
	</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>