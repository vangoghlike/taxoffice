{ #header }

		<!-- Container -->
		<div class="container" id="container">


			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">
<style>
.subContent .subTopInfo {
	padding:0;
	border:none;
}
.input {
    position: relative;
    display: inline-block;
    zoom: 1;
    width: 160px;
    height: 62px;
    margin-right: 10px;
    border: 1px solid #ddd;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    vertical-align: top;
    text-align: left;
    background-color: #fff;
}
.input.is-label.is-value {
    z-index: 10;
    padding-top: 19px;
}
.input.is-label.is-value input {
    height: 41px;
}
.input input {
    display: block;
    width: 100%;
    height: 60px;
    padding: 0 15px;
    border: 0;
    color: #333;
    outline: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background-color: transparent;
    font-size: 16px;
}
.input div.label, .input label {
    visibility: visible;
    z-index: 100;
    position: absolute;
    left: 15px;
    top: 18px;
    color: #999;
    font-size: 16px;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}
.input.is-label.is-value .label, .input.is-label.is-value label {
    top: 9px;
    font-size: 11px;
    color: #a8a8a8;
}
.dropdown {
    position: relative;
    display: inline-block;
    zoom: 1;
    width: 160px;
    height: 62px;
    margin-right: 10px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    vertical-align: top;
    text-align: left;
}
.dropdown.is-label div.label {
    position: absolute;
    left: 15px;
    top: 9px;
    color: #a8a8a8;
    font-size: 11px;
}
.dropdown.focus .buttonChoose, .dropdown.expanded .buttonChoose {
    border: 1px solid #3399ff;
}
.dropdown .buttonChoose {
    display: block;
    width: 100%;
    height: 100%;
    border: 1px solid #ddd;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background:#fff;
}

.dropdown div.list ul {
    overflow: hidden;
    position: relative;
    padding: 12px 0 13px;
}
.dropdown.is-label.selected .buttonChoose span {
    padding-top: 26px;
}
.dropdown .buttonChoose:after {
    content: '';
    display: block;
    position: absolute;
    right: 10px;
    top: 27px;
    width: 11px;
    height: 6px;
    background: url(https://i.jobkorea.kr/content/images/text_user/resume/write/sprite-icon.png) no-repeat 0 -307px;
}
button {
    overflow: visible;
    background: transparent;
    cursor: pointer;
    border:none;
}
.resume-title {
	border:1px solid #dbe0e9;
    margin-bottom: 20px;
}
.resume-title input {
	display: block;
    width: 100%;
    height: 64px;
    padding: 0 28px;
    border: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    color: #333;
    letter-spacing: -2px;
    font-size: 1.84rem;
}
.formWrap h2.header {
    margin-bottom: 14px;
    color: #333;
    font-weight: bold;
    font-size: 20px;
}
.form {
    position: relative;
    width: 100%;
    margin-bottom: 34px;
    padding: 20px 20px 10px;
    background-color: #fff;
    border: 1px solid #dbe0e9;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.form .row {
    position: relative;
    margin-bottom: 10px;
    font-size: 0;
}
.formProfile .dropdown-profile-sex {
    width: 115px;
}
.formProfile .input-profile-email {
    width: 276px;
}
.formProfile .input-profile-addr {
    width: 401px;
}
.formProfile .picture {
    z-index: 200;
    overflow: hidden;
    position: absolute;
    right: 20px;
    top: 20px;
    width: 103px;
    height: 129px;
    background: url(https://i.jobkorea.kr/content/images/text_user/resume/write/bg-picture.png) no-repeat;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.formProfile .picture img {
	width: 100%;
    height: 100%;
}
.formProfile .picture .buttonDelete:before {
    content: '';
    display: block;
    width: 35px;
    height: 35px;
    background: url(https://i.jobkorea.kr/content/images/text_user/resume/write/sprite-icon-x.png) no-repeat 0 -270px;
}
.formProfile .picture .buttonChangePicture {
    z-index: 100;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 25px;
    text-align: center;
    background: url(https://i.jobkorea.kr/content/images/text_user/resume/write/bg-picture-text.png);
    color: #fff;
    font-size: 12px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.formProfile .picture .buttonChangePicture span {
    text-align: center;
    padding-top: 3px;
}
.fixedMenu { overflow: hidden; position: absolute; right: 0; top: 0; width: 240px; -webkit-box-sizing: border-box; box-sizing: border-box; text-align: left; }
.fixedMenu.fixed { position: fixed; right: 50%; top: 50px; margin-right: -600px; }
.fixedMenu .container { overflow: hidden; padding: 0 14px; margin-bottom: 10px; border: 1px solid #eee; -webkit-box-sizing: border-box; box-sizing: border-box; background-color: #fff; }
.fixedMenu h2.header { height: 48px; padding-top: 16px; font-size: 14px; color: #999; text-align: left; -webkit-box-sizing: border-box; box-sizing: border-box; }
.fixedMenu .list { overflow: hidden; position: relative; padding: 15px 0 20px; border-top: 1px solid #eee; }
.fixedMenu .list li { position: relative; height: 25px; margin-top: 15px; }
.fixedMenu .list li:first-child { margin-top: 0; }
.fixedMenu .list .button { position: relative; overflow: hidden; display: block; width: 100%; height: 25px; padding-left: 34px; -webkit-box-sizing: border-box; box-sizing: border-box; }
.fixedMenu .list .button:before { content: ''; display: block; position: absolute; left: 1px; top: 0; background-image: url("https://i.jobkorea.kr//content/images/text_user/resume/write/sprite-menu.png"); background-repeat: no-repeat; }
.fixedMenu .list .button:after { content: ''; display: block; position: absolute; right: 0; top: 0; width: 25px; height: 25px; background: url("https://i.jobkorea.kr//content/images/text_user/resume/write/sprite-menu.png") no-repeat -35px -36px; }
.fixedMenu .list .button span { padding-top: 2px; color: #666; font-size: 14px; }
.fixedMenu .list .button.selected span { color: #3399ff; }
.fixedMenu .list .button.selected:after { background-position: -35px 0; }
.fixedMenu .list .button.buttonEducation:before { top: 3px; width: 22px; height: 17px; background-position: 0 -91px; }
.fixedMenu .list .button.buttonEducation.selected:before { background-position: 0 -403px; }
.fixedMenu .list .button.buttonCareer:before { top: 3px; width: 22px; height: 18px; background-position: 0 -146px; }
.fixedMenu .list .button.buttonCareer.selected:before { background-position: 0 -458px; }
.fixedMenu .list .button.buttonIntern:before { top: 3px; width: 22px; height: 18px; background-position: 0 -174px; }
.fixedMenu .list .button.buttonIntern.selected:before { background-position: 0 -486px; }
.fixedMenu .list .button.buttonLearn:before { top: 3px; width: 22px; height: 18px; background-position: 0 -118px; }
.fixedMenu .list .button.buttonLearn.selected:before { background-position: 0 -430px; }
.fixedMenu .list .button.buttonCertificate:before { left: 3px; top: 2px; width: 20px; height: 20px; background-position: 0 -754px; }
.fixedMenu .list .button.buttonCertificate.selected:before { background-position: -30px -754px; }
.fixedMenu .list .button.buttonAward:before { left: 3px; top: 2px; width: 21px; height: 20px; background-position: 0 -784px; }
.fixedMenu .list .button.buttonAward.selected:before { background-position: -30px -784px; }
.fixedMenu .list .button.buttonOExperience:before { top: 2px; width: 24px; height: 22px; background-position: 0 -318px; }
.fixedMenu .list .button.buttonOExperience.selected:before { background-position: 0 -630px; }
.fixedMenu .list .button.buttonLanguage:before { left: 3px; top: 3px; width: 18px; height: 18px; background-position: 0 -202px; }
.fixedMenu .list .button.buttonLanguage.selected:before { background-position: 0 -514px; }
.fixedMenu .list .button.buttonPortfolio:before { left: 4px; top: 2px; width: 16px; height: 19px; background-position: 0 -259px; }
.fixedMenu .list .button.buttonPortfolio.selected:before { background-position: 0 -571px; }
.fixedMenu .list .button.buttonJobPreference:before { width: 22px; height: 22px; background-position: 0 -350px; }
.fixedMenu .list .button.buttonJobPreference.selected:before { background-position: 0 -662px; }
.fixedMenu .list .button.buttonIntroduction:before { left: 2px; top: 3px; width: 22px; height: 19px; background-position: 0 -230px; }
.fixedMenu .list .button.buttonIntroduction.selected:before { background-position: 0 -542px; }
.fixedMenu .list .button.buttonIntroductionVod:before { left: 2px; top: 7px; width: 22px; height: 11px; background-position: 0 -70px; }
.fixedMenu .list .button.buttonIntroductionVod.selected:before { background-position: 0 -382px; }
.fixedMenu .buttons { overflow: hidden; height: 51px; border: 1px solid #eee; border-bottom: 0; -webkit-box-sizing: border-box; box-sizing: border-box; background-color: #fff; font-size: 0; }
.fixedMenu .buttons .button { display: inline-block; zoom: 1; *display: inline; width: 50%; height: 50px; -webkit-box-sizing: border-box; box-sizing: border-box; border-left: 1px solid #eee; text-align: center; }
.fixedMenu .buttons .button span { padding-top: 14px; color: #333; text-align: center; font-size: 15px; }
.fixedMenu .buttons .button:first-child { border-left: 0; }
.fixedMenu .buttons .buttonPreview:only-child { width: 100%; }
.fixedMenu .buttonSaveTemporary.mode-modify { display: block; width: 100%; height: 52px; margin-bottom: 5px; background-color: #fff; border: 1px solid #39f; -webkit-box-sizing: border-box; box-sizing: border-box;}
.fixedMenu .buttonSaveTemporary.mode-modify span { padding-top: 14px; text-align: center; color: #39f; font-size: 16px; }
.fixedMenu .buttonComplete { display: block; width: 100%; height: 52px; background-color: #3399ff; }
.fixedMenu .buttonComplete span { padding-top: 14px; text-align: center; color: #fff; font-size: 16px; font-weight: bold; }
.fixedMenu .notifacation { display: none; overflow: hidden; position: relative; width: 100%; height: 50px; margin-top: 20px; padding-top: 14px; color: #666; text-align: center; font-size: 14px; background: url("https://i.jobkorea.kr//content/images/text_user/resume/write/sprite-menu.png") no-repeat 0 -694px; -webkit-box-sizing: border-box; box-sizing: border-box; }
</style>

{ #dep3 }
				<!-- title -->
				<div class="bbs resume-bbs resume resume-title">
					<input maxlength="100" name="" placeholder="기업에게 나에 대해 알려줍시다. 강점, 목표, 경력 등등" type="text" value="">
				</div>
				
				<!-- user info 1 -->
				<div class="formWrap formWrapProfile">
				    <h2 class="header">인적사항</h2>
				    <div class="form formProfile">
				        <div class="row">
				                <div class="input is-label input-profile-name is-value">
				                    <label for="UserInfo_M_Name">이름</label>
				                    <input type="text" name="UserInfo.M_Name" id="UserInfo_M_Name" value="" data-format-type="name" placeholder="홍길동">
				                    <div class="validation hidden" aria-hidden="true"></div>
				                </div>
				                <div class="input is-label input-profile-birth is-value">
				                    <label for="UserInfo_M_Born">생년월일</label>
				                    <input data-format-type="birth" data-max-date="2003.07.10" data-val="true" data-val-date="M_Born 필드는 날짜여야 합니다." id="UserInfo_M_Born" name="UserInfo.M_Born" placeholder="1988.03.01" type="text" value="">
				                    <div class="validation hidden" aria-hidden="true"></div>
				                </div>
				        <div class="dropdown dropdown-profile-sex is-label selected">
				        <div class="label " aria-hidden="true">성별</div>
				        <button type="button" class="button buttonChoose" aria-haspopup="true">
				                <span>남자</span>
				        </button>
				        <div class="list hidden" aria-hidden="true">
				            <ul>
				                <li><button type="button" class="button" data-value="False"><span>남자</span></button></li>
				                <li><button type="button" class="button" data-value="True"><span>여자</span></button></li>
				            </ul>
				        </div>
				        <div class="validation hidden" aria-hidden="true">성별을 입력해주세요</div>
				        <input id="UserInfo_M_Gender" name="UserInfo.M_Gender" type="hidden" value="False">
				    </div>
				            <div class="input input-profile-email is-label is-value">
				                <label for="UserInfo_M_Email">이메일</label>
				                <input type="email" name="UserInfo.M_Email" id="UserInfo_M_Email" data-format-type="email" value="" autocomplete="off" spellcheck="false">
				                <div class="autocomplete hidden" aria-hidden="true">
				                    <div class="list"><ul></ul></div>
				                </div>
				                <div class="validation hidden" aria-hidden="true"></div>
				                <div class="backdrop">
				                    <div class="highlights"></div>
				                </div>
				            </div>
				        </div>
				        <div class="row">
				            <div class="input is-label input-profile-tel is-value">
				                <label for="UserInfo_M_Home_Phone">전화번호</label>
				                <input type="text" name="UserInfo.M_Home_Phone" id="UserInfo_M_Home_Phone" placeholder="02-1234-1234" maxlength="30" autocomplete="off" data-format-type="tel">
				                <div class="validation hidden" aria-hidden="true"></div>
				            </div>
				            <div class="input is-label input-profile-hp is-value">
				                <label for="UserInfo_M_Hand_Phone">휴대폰번호</label>
				                <input type="text" name="UserInfo.M_Hand_Phone" id="UserInfo_M_Hand_Phone" placeholder="010-1234-1234" value="" maxlength="30" autocomplete="off" data-format-type="hp">
				                <div class="validation hidden" aria-hidden="true"></div>
				            </div>
				            <input id="UserInfo_M_Zipcode" name="UserInfo.M_Zipcode" type="hidden" value="">
				            <input id="UserInfo_M_AddAddr" name="UserInfo.M_AddAddr" type="hidden" value="">
				            <input id="UserInfo_M_AddrType" name="UserInfo.M_AddrType" type="hidden" value="">
				            <a href="javascript:post_check();" class="input is-label input-profile-addr is-value">
				                <label for="temp_M_Addr_Text">주소</label>
				                <input type="text" id="temp_M_Addr_Text" readonly="" value=" ">
				                <input id="UserInfo_M_Addr_Text" name="UserInfo.M_Addr_Text" type="hidden" value="">
				                <input id="UserInfo_M_Addr_Text1" name="UserInfo.M_Addr_Text1" type="hidden" value="">&gt;
				                <i class="icon icon-search" aria-hidden="true"></i>
				            </a>
				        </div>
				        
				        
				        <div class="picture dropped" style="">
				            
				                <div class="guide" style="display: none;">사진추가</div>
				                <a href="javascript:;" class="buttonAddFile" style="display: none;">
				                    사진등록
				                </a>
				                <div class="image" aria-hidden="true">
				                    <img src="https://fileco.jobkorea.co.kr/User_Photo/M_Photo_View.asp?FN=2017\10\18\JK_GG_FB_22540387.jpg&amp;_=1531207676663">
				                </div>
				                <button type="button" class="button buttonChangePicture" aria-hidden="false"><span>사진변경</span></button>
				                <button type="button" class="button buttonDelete" aria-hidden="false">삭제</button>
				
				        </div>
				    </div>
				</div>
				
				
				<div class="fixedMenu" id="FixedMenuView">
				    <div class="container">
				        <h2 class="header">이력서 항목</h2>
				        <ul class="list fixedMenuButtons">
				            <li><button type="button" class="button buttonEducation selected" data-linked_form_id="formEducation" data-sync_id="InputStat_SchoolInputStat"><span>학력</span></button></li>
				            <li><button type="button" class="button buttonCareer selected" data-linked_form_id="formCareer" data-sync_id="InputStat_CareerInputStat"><span>경력</span></button></li>
				            <li><button type="button" class="button buttonIntern" data-linked_form_id="formIntern" data-sync_id="InputStat_SocialInputStat"><span>인턴·대외활동</span></button></li>
				            <li><button type="button" class="button buttonLearn selected" data-linked_form_id="formLearn" data-sync_id="InputStat_EduInputStat"><span>교육</span></button></li>
				            <li><button type="button" class="button buttonCertificate" data-linked_form_id="formLicense" data-sync_id="InputStat_LicenseInputStat"><span>자격증</span></button></li>
				            <li><button type="button" class="button buttonAward" data-linked_form_id="formAward" data-sync_id="InputStat_AwardInputStat"><span>수상</span></button></li>
				            <li><button type="button" class="button buttonOExperience" data-linked_form_id="formOExperience" data-sync_id="InputStat_TrainingInputStat"><span>해외경험</span></button></li>
				            <li><button type="button" class="button buttonLanguage" data-linked_form_id="formLanguage" data-sync_id="InputStat_LanguageInputStat"><span>어학</span></button></li>
				            <li><button type="button" class="button buttonPortfolio selected" data-linked_form_id="formPortfolio" data-sync_id="InputStat_PortfolioInputStat"><span>포트폴리오</span></button></li>
				            <li><button type="button" class="button buttonJobPreference" data-linked_form_id="formJobPreference" data-sync_id="InputStat_UserAdditionInputStat"><span>취업우대</span></button></li>
				            <li><button type="button" class="button buttonIntroduction selected" data-linked_form_id="formIntroduction" data-sync_id="InputStat_UserIntroduceInputStat"><span>자기소개서</span></button></li>
				        </ul>
				        <input data-val="true" data-val-required="SchoolInputStat 필드가 필요합니다." id="InputStat_SchoolInputStat" name="InputStat.SchoolInputStat" type="hidden" value="True">
				        <input data-val="true" data-val-required="CareerInputStat 필드가 필요합니다." id="InputStat_CareerInputStat" name="InputStat.CareerInputStat" type="hidden" value="True">
				        <input data-val="true" data-val-required="SocialInputStat 필드가 필요합니다." id="InputStat_SocialInputStat" name="InputStat.SocialInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="EduInputStat 필드가 필요합니다." id="InputStat_EduInputStat" name="InputStat.EduInputStat" type="hidden" value="True">
				        <input data-val="true" data-val-required="AwardInputStat 필드가 필요합니다." id="InputStat_AwardInputStat" name="InputStat.AwardInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="LicenseInputStat 필드가 필요합니다." id="InputStat_LicenseInputStat" name="InputStat.LicenseInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="TrainingInputStat 필드가 필요합니다." id="InputStat_TrainingInputStat" name="InputStat.TrainingInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="LanguageInputStat 필드가 필요합니다." id="InputStat_LanguageInputStat" name="InputStat.LanguageInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="PortfolioInputStat 필드가 필요합니다." id="InputStat_PortfolioInputStat" name="InputStat.PortfolioInputStat" type="hidden" value="True">
				        <input data-val="true" data-val-required="UserAdditionInputStat 필드가 필요합니다." id="InputStat_UserAdditionInputStat" name="InputStat.UserAdditionInputStat" type="hidden" value="False">
				        <input data-val="true" data-val-required="UserIntroduceInputStat 필드가 필요합니다." id="InputStat_UserIntroduceInputStat" name="InputStat.UserIntroduceInputStat" type="hidden" value="True">
				    </div>
				
				        <div class="buttons">
				            <button type="button" class="button buttonPreview"><span>미리보기</span></button>
				            <button type="button" class="button buttonSaveTemporary"><span>임시저장</span></button>
				        </div>
				
				    <button type="button" class="button buttonComplete"><span>작성완료</span></button>
				    <div class="notifacation" style="display: none;">저장 되었습니다.</div>
				</div>
				
                </div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
