<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getArticleInfo("tbl_manager", $_GET['idx']);

//$arrAuth = explode(",",str_replace(" ","",$arrInfo["list"][0]['a_auth']));

//DB해제
SetDisConn($dblink);

?>
<script>
	function frmcheck(frm){
		if(frm.mngr_name.value.length < 1){
			alert("성명을 입력해 주세요.");
		}
		frm.submit();
	}
	function delAdmin(idx){
		var cfm;
		cfm =false;
		cfm = confirm("이 세무사를 삭제 하시겠습니까?");
		if(cfm==true){
			document.frmBBSHidden.idx.value = idx;
			document.frmBBSHidden.submit();
		}
	}
	function emailSelect(obj) {
		var str_email03 = obj.value;
		if (str_email03 == ''){
			document.getElementById("str_email02").value = "";
		}else{
			document.getElementById("str_email02").value = str_email03;
		}
	}
	function checkAll(val){
		var check_val = document.getElementById("checkall"+val).checked;
		if(check_val){
			var arrCheckName = document.getElementsByName("goods_category_idno["+val+"][]");
			for(var i=0;i<arrCheckName.length;i++){
				arrCheckName[i].checked = true;
			}
		}else{
			var arrCheckName = document.getElementsByName("goods_category_idno["+val+"][]");
			for(var i=0;i<arrCheckName.length;i++){
				arrCheckName[i].checked = false;
			}
		}
	}
</script>
<div id="admin-container">
		<?include "menu.php";?>
		<div id="admin-content">
			<h2 class="admin-title">세무사관리</h2>
				<form id="frm_write" name="frm_write" enctype="multipart/form-data" method="post" action="manager_evn.php">
				<?if($_GET['idx'] != ""){?>
					<input type="hidden" name="evnMode" value="section_modify">
				<?}else{?>
					<input type="hidden" name="evnMode" value="section_write">
				<?}?>
				<input type="hidden" name="idx" value="<?=$_GET['idx']?>">

				<table class="writeTable">
					<colgroup>
						<col width="120px">
						<col width="300px">
						<col width="120px">
						<col width="*">
					</colgroup>
					<tbody>
					<tr>
						<th class="nec" rowspan="6">사진</th>
						<td rowspan="6">
							<div><img src="/uploaded/mngr/<?=$arrInfo["list"][0]['file_name']?>" alt="<?=$arrInfo["list"][0]['mngr_name']?>" style="max-width:270px"></div>
							<div class="in_file">
								<!-- <input type="text" class="txt" name="" value="" style="width:200px" readonly=""> -->
								<input type="file" class="" name="upfiles" value="" title="사진을 등록해주세요.">
							</div>
						</td>
					</tr>
					<tr>
						<th class="nec">지점명</th>
						<td><input type="text" class="txt req" style="width:150px;font-weight:bolder;" name="bran_name" value="<?=$arrInfo["list"][0]['bran_name']?>" maxlength="10" title="지점명을 입력해주세요."></td>
					</tr>
					<tr>
						<th>세무사명</th>
						<td><input type="text" class="txt" style="width:150px;font-weight:bolder;" name="mngr_name" value="<?=$arrInfo["list"][0]['mngr_name']?>" maxlength="20" title="성명을 입력해주세요."></td>
					</tr>
					<tr>
						<th>연락처</th>
						<td>
							<div class="for-phoneform" data-name="phone" data-class="select,txt,txt" data-attr="" style="display: none;">
								<?=$arrInfo["list"][0]['phone']?>
							</div>
							<?
								$arrPhone = explode("-",$arrInfo["list"][0]['phone']);
							?>
							<select class="fphone select" name="phone[]" title="휴대폰번호를 입력해주세요.">
								<option value="010" <?if($arrPhone[0] == "010"){?>selected="selected"<?}?>>010</option>
								<option value="011" <?if($arrPhone[0] == "011"){?>selected="selected"<?}?>>011</option>
								<option value="016" <?if($arrPhone[0] == "016"){?>selected="selected"<?}?>>016</option>
								<option value="017" <?if($arrPhone[0] == "017"){?>selected="selected"<?}?>>017</option>
								<option value="018" <?if($arrPhone[0] == "018"){?>selected="selected"<?}?>>018</option>
								<option value="019" <?if($arrPhone[0] == "019"){?>selected="selected"<?}?>>019</option>
							</select>
							&nbsp;-&nbsp;
							<input type="text" class="fphone txt" name="phone[]" value="<?=$arrPhone[1]?>" maxlength="4" title="휴대폰번호를 입력해주세요.">
							&nbsp;-&nbsp;
							<input type="text" class="fphone txt" name="phone[]" value="<?=$arrPhone[2]?>" maxlength="4" title="휴대폰번호를 입력해주세요.">
						</td>
					</tr>
					<tr>
						<th>이메일</th>
						<td>
							<div class="for-mailform" data-name="email" data-class="txt,txt,select" data-attr="" style="display: none;">
								<?=$arrInfo["list"][0]['email']?>
							</div>
							<?
								$arrEmail = explode("@",$arrInfo["list"][0]['email']);
							?>
							<input type="text" class="femail txt" id="str_email01" name="email[]" value="<?=$arrEmail[0]?>" maxlength="100" title="이메일주소를 입력해주세요.">
							&nbsp;@&nbsp;
							<input type="text" class="femail txt" id="str_email02" name="email[]" value="<?=$arrEmail[1]?>" maxlength="100" title="이메일주소를 입력해주세요.">
							&nbsp;
							<select class="femail select" id="str_email03" onchange="emailSelect(this)" name="email_select_domain" title="이메일주소를 입력해주세요.">
								<option value="">직접입력</option>
								<option value="gmail.com" <?if($arrEmail[1] == "gmail.com"){?>selected<?}?>>gmail.com</option>
								<option value="hanmail.net" <?if($arrEmail[1] == "hanmail.net"){?>selected<?}?>>hanmail.net</option>
								<option value="hotmail.com" <?if($arrEmail[1] == "hotmail.com"){?>selected<?}?>>hotmail.com</option>
								<option value="nate.com" <?if($arrEmail[1] == "nate.com"){?>selected<?}?>>nate.com</option>
								<option value="naver.com" <?if($arrEmail[1] == "naver.com"){?>selected<?}?>>naver.com</option>
								<option value="paran.com" <?if($arrEmail[1] == "paran.com"){?>selected<?}?>>paran.com</option>
								<option value="yahoo.co.kr" <?if($arrEmail[1] == "yahoo.co.kr"){?>selected<?}?>>yahoo.co.kr</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>주소</th>
						<td>
							<input type="text" class="txt" name="info1" value="<?=$arrInfo["list"][0]['info1']?>" maxlength="100" title="주소를 입력해주세요.">
						</td>
					</tr>
					<tr>
						<th>상세설명</th>
						<td colspan="3">
							<textarea name="info5" title="학력을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info5']?></textarea>
						</td>
					</tr>
					<tr>
						<th>등록일시</th>
						<td><?=$arrInfo["list"][0]['reg_date']?></td>
						<th>최종수정일시</th>
						<td><?=$arrInfo["list"][0]['upt_date']?></td>
					</tr>
						</tbody>
				</table>
			</form>
			<p class="btn_l">
				<a href="/backoffice/module/admin/manager.php" class="btn_box act_list">목록보기</a>
			</p>
			<p class="btn_r">
				<a href="javascript:frmcheck(document.frm_write)" class="btn_box act_save" >저장</a>
				<a href="#" class="btn_box black act_del">삭제</a>
				<a href="#" class="btn_box black act_back">취소</a>
			</p>
		</div>
	</div>
	<form name="frmBBSHidden" method="post" action="manager_evn.php">
		<input type="hidden" name="evnMode" value="delete_SectionManager">
		<input type="hidden" name="idx">
	</form>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>