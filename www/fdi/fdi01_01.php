<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				외국인투자기업(FDI) 설립지원</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>외국인투자기업업무</span><span>외국인투자기업(FDI) 설립지원</span><span class="last">외투 법인 설립 기본 절차</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="tabType01 suitable">
			<ul>
				<li class="menu59 on" style="width:16.6666666667%">
					<a href="/59">외투 법인 설립 기본 절차</a>
				</li>
				<li class="menu60" style="width:16.6666666667%">
					<a href="/60">외투 법인 설립 일람표</a>
				</li>
				<li class="menu145" style="width:16.6666666667%">
					<a href="/145">국내 지사 설립 일람표</a>
				</li>
				<li class="menu61" style="width:16.6666666667%">
					<a href="/61">외투 법인 설립 자문 보수</a>
				</li>
				<li class="menu443" style="width:16.6666666667%">
					<a href="/443">외투법인설립(게시판)</a>
				</li>
				<li class="menu352" style="width:16.6666666667%">
					<a href="/352"><strong>업무 의뢰</strong></a>
				</li>
			</ul>
		</div>
		<div class="tabType02 suitable">
			<ul>
			</ul>
		</div>
		<div class="h3Wrap line">
			<h3>
				외투 법인 설립 기본 절차</h3>
			<style>
				.contentPopBtn {
					display: inline-block;
					margin-top: -4px;
					margin-left: 552px;
					width: 224px;
					height: 32px;
					line-height: 32px;
					border: 1px solid #e1e7e7;
					border-radius: 8px;
					cursor: pointer;
					text-align: center;
					font-weight: 600;
					font-size: 0.88rem;
					box-shadow: 2px 2px 8px rgba(100, 120, 130, 0.2);
					transition: all .6s;
				}

				.contentPopBtn:hover {
					box-shadow: 2px 2px 8px rgba(100, 120, 130, 0.4);
				}

				.contentPopBtn i {
					font-size: 0.88rem;
				}

				.contentPopWrap {
					position: relative;
					width: 100%;
					height: 0px;
				}

				.contentPopArea {
					position: absolute;
					top: 0;
					right: 0;
					padding: 32px;
					width: 480px;
					height: auto;
					background: #F5FAFE;
					border: 2px solid #E6E6E6;
					borader-radius: 3px;
					transition: all 0.6s;
				}

				.contentPopArea.on {
					display: block;
				}

				.contentPopArea.off {
					display: none;
				}

				.contentPopArea>strong {
					font-size: 1.16rem;
					color: #000;
				}

				.contentPopArea>.popClose {
					position: absolute;
					top: 10px;
					right: 10px;
					display: block;
					width: 24px;
					height: 24px;
					line-height: 24px;
					cursor: pointer;
					text-align: center;
				}

				.contentPopArea>.popClose i {
					font-size: 1.44rem;
				}

				.contentPopArea p {
					line-height: 1.6;
					font-size: 0.92rem;
				}

				.contentPopArea p strong {
					font-size: 0.92rem;
					color: #0f3994;
				}
			</style>
			<a class="contentPopBtn">외국인투자기업 업무제휴 안내&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>
			<script>
				$(function() {
					var conPopStatus = false;
					$('.contentPopBtn').on('click', function() {
						if (conPopStatus) {
							conPopStatus = false;
						} else {
							conPopStatus = true;
						}
						conPopAct(conPopStatus);
					});
					$('.contentPopArea .popClose').on('click', function() {
						conPopStatus = false;
						conPopAct(conPopStatus);
					});

					function conPopAct(stat) {
						if (stat) {
							$('.contentPopArea').addClass('on');
							$('.contentPopArea').removeClass('off');
						} else {
							$('.contentPopArea').addClass('off');
							$('.contentPopArea').removeClass('on');
						}
					}
				});
			</script>
		</div>
		<div class="contentPopWrap">
			<div class="contentPopArea off">
				<a class="popClose"><i class="fa fa-close"></i></a>
				<strong>외국인투자기업 업무제휴 안내</strong><br><br>
				<p>
					세림세무법인은<br>
					외국인 투자기업 전문 세무법인입니다.<br>
					전문 통역사가 항상 대기하고 있습니다.<br>
					금융기관 글로벌투자지원센타와 업무 협조로<br>
					원스톱서비스 제공 가능합니다.<br><br>
					<strong>(*) 우리은행과 외국인투자기업 업무협약 <br></strong>
					- 우리은행 글로벌투자지원센터 강남교보타워 2층 <br>
					- 외국인직접투자 담당자&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-3789-1899 <br><br>
					<strong>(*) 국민은행과 업무 협조 관계 <br></strong>
					- 국민은행 외국인투자지원센터 KB손보빌딩 8층<br>
					- 외국인투자업무 담당자&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-708-9991<br><br>
					외국인 투자업무 초도 상담부터<br>
					자금 송금 업무에 관한 사항, <br>
					법인 설립에 필요한 절차 및 서류 안내를<br>
					쉽고 편리하게 안내해 드립니다.<br>
					외국인 투자기업 설립에 시간과 에너지가 절약 됩니다.<br><br>
					<strong>세림세무법인 외국인투자업무 지원팀</strong><br>
					- 본사 : 최유정세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2626<br>
					- 강남 : 김주식세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2151
				</p>
			</div>
		</div>
		<a class="con_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
		<div class="clearFix"></div>
		<div class="workList">
			<ul>
				<li>
					<div class="tit bll01">1. (사전) 준비사항 </div>
					<div class="blueRound">
						<p class="titBlueBottom2">외국인 투자가가 투자하고자 하는 내용에 대하여 <u>충분한 사전 상담을 한 후</u> 투자를 결정하여야 가장 적합하게 투자 형태를 결정할 수 있고, <br />그에 따른 <u>서류 준비와 외국인투자신고를 진행하는데</u> 시간과 에너지를 절약할 수 있습니다.</p>
					</div>
					<div class="titBlue">1) 투자하고자 하는 사업 내용 확인, 투자할 업태 종목 확인(한국표준산업분류표)</div>
					<div class="titBlue">2) 외국인투자촉진법상 또는 개별법령상 투자 제한 업종 여부 확인</div>
					<div class="titBlue">3) 투자 형태 결정</div>
					<ul class="lst01">
						<li>
							<div class="tit01">* 주식회사, 유한회사 등 법인의 형태의 결정</div>
						</li>
						<li>
							<div class="tit01">* 투자금액, 지분구조의 결정(외국인투자촉진법상의 요건에 맞는 투자인지 ? 확인)</div>
						</li>
					</ul>
					<div class="titBlue">4) 사업장 선정 </div>
					<ul class="lst01">
						<li>
							<div class="tit01">* 사업업 내용에 따른 사업장 선정 검토</div>
						</li>
						<li>
							<div class="tit01">* 사업장 임대 또는 취득 여부 결정</div>
						</li>
					</ul>
				</li>
				<li class="two">
					<div class="tit bll01">2. 투자신고서 작성(국문 또는 영문 2 부 작성)</div>
					<div class="titBlue">1) 투자 업종 : 투자하려는 사업의 내용(한국표준산업분류표상 세세분류 까지 기록)</div>
					<div class="titBlue">2) 투자 금액 : 건당 1억원 이상(2010년말 5천만원에서 1억으로 변경)</div>
					<div class="titBlue">3) 투자 비율 : 건당 10% 이상</div>
					<p class="titBlueBottom2">(2인 이상인 경우 각각 위 (2) (3)항의 요건을 갖추어야함)</p>
					<div class="titBlue">4) 투자자의 상호, 명칭, 국적</div>
					<div class="titBlue">5) 투자기업의 상호, 명칭, 주소 </div><br />
					<div class="titBlue">(*) 외국인 투자신고 대상 아닐 경우</div>
					<ul class="lst01">
						<li>
							<div class="tit01">- 외국환 거래법에 따른 외국환거래신고(증권 취득 신고)</div>
						</li>
						<li>
							<div class="tit01">- 주주 중 1명 계좌개설과 동시에 하는 것이 편리함. </div>
						</li>
					</ul>
					<div class="if_open_btn" data-iframe="fdi_apply"><a><strong>서류 확인</strong><span>투자신고서</span></a></div>
				</li>
				<li>
					<div class="tit bll01">3. 투자신고 및 투자신고필증 교부(즉시 교부)</div>
					<div class="titBlue">1) 대한무역투자진흥공사(Kotra) 또는 외국환은행에 신고</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">(신고 대상 업종 확인), (신고 구비 서류 확인)</div>
						</li>
					</ul>
					<div class="titBlue">2) 본인 입국 신고의 경우 </div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">① 개인 : 여권</div>
						</li>
						<li>
							<div class="titBlueBottom2">② 법인 : 대표자 여권, 법인증명 서면(법인등기부 등본, 사업자등록증 사본, 기타 공적 서면)</div>
						</li>
					</ul>
					<div class="titBlue">3) 대리인의 경우</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">① 공증 받은 투자신고 위임장(은행에 따라 한국 영사 확인 또는 아포스티유 요구)</div>
						</li>
						<li>
							<div class="titBlueBottom2">② 개인 : 여권</div>
						</li>
						<li>
							<div class="titBlueBottom2">③ 법인 : 법인 대표자 여권, 법인증명 서면(법인등록증, 사업자등록증, 기타 공적 서면)</div>
						</li>
					</ul>
					<div class="titBlue">4) 투자국으로부터 미리 송금 된 경우</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">환전하기 전에 (반드시) 투자 신고를 접수하여야 함</div>
						</li>
					</ul>
					<div class="if_open_btn" data-iframe="docu_warrant"><a><strong>서류 확인</strong><span>투자위임장</span></a></div>
				</li>
				<li class="two">
					<div class="tit bll01">4. 외국으로부터 투자금 송금</div>
					<p class="titBlueBottom2 mb30">(외국으로부터 외국환은행 국내 지점으로 자본금 송금)</p>
					<div class="titBlue">1) 송금 시 필수 기재 사항</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">① 수취은행명 : (예) Woori Bank Seoul Global Investment Center KOOKMIN BANK</div>
						</li>
						<li>
							<div class="titBlueBottom2">② 송금인명 : 외국인투자가</div>
						</li>
						<li>
							<div class="titBlueBottom2">③ 수취인명 : 신설 또는 합작회사명</div>
						</li>
						<li>
							<div class="titBlueBottom2">④ 자금용도 : "( ) 회사 설립 또는 투자자금용"<br /> New establishment of company (ⓝⓐⓜⓔ) this fund is for the establishment of ( ). co</div>
						</li>
					</ul>
					<div class="titBlue">2) 투자자금의 송금 시기 </div>
					<div class="titBlueBottom2 mb30">일반적으로 투자신고서 접수 직후 하면 되지만 신고 전에 하여도 됨. 다만, 신고 전에 송금이 들어 온 경우는 <u>신고 전에 환전하면 안됨.</u> </div>
					<div class="titBlue">3) 외화 증명서 발급</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">① 외화매입증명서 또는 외화예치증명서</div>
						</li>
						<li>
							<div class="titBlueBottom2">② 주금납입보관증명서 또는 잔고증명서(법인등기용)<br /> &lt;= 법무사 사무실에서 발급 신청 대행.</div>
						</li>
						<li>
							<div class="titBlueBottom2">③ 법인 : 법인 대표자 여권, 법인증명 서면(법인등록증, 사업자등록증, 기타 공적 서면)</div>
						</li>
					</ul>
					<div class="titBlue">4) 투자국으로부터 미리 송금 된 경우</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">환전하기 전에 (반드시) 투자 신고를 접수하여야 함</div>
						</li>
					</ul>
					<div class="if_wrap">
						<div><strong>은행별 송금증명서</strong>
							<div><span>우리은행</span><a class="if_open_btn" data-iframe="docu_wo_en">영문</a><a class="if_open_btn" data-iframe="docu_wo_ch">중문</a></div>
							<div><span>국민은행</span><a class="if_open_btn" data-iframe="docu_kb_en">영문</a></div>
							<div><span>신한은행</span><a class="if_open_btn" data-iframe="docu_sh_ko">국문</a><a class="if_open_btn" data-iframe="docu_sh_en">영문</a><a class="if_open_btn" data-iframe="docu_sh_ch">중문</a></div>
						</div>
					</div>
				</li>
				<li>
					<div class="tit bll01">5. 법인설립 등기 절차 이행 전 준비서류 점검</div>
					<div class="blueRound">
						<p class="titBlueBottom2">&nbsp;외국인투자법인의 설립의 경우도 기본적으로는 일반적인 내국법인의 설립 절차와 같습니다. 다만, 주주나 임원이 외국인인 경우 준비해야할 서류의 형식이 좀 더 복잡한 경우가 많고,<br />서류 준비에 시간이 많이 걸린다는 점을 유의하고 사전에 충분한 시간을 가지고 서류 준비에 대비하여야 합니다. 또한 외국인 주주나 임원이 설립 당시에 국내에 체류하면서 <br /> 설립 업무를 진행할 수 있는가의 여부에 따라 서류의 준비 형태도 달라집니다.</p>
					</div>
					<p class="titBlueBottom2 mb30"><strong>(*) 설립 등기에 필요한 서류 준비는 별첨 외투기업 법인설립 준비서류일람에 의하여 점검.</strong></p>
				</li>
				<li class="two">
					<div class="tit bll01">6. 법인설립 등기 절차</div>
					<p class="titBlueBottom2 mb30">(등기 절차는 일반적인 법인의 설립절차를 따름, 다만 외투법인의 경우 서류 준비에서 추가적인 준비사항이 있음을 유의하고 준비하여야함) (&lt;- 법무사 사무소에서 업무 대행함)</p>
					<div class="titBlue">1) 기본적 사항 </div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">1) 대표이사 포함 이사 3명 이상, 감사 1명 이상(자본금 10억 이상인 경우)</div>
						</li>
						<li>
							<div class="titBlueBottom2">2) 주주 청약인 포함 4명 이상(발기인 3명, 청약인 1명 이상)</div>
						</li>
						<li>
							<div class="titBlueBottom2">3) (자본금이 10억 미만인 경우에는 이사 감사 총 2명으로도 설립 가능)</div>
						</li>
						<li>
							<div class="titBlueBottom2">4) (임원진 중 주주가 아닌 임원이 한명이라도 있으면 설립 시 공증업무생략 등 간소화)</div>
						</li>
					</ul>
					<div class="titBlue">2) 법인의 발기인(주주), 임원이 외국인일 경우 구비서류 </div>
					<ul class="lst01">
						<li>
							<div class="tit01">1) 발기인(주주)이 외국인(외국법인)일 경우 </div>
							<div class="titBlueBottom2">(1) 본국에서 공증 받은 투자 위임장 3부(정관 및 의사록 공증 위임 포함)<br /> &nbsp;&nbsp;외국인이 국내에 없거나 공증사무실에 직접 출석하지 못할 경우는 그 권한을<br /> ○○○에게 위임하다는 뜻의 위임장을 본국에서 공증 받음.<br /><br /> (2) 여권 사본(주주가 개인인 경우)<br /><br /> (3) 법인 증명 서면(주주가 법인인 경우)<br /> &nbsp;&nbsp;(외국법인의 존재, 대표이사 및 본점소재지를 증명하는 서면)<br /> &nbsp;&nbsp;예를 들어 법인등록증 또는 사업자등록증, 기타 공적 서면<br /><br /> (4) 일본, 대만과 같이 인감증명서 발급이 가능한 경우 공증용 위임장에 법인이나 <br /> 개인 인감도장을 날인하고 인감증명서를 첨부함.<br /><br /> (5) 모두 번역하여야 함.</div>
						</li>
						<li>
							<div class="tit01">2) 이사 및 감사가 외국인일 경우 다음의 방법 중 택1</div>
							<div class="titBlueBottom2">(1) 입국하지 않은 경우<br /> &nbsp;&nbsp;- 취임승락서 및 의사록 공증위임장에 서명하고(대표이사는 인감신고서 포함)하고<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;그 자체를 본국 공증사무실 또는 본국 관공서에서 공증 후 <br /> &nbsp;&nbsp;- 아포스티유 취임승낙서에 여권사본 첨부 하여 공증 여권 사본<br /><br /> (2) 입국한 경우<br /> &nbsp;&nbsp;- 취임승락서 및 의사록 공증 위임장에 서명(대표이사는 인감신고서 포함) 하고<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=그 자체를 한국 공증사무실 또는 한국 주재 대사관 영사관에 공증받음 <br /> &nbsp;&nbsp;- 취임승낙서에 여권사본 첨부 하여 공증 여권 사본<br /><br /> (3) 일본, 대만과 같이 인감증명서와 주소증명서면이 발급 가능한 경우 <br /> &nbsp;&nbsp;- 취임승락서에 인감도장 날인하고 인감증명서 첨부, 신분증(여권사본, 주민등록등본, 운전면허증)<br /><br /> (4) 모두 번역하여야 함.</div>
						</li>
						<li>
							<div class="tit01">3) 외국인 대표이사의 경우(추가 준비)</div>
							<div class="titBlueBottom2">(1) 취임승락서, 인감신고서(양식), 의사록 공증 위임장 서명 공증 아포스티유<br /><br /> (2) 주소증명서면 서명 공증 아포스티유(대표이사는 반드시 주소증명서면 첨부)<br /> &nbsp;&nbsp; - 주소증명서면이 있는 경우는 본국 주소증명서면(일본 대만 등)<br /> &nbsp;&nbsp; - 주소증명서면이 없는 경우는 본국에서 주소 공증 아포스티유 (한국에서 주소는 공증 불가)<br /><br /> (3) 여권 사본</div>
						</li>
					</ul>
				</li>
				<li>
					<div class="tit bll01">7. 법인등기 완료 & 사업자등록 신청</div>
					<div class="titBlue">1) 법인 등기가 완료되면, 바로 사업자 등록 신청 </div>
					<div class="titBlueBottom2 mb30">등기부등본, 주주명부, 임대차계약서 사본 등을 첨부하여 사업장 관할 세무서에 (외투법인) 설립신고 및 사업자등록 신청</div>
					<div class="titBlue">2) 법인 통장 개설 등</div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">* 사업자등록증이 발급되면, 통장개설이 가능하므로 통장개설 후</div>
						</li>
						<li>
							<div class="titBlueBottom2">* 은행에 예치된 자본금 법인 계좌로 이체</div>
						</li>
						<li>
							<div class="titBlueBottom2">* 법인 통장 및 법인 카드 개설,</div>
						</li>
						<li>
							<div class="titBlueBottom2">* 법인으로 영업활동 개시 준비</div>
						</li>
					</ul>
				</li>
				<li class="two">
					<div class="tit bll01">8. 외국인투자기업등록 필증 신청 및 교부</div>
					<div class="titBlue">1) 외국인투자기업등록 신청서 </div>
					<ul class="lst01">
						<li>
							<div class="titBlueBottom2">* 법인등기부등본, 사업자등록증</div>
						</li>
						<li>
							<div class="titBlueBottom2">* 자본금으로 들어온 외화자금에 대한 “외화매입증명서”</div>
						</li>
					</ul>
					<div class="titBlue">2) 외국인 투자기업으로 영업 활동 개시</div><br />
					<div class="titBlue">(*) 투자비자의 발급(D-8)</div>
					<ul class="lst01">
						<li>
							<div class="tit01">(1) 외국인투자의 경우 투자금액 1억당 1건의 D-8 투자비자가 발급 가능함. </div>
						</li>
						<li>
							<div class="tit01">(2) 기업투자비자(D-8 비자)</div>
							<div class="titBlueBottom2">투자비자 신청 시에는 등기부 등 회사 설립 관련 서류와 투자금이 사용된 용처 등을 증명할 수 있는 서류를 제출.</div>
						</li>
					</ul>
				</li>
				<li>
					<div class="tit bll01">* 참고사항</div>
					<div class="titBlue">☞ 사전에 확인하여야할 중요사항</div>
					<div class="blueRound">
						<div class="titBlueBottom2"><strong>1. 투자자금 1억원 이상 여부(10% 이상 여부) 또는 10억 이상 여부<br />2. 투자자가 개인인지 법인인지 확인<br />3. 투자자(법인대표자) 국내 입국 여부<br />4. 임원 외국인 여부<br />5. 외국인 임원 국내 입국 여부<br />6. 한국 임원 임명 여부 및 외투 일정 진행 가능 여부</strong></div>
					</div><br />
					<div class="titBlue">(*) 일정별 소요기간(예시)</div>
					<div class="tblType02 docType">
						<table>
							<colgroup>
								<col style="width: 25%" />
								<col style="width: 25%" />
								<col style="width: 10%" />
								<col style="width: 25%" />
							</colgroup>
							<thead>
								<tr>
									<th>구분</th>
									<th>시점</th>
									<th>소요기간</th>
									<th>비고</th>
								</tr>
							</thead>
							<style>
								tbody.tal th {
									line-height: 1.6;
								}

								tbody.tal td {
									text-align: left;
									line-height: 1.6;
									padding-left: 12px;
									padding-right: 12px;
								}
							</style>
							<tbody class="tal">
								<tr>
									<td>1. 사전 상담</td>
									<td>외투기업 설립 검토 단계설립자금 송금 전</td>
									<td>1일</td>
									<td>설립 기초 상담 및 서류준비에 관한 상담</td>
								</tr>
								<tr>
									<td>2. 외국인투자기업 신고</td>
									<td>외자송금이 확정된 후</td>
									<td>1일</td>
									<td>서류작성시간 포함</td>
								</tr>
								<tr>
									<td>3. 투자금의 송금</td>
									<td>외투기업 신고 전후</td>
									<td>1일</td>
									<td>외화</td>
								</tr>
								<tr>
									<td>4. 서류 준비 상태 확인</td>
									<td>투자금 송금 후</td>
									<td>7일</td>
									<td>설립서류 준비상태 확인</td>
								</tr>
								<tr>
									<td>5. 법인설립 등기</td>
									<td>투자금 송금 후<br />(서류 준비 확인 후)</td>
									<td>7일</td>
									<td>준비기간 포함 5-7일 </td>
								</tr>
								<tr>
									<td>6. 설립신고 및 사업자등록 신청</td>
									<td>법인설립 등기 후 즉시 </td>
									<td>1일</td>
									<td>통상적인 경우 즉시</td>
								</tr>
								<tr>
									<td>7. 외국인투자기업 등록</td>
									<td>법인설립 등기 후</td>
									<td>1일</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>(*)투자비자(D8) 및 외국인 등록(임직원)</td>
									<td>외투기업등록 후 </td>
									<td>*일</td>
									<td>필요할 경우</td>
								</tr>
								<tr>
									<td colspan="2">소요기간 합계</td>
									<td colspan="2">21일 (+)(-) @ </td>
								</tr>
							</tbody>
						</table>
					</div><!-- //tblType02 -->
				</li>
			</ul>
		</div>
		<script>
			$(function() {
				$('.if_open_btn').on('click', function() {
					$_this_iframe = $(this).attr('data-iframe');
					$('.popup_iframe_wrap').find('iframe').hide();
					$('.popup_iframe_wrap').fadeIn();
					switch ($_this_iframe) {
						case 'fdi_apply':
							$('.popup_iframe_wrap').find('#fdi_apply').show();
							break;
						case 'docu_warrant':
							$('.popup_iframe_wrap').find('#docu_warrant').show();
							break;
						case 'docu_wo_en':
							$('.popup_iframe_wrap').find('#docu_wo_en').show();
							break;
						case 'docu_wo_ch':
							$('.popup_iframe_wrap').find('#docu_wo_ch').show();
							break;
						case 'docu_kb_en':
							$('.popup_iframe_wrap').find('#docu_kb_en').show();
							break;
						case 'docu_sh_ko':
							$('.popup_iframe_wrap').find('#docu_sh_ko').show();
							break;
						case 'docu_sh_en':
							$('.popup_iframe_wrap').find('#docu_sh_en').show();
							break;
						case 'docu_sh_ch':
							$('.popup_iframe_wrap').find('#docu_sh_ch').show();
							break;
					}
				});
				$('.popup_iframe_wrap .pi_close_btn').on('click', function() {
					$('.popup_iframe_wrap').find('iframe').hide();
					$('.popup_iframe_wrap').fadeOut();
				});
			});
		</script>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>