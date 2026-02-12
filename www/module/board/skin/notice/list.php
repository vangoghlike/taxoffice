<?if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER[PHP_SELF]=="/backoffice/module/board/board_view.php"){
###################################################### 관리자 페이지 ######################################################?>
<script type="text/javascript">
<!--
$(document).ready(function() {
	$.each($('input.calendar'), function() {
		set_datepicker($(this));
	});	
});
function set_datepicker($cont) {
	$cont.prop('readonly', true).datepicker({
		closeText: '닫기',
		prevText: '',
		nextText: '',
		currentText: '오늘',
		monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd',
		defaultDate: '+1w',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '년 ',
		changeMonth: true,
		changeYear: true,
		yearRange: '1921:c+5'
	});
}

function boardDel(val){	
	if(confirm("삭제 하시겠습니까?")) {
		$.post("/module/board/ajax_board_del.php", { evnMode: "delete", g_idx: val, boardid: "<?=$arrBoardInfo["list"][0]["boardid"]?>" },
		function(data){		
			//alert(data);
			doLoad();
		});
	}
}
function doLoad(){	
	location.reload();		
}
// 선택 삭제시 singleSelect=true 값 변경 false
function getSelections(){
	var ss = "0";

	var rows = $('input:checkbox[name=chk_list]:checked');
	
	for(var i=0; i<rows.length; i++){
		var row = rows[i];
		//ss.push(row.idx);
		ss += ","+row.value;
	}
	if(rows.length>0){
		//alert(ss);
		boardDel(ss);
	}else{
		alert('선택된 항목이 없습니다.');
	}	
}
$(function(){
    $(".check_all").click(function(){		
        var chk = $(this).is(":checked");//.attr('checked');
        if(chk) $(".chk_list").prop('checked', true);
        else  $(".chk_list").prop('checked', false);
    });
});
//-->
</script>

<div id="admin-content">
	<h2 class="admin-title"><?=$arrBoardInfo["list"][0]["boardname"]?></h2>
	<!--Search Form ST-->
	<form name="form1" method="get" action="<?=$_SERVER[PHP_SELF]?>">
		<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
		<input type="hidden" name="category" value="<?=$_GET["category"]?>">
		<fieldset class="search_box">
			<!--div>
				<label>구분</label>
				<input type="radio" name="board_code" id="board_code_1" value="003" checked /> <label for="board_code_1">국문</label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="board_code" id="board_code_2" value="017"  /> <label for="board_code_2">영문</label>
			</div-->
			<div>
				<label>기간</label>
				<input type="text" name="s_date" class="txt calendar" value="<?=$_GET["s_date"]?>" /> ~ 
				<input type="text" name="e_date" class="txt calendar" value="<?=$_GET["e_date"]?>" />
			</div>
			<div>
				<span class="select_wrap">
					<select name="sw" class="select">
						<option value="">선택</option>
						<option value='s'<?=$_GET[sw]=="s"?" selected='selected'":""?>>제목</option>
						<option value='c'<?=$_GET[sw]=="c"?" selected='selected'":""?>>내용</option>
					</select>	
				</span>
				<input type="text" class="txt" name="sk" value="<?=$_GET[sk]?>" />
				<button class="btn_search" type="button" onclick="document.form1.submit()">검색</button>
			</div>
		</fieldset>
		<div class="page-size">
			<select name="page_size" onchange="document.form1.submit()">
				<option value="100" <?if($arrBoardInfo["list"][0]["scale"]=="100"){echo 'selected="selected"';}?>>100</option>
				<option value="50" <?if($arrBoardInfo["list"][0]["scale"]=="50"){echo 'selected="selected"';}?>>50</option>
				<option value="40" <?if($arrBoardInfo["list"][0]["scale"]=="40"){echo 'selected="selected"';}?>>40</option>
				<option value="30" <?if($arrBoardInfo["list"][0]["scale"]=="30"){echo 'selected="selected"';}?>>30</option>
				<option value="20" <?if($arrBoardInfo["list"][0]["scale"]=="20"){echo 'selected="selected"';}?>>20</option>
				<option value="15" <?if($arrBoardInfo["list"][0]["scale"]=="15"){echo 'selected="selected"';}?>>15</option>
				<option value="10" <?if($arrBoardInfo["list"][0]["scale"]=="10"){echo 'selected="selected"';}?>>10</option>
			</select> 개씩 보기
		</div>
	</form>
	<!--Search Form ED-->
	<!--List ST-->
	<table class="listTable">
		<colgroup>
			<col width="3%" />
			<col width="6%" />
			<col width="*" />
			<col width="10%" />
			<col width="10%" />
			<col width="10%" />
		</colgroup>
		<thead>
			<tr>
				<th><input type="checkbox" class="check_all" value="Y" /></th>
				<th>번호</th>
				<th>제목</th>
				<th>작성일</th>
				<th>조회수</th>
				<th>관리</th>
			</tr>
		</thead>
		<tbody>
		<?
		if($arrBoardList["list"]["total"] > 0){
			for($i=0; $i < $arrBoardList["list"]["total"]; $i++){
				//신규글 표시
				if(strtotime($arrBoardList["list"][$i][wdate])+($arrBoardInfo["list"][0]["newmark"]*86400) > mktime()){
					$newImage ='<span class="icoNew">new</span>';	// new 이미지
				}else{
					$newImage ='';
				}
				//글잠금 표시
				if($arrBoardList["list"][$i][uselock] == "Y"){
					$lockImage ="";	// 글잠금표시
				}else{
					$lockImage ="";
				}
				//댓글수 표시
				if($arrBoardList["list"][$i][cmt_count] > 0){
					$cmt_count = "[".number_format($arrBoardList["list"][$i][cmt_count])."]";
				}else{
					$cmt_count = "";
				}
				//공지				
				$categoryTitle = $arrBoardList["total"]-$i-$_GET[offset];					
				$TrClass="";
				$noticeMo="";
				if($arrBoardList["list"][$i][no]=="0"){
					$TrClass="class=\"notice\"";	// 공지글 표시
					$categoryTitle = '<span class="notiTit">공지</span>';
					$noticeMo = '<span class="notiTit">공지</span>';
				}
				//파일
				$fileImg = "";
				if($arrBoardList["list"][$i][re_name]){
					$fileImg = '<span class="icoFile">파일</span>';
				}
		?>
		<tr>
			<td><input type="checkbox" class="chk_list" value="<?=$arrBoardList["list"][$i][idx]?>" name="chk_list" /></td>
			<td><?=$categoryTitle?></td>
			<td class="al">
			<?=text_cut(stripslashes($arrBoardList["list"][$i][subject]),$arrBoardInfo["list"][0][subjectcut])?></td>
			<td><?=$arrBoardList["list"][$i][wdate]?></td>
			<td><?=number_format($arrBoardList["list"][$i][hit])?></td>
			<td>
				<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardList["list"][$i][idx]?>&category=<?=$_GET[category]?>" class="btn_icon modify act_view">수정</a>
				<a href="javascript:void(0);" onclick="boardDel(<?=$arrBoardList["list"][$i][idx]?>)" class="btn_icon del act_del">삭제</a>
			</td>
		</tr>
		<?
			}
		}else{
		?>
		<tr>
			<td colspan="6" align="center">등록된 글이 없습니다</td>
		</tr>
		<?
		}
		?>		
		</tbody>
	</table>
	<!--List ED-->
	<!--Page ST-->
	<p class="paging"><a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list">Total</a> : <b><?=$arrBoardList["total"]?></b></p>
	<p class="pagination">
		<?=pageNavigationGlobal($arrBoardList["total"],$arrBoardInfo["list"][0]["scale"],$arrBoardInfo["list"][0]["pagescale"],$_GET[offset],"boardid=".$arrBoardInfo["list"][0]["boardid"]."&sk=".$_GET[sk]."&sw=".$_GET[sw]."&category=".$_GET[category]."&page_size=".$_GET[page_size]."&s_date=".$_GET[s_date]."&e_date=".$_GET[e_date])?>
	</p>
	<!--Page ED-->
	<p class="btn_r">
		<a href="javascript:void(0);" onclick="getSelections()"  class="btn_box del act_del">선택삭제</a>
		<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=write&category=<?=$_GET[category]?>" class="btn_box act_ins">신규등록</a>
	</p>
</div>
<?}else{###################################################### 사용자 페이지 ######################################################?>
	<div class="sub_visual board">
		<div class="inner">
			<h2 class="title">홍보센터</h2>
		</div>
	</div>
	
	<div class="sub_content_wrap">
		<?php include "../include/_snb_board.php" ?>
		
		<div class="sub_content">
			<div class="title_wrap">
				<h3 class="page_title">공지사항</h3>
			</div>
			
			<div class="content_wrap">
				<ul class="tabmenu">
					<li class="active"><a href="notice_list.php">공지사항</a></li>
					<li><a href="press_list.php" class="active">보도자료 및 자료실</a></li>
					<li><a href="community_list.php">커뮤니티</a></li>
				</ul>
				
				<div class="board_list">
					<p class="total">총<span class="fc_point"><?=number_format($arrBoardList["total"])?></span>건</p>
					
					<ul class="tbl_list">
					<?
					if($arrBoardList["list"]["total"] > 0){
						for($i=0; $i < $arrBoardList["list"]["total"]; $i++){
							$arrDate	= explode(" ",$arrBoardList["list"][$i][wdate]);
							$arrYmd		= explode("-",$arrDate[0]);
					?>
						<li class="tbl_list_row">
							<div class="column num"><strong><?=$arrYmd[2]?></strong><?=$arrYmd[0]?>.<?=$arrYmd[1]?></div>
							<div class="column title">
								<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardList["list"][$i][idx]?>&sk=<?=$_GET[sk]?>&sw=<?=$_GET[sw]?>&offset=<?=$_GET[offset]?>&category=<?=$_GET[category]?>"><?=$arrBoardList["list"][$i][subject]?></a>
							</div>
							<div class="column desc"><?=text_cut(strip_tags($arrBoardList["list"][$i][contents]),30)?></div>
						</li>
					<?
						}
					}
					?>
					</ul>
					<!-- //tbl_list -->
					
					<div class="pagination">
						<?=pageNavigationUser($arrBoardList["total"],$arrBoardInfo["list"][0]["scale"],$arrBoardInfo["list"][0]["pagescale"],$_GET[offset],"boardid=".$arrBoardInfo["list"][0]["boardid"]."&sk=".$_GET[sk]."&sw=".$_GET[sw]."&category=".$_GET[category])?>
					</div>
				</div>
				<!-- //board_list -->
			</div>
			<!-- //content_wrap -->
			
		</div>
		<!-- //sub_content -->
	
	</div>
	
<script>
// submenu
$(function(){
	ui.subMenu(4,0);
})
</script>






<?}?>