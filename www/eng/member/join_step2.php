<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_eng.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/header.php";?>
<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<!-- sub_title end -->

<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	var duple_id = true;	// 기본적으로 true, 아이디가없을 경우 false
	var preg_id = true;		// 기본적으로 true, 아이디가 조건과 맟을 경우 false
	var preg_pw = true;		// 기본적으로 true, 비밀번호가 조건과 맟을 경우 false
	var preg_pwck = true;	// 기본적으로 true, 비밀번호 체크가 조건과 맟을 경우 false
	var match_pw = true;	// 기본적으로 true, 비밀번호와 비밀번호체크가 일치할 경우 false
	function dupleId(obj){	
		if(!preg_id){
			var user_id = obj.value;
			$.post( "/module/member/member_eng_evn.php", {evnMode:"duple",user_id:user_id}, function(result) {
				if(result == "true"){
					duple_id = false;
					alert("It's a usable ID.");
				}else{
					alert("This ID is already in use.");
				}
			});
		}else{
			alert("Please check the conditions.");
		}
	}
	function id_preg(id){
		var preg = /^[a-zA-Z0-9]{6,16}$/;
		var result = preg.test(id);
		if(result){
			preg_id = false;
		}
	}
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
		if(frm.user_id.value.length < 1){
			alert("아이디를 입력해 주세요.");
			frm.user_id.focus;
			return false;
		}
		if(preg_id){
			alert("아이디 중복확인을 해주세요.");
			frm.user_id.focus;
			return false;
		}
		if(frm.passwd.value.length < 1){
			alert("비밀번호를 입력해 주세요.");
			frm.passwd.focus;
			return false;
		}
		if(preg_pw){
			alert("비밀번호 조건과 맞지 않습니다.");
			frm.passwd.focus;
			return false;
		}
		if(frm.passwd_conf.value.length < 1){
			alert("비밀번호를 입력해 주세요.");
			frm.passwd_conf.focus;
			return false;
		}
		if(preg_pwck){
			alert("비밀번호 조건과 맞지 않습니다.");
			frm.passwd_conf.focus;
			return false;
		}
		if(match_pw){
			alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
			frm.passwd.focus;
			return false;
		}
		if(frm.user_name.value.length < 1){
			alert("이름를 입력해 주세요.");
			frm.user_name.focus;
			return false;
		}
		if(frm.email_1.value.length < 1){
			alert("이메일을 입력해 주세요.");
			frm.email_1.focus;
			return false;
		}
		if(frm.email_2.value.length < 1){
			alert("이메일을 입력해 주세요.");
			frm.email_2.focus;
			return false;
		}
		if(frm.mobile_2.value.length < 1){
			alert("전화번호를 입력해 주세요.");
			frm.mobile_2.focus;
			return false;
		}
		if(frm.mobile_3.value.length < 1){
			alert("전화번호를 입력해 주세요.");
			frm.mobile_3.focus;
			return false;
		}
		frm.email_2.disabled = false;
		return true;
	}
</script>
<!-- subContent -->
<div class="subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>Join</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">Join</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<ol class="joinsubNav">
		<li><img src="/pages/default/images/sub/joinsubNav01.jpg" alt="Accept terms"><img class="on_img" src="/pages/default/images/sub/joinsubNav01_on.jpg" alt="Accept terms">Accept terms</li>
		<li class="on"><img src="/pages/default/images/sub/joinsubNav03.jpg" alt="Member Info"><img class="on_img" src="/pages/default/images/sub/joinsubNav03_on.jpg" alt="Member Info">Member Info</li>
		<li><img src="/pages/default/images/sub/joinsubNav04.jpg" alt="Signed up"><img class="on_img" src="/pages/default/images/sub/joinsubNav04_on.jpg" alt="Signed up">Signed up</li>
	</ol>
	<!-- contStart -->
	<div class="contStart">
		<form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="/module/member/member_eng_evn.php" onsubmit="frmchk(document.frm_join2)">
			<input type="hidden" name="evnMode" value="join" />
			
			<fieldset>
				<legend class="sr-only">회원가입 양식테이블입니다.</legend>
				<div class="text">
					<p>회원정보 필수 입력 사항</p>
					<p class="right-text"><span class="red">*</span> Required.</p>
				</div>
				<table class="input_table">
					<caption>아이디,비밀번호,비밀번호확인,이름,이메일,휴대폰번호 순으로되어있는 회원가입 필수 입력내용들입니다.</caption>
					<colgroup>
					</colgroup>
					<tbody>
						<tr>
							<th>
								<label for="newid">ID<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input id="newid" type="text" name="user_id" size="49" class="req" value="" oninput="duple_id=false;id_preg(this.value);" maxlength="16" placeholder="Please enter your ID (English / number combination 6 ~ 16 characters)" data-pattern="id" data-minlen="6" required="required" />
								<button type="button" class="check_id act_id_check" onclick="dupleId(document.getElementById('newid'))">ID duplication</button>
							</td>
						</tr>
						<tr>
							<th>
								<label for="newpw">password<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input id="newpw" type="password" name="passwd" size="49" value="" maxlength="12" oninput="pw_preg(this.value);matchpw();" placeholder="Please enter your password (English / number combination 4 ~ 12 characters)" data-pattern="wordnum" data-minlen="4" class="req" required="required" /></td>
						</tr>
						<tr>
							<th>
								<label for="newpw2">password confirm<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input id="newpw2" type="password" name="passwd_conf" size="49" value="" maxlength="12" oninput="pwck_preg(this.value);matchpw();" placeholder="Please enter your password (English / number combination 4 ~ 12 characters)" class="req" required="required" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="name">Name<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input id="name" type="text" name="user_name" maxlength="10" size="18" class="req" value="" title="이름을 입력해주세요." required="required" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="email">Email<div class="red">*<span class="sr-only"></span></div></label>
							</th>
							<td>
								<input type="text" class="femail req" name="email_1" id="email_1" value="" maxlength="100" title="이메일주소를 입력해주세요." required="">
								&nbsp;@&nbsp;
								<input type="text" class="femail req" name="email_2" id="email_2" value="" maxlength="100" title="이메일주소를 입력해주세요." required="">
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
									<option value="010">010</option>
									<option value="011">011</option>
									<option value="016">016</option>
									<option value="017">017</option>
									<option value="018">018</option>
									<option value="019">019</option>
								</select>
								&nbsp;-&nbsp;
								<input type="text" class="fphone tel" name="mobile_2" value="" maxlength="4" title="휴대폰번호를 입력해주세요." required="">
								&nbsp;-&nbsp;
								<input type="text" class="fphone tel" name="mobile_3" value="" maxlength="4" title="휴대폰번호를 입력해주세요." required="">
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<div class="btns_wrap mt30 pt25 text-center borer-none">
				<input class="join_blue_btn join_Btn mr10" type="submit" value="OK">
				<button class="join_black_btn join_Btn" type="button" onclick="location.href='/'">Cancel</button>
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
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/eng/pub/include/footer.php";?>