<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["admin"], $_GET['idx']);

$arrListLevel = getArticleList($_conf_tbl["member_level"], $scale, postNullCheck('offset'), "order by level_no desc ");

$arrAuth = explode(",",str_replace(" ","",$arrInfo["list"][0]['a_auth']));
//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">관리자 수정</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 기본설정 관리 &nbsp;&gt;&nbsp; 관리자 수정</div>
	</div>

		<form name="frmInfo" method="post" action="admin_evn.php">
		<input type="hidden" name="evnMode" value="updateAdmin">
		<input type="hidden" name="idx" value="<?=$arrInfo["list"][0]['idx']?>">

		<h3 class="admin-title-middle">관리자 수정</h3>
		<!-- 기본정보 -->
		<table  class="admin-table-type1">
		  <colgroup>
		  <col width="120" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>아이디</th>
				<td class="space-left"><?=$arrInfo["list"][0]['a_id']?></td>
			</tr>
			<tr>
				<th>비밀번호</th>
				<td class="space-left"><input type="text" name="a_pw" value="" class="input"> ※ 비밀번호 변경시에만 입력하세요.<?//=$arrInfo["list"][0]['a_pw']?> </td>
			</tr>
			<tr>
				<th>등급</th>
				<td class="space-left">
				<input type="radio"  id="radio1" name="a_grade" value="ROOT"<?=$arrInfo["list"][0]['a_grade']=="ROOT"?" checked":""?>><label for="radio1">ROOT</label>
				<input type="radio"  id="radio2" name="a_grade" value="ADMIN"<?=$arrInfo["list"][0]['a_grade']=="ADMIN"?" checked":""?>><label for="radio2">ADMIN</label> 
				<input type="radio"  id="radio3" name="a_grade" value="ACCEL"<?=$arrInfo["list"][0]['a_grade']=="ACCEL"?" checked":""?>><label for="radio3">ACCEL</label> 
				(ROOT 일경우 아래권한에 관계없이 모든 메뉴 접근 가능)

				</td>
			</tr>
			<tr>
				<th>이름</th>
				<td class="space-left"><input type="text" name="a_name" maxlength="20" value="<?=stripslashes($arrInfo["list"][0]['a_name'])?>" class="input"></td>
			</tr>
			<tr>
				<th>직급</th>
				<td class="space-left"><input type="text" name="a_class" maxlength="20" value="<?=stripslashes($arrInfo["list"][0]['a_class'])?>" class="input"></td>
			</tr>
			<tr>
				<th>전화</th>
				<td class="space-left"><input type="text" name="a_phone" maxlength="20" value="<?=stripslashes($arrInfo["list"][0]['a_phone'])?>" class="input"></td>
			</tr>
			<tr>
				<th>이메일</th>
				<td class="space-left"><input type="text" name="a_email" maxlength="50" value="<?=stripslashes($arrInfo["list"][0]['a_email'])?>" class="input"></td>
			</tr>
			<tr>
				<th>관리권한</th>
				<td class="space-left">
					<ul class="admin-restrictions">
					<?for($i=0;$i<$arrMenuList["total"];$i++){?>
					<li><input type="checkbox" name="a_auth[]" id="a_auth_<?=$i?>" value="<?=$arrMenuList["list"][$i]['m_code']?>"<?=in_array($arrMenuList["list"][$i]['m_code'],$arrAuth)==true?" checked":""?>><label for="a_auth_<?=$i?>"><?=$arrMenuList["list"][$i]['m_name']?></label></li>
					<?}?>
					</ul>
				</td>
			</tr>
			<tr>
				<th>등록일</th>
				<td class="space-left"><?=$arrInfo["list"][0]['a_date']?></td>
			</tr>
		  </tbody>
		</table>

		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="수정하기" style="font-weight:bold" /></span>
			</div>
		</div>
		</form>
	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>