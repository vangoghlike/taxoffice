{ ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }
					{ ?  MENU_ORD_NO == '1' }

					<div class="tabType01 type { ? sizeof( MENU[ CONTENTS['breadcrumbs'][1]['idno'] ] ) > 4 }suitable{ / }">
						<ul>
							{ @ MENU[CONTENTS['breadcrumbs'][1]['idno']] }
								<li class="menu{ .idno }" style="width:{ =(100 / sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']])) }%"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
							{ / }
						</ul>
					</div>

					{ : }

					<div class="tabType01 { ? sizeof( MENU[ CONTENTS['breadcrumbs'][1]['idno'] ] ) > 4 }suitable{ / }">
						<ul>
							{ @ MENU[CONTENTS['breadcrumbs'][1]['idno']] }
							<li class="menu{ .idno }" style="width:{ =(100 / sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']])) }%">
								{ ? .idno == '345' }
								<a href="{ BASE_URL }/{ .idno }" class="twoLine">{ .menu_title }</a>
								{ : }
								<a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a>
								{ / }
							</li>
							{ / }
						</ul>
					</div>

					{ / }
					
					<div class="tabType02 { ? sizeof( MENU[ CONTENTS['breadcrumbs'][1]['idno'] ] ) > 4 }suitable{ / }">
						<ul>
							{ @ MENU[CONTENTS['breadcrumbs'][2]['idno']] }
								<li class="menu{ .idno }" style="width:{ =(100 / sizeof(MENU[CONTENTS['breadcrumbs'][2]['idno']])) }%"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
							{ / }
						</ul>
					</div>

					{ ? CONT_DETAIL_TYPE != 'calendar' }

					<div class="h3Wrap line">
						<h3>
							{ ? CALC_CODE != null }
								{ ? CALC_CODE == 'mt01' }
									증여세
								{ : CALC_CODE == 'mt02' }
									양도세
								{ : CALC_CODE == 'mt03' }
									상속세
								{ : CALC_CODE == 'mt04' }
									종소세
								{ : CALC_CODE == 'mt05' }
									부가가치세(일반)
								{ : CALC_CODE == 'mt06' }
									부가가치세(간이)
								{ / }
							{ / }
							{ CONTENTS['menu_title'] }

							{ ? CONTENTS['menu_idno'] == '262' }
							<ul class="menu262_clk_wrap">
								<li class="menu262_clk_tab menu262_clk_tab1">
									<a>
										2018년
									</a>
								</li>
								<li class="menu262_clk_tab menu262_clk_tab2 on">
									<a>
										2019년
									</a>
								</li>
							</ul>

							{ / }

						</h3>
						
						{ ? CONTENTS['menu_idno'] == '59' }
						<style>
						.contentPopBtn {display:inline-block; margin-top:-4px; margin-left:552px; width:224px; height:32px; line-height:32px; border:1px solid #e1e7e7; border-radius:8px; cursor:pointer; 
										text-align:center; font-weight:600; font-size:0.88rem; box-shadow:2px 2px 8px rgba(100,120,130,0.2); transition:all .6s;}
						.contentPopBtn:hover {box-shadow:2px 2px 8px rgba(100,120,130,0.4);}
						.contentPopBtn i {font-size:0.88rem;}
						.contentPopWrap {position:relative; width:100%; height:0px;}
						.contentPopArea {position:absolute; top:0; right:0; padding:32px; width:480px; height:auto; background:#F5FAFE; border:2px solid #E6E6E6; borader-radius:3px; transition:all 0.6s;}
						.contentPopArea.on {display:block;}
						.contentPopArea.off {display:none;}
						.contentPopArea > strong {font-size:1.16rem; color:#000;}
						.contentPopArea > .popClose {position:absolute; top:10px; right:10px; display:block; width:24px; height:24px; line-height:24px; cursor:pointer; text-align:center;}
						.contentPopArea > .popClose i {font-size:1.44rem;}
						.contentPopArea p {line-height:1.6; font-size:0.92rem;}
						.contentPopArea p strong {font-size:0.92rem; color:#0f3994;}
						</style>
						<a class="contentPopBtn">외국인투자기업 업무제휴 안내&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>
						<script>
							$(function(){
								var conPopStatus = false;
								$('.contentPopBtn').on('click',function(){
									if(conPopStatus){
										conPopStatus=false;
									}else{
										conPopStatus=true;
									}
									conPopAct(conPopStatus);
								});
								$('.contentPopArea .popClose').on('click',function(){
									conPopStatus=false;
									conPopAct(conPopStatus);
								});
								
								function conPopAct(stat) {
									if(stat) {
										$('.contentPopArea').addClass('on');
										$('.contentPopArea').removeClass('off');
									}else{
										$('.contentPopArea').addClass('off');
										$('.contentPopArea').removeClass('on');
									}
								}
							});
						</script>
						{ / }
					</div>

					{ / }
					
					{ ? CONTENTS['menu_idno'] == '59' }
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
							자금 송금 업무에 관한 사항,   <br>
							법인 설립에 필요한 절차 및 서류 안내를<br>
							쉽고 편리하게 안내해 드립니다.<br>
							외국인 투자기업 설립에 시간과 에너지가 절약 됩니다.<br><br>
							 
							<strong>세림세무법인 외국인투자업무 지원팀</strong><br>
							- 본사 : 최유정세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2626<br>
							- 강남 : 김주식세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2151
							</p>
						</div>
					</div>
					{ / }

{ / }
