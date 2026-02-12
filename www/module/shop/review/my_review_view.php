<?
//로그인확인
include_once $_SERVER[DOCUMENT_ROOT] . "/module/member/auth.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//내 게시물 인지 확인
$arrList = getReviewInfo(mysql_escape_string($_REQUEST[idx]));

if($arrList["total"] < 1){
		jsMsg("존재하지 않는 글 입니다.");
		jsHistory("-1") ;
}

if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != $arrList["list"][0]["user_id"]){
		jsMsg("고객님의 문의 글이 아닙니다.");
		jsHistory("-1") ;
}

//상품 정보
$arrInfo = getGoodInfo($arrList["list"][0][g_idx]);

//DB해제
SetDisConn($dblink);
?>

<script language="javascript">
	function deleteReview(idx){
		var cfm = false;
		cfm = confirm("이 리뷰내역을 삭제 하시겠습니까?");
		if(cfm==true){
			new Ajax.Request('/module/shop/review/review_evn.php',
			{
				method:'post',
				parameters: {idx: idx, evnMode: 'deleteAjax'},
				asynchronous: this.asynchronous,
				encoding: 'utf-8',
				contentType: 'application/x-www-form-urlencoded',

				onSuccess: function(transport){
					var response = transport.responseText || "응답된 내역이 없습니다."; 
					if(response=="true"){
						alert("삭제 되었습니다.");
						document.location.href="/shop.php?goPage=MyReview";
					}else{
						alert("삭제에 실패 하였습니다.");
					}
				},
				
				onFailure: function(){ 
					alert('AJAX 데이터 응답중 오류가 발생하였습니다.') 
				}   
			});
		}
	}
</script>
이용후기 보기
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <td>
  
	<div id="contents_tab">

	  <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
		<tr>
		  <th><span class="spanbb"><?=stripslashes($arrList["list"][0]["subject"])?></span></th>
		</tr>
		<tr>
		  <td><p>
		  - 상품명 : <a href="/shop.php?goPage=GoodDetail&g_code=<?=$arrInfo["list"][0][g_code]?>"><?=stripslashes($arrInfo["list"][0][g_name])?></a><br />
		  - 작성자 : <?=$arrList["list"][0][user_name]?><br />
		  - 작성일 : <?=$arrList["list"][0][wdate]?></p></td>
		</tr>
		<tr>
		  <td style="padding:30px 0px 30px 0px"><?=stripslashes(nl2br($arrList["list"][0][contents]))?></td>
		</tr>
	  </table>
	</div>
	
	
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td><a href="/shop.php?goPage=MyReview"><img src="/common/images/btn_list.gif" alt="목록보기" width="66" height="24" border="0" /></a></td>
		<td><div align="right"><a href="javascript:;" onclick="deleteReview('<?=$arrList["list"][0][idx]?>');"><img src="/common/images/btn_delete.gif" border="0" align="absmiddle"></a></div></td>
	  </tr>	

	</table>
  
  </td>
</tr>
</table>