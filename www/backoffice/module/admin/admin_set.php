<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$dblink = SetConn($_conf_db["main_db"]);

$arrPolicyList = getArticleList("tbl_policy", 0, 0," order by policy_name ASC");
//DB해제
SetDisConn($dblink);

$chkPayment=array();
$arrPayment = explode(",",$arrSetInfo["list"][0]['shop_payment']);
for ($i=0;$i<count($arrPayment);$i++)
{ 
	array_push($chkPayment, $arrPayment[$i]);	
} 
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">기본정보설정</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 기본설정 관리 &nbsp;&gt;&nbsp; 기본정보설정</div>
	</div>

		<form name="frmInfo" method="post" action="admin_evn.php">
		<input type="hidden" name="evnMode" value="setAdmin">

		<!-- 기본정보 -->
		<h3 class="admin-title-middle">관리자정보</h3>
		<table  class="admin-table-type1">
		  <colgroup>
		  <col width="120" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>홈페이지 이름</th>
				<td class="space-left"><input type="text" name="shop_name" value="<?=$arrSetInfo["list"][0]['shop_name']?>" class="input" size="50"></td>
			</tr>
			<tr>
				<th>홈페이지 URL</th>
				<td class="space-left">http://<input type="text" name="shop_url" value="<?=$arrSetInfo["list"][0]['shop_url']?>" class="input" size="44"> (http://제외) </td>
			</tr>
			<tr>
				<th>관리자 이메일</th>
				<td class="space-left"><input type="text" name="admin_email" value="<?=$arrSetInfo["list"][0]['admin_email']?>" class="input" size="50"></td>
			</tr>
		  </tbody>
		</table>
		
		<br />
		<!-- 쇼핑몰정보 -->
		<h3 class="admin-title-middle">홈페이지 Title</h3>
		<table  class="admin-table-type1">
		  <colgroup>
		  <col width="120" />
		  <col width="*" />
		  <col width="120" />
		  <col width="*" />
		  <col width="120" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>홈페이지 Title</th>
				<td colspan="5" class="space-left"><input type="text" name="shop_title" value="<?=$arrSetInfo["list"][0]['shop_title']?>" class="input" size="50"></td>
			</tr>
			<tr>
				<th>검색키워드</th>
				<td colspan="5" class="space-left"><input type="text" name="shop_keyword" value="<?=$arrSetInfo["list"][0]['shop_keyword']?>" class="input" size="140"></td>
			</tr>
			<tr>
				<th>소개글</th>
				<td colspan="5" class="space-left"><input type="text" name="shop_content" value="<?=$arrSetInfo["list"][0]['shop_content']?>" class="input" size="140"></td>
			</tr>
			<tr>
				<th>회원가입 적립금</th>
				<td class="space-left"><input type="text" style="width:100%;" name="shop_point_member" value="<?=$arrSetInfo["list"][0]['shop_point_member']?>" class="input"></td>
				<th>최소사용 적립금</th>
				<td class="space-left"><input type="text" style="width:100%;" name="shop_point_min" value="<?=$arrSetInfo["list"][0]['shop_point_min']?>" class="input"></td>
				<th>최대사용 적립금</th>
				<td class="space-left"><input type="text" style="width:100%;" name="shop_point_max" value="<?=$arrSetInfo["list"][0]['shop_point_max']?>" class="input"></td>
			</tr>
			<tr>
				<th>금지단어</th>
				<td colspan="5" class="space-left"><textarea name="shop_badWord"><?=$arrSetInfo["list"][0]['shop_badWord']?></textarea></td>
			</tr>
		  </tbody>
		</table>

		<br />
		

		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="확인" style="font-weight:bold" /></span>
			</div>
		</div>
		</form>
		
		<h3 class="admin-title-middle">개인 정보 동의</h3>
		<table  class="admin-table-type1">
		  <colgroup>
		  <col width="120" />
		  <col width="*" />
		  <col width="120" />
		  <col width="*" />
		  <col width="120" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
				<tr>
					<th>이용약관</th>
					<td colspan="5" class="space-left">
						<form name="frmpolicy1" method="post" action="admin_evn.php">
							<input type="hidden" name="evnMode" value="setPolicy">
							<input type="hidden" name="policy_name" value="<?=$arrPolicyList["list"][0]['policy_name']?>">
							<textarea name="policy_contents"><?=$arrPolicyList["list"][0]['policy_contents']?></textarea>
							<div class="admin-buttons">
								<div class="cen">
									<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="확인" style="font-weight:bold" /></span>
								</div>
							</div>
						</form>
					</td>
				</tr>
				<tr>
					<th>개인정보 취급방침</th>
					<td colspan="5" class="space-left">
						<form name="frmpolicy2" method="post" action="admin_evn.php">
							<input type="hidden" name="evnMode" value="setPolicy">
							<input type="hidden" name="policy_name" value="<?=$arrPolicyList["list"][1]['policy_name']?>">
							<textarea name="policy_contents"><?=$arrPolicyList["list"][1]['policy_contents']?></textarea>
							<div class="admin-buttons">
								<div class="cen">
									<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="확인" style="font-weight:bold" /></span>
								</div>
							</div>
						</form>
					</td>
				</tr>
				<tr>
					<th>개인정보 수집 및 이용에 대한 안내</th>
					<td colspan="5" class="space-left">
						<form name="frmpolicy3" method="post" action="admin_evn.php">
							<input type="hidden" name="evnMode" value="setPolicy">
							<input type="hidden" name="policy_name" value="<?=$arrPolicyList["list"][2]['policy_name']?>">
							<textarea name="policy_contents"><?=$arrPolicyList["list"][2]['policy_contents']?></textarea>
							<div class="admin-buttons">
								<div class="cen">
									<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="확인" style="font-weight:bold" /></span>
								</div>
							</div>
						</form>
					</td>
				</tr>
		  </tbody>
		</table>
	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>