<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_eng.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("This page requires login.");
	location.href = "/eng/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/header.php";?>

<?$nav_id=3; // 네이게이션 on 활성화 여부의 번호입니다.?>

<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/nav.php";?>
<?
	$dblink = SetConn($_conf_db["main_db"]);

	$userInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"],"Y");
	//DB해제
	SetDisConn($dblink);

	$arrEmail = explode("@",$userInfo["list"][0]["email"]);
	$arrMobile = explode("-",$userInfo["list"][0]["mobile"]);
?>

<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	var preg_id = true;		// 기본적으로 true, 아이디가 조건과 맟을 경우 false
	var preg_pw = true;		// 기본적으로 true, 비밀번호가 조건과 맟을 경우 false
	var preg_pwck = true;	// 기본적으로 true, 비밀번호 체크가 조건과 맟을 경우 false
	var match_pw = true;	// 기본적으로 true, 비밀번호와 비밀번호체크가 일치할 경우 false

	function pw_preg(pw){
		var preg = /^[a-zA-Z0-9]{4,12}$/;
		var result = preg.test(pw);
		if(result){
			preg_pw = false;
		}
	}
	function pwck_preg(pwck){
		var preg = /^[a-zA-Z0-9]{4,12}$/;
		var result = preg.test(pwck);
		if(result){
			preg_pwck = false;
		}
	}
	function matchpw(){
		var pw = document.getElementById("newpw").value;
		var pw_ck = document.getElementById("newpw2").value;
		if(pw == pw_ck){
			match_pw = false;
		}
	}

	function frmchk(frm){
		
		if(frm.passwd.value.length > 0){
			if(frm.passwd.value.length < 1){
				alert("Please enter the Password.");
				frm.passwd.focus;
				return false;
			}
			if(preg_pw){
				alert("It does not match the password conditions.");
				frm.passwd.focus;
				return false;
			}
			if(frm.passwd_conf.value.length < 1){
				alert("Please enter the Password.");
				frm.passwd_conf.focus;
				return false;
			}
			if(preg_pwck){
				alert("It does not match the password conditions.");
				frm.passwd_conf.focus;
				return false;
			}
			if(match_pw){
				alert("Password and Confirm password do not match.");
				frm.passwd.focus;
				return false;
			}
		}
		if(frm.email_1.value.length < 1){
			alert("Please enter the Email.");
			frm.email_1.focus;
			return false;
		}
		if(frm.email_2.value.length < 1){
			alert("Please enter the Email.");
			frm.email_2.focus;
			return false;
		}
		if(frm.mobile_2.value.length < 1){
			alert("Please enter the Cell Phone Number.");
			frm.mobile_2.focus;
			return false;
		}
		if(frm.mobile_3.value.length < 1){
			alert("Please enter the Cell Phone Number.");
			frm.mobile_3.focus;
			return false;
		}
		frm.email_2.disabled = false;
		return true;
	}
</script>

<div class="subContent">
    <!-- subTopInfo -->
    <div class="subTopInfo">
        <!-- h2Wrap -->
        <div class="h2Wrap">
            <h2>My Info</h2>
        </div>
        <!-- //h2Wrap -->
        <!-- lnb -->
        <div class="lnb">
            <span><img src="/pages/default/images/common/home.png" alt="home"></span>
            <span class="last">My Info</span></div>
        <!-- //lnb -->
    </div>
    <!-- //subTopInfo -->
    <!-- contStart -->
    <div class="contStart">
        <form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="/module/member/member_evn.php" onsubmit="frmchk(document.frm_join2)">
			<!-- <input type="hidden" name="step" value="3" />
			<input type="hidden" name="act" value="save" />
			<input type="hidden" name="sns" value="" /> -->
			<input type="hidden" name="evnMode" value="edit" />
            <fieldset>
                <legend class="sr-only">회원가입 양식테이블입니다.</legend>
                <div class="text">
                    <p>Required information</p>
                    <p class="right-text"><span class="red">*</span> 은 필수항목 입니다.</p>
                </div>
                <table class="input_table">
                    <caption>아이디,비밀번호,비밀번호확인,이름,이메일,휴대폰번호 순으로되어있는 회원가입 필수 입력내용들입니다.</caption>
                    <colgroup>
                    </colgroup>
                    <tbody>
                        <tr>
                            <th>
                                <label>ID</label>
                            </th>
                            <td height="39"><?=$userInfo["list"][0]["user_id"]?></td>
                        </tr>
                        <tr>
							<th>
								<label for="newpw">Password</div></label>
							</th>
							<td>
								<input id="newpw" type="password" name="passwd" size="49" value="" maxlength="12" oninput="pw_preg(this.value);matchpw();" placeholder="Within 4 to 12 characters including English/numeric combinations" /> (Enter at change)
							</td>
						</tr>
						<tr>
							<th>
								<label for="newpw2">Password Confirm</div></label>
							</th>
							<td>
								<input id="newpw2" type="password" name="passwd_conf" size="49" value="" maxlength="12" oninput="pwck_preg(this.value);matchpw();" placeholder="Within 4 to 12 characters including English/numeric combinations" />
							</td>
						</tr>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td height="39"><?=$userInfo["list"][0]["user_name"]?></td>
                        </tr>
                        <tr>
							<th>
								<label for="email">Email<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input type="text" class="femail req" name="email_1" id="email_1" value="<?=$arrEmail[0]?>" maxlength="100" title="이메일주소를 입력해주세요." required="">
								&nbsp;@&nbsp;
								<input type="text" class="femail req" name="email_2" id="email_2" value="<?=$arrEmail[1]?>" maxlength="100" title="이메일주소를 입력해주세요." required="">
								&nbsp;
								<select class="femail" id="selectEmail" name="email_select_domain" title="이메일주소를 입력해주세요.">
									<option value="1">- direct input -</option>
									<option value="gmail.com">gmail.com</option>
									<option value="hanmail.net">hanmail.net</option>
									<option value="hotmail.com">hotmail.com</option>
									<option value="nate.com">nate.com</option>
									<option value="naver.com">naver.com</option>
									<option value="paran.com">paran.com</option>
									<option value="yahoo.co.kr">yahoo.co.kr</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label for="askTell">Cell Phone<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<select class="fphone tel" name="mobile_1" title="휴대폰번호를 입력해주세요." required="">
									<option value="010" <?if($arrMobile[0] == "010"){?>selected<?}?>>010</option>
									<option value="011" <?if($arrMobile[0] == "011"){?>selected<?}?>>011</option>
									<option value="016" <?if($arrMobile[0] == "016"){?>selected<?}?>>016</option>
									<option value="017" <?if($arrMobile[0] == "017"){?>selected<?}?>>017</option>
									<option value="018" <?if($arrMobile[0] == "018"){?>selected<?}?>>018</option>
									<option value="019" <?if($arrMobile[0] == "019"){?>selected<?}?>>019</option>
								</select>
								&nbsp;-&nbsp;
								<input type="text" class="fphone tel" name="mobile_2" value="<?=$arrMobile[1]?>" maxlength="4" title="휴대폰번호를 입력해주세요." required="">
								&nbsp;-&nbsp;
								<input type="text" class="fphone tel" name="mobile_3" value="<?=$arrMobile[2]?>" maxlength="4" title="휴대폰번호를 입력해주세요." required="">
							</td>
						</tr>
                    </tbody>
                </table>
            </fieldset>
            <div class="btns_wrap mt30 pt25 text-center borer-none">
                <input class="join_blue_btn join_Btn mr10" type="submit" value="OK">
                <button class="join_black_btn join_Btn" type="button" onclick="location.href='/eng'">Cancel</button>
                <div style="float:right"><button class="join_black_btn join_Btn" type="button" onclick="location.href='/eng/mypage/leave.php'">Withdrawal</button></div>
            </div>
        </form>
    </div>
    <!-- //contStart -->
</div>
<script>
	$('#selectEmail').change(function(){
		$("#selectEmail option:selected").each(function () {
			if($(this).val()== '1'){
				$("#email_2").val('');
				$("#email_2").attr("disabled",false);
			}else{
				$("#email_2").val($(this).text());
				$("#email_2").attr("disabled",true);
			}
		});
	});
</script>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/footer.php";?>
<?}?>