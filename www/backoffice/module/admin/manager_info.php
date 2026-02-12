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

$arrMCList[1] = getManagerCategoryList(1);
$arrMCList[2] = getManagerCategoryList(2);
$arrMCTitle = array("","상담예약","신고의뢰");
//DB해제
SetDisConn($dblink);

$arrG_cat = explode("^",$arrInfo['list'][0]['goods_category']);

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
					<input type="hidden" name="evnMode" value="modify">
				<?}else{?>
					<input type="hidden" name="evnMode" value="write">
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
						<th class="nec" rowspan="9">사진</th>
						<td rowspan="9">
							<div><img src="/uploaded/mngr/<?=$arrInfo["list"][0]['file_name']?>" alt="<?=$arrInfo["list"][0]['mngr_name']?>" style="max-width:270px"></div>
							<div class="in_file">
								<!-- <input type="text" class="txt" name="" value="" style="width:200px" readonly=""> -->
								<input type="file" class="" name="upfiles" value="" title="사진을 등록해주세요.">
							</div>
						</td>
					</tr>
					<tr>
						<th class="nec">성명</th>
						<td><input type="text" class="txt req" style="width:150px;font-weight:bolder;" name="mngr_name" value="<?=$arrInfo["list"][0]['mngr_name']?>" maxlength="10" title="성명을 입력해주세요."></td>
					</tr>
                    <tr>
                        <th>직원 타입</th>
                        <td>
                            <select name="mngr_type">
                                <option value="세무사" <?=$arrInfo["list"][0]['mngr_type']=='세무사'?'selected="selected"':'';?>>세무사</option>
                                <option value="이사" <?=$arrInfo["list"][0]['mngr_type']=='이사'?'selected="selected"':'';?>>이사</option>
                                <option value="실장" <?=$arrInfo["list"][0]['mngr_type']=='실장'?'selected="selected"':'';?>>실장</option>
                                <option value="직원" <?=$arrInfo["list"][0]['mngr_type']=='직원'?'selected="selected"':'';?>>직원</option>
                                <option value="매니저" <?=$arrInfo["list"][0]['mngr_type']=='매니저'?'selected="selected"':'';?>>매니저</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>본부</th>
                        <td>
                            <select name="mngr_headquarters">
                                <option>선택해주세요</option>
                                <option value="1본부" <?=$arrInfo["list"][0]['mngr_headquarters']=='1본부'?'selected="selected"':'';?>>1본부</option>
                                <option value="2본부" <?=$arrInfo["list"][0]['mngr_headquarters']=='2본부'?'selected="selected"':'';?>>2본부</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>팀</th>
                        <td>
                            <select name="mngr_team">
                                <option>선택해주세요</option>
                                <option value="1팀" <?=$arrInfo["list"][0]['mngr_team']=='1팀'?'selected="selected"':'';?>>1팀</option>
                                <option value="2팀" <?=$arrInfo["list"][0]['mngr_team']=='2팀'?'selected="selected"':'';?>>2팀</option>
                                <option value="관리팀" <?=$arrInfo["list"][0]['mngr_team']=='관리팀'?'selected="selected"':'';?>>관리팀</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>성별</th>
                        <td>
                            <select name="gender">
                                <option value="man" <?=$arrInfo["list"][0]['gender']=='man'?'selected="selected"':'';?>>남자</option>
                                <option value="woman" <?=$arrInfo["list"][0]['gender']=='woman'?'selected="selected"':'';?>>여자</option>
                            </select>
                        </td>
                    </tr>
					<tr>
						<th>직책</th>
						<td><input type="text" class="txt" style="width:150px;font-weight:bolder;" name="mngr_position" value="<?=$arrInfo["list"][0]['mngr_position']?>" maxlength="10" title="직책을 입력해주세요."></td>
					</tr>
					<tr>
						<th>연결아이디</th>
						<td><input type="text" class="txt" style="width:150px;font-weight:bolder;" name="user_id" value="<?=$arrInfo["list"][0]['user_id']?>" maxlength="20" title="연결아이디를 입력해주세요."></td>
					</tr>
					<tr>
						<th>상담업무</th>
						<td>
							<?
							for($i=1;$i<3;$i++){
							?>
								<div style="float:left;margin:0 20px 10px 0;">
									<h3><label><input type="checkbox" class="checkall" id="checkall<?=$i?>" value="<?=$i?>" onchange="checkAll(<?=$i?>)"><?=$arrMCTitle[$i]?></label></h3>
									<ul style="margin-left:10px">
							<?
								for($j=0;$j<$arrMCList[$i]["total"];$j++){
							?>
									<li>- <label><input type="checkbox" name="goods_category_idno[<?=$i?>][]" value="<?=$arrMCList[$i]["list"][$j]["idx"]?>"
							<?
									for($k=0;$k<count($arrG_cat);$k++){
										$arrCat = explode(":",$arrG_cat[$k]);
										if($arrMCList[$i]["list"][$j]["idx"] == $arrCat[1]){
											echo "checked";
										}
									}	
							?>
									><?=$arrMCList[$i]["list"][$j]["category_name"]?></label></li>
							<?
								}
							?>
									</ul>
								</div>
							<?
							}
							?>
							
						</td>
					</tr>
					<tr>
                        <th>사진상<br/>
                            얼굴크기 타입</th>
                        <td>
                            <select name="face_size">
                                <option value="s" <?=$arrInfo["list"][0]['face_size']=='s'?'selected="selected"':'';?>>S</option>
                                <option value="m" <?=($arrInfo["list"][0]['face_size']==''||$arrInfo["list"][0]['face_size']=='m')?'selected="selected"':'';?>>M</option>
                                <option value="l" <?=$arrInfo["list"][0]['face_size']=='l'?'selected="selected"':'';?>>L</option>
                                <option value="xl" <?=$arrInfo["list"][0]['face_size']=='xl'?'selected="selected"':'';?>>XL</option>
                            </select>
                        </td>
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
						<th>회사전화</th>
						<td>
							<div class="for-telform" data-name="tel" data-class="select,txt,txt" data-attr="" style="display: none;">
								<?=$arrInfo["list"][0]['tel']?>
							</div>
							<?
								$arrTel = explode("-",$arrInfo["list"][0]['tel']);
							?>
							<select class="fphone select" name="tel[]" title="전화번호를 입력해주세요.">
								<option value="02" <?if($arrTel[0] == "02"){?>selected="selected"<?}?>>02</option>
								<option value="051" <?if($arrTel[0] == "051"){?>selected="selected"<?}?>>051</option>
								<option value="053" <?if($arrTel[0] == "053"){?>selected="selected"<?}?>>053</option>
								<option value="032" <?if($arrTel[0] == "032"){?>selected="selected"<?}?>>032</option>
								<option value="062" <?if($arrTel[0] == "062"){?>selected="selected"<?}?>>062</option>
								<option value="042" <?if($arrTel[0] == "042"){?>selected="selected"<?}?>>042</option>
								<option value="052" <?if($arrTel[0] == "052"){?>selected="selected"<?}?>>052</option>
								<option value="044" <?if($arrTel[0] == "044"){?>selected="selected"<?}?>>044</option>
								<option value="031" <?if($arrTel[0] == "031"){?>selected="selected"<?}?>>031</option>
								<option value="033" <?if($arrTel[0] == "033"){?>selected="selected"<?}?>>033</option>
								<option value="043" <?if($arrTel[0] == "043"){?>selected="selected"<?}?>>043</option>
								<option value="041" <?if($arrTel[0] == "041"){?>selected="selected"<?}?>>041</option>
								<option value="063" <?if($arrTel[0] == "063"){?>selected="selected"<?}?>>063</option>
								<option value="061" <?if($arrTel[0] == "061"){?>selected="selected"<?}?>>061</option>
								<option value="054" <?if($arrTel[0] == "054"){?>selected="selected"<?}?>>054</option>
								<option value="055" <?if($arrTel[0] == "055"){?>selected="selected"<?}?>>055</option>
								<option value="064" <?if($arrTel[0] == "064"){?>selected="selected"<?}?>>064</option>
								<option value="060" <?if($arrTel[0] == "060"){?>selected="selected"<?}?>>060</option>
								<option value="070" <?if($arrTel[0] == "070"){?>selected="selected"<?}?>>070</option>
								<option value="080" <?if($arrTel[0] == "080"){?>selected="selected"<?}?>>080</option>
								<option value="010" <?if($arrTel[0] == "010"){?>selected="selected"<?}?>>010</option>
								<option value="011" <?if($arrTel[0] == "011"){?>selected="selected"<?}?>>011</option>
							</select>
							&nbsp;-&nbsp;
							<input type="text" class="fphone txt" name="tel[]" value="<?=$arrTel[1]?>" maxlength="4" title="전화번호를 입력해주세요.">
							&nbsp;-&nbsp;
							<input type="text" class="fphone txt" name="tel[]" value="<?=$arrTel[2]?>" maxlength="4" title="전화번호를 입력해주세요.">
						</td>
					</tr>
					<tr>
						<th>팩스</th>
						<td>
							<div class="for-faxform" data-name="fax" data-class="select,txt,txt" data-attr="" style="display: none;">
								<?=$arrInfo["list"][0]['fax']?>
							</div>
							<?
								$arrFax = explode("-",$arrInfo["list"][0]['fax']);
							?>
							<select class="ffax select" name="fax[]" title="팩스번호를 입력해주세요.">
								<option value="02" <?if($arrFax[0] == "02"){?>selected="selected"<?}?>>02</option>
								<option value="0507" <?if($arrFax[0] == "0507"){?>selected="selected"<?}?>>0507</option>
								<option value="051" <?if($arrFax[0] == "051"){?>selected="selected"<?}?>>051</option>
								<option value="053" <?if($arrFax[0] == "053"){?>selected="selected"<?}?>>053</option>
								<option value="032" <?if($arrFax[0] == "032"){?>selected="selected"<?}?>>032</option>
								<option value="062" <?if($arrFax[0] == "062"){?>selected="selected"<?}?>>062</option>
								<option value="042" <?if($arrFax[0] == "042"){?>selected="selected"<?}?>>042</option>
								<option value="052" <?if($arrFax[0] == "052"){?>selected="selected"<?}?>>052</option>
								<option value="044" <?if($arrFax[0] == "044"){?>selected="selected"<?}?>>044</option>
								<option value="031" <?if($arrFax[0] == "031"){?>selected="selected"<?}?>>031</option>
								<option value="033" <?if($arrFax[0] == "033"){?>selected="selected"<?}?>>033</option>
								<option value="043" <?if($arrFax[0] == "043"){?>selected="selected"<?}?>>043</option>
								<option value="041" <?if($arrFax[0] == "041"){?>selected="selected"<?}?>>041</option>
								<option value="063" <?if($arrFax[0] == "063"){?>selected="selected"<?}?>>063</option>
								<option value="061" <?if($arrFax[0] == "061"){?>selected="selected"<?}?>>061</option>
								<option value="054" <?if($arrFax[0] == "054"){?>selected="selected"<?}?>>054</option>
								<option value="055" <?if($arrFax[0] == "055"){?>selected="selected"<?}?>>055</option>
								<option value="064" <?if($arrFax[0] == "064"){?>selected="selected"<?}?>>064</option>
								<option value="060" <?if($arrFax[0] == "060"){?>selected="selected"<?}?>>060</option>
								<option value="070" <?if($arrFax[0] == "070"){?>selected="selected"<?}?>>070</option>
								<option value="080" <?if($arrFax[0] == "080"){?>selected="selected"<?}?>>080</option>
							</select>
							&nbsp;-&nbsp;
							<input type="text" class="ffax txt" name="fax[]" value="<?=$arrFax[1]?>" maxlength="4" title="팩스번호를 입력해주세요.">
							&nbsp;-&nbsp;
							<input type="text" class="ffax txt" name="fax[]" value="<?=$arrFax[2]?>" maxlength="4" title="팩스번호를 입력해주세요.">
						</td>
					</tr>
					<tr>
						<th rowspan="4">ZOOM</th>
						<td>
							URL <input type="text" class="txt" name="cs_zoom_url" value="<?=$arrInfo["list"][0]['cs_zoom_url']?>" maxlength="100" placeholder="zoom 회원 URL">
						</td>
					</tr>
					<tr>
						<td>
							ID <input type="text" class="txt" name="cs_zoom_id" value="<?=$arrInfo["list"][0]['cs_zoom_id']?>" maxlength="100" placeholder="zoom 회원 ID">
						</td>
					</tr>
					<tr>
						<td>
							PW <input type="text" class="txt" name="cs_zoom_pw" value="<?=$arrInfo["list"][0]['cs_zoom_pw']?>" maxlength="100" placeholder="zoom 회원 비밀번호">
						</td>
					</tr>
					<tr>
						<td style="padding:8px 10px">
							<label style="display:inline-block; width:50px;">
								<span>On&nbsp;</span>
								<input style="display:inline-block" type="radio" name="cs_zoom_use" value="on" <?if($arrInfo["list"][0]['cs_zoom_pw'] == "on"){?>checked="checked"<?}?>>&nbsp;
							</label>
							<label style="display:inline-block; width:50px;">
								<span>Off&nbsp;</span>
								<input style="display:inline-block" type="radio" name="cs_zoom_use" value="off" <?if($arrInfo["list"][0]['cs_zoom_pw'] != "on"){?>checked="checked"<?}?>>&nbsp;
							</label>
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
						<th>상단문구</th>
						<td>
							<input type="text" class="txt" name="info1" value="<?=$arrInfo["list"][0]['info1']?>" maxlength="100" title="상단문구를 입력해주세요.">
						</td>
					</tr>
					<tr>
						<th>학력</th>
						<td colspan="3">
							<textarea name="info2" title="학력을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info2']?></textarea>
						</td>
					</tr>
					<tr>
						<th>세무기수</th>
						<td colspan="3">
							<textarea name="info3" title="세무기수를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info3']?></textarea>
						</td>
					</tr>
					<tr>
						<th>현재 직위</th>
						<td colspan="3">
							<textarea name="current_position" title="현재 직위를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['current_position']?></textarea>
						</td>
					</tr>
					<tr>
						<th>업무경력</th>
						<td colspan="3">
							<textarea name="info4" title="경력을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info4']?></textarea>
						</td>
					</tr>
					<tr>
						<th>연구논문 및 연구자료</th>
						<td colspan="3">
							<textarea name="info5" title="연구논문 및 연구자료를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info5']?></textarea>
						</td>
					</tr>
					<tr>
						<th>주요 관심사항</th>
						<td colspan="3">
							<textarea name="info6" title="주요 관심사항을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info6']?></textarea>
						</td>
					</tr>
					<tr>
						<th>특기</th>
						<td colspan="3">
							<textarea name="info7" title="특기를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['info7']?></textarea>
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

                <h3>(ENGLISH) 영문명 추가 자료</h3>
                <table class="writeTable eng_table">
                    <colgroup>
                        <col width="120px">
                        <col width="300px">
                        <col width="120px">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="nec">성명</th>
                        <td><input type="text" class="txt req" style="width:150px;font-weight:bolder;" name="eng_mngr_name" value="<?=$arrInfo["list"][0]['eng_mngr_name']?>" maxlength="30" title="성명을 입력해주세요."></td>
                    </tr>
                    <tr>
                        <th>직책</th>
                        <td><input type="text" class="txt" style="width:150px;font-weight:bolder;" name="eng_mngr_position" value="<?=$arrInfo["list"][0]['eng_mngr_position']?>" maxlength="30" title="직책을 입력해주세요."></td>
                    </tr>

                    <tr>
                        <th>상단문구</th>
                        <td>
                            <input type="text" class="txt" name="eng_info1" value="<?=$arrInfo["list"][0]['eng_info1']?>" maxlength="100" title="상단문구를 입력해주세요.">
                        </td>
                    </tr>
                    <tr>
                        <th>학력</th>
                        <td colspan="3">
                            <textarea name="eng_info2" title="학력을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info2']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>세무기수</th>
                        <td colspan="3">
                            <textarea name="eng_info3" title="세무기수를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info3']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>현재 직위</th>
                        <td colspan="3">
                            <textarea name="eng_current_position" title="현재 직위를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_current_position']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>업무경력</th>
                        <td colspan="3">
                            <textarea name="eng_info4" title="경력을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info4']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>연구논문 및 연구자료</th>
                        <td colspan="3">
                            <textarea name="eng_info5" title="연구논문 및 연구자료를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info5']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>주요 관심사항</th>
                        <td colspan="3">
                            <textarea name="eng_info6" title="주요 관심사항을 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info6']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>특기</th>
                        <td colspan="3">
                            <textarea name="eng_info7" title="특기를 입력해주세요." style="height:130px"><?=$arrInfo["list"][0]['eng_info7']?></textarea>
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
		<input type="hidden" name="evnMode" value="deleteManager">
		<input type="hidden" name="idx">
	</form>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>