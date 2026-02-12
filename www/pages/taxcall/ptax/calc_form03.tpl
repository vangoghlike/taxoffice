<div class="subContainer myTax mt03" id="se_calc">
	<input class="se_sort" type="hidden" value="상속세"/>
	<article><!-- script --></article>
	<div>
		<label><strong>총상속재산가액</strong></label>
		<div>
			<input type="text" class="ip01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>사전재산가액
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>사전재산가액</strong><br>
				<p>피상속인이 10년 이내 상속인(또는 5년이내 상속인 외에 자)에게 증여한 재산가액을 가산합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label>장례비용</label>
		<div>
			<input type="text" class="ip03" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>채무가액
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip04" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>채무가액</strong><br>
				<p>상속개시일 현재 피상속인의 채무로서 상속인이 부담하는 사실이 증명되는 채무를 차감합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label><strong>상속세 과세가액</strong></label>
		<div>
			<input type="text" class="op01" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>일괄공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="op02" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>일괄공제</strong><br>
				<p>상속이 개시되는 경우 기초공제와 기타 인적공제를 합한 금액과 5억원 중 큰 금액을 공제합니다.</p>
			</div>
		</section>
	</div>
	
	<div class="pb8px ip2tab">
		<label>(순금융재산가액)<br><span>금융재산상속공제</span>
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip05" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<input type="text" class="op03" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span class="scdWon">원</span>
		</div>
		<section>
			<div>
				<strong>금융재산상속공제</strong><br>
				<p>거주자의 사망으로 상속이 개시되는 경우 금융재산으로 금융부채를 차감한 금액을 공제합니다.</p>
				<table>
				<colgroup>
					<col width="50%"/>
					<col width="50%"/>
				</colgroup>
				<thead>
					<tr>
						<th>순금융재산가액(금융재산-금융부채)</th>
						<th>공제액</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>2천만원 이하</td>
						<td>순금융재산가액</td>
					</tr>
					<tr>
						<td>2천만원 초과 1억원 이하</td>
						<td>20,000,000</td>
					</tr>
					<tr>
						<td>1억원 초과</td>
						<td>(순금융재산가액*20%,2억원)<br>중 적은 금액</td>
					</tr>
				</tbody>
				</table>
			</div>
		</section>
	</div>			
	
	<div>
		<label><strong>상속세 과세표준</strong></label>
		<div>
			<input type="text" class="op04" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>적용세율
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="op05" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>%</span>
		</div>
		<section>
			<div>
				<strong>적용세율</strong><br>
				<table>
				<colgroup>
					<col width="40%"/>
					<col width="30%"/>
					<col width="30%"/>
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
						<td>1억원 이하</td>
						<td>10%</td>
						<td>-</td>
					</tr>
					<tr>
						<td>1억초과 5억이하</td>
						<td>20%</td>
						<td>1천만원</td>
					</tr>
					<tr>
						<td>5억초과10억이하</td>
						<td>30%</td>
						<td>6천만원</td>
					</tr>
					<tr>
						<td>10억초과 30억이하</td>
						<td>40%</td>
						<td>1억6천만원</td>
					</tr>
					<tr>
						<td>30억원 초과</td>
						<td>50%</td>
						<td>4억6천만원</td>
					</tr>
				</tbody>
				</table>
			</div>
		</section>
	</div>
	
	<div>
		<label>누진공제</label>
		<div>
			<input type="text" class="op06" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label><strong>상속세 산출세액</strong></label>
		<div>
			<input type="text" class="op07" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div>
		<label>단기상속공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>단기재상속공제</strong><br>
				<p>10년 이내에 다시 상속이 있는 경우에는 이전의 상속세가 부과된 상속재산 중에서 다시 상속되는 재산에 대한 상속세 상당액을 공제합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label>신고세액공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip07" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>신고세액공제</strong><br>
				<p>신고기한 내에 신고시 산출세액의 7%를 공제해줍니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label>증여세액공제
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip08" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>증여세액공제</strong><br>
				<p>증여 당시의 증여재산에 대한 증여세산출세액을 공제합니다.</p>
			</div>
		</section>
	</div>
	
	<div>
		<label>기납부세액
			<div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
		</label>
		<div>
			<input type="text" class="ip09" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
		<section>
			<div>
				<strong>기납부세액</strong><br>
				<p>신고시 이미 납부 완료한 상속세의 산출세액을 적습니다.</p>
			</div>
		</section>
	</div>

	<button id="cst-se_calc"><span></span> 계산</button>
	
	<div id="cst-se_result" class="off">
		<strong>예상 납부 세액</strong><span id="resVal"></span><br>
		<p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>
	</div>
	<button id="cst-se_list" class="off"><a href="{BASE_URL}/calclist">세액 계산 목록</a></button>



</div>