
<div id="selim-alert" style="display:none;">
	<div><span>양도일자는 취득일자 이후여야 합니다.</span><br>
		<button>확인</button>
	</div>
</div>

<div class="subContainer myTax mt02" id="se_calc">
	<input class="se_sort" type="hidden" value="양도세"/>
	<article><!-- script --></article>
	
	
	
	<div>
		<label>양도가액</label>
		<div>
			<input type="text" class="ip01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>취득가액</label>
		<div>
			<input type="text" class="ip02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>기타필요경비
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip03" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>기타필요경비</strong><br>
				<p>기타필요경비는 자본적 지출과 양도비용을 말하며 자본적 지출은 그 지출에 관한 적격증명서류를 수취·보관(2016년 2월 17일 이후 지출분 한정)하여야 합니다.<br>
				(적격증명서류 : 세금계산서,계산서,신용카드매출전표,직불카드영수증,현금영수증 등)<br>
				자본적 지출의 예 : 개발부담금 및 재건축부담금,취득후 소유권 확보를 위하여 소요된 소송비용,화해비용 등<br>
				양도비용의 예 : 증권거래세,신고서·계약서 작성비용,공증비용 등
				</p>
			</div>
		</section>
	</div>
	
	<div>
		<label><strong>양도차익</strong></label>
		<div>
			<input type="text" class="op01" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>장기보유 특별공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div class="lh24">
			<input type="text" class="op02" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<label class="lh24"><input type="radio" name="ip04" value="0" checked/>&nbsp;일반경우</label>
			<label class="lh24"><input type="radio" name="ip04" value="1"/>&nbsp;1세대 1주택</label><br>
			<label class="lh24">양도일자 &nbsp;<input class="ip05 selim-date" type="text"  readOnly value="<?php echo date('Y-m-d');?>"/></label><br>
			<label class="lh24 last">취득일자 &nbsp;<input class="ip06 selim-date" type="text"  readOnly value="<?php echo date('Y-m-d');?>"/></label>
		</div>
		<section class="ptzero">
			<div>
				<strong>장기보유특별공제</strong><br>
				<p>보유기간이 3년 이상인 토지,건물,조합원입주권으로서 미등기자산은 제외합니다.</p>
				<table>
				<colgroup>
					<col width="*"/>
					<col width="80px"/>
					<col width="80px"/>
				</colgroup>
				<thead>
					<tr>
						<th>보유기간</th>
						<th>일반적인 경우</th>
						<th>1세대 1주택</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>3년이상 4년미만</td>
						<td>10%</td>
						<td>24%</td>
					</tr>
					<tr>
						<td>4년이상 5년미만</td>
						<td>12%</td>
						<td>32%</td>
					</tr>
					<tr>
						<td>5년이상 6년미만</td>
						<td>15%</td>
						<td>40%</td>
					</tr>
					<tr>
						<td>6년이상 7년미만</td>
						<td>18%</td>
						<td>48%</td>
					</tr>
					<tr>
						<td>7년이상 8년미만</td>
						<td>21%</td>
						<td>56%</td>
					</tr>
					<tr>
						<td>8년이상 9년미만</td>
						<td>24%</td>
						<td>64%</td>
					</tr>
					<tr>
						<td>9년이상 10년미만</td>
						<td>27%</td>
						<td>72%</td>
					</tr>
					<tr>
						<td>10년 이상</td>
						<td>30%</td>
						<td>80%</td>
					</tr>
				</tbody>
				</table>
			</div>
		</section>
	</div>			
	
	<div>
		<label><strong>양도소득금액</strong></label>
		<div>
			<input type="text" class="op03" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>양도소득기본공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="op04" readOnly numberOnly maxlength="16" value="2,500,000"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>양도소득 기본공제</strong><br>
				<p>미등기 자산은 제외하되 동일그룹별로 먼저 양도한 자산의 양도소득금액에서 250만원을 공제합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label><strong>양도소득과세표준</strong></label>
		<div>
			<input type="text" class="op05" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>적용세율
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="op06" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>%</span>
		</div>
		<section>
			<div>
				<strong>적용세율</strong><br>
				<p>1그룹 : 토지와 건물,부동산에 관한 권리(부동산을 이용할 수 있는 권리,취득할 수 있는 권리),기타자산</p>
				<table>
				<colgroup>
					<col width="*"/>
					<col width="50px"/>
					<col width="90px"/>
				</colgroup>
				<thead>
					<tr>
						<th>과세표준</th>
						<th>세율</th>
						<th>누진공제</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1,200만원 이하</td>
						<td>6%</td>
						<td>-</td>
					</tr>
					<tr>
						<td>1,200만초과 5,600만이하</td>
						<td>15%</td>
						<td>72만원</td>
					</tr>
					<tr>
						<td>4,600만초과 8,800만이하</td>
						<td>24%</td>
						<td>582만원</td>
					</tr>
					<tr>
						<td>8,800만초과 1억5,000만이하</td>
						<td>35%</td>
						<td>1,590만원</td>
					</tr>
					<tr>
						<td>1억5,000만초과 5억만이하</td>
						<td>38%</td>
						<td>3,760만원</td>
					</tr>
					<tr>
						<td>5억초과</td>
						<td>40%</td>
						<td>1억7,060만원</td>
					</tr>
				</tbody>
				</table>
				<p>2그룹 : 상장주식 중 대주주 양도분 및 장외거래분, 비상장주식<br>
				&nbsp;&nbsp;&nbsp;일반적인 경우 : 20%<br>
				&nbsp;&nbsp;&nbsp;중소기업(대주주제외) : 10%<br>
				&nbsp;&nbsp;&nbsp;비중소기업 중 대주주 1년미만 보유 : 20%<br><br>
				
				3그룹 : 파생상품(코스피 200선물,코스피 200옵션,코스피200주식워런트증권) : 5%
				</p>
			</div>
		</section>
	</div>
	
	<div>
		<label>누진공제</label>
		<div>
			<input type="text" class="op07" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label><strong>산출세액</strong>
		</label>
		<div>
			<input type="text" class="op08" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>공제감면세액
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip07" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<p class="lh20">(감면세액,외국납부세액공제)</p>
		</div>
		<section class="ptzero">
			<div>
				<strong>공제감면세액</strong><br>
				<p>소득세법 및 다른 법률에서 규정하는 감면소득금액이 있는 경우 산출세액에서 공제합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label><strong>결정세액</strong>
		</label>
		<div>
			<input type="text" class="op09" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>신고불성실 가산세
		</label>
		<div>
			<input type="text" class="ip08" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>납부불성실 가산세
		</label>
		<div>
			<input type="text" class="ip09" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>기납부·고지세액공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip10" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>기납부 세액공재</strong><br>
				<p>신고시 이미 납부 완료한 양도세의 산출세액을 적습니다.</p>
			</div>
		</section>
	</div>

	<button id="cst-se_calc"><span></span> 계산</button>
	
	<div id="cst-se_result" class="off">
		<strong>납부 세액</strong><span id="resVal"></span><br>
		<strong>주민 세액</strong><span id="resVal2"></span><br>
		<strong>예상 납부 세액</strong><span id="resVal3"></span>&nbsp;&nbsp;&nbsp;<i style="color:#666;text-decoration:underline;">(납부세액+주민세액)</i><br> 
		<p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>
	</div>
	<button id="cst-se_list" class="off"><a href="{BASE_URL}/calclist">세액 계산 목록</a></button>



</div>

