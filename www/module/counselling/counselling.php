
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

		<!-- subContent -->
        <div class="subContainer subContent">
            <?php $this->print_("breadcrumbs",$TPL_SCP,1);?>
            <!-- //subTopInfo -->
            <!-- contStart -->
            <div class="contStart taxconsulting">
                <?php $this->print_("dep3",$TPL_SCP,1);?>
                <?php echo $TPL_VAR["CONTENTS"]['head_contents']?>
            </div>
            <?php if($TPL_VAR["STEP"]<'5'){?>
            <?php }?>
            <?php if($TPL_VAR["STEP"]=='1'){?>
            <div class="telTit pt30">
                <div class="tit01">신고의뢰 신청하기</div>
                <div class="tit02">신고의뢰 상담을 원하는 세무사를 선택하여 주세요.</div>
            </div>
            <div style="line-height:1.6; padding:2.0rem 3.0rem 2.0rem; background:#eaeaea; border-radius:1.0rem; margin:2.0rem auto;">
                <div style="text-align: center;">
                    <a class="host_conts_onoff_btn">
                        화상상담진행 <small>Open</small>
                    </a>
                    <p>(호스트 Process 메뉴얼)</p>
                </div>
                <div class="host_contents off">
                    <p><strong>(화상상담 전 세림홈페이지의 관리자로 로그인)</strong></p><br>
                    <p class="host_conts_sbj">
                        1. 호스트(방장) '로그인' 및 '상담 수락' 절차
                    </p>
                    <p class="host_conts_cont">
                        1) '화상상담' 버튼 클릭<br>
                        2) Zoom Meet 알림창에서 '열기' 클릭<br>
                        3) Zoom 프로그램에서 '로그인' 버튼 클릭<br>
                        4) Google로 로그인 선택<br>
                        5) 구글 로그인 웹페이지에서 '다른계정으로 로그인' 선택<br>
                        6) 세림세무법인 계정으로 로그인<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;(아이디 & 비밀번호 입력)<br>
                        7) 'Zoom 미팅' 클릭하여 화상채팅 방 생성<br>
                        8) 클라이언트가 '입장' 요청시 확인하고 '수락' 버튼으로 연결<br>
                    </p>
                    <div style="padding-top:0.5rem;">
                        호스트 계정은 관리자에 문의해주세요. <a href="mailto:jinwoodak@taxemail.co.kr">jinwoodak@taxemail.co.kr</a><br>
                        <?php if($TPL_VAR["USERINFO"]['user_id']=='admin'){?>
                        <small>* 세림 ID : selimtax22@gmail.com<br>
                            * pw : selimtax22!</small>
                        <?php }?>
                    </div>
                </div>
            </div>
            <form id="frm_tax1" name="frm_tax1" method="post">
                <input type="hidden" name="step" value="2" />
                <input type="hidden" name="etc01" value="<?php echo $TPL_VAR["REQ"]["etc01"]?>" />
                <input type="hidden" name="mngr_idno" value="<?php echo $TPL_VAR["REQ"]["mngr_idno"]?>" />
                <input type="hidden" name="mngr_tel" value="<?php echo $TPL_VAR["REQ"]["mngr_tel"]?>" />
                <input type="hidden" name="mngr_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                <input type="hidden" name="mngr_file_name" value="<?php echo $TPL_VAR["REQ"]["mngr_file_name"]?>" />
                <input type="hidden" name="mngr_mail" value="<?php echo $TPL_VAR["REQ"]["mngr_mail"]?>" />
                <input type="hidden" name="mngr_fax" value="<?php echo $TPL_VAR["REQ"]["mngr_fax"]?>" />
                <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                <input type="hidden" name="category_name" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                <input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
                <div class="teslList2 consulting">
                    <ul class="consulting_list">
                        <?php if($TPL_MNGR_1){foreach($TPL_VAR["MNGR"] as $TPL_V1){?>
                        <li class="consulting_1li">
                            <div class="topInfo">
                                <div class="selView">
                                    <div class="img">
                                        <img src="<?php echo $TPL_VAR["MNGR_PHOTO_URL"]?><?php echo $TPL_V1["file_name"]?>" alt="<?php echo $TPL_V1["mngr_name"]?>">
                                    </div>
                                    <div class="txt">
                                        <div class="tit01"><?php echo $TPL_V1["mngr_name"]?></div>
                                        <div class="tit02">“<?php echo $TPL_V1["info1"]?>”</div>
                                    </div>
                                    <!--<div class="viewBtn open">
<img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
                                </div>
                                <div class="btn">
                                    <input type="hidden" class="mngr_tel" value="<?php echo $TPL_V1["tel"]?>" data-name="<?php echo $TPL_V1["tel"]?>" />
                                    <input type="hidden" class="mngr_phone" value="<?php echo $TPL_V1["phone"]?>" data-name="<?php echo $TPL_V1["phone"]?>" />
                                    <input type="hidden" class="mngr_mail" value="<?php echo $TPL_V1["email"]?>" data-name="<?php echo $TPL_V1["email"]?>" />
                                    <input type="hidden" class="mngr_fax" value="<?php echo $TPL_V1["fax"]?>" data-name="<?php echo $TPL_V1["fax"]?>" />
                                </div>
                            </div>
                            <div class="itemInfo mb_ver">
                                <input type="hidden" class="mngr_category_txt" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                                <input type="hidden" class="mngr_idno" value="<?php echo $TPL_V1["idno"]?>" />
                                <?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?>
                                <p class="alarm_txt tac pb10">
                                    상담은 평일에 가능합니다
                                </p>
                                <?php }?>
                                <div class="consulting_btn">
                                    <ul>
                                        <li>
                                            <div class="txt">
                                                <a class="<?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?><?php }else{?>counselGo <?php }?>consultingBtn" href="<?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?>javascript:alert('평일에 이용가능합니다');<?php }else{?>#goTalkPop<?php }?>">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <tag><b>상담예약</b></tag>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="txt">
                                                <a class="counselGoFiling consultingBtn act_submit">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <tag><b>신고의뢰</b></tag>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="txt">
                                                <?php if($TPL_V1["cs_zoom_use"]=='on'&&$TPL_V1["cs_zoom_use"]!=''){?>
                                                <a class="counselGoZoom consultingBtn" href="<?php echo $TPL_V1["cs_zoom_url"]?>" target="_blank">
                                                    <img style="max-width:1.5rem;" src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/ico/zoom_icon.png" />
                                                    <tag><b>화상상담</b></tag>
                                                </a>
                                                <?php }else{?>
                                                <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
                                                    <img style="max-width:1.5rem;" src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/ico/zoom_icon.png" />
                                                    <tag><b>화상상담</b></tag>
                                                </a>
                                                <?php }?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <p class="tac mt10">
                                </p>
                            </div>
                            <?php if($TPL_V1["cs_zoom_use"]=='on'&&$TPL_V1["cs_zoom_use"]!=''){?>
                            <div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                                <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                                ZOOM ID : <?php echo $TPL_V1["cs_zoom_id"]?><br>
                                연결 비밀번호 : <?php echo $TPL_V1["cs_zoom_pw"]?>
                            </div>
                            <?php }else{?>
                            <div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                                <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                                ZOOM ID : 510 002 5847<br>
                                연결 비밀번호 : selim
                            </div>
                            <?php }?>
                            <div class="viewInfo">
                                <div class="in">
                                    <ul>
                                        <?php if($TPL_V1["email"]!=''){?>
                                        <li>
                                            <div class="tit no4">이메일</div>
                                            <div class="text">
                                                <span style="text-decoration: underline; text-decoration-color: #0269bf;">
                                                    <a href="mailto:<?php echo $TPL_V1["email"]?>" style="color: #0269bf"><?php echo $TPL_V1["email"]?></a>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <?php if($TPL_V1["tel"]!=''){?>
                                        <li>
                                            <div class="tit no1">전화번호</div>
                                            <div class="text">
                                                <span style="text-decoration: underline; text-decoration-color: #0269bf;">
                                                    <a href="tel:<?php echo $TPL_V1["tel"]?>"><?php echo $TPL_V1["tel"]?></a>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <?php if($TPL_V1["fax"]!=''){?>
                                        <li>
                                            <div class="tit no5">FAX</div>
                                            <div class="text">
                                                <?php echo $TPL_V1["fax"]?>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <?php if($TPL_V1["info4"]!=''){?>
                                        <li>
                                            <div class="tit no3">경력</div>
                                            <div class="text">
                                                <ul>
                                                    <?php if(is_array($TPL_R2=$TPL_V1["info4_arr"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
                                                    <li>- <?php echo $TPL_V2?></li>
                                                    <?php }}?>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <?php if($TPL_V1["info5"]!=''||$TPL_V1["info6"]!=''||$TPL_V1["info7"]!=''){?>
                                        <li>
                                            <div class="tit no3 last">연구 &<br>관심분야</div>
                                            <div class="text">
                                                <ul>
                                                    <?php if($TPL_V1["info5"]!=''){?>
                                                    <?php if(is_array($TPL_R2=$TPL_V1["info5_arr"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
                                                    <li>- <?php echo $TPL_V2?></li>
                                                    <?php }}?>
                                                    <?php }?>
                                                    <?php if($TPL_V1["info6"]!=''){?>
                                                    <?php if(is_array($TPL_R2=$TPL_V1["info6_arr"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
                                                    <li>- <?php echo $TPL_V2?></li>
                                                    <?php }}?>
                                                    <?php }?>
                                                    <?php if($TPL_V1["info7"]!=''){?>
                                                    <?php if(is_array($TPL_R2=$TPL_V1["info7_arr"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
                                                    <li>- <?php echo $TPL_V2?></li>
                                                    <?php }}?>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                            <div class="itemInfo pc_ver">
                                <input type="hidden" class="mngr_category_txt" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                                <input type="hidden" class="mngr_idno" value="<?php echo $TPL_V1["idno"]?>" />
                                <?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?>
                                <p class="alarm_txt tac pb10">
                                    상담은 평일에 가능합니다
                                </p>
                                <?php }?>
                                <div class="consulting_btn">
                                    <ul>
                                        <li>
                                            <div class="txt">
                                                <a class="<?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?><?php }else{?>counselGo <?php }?>consultingBtn" href="<?php if($TPL_VAR["THIS_DAY_BREAKDAY"]==true){?>javascript:alert('평일에 이용가능합니다');<?php }else{?>#goTalkPop<?php }?>">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <tag><b>상담예약</b></tag>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="txt">
                                                <a class="counselGoFiling consultingBtn act_submit">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <tag><b>신고의뢰</b></tag>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="txt">
                                                <?php if($TPL_V1["cs_zoom_use"]=='on'&&$TPL_V1["cs_zoom_use"]!=''){?>
                                                <a class="counselGoZoom consultingBtn" href="<?php echo $TPL_V1["cs_zoom_url"]?>" target="_blank">
                                                    <img style="max-width:2.0rem; margin-bottom:0.5rem;" src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/ico/zoom_icon.png" />
                                                    <tag><b>화상상담</b></tag>
                                                </a>
                                                <?php }else{?>
                                                <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
                                                    <img style="max-width:2.0rem; margin-bottom:0.5rem;" src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/ico/zoom_icon.png" />
                                                    <tag><b>화상상담</b></tag>
                                                </a>
                                                <?php }?>
                                            </div>
                                        </li>
                                    </ul>
                                    <div>
                                        &nbsp;
                                    </div>
                                    <?php if($TPL_V1["cs_zoom_use"]=='on'&&$TPL_V1["cs_zoom_use"]!=''){?>
                                    <div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                                        <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                                        ZOOM ID : <?php echo $TPL_V1["cs_zoom_id"]?><br>
                                        연결 비밀번호 : <?php echo $TPL_V1["cs_zoom_pw"]?>
                                    </div>
                                    <?php }else{?>
                                    <div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                                        <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                                        ZOOM ID : 510 002 5847<br>
                                        연결 비밀번호 : selim
                                    </div>
                                    <?php }?>
                                </div>
                                <p class="tac mt10">
                                </p>
                            </div>
                        </li>
                        <?php }}?>
                    </ul>
                </div>
                <!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
            </form>
            <div id="goTalkPop" class="goTalkPop goPop">
                <h1>전화상담 예약 정보확인</h1>
                <form id="frm_counsel_talk" name="frm_counsel_talk" method="post">
                    <input type="hidden" name="tax_nick" value="세림세무법인" />
                    <input type="hidden" name="manager" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                    <input type="hidden" name="manager_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                    <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                    <input type="hidden" name="category_name" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                    <input type="hidden" id="loginChk" value="chk" />
                    <input type="hidden" name="goods_name" value="전화상담" />
                    <div class="gtp-wrap">
                        <p><strong>상담자</strong><span class="manager_name"></span></p>
                        <div class="cs_category_wrap">
                            <ul class="category_li">
                                <li>
                                    <?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>
                                </li>
                            </ul>
                        </div>
                        <p><strong>신청자명</strong><span><input type="text" class="req" name="name" value="<?php echo $TPL_VAR["USERINFO"]['user_name']?>" maxlength="20" title="신청자명을 입력해주세요." /></span></p>
                        <p><strong>내 핸드폰</strong><span><input type="text" class="req" name="u_phone" value="<?php echo $TPL_VAR["USERINFO"]['user_phone']?>" maxlength="20" title="휴대폰을 입력해주세요." /></span></p>
                    </div>
                    <div class="gtp-btn-wrap">
                        <button class="gtp-btn talk-btn"><a>상담예약</a></button>
                        <button class="gtp-btn cancel-btn"><a>취소</a></button>
                    </div>
                </form>
            </div>
            <div id="goTcsPop" class="goTcsPop goPop">
                <h1>신고의뢰 세목 선택</h1>
                <form id="frm_counsel_tcs" name="frm_counsel_tcs" method="post">
                    <input type="hidden" name="etc01" value="<?php echo $TPL_VAR["REQ"]["etc01"]?>" />
                    <input type="hidden" name="mngr_name" value=" REQ.mngr_name }" />
                    <input type="hidden" name="mngr_idno" value="<?php echo $TPL_VAR["REQ"]["mngr_idno"]?>" />
                    <input type="hidden" name="mngr_tel" value="<?php echo $TPL_VAR["REQ"]["mngr_tel"]?>" />
                    <input type="hidden" name="mngr_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                    <input type="hidden" name="mngr_file_name" value="<?php echo $TPL_VAR["REQ"]["mngr_file_name"]?>" />
                    <input type="hidden" name="mngr_mail" value="<?php echo $TPL_VAR["REQ"]["mngr_mail"]?>" />
                    <input type="hidden" name="mngr_fax" value="<?php echo $TPL_VAR["REQ"]["mngr_fax"]?>" />
                    <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                    <input type="hidden" id="loginChk" value="chk" />
                    <input type="hidden" name="goods_name" value="신고의뢰" />
                    <div class="gtp-wrap">
                        <p class="tac">
                            세목 선택시 다음 화면으로 이동됩니다.
                        </p>
                        <div class="cs_category_wrap">
                            <ul class="category_li tcsPop"></ul>
                        </div>
                    </div>
                    <div class="gtp-btn-wrap">
                        <button class="gtp-btn cancel-btn"><a>취소</a></button>
                    </div>
                </form>
            </div>
            <?php }?>
            <?php if($TPL_VAR["STEP"]=='2'){?>
            <?php if($TPL_VAR["REQ"]["etc01"]=="신고의뢰"){?>
            <div class="telTit pt30">
                <div class="tit01">신고의뢰</div>
                <div class="tit02">상담세무사 : <?php echo $TPL_VAR["REQ"]["mngr_name"]?><br><br>
                    <tag class="white">신고의뢰</tag>
                    <tag><?php echo $TPL_VAR["REQ"]["category_name"]?></tag>
                </div>
            </div>
            <div id="contents" class="show-off tcs_contents1"></div>
            <div id="contents1" class="show-off tcs_contents2"></div>
            <div id="contents2" class="show-off taxconsulting">
                <form id="frm_counsel" name="frm_tax_pay" method="post">
                    <input type="hidden" name="act" value="counsel_save" />
                    <input type="hidden" name="step" value="3" />
                    <input type="hidden" name="status" value="0" />
                    <input type="hidden" name="pay_status" value="1" />
                    <input type="hidden" name="goods_idno" value="6" />
                    <input type="hidden" name="tax_nick" value="세림세무법인" />
                    <input type="hidden" name="goods_name" value="신고의뢰" />
                    <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                    <input type="hidden" name="category_name" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                    <input type="hidden" name="etc01" value="<?php echo $TPL_VAR["REQ"]["etc01"]?>" />
                    <input type="hidden" name="mngr_idno" value="<?php echo $TPL_VAR["REQ"]["mngr_idno"]?>" />
                    <input type="hidden" name="manager" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                    <input type="hidden" name="mngr_name" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                    <input type="hidden" name="mngr_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                    <input type="hidden" name="mngr_mail" value="<?php echo $TPL_VAR["REQ"]["mngr_mail"]?>" />
                    <input type="hidden" name="mngr_fax" value="<?php echo $TPL_VAR["REQ"]["mngr_fax"]?>" />
                    <input type="hidden" name="option_idno" value="<?php echo $TPL_VAR["REQ"]["option"]?>" />
                    <input type="hidden" name="option_name" value="<?php echo $TPL_VAR["REQ"]["option_name"]?>" />
                    <input type="hidden" name="subject" value="<?php echo $TPL_VAR["REQ"]["subject"]?>" />
                    <input type="hidden" name="contents" value="<?php echo nl2br($TPL_VAR["REQ"]["contents"])?>" />
                    <input type="hidden" id="loginChk" value="chk" />
                    <div class="telSca mailList">
                        <div class="userInfoZone">
                            <p class="infoTitle">
                                <strong>·신청자 정보</strong>
                            </p>
                            <p>
                                <span class="infoTt">이름</span>
                                <span><input type="text" class="req" name="user_name" value="<?php echo $TPL_VAR["USERINFO"]['user_name']?>" maxlength="25" title="이름을 입력해주세요." /></span>
                            </p>
                            <p>
                                <span class="infoTt">이메일</span>
                                <span><input type="text" class="req" name="email" value="<?php echo $TPL_VAR["USERINFO"]['user_email']?>" maxlength="100" title="이메일을 입력해주세요." /></span>
                            </p>
                            <p>
                                <span class="infoTt">휴대폰</span>
                                <span><input type="text" class="req" name="phone" value="<?php echo $TPL_VAR["USERINFO"]['user_phone']?>" maxlength="20" title="휴대폰을 입력해주세요." /></span>
                            </p>
                            <p class="infoTitle mt20">
                                <strong>·전송할 자료 리스트</strong>
                            </p>
                            <?php if($TPL_CHECKLIST_1> 0){?>
                            <ul class="tableLsit">
                                <?php if($TPL_CHECKLIST_1){$TPL_I1=-1;foreach($TPL_VAR["CHECKLIST"] as $TPL_V1){$TPL_I1++;?>
                                <li>
                                    <p>
                                        <input type="checkbox" id="list<?php echo $TPL_I1?>" name="checklist<?php echo $TPL_I1?>" value="<?php echo $TPL_V1?>" class="checklist" title="전송할 자료 리스트를 모두 확인해주세요!">
                                        <label for="list<?php echo $TPL_I1?>"><?php echo $TPL_V1?></label>
                                    </p>
                                </li>
                                <?php }}?>
                            </ul>
                            <?php }?>
                            <div class="infoTitle mt20">
                                <strong>·서류 상담방법</strong>&nbsp;
                                <div class="howSelect">
                                    <input type="radio" id="mail" name="method" value="email" checked="checked" />
                                    <label id="mail_label" for="mail">
                                        <span>메일</span>&nbsp;
                                    </label>
                                    <input type="radio" id="fax" name="method" value="fax" />
                                    <label id="fax_label" for="fax">
                                        <span>팩스</span>&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="selectZone">
                                <div class="mailSelect slz on">
                                    <div class="tit no4">이메일</div>
                                    <div class="text">
                                        <span>
                                            <?php echo $TPL_VAR["REQ"]["mngr_mail"]?>
                                        </span>
                                    </div>
                                </div>
                                <div class="faxSelect slz">
                                    <div class="tit no5">팩스</div>
                                    <div class="text">
                                        <span>
                                            <?php echo $TPL_VAR["REQ"]["mngr_fax"]?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--추가 테이블-->
                        </div>
                        <div class="line text">
                            <div class="textZone">
                                <textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
                            </div>
                        </div>
                        <div class="whiteBox2 mb10 personalWrap">
                            <div class="top">
                                <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                                <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
                            </div>
                            <div class="textScroll">
                                <?php echo $TPL_VAR["AGREE_TEXT"]?>
                            </div>
                            <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
                        </div>
                        <br>
                        <div class="btnCenter btn01"><a href="#" class="act_submit">상담 신청하기</a></div>
                    </div>
                </form>
            </div>
            <div class="btnCenter btn01 taxconsulting" style="display:none"><a href="#" class="act_submit">다음</a></div>
            <?php }else{?>
            <div class="telTit pt30 seCst">
                <div class="tit01">상담 일정 선택하기</div>
                <div class="tit02">원하는 날짜, 시간에 상담을 받으실 수 있습니다.</div>
            </div>
            <form id="frm_tax1" name="frm_tax1" method="post">
                <input type="hidden" name="step" value="3" />
                <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                <input type="hidden" name="category_name" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                <input type="hidden" name="etc01" value="<?php echo $TPL_VAR["REQ"]["etc01"]?>" />
                <input type="hidden" name="mngr_idno" value="<?php echo $TPL_VAR["REQ"]["mngr_idno"]?>" id="mngr_idno" />
                <input type="hidden" name="manager" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                <input type="hidden" name="mngr_name" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                <input type="hidden" name="option" value="<?php echo $TPL_VAR["REQ"]["option"]?>" />
                <input type="hidden" name="option_name" value="<?php echo $TPL_VAR["REQ"]["option_name"]?>" />
                <input type="hidden" name="mngr_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                <input type="hidden" class="mngr_phone" data-name="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                <input type="hidden" class="visit_code" value="visit" />
                <div class="telSca">
                    <div class="line dtBox seCst">
                        <label>
                            <img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/mbv/bgTaxer.png" />&nbsp;&nbsp;상담세무사 : <?php echo $TPL_VAR["REQ"]["mngr_name"]?>
                        </label>
                        <label>
                            <img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/mbv/bgSort.png" />&nbsp;&nbsp;신고의뢰 : <?php echo $TPL_VAR["REQ"]["category_name"]?>
                        </label>
                    </div>
                    <div class="line ipBox seCst">
                        <label for="seCst_date_field">
                            <img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/mbv/bgTax13.png" />&nbsp;&nbsp;예약날짜 선택
                        </label>
                        <span class="dateButton">
                            <input id="seCst_date_field" type="text" class="orderdate req" placeholder="예약날짜 선택하기" title="예약날짜를 선택해주세요." name="app_day" readonly="readonly" />
                            <div class="seCstBg"></div>
                        </span>
                    </div>
                    <div class="line telSel seCst">
                        <label for="app_time">
                            <img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/mbv/bgTimer.png" />&nbsp;&nbsp;예약시간 선택
                        </label>
                        <div id="select_box">
                            <span>예약시간 선택하기</span>
                            <label>예약시간 선택하기</label>
                            <select id="app_time" name="app_time" class="m_select req ordertime seCst" title="예약시간을 선택해주세요.">
                            </select>
                        </div>
                    </div>
                    <div class="line text">
                        <div class="textZone">
                            <textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
                        </div>
                    </div>
                    <div class="btnCenter btn01"><a href="#" class="act_submit">상담신청하기</a></div>
                </div>
            </form>
            <?php }?>
            <?php }?>
            <?php if($TPL_VAR["STEP"]=='3'){?>
            <form id="frm_counsel" name="frm_tax_pay" method="post">
                <input type="hidden" name="act" value="counsel_save" />
                <input type="hidden" name="status" value="0" />
                <input type="hidden" name="step" value="4" />
                <input type="hidden" name="pay_status" value="1" />
                <input type="hidden" name="goods_idno" value="7" />
                <input type="hidden" name="goods_name" value="신고의뢰" />
                <input type="hidden" name="tax_nick" value="세림세무법인" />
                <input type="hidden" name="category" value="<?php echo $TPL_VAR["TCS_CATEGORY_NO"]?>" />
                <input type="hidden" name="category_name" value="<?php echo $TPL_VAR["TCS_CATEGORY_NAME"]?>" />
                <input type="hidden" name="etc01" value="방문상담" />
                <input type="hidden" name="mngr_idno" value="<?php echo $TPL_VAR["REQ"]["mngr_idno"]?>" />
                <input type="hidden" name="manager" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                <input type="hidden" name="mngr_name" value="<?php echo $TPL_VAR["REQ"]["mngr_name"]?>" />
                <input type="hidden" name="mngr_phone" value="<?php echo $TPL_VAR["REQ"]["mngr_phone"]?>" />
                <input type="hidden" name="option_idno" value="<?php echo $TPL_VAR["REQ"]["option"]?>" />
                <input type="hidden" name="option_name" value="<?php echo $TPL_VAR["REQ"]["option_name"]?>" />
                <input type="hidden" name="app_minutes" value="<?php echo $TPL_VAR["OPTION"]['value']?>" />
                <input type="hidden" name="app_day" value="<?php echo $TPL_VAR["REQ"]["app_day"]?>" />
                <input type="hidden" name="app_time" value="<?php echo $TPL_VAR["REQ"]["app_time"]?>" />
                <input type="hidden" name="subject" value="<?php echo $TPL_VAR["REQ"]["subject"]?>" />
                <input type="hidden" name="contents" value="<?php echo nl2br($TPL_VAR["REQ"]["contents"])?>" />
                <input type="hidden" name="min_point" id="min_point" value="<?php echo $TPL_VAR["MIN_POINT"]?>" />
                <input type="hidden" name="my_point" id="my_point" value="<?php echo $TPL_VAR["USER"]['point']?>" />
                <input type="hidden" name="price" id="price" value="<?php echo $TPL_VAR["OPTION"]['price']?>" />
                <input type="hidden" name="pay_price" id="pay_price" value="<?php echo $TPL_VAR["OPTION"]['price']?>" />
                <input type="hidden" id="loginChk" value="chk" />
                <br><br>
                <div class="tac">
                    <tag class="white">신고의뢰</tag>
                    <tag><?php echo $TPL_VAR["REQ"]["category_name"]?></tag>
                </div>
                <br>
                <div class="whiteBox2 mb10">
                    <table class="base03">
                        <colgroup>
                            <col style="width:100px" />
                            <col />
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>이름</th>
                                <td><input type="text" class="req" name="user_name" value="<?php echo $TPL_VAR["USERINFO"]['user_name']?>" maxlength="25" title="이름을 입력해주세요." /></td>
                            </tr>
                            <tr>
                                <th>이메일</th>
                                <td><input type="text" class="req" name="email" value="<?php echo $TPL_VAR["USERINFO"]['user_email']?>" maxlength="100" title="이메일을 입력해주세요." /></td>
                            </tr>
                            <tr>
                                <th>휴대폰</th>
                                <td><input type="text" class="req" name="phone" value="<?php echo $TPL_VAR["USERINFO"]['user_phone']?>" maxlength="20" title="휴대폰을 입력해주세요." /></td>
                            </tr>
                            <!--
<tr>
<th>기업명</th>
<td><input type="text" name="company" value="<?php echo $TPL_VAR["USERINFO"]['user_company']?>" maxlength="100" title="기업명을 입력해주세요." /></td>
</tr>
-->
                            <tr>
                                <th>상담 세무사</th>
                                <td><?php echo $TPL_VAR["REQ"]["mngr_name"]?></td>
                            </tr>
                            <tr>
                                <th>예약 날짜</th>
                                <td><?php echo $TPL_VAR["REQ"]["app_day"]?></td>
                            </tr>
                            <tr>
                                <th>예약 시간</th>
                                <td><?php echo $TPL_VAR["REQ"]["app_time"]?></td>
                            </tr>
                            <tr>
                                <th>상담 종류</th>
                                <td><?php echo $TPL_VAR["REQ"]["category_name"]?></td>
                            </tr>
                            <tr>
                                <th>상담 방법</th>
                                <td>방문상담</td>
                            </tr>
                            <tr>
                                <th>상담 내용</th>
                                <td>
                                    <!--<b><?php echo $TPL_VAR["REQ"]["subject"]?></b><br/>--><?php echo nl2br($TPL_VAR["REQ"]["contents"])?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="whiteBox2 mb10 personalWrap">
                    <div class="top">
                        <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                        <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
                    </div>
                    <div class="textScroll">
                        <?php echo $TPL_VAR["AGREE_TEXT"]?>
                    </div>
                    <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
                </div>
                <div class="whiteBox2">
                    <?php if($TPL_VAR["OPTION"]['price']> 0){?>
                    <div class="site">
                        <div class="left">
                            <div class="tit">상담수수료</div>
                        </div>
                        <div class="right">
                            <div class="blueTit fz18"><?php echo number_format($TPL_VAR["OPTION"]['price'])?> 원</div>
                        </div>
                    </div>
                    <div class="site">
                        <div class="left">
                            <div class="tit">보유포인트</div>
                        </div>
                        <div class="right">
                            <div class="tit3"><?php echo number_format($TPL_VAR["USER"]['point'])?> 포인트</div>
                        </div>
                    </div>
                    <div class="site">
                        <div class="left">
                            <div class="tit">사용포인트</div>
                        </div>
                        <div class="right">
                            <div class="tit3"><input type="text" name="pay_point" class="point num" value="" /> 포인트</div>
                            <div class="sm">( 보유포인트 <?php echo number_format($TPL_VAR["MIN_POINT"])?> 이상일 경우 사용 가능)</div>
                        </div>
                    </div>
                    <div class="site">
                        <div class="left">
                            <div class="tit">결제금액</div>
                        </div>
                        <div class="right">
                            <div class="blueTit fz18"><span id="amt"><?php echo number_format($TPL_VAR["OPTION"]['price'])?></span> 원</div>
                        </div>
                    </div>
                    <div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
                    <?php }else{?>
                    <div class="site">
                        <div class="left">
                            <div class="tit">상담수수료</div>
                        </div>
                        <div class="right">
                            <div class="blueTit fz18">무료</div>
                        </div>
                    </div>
                    <div class="btnCenter btn01"><a href="#" class="act_submit">신청하기</a></div>
                    <?php }?>
                </div>
            </form>
            <?php }?>
        </div>
        <!-- //subContainer -->
    <!-- //Wrap -->
    <?php if(!$TPL_VAR["USERINFO"]['user_id']){?>
    <div id="csl_deepBg">
        <div id="csl_login_form">
            <h2 class="csl_lform_hd">세림세무법인 상담
                <a class="lfom_home" href="/">상담취소 (홈 이동)</a>
            </h2>
            <ul class="csl_login_tab">
                <li class="clt01 clt_li on">
                    <a>로그인</a>
                </li>
                <li class="clt02 clt_li">
                    <a>간편정보 입력</a>
                </li>
            </ul>
            <ul class="csl_ip_tab">
                <li class="cit01 cit_li on">
                    <form class="login" id="frm_login" name="frm_login" method="post">
                        <input type="hidden" name="base" value="<?php echo $TPL_VAR["BASE_URL"]?>" />
                        <input type="hidden" name="red" value="<?php echo $TPL_VAR["RED_URL"]?>" />
                        <fieldset>
                            <legend class="sr-only">로그인 양식폼입니다.</legend>
                            <ul>
                                <li>
                                    <input type="text" id="user_id" name="user_id" title="아이디를 입력해주세요." placeholder="아이디를 입력해주세요." value="<?php echo $TPL_VAR["SAVED_ID"]?>" class="req" data-pattern="id" data-minlen="3" />
                                </li>
                                <li>
                                    <input type="password" id="passwd" name="passwd" title="비밀번호를 입력해주세요." placeholder="비밀번호를 입력해주세요." value="" class="req" data-minlen="3" />
                                </li>
                            </ul>
                            <input class="login_btn act_login" type="submit" value="로그인">
                            <div class="login_chk_div">
                                <div class="save_id">
                                    <input type="checkbox" id="save_id" name="save_id" value="Y" title="아이디저장" checked="checked">
                                    <label for="save_id">아이디저장</label>
                                </div>
                            </div>
                            <div class="btns_wrap">
                                <a href="./findid" target="_blank">아이디 찾기</a>
                                <a href="./findpw" target="_blank">비밀번호 찾기</a>
                                <a href="./join" target="_blank">회원가입하기</a>
                            </div>
                        </fieldset>
                    </form>
                </li>
                <li class="cit02 cit_li">
                    <div class="cit_ip_info">
                        <div class="info_wrap">
                            <p><span><input type="text" class="req" id="cit_name" name="name" value="<?php echo $TPL_VAR["USERINFO"]['user_name']?>" maxlength="20" placeholder="신청자명을 입력해주세요." /></span></p>
                            <p><span><input type="text" class="req" id="cit_phone" name="u_phone" value="<?php echo $TPL_VAR["USERINFO"]['user_phone']?>" maxlength="20" placeholder="핸드폰 번호를  입력해주세요." /></span></p>
                            <?php if($TPL_VAR["TF_TYPE"]!='전화상담'){?>
                            <p><span><input type="text" class="req" id="cit_mail" name="email" value="<?php echo $TPL_VAR["USERINFO"]['user_email']?>" maxlength="100" placeholder="이메일을 입력해주세요." /></span></p>
                            <?php }?>
                        </div>
                        <div class="btns_wrap">
                            <a id="simpleIpBtn" href="#">간편정보 입력</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="csl_txt_area">
                <p>
                    로그인 / 간편정보입력을 통해 세무상담이 진행가능합니다.<br>
                    로그인 후 진행하면 추가로 상담할 때 번거롭게 재입력하지 않아도 됩니다.
                </p>
            </div>
        </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                // $( '#csl_login_form' ).draggable();
            });
        </script>
    </div>
    <?php }?>
    <!-- //Wrap -->
    <div id="qmenu_banner" class="qmenu_banner">
        <a href="<?php echo $TPL_VAR["BASE_URL"]?>/542" target="_self">
            <img src="<?php echo $TPL_VAR["TYPE_URL"]?>/images/sub/hanpage_icon.jpg" alt="qna">
            <div class="q_info">
                Han Page 세무정보
            </div>
        </a>
    </div>
    </body>

    </html>