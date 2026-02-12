
<div class="subContainer calculate animated speed" data-sort="income">
	<div class="calc-tit">
		<span class="arrow">
			<i class="fa fa-angle-double-down"></i>
		</span>
		&nbsp;<strong>종합소득세</strong>&nbsp;<span>조건을 입력해주세요</span>
	</div>
	
	<section class="calc-sec">
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>A.사업소득금액</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>B.필요경비</span>
					</aside>
					<aside class="right">
						<div class="before">
							<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="ip" placeholder="0"/>
							<span class="money">원</span>
							<button class="detailBtn"><a data-code="income_b" data-mode="write">상세입력</a></button>
						</div>
						<div class="after">
							
						</div>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<strong>C.소득금액 (A-B)</strong>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<span>D.타소득합산</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>┗&nbsp;&nbsp;a.타 사업소득</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>┗&nbsp;&nbsp;b.금융소득(이자,배당)</span>
						<i class="fa fa-plus-square"></i>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
			<div class="column info hide animated speed">
				<p>
					이자 배당 소득이 2천만원 이상인 경우 합산
				</p>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>┗&nbsp;&nbsp;c.근로소득</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>┗&nbsp;&nbsp;d.기타소득</span>
						<i class="fa fa-plus-square"></i>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
			<div class="column info hide animated speed">
				<p>
					기타소득금액 3백만원 이상인 경우 합산
				</p>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<strong>E.소득금액 합계 (C+D)</strong>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<span>F.소득공제</span>
					</aside>
					<aside class="right">
						<div class="before">
							<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="ip" placeholder="1,500,000"/>
							<span class="money">원</span>
							<button class="detailBtn"><a data-code="income_f">상세입력</a></button>
						</div>
						<div class="after">
							
						</div>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<strong>G.과세표준 (E-F)</strong>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<span>H.세율</span>
						<i class="fa fa-plus-square"></i>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">%</span>
					</aside>
				</label>
			</div>
			<div class="column info hide animated speed">
				<strong>적용세율</strong><br>
				<table>
				<colgroup>
					<col width="200px"/>
					<col width="*"/>
				</colgroup>
				<thead>
					<tr>
						<th>과세표준</th>
						<th>세율</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1,200만원 이하</td>
						<td>6%</td>
					</tr>
					<tr>
						<td>1,200만원 초과 4,600만원 이하</td>
						<td>15%</td>
					</tr>
					<tr>
						<td>4,600만원 초과 8,800만원 이하</td>
						<td>24%</td>
					</tr>
					<tr>
						<td>8,800만원 초과 1억5천만원 이하</td>
						<td>35%</td>
					</tr>
					<tr>
						<td>1억5천만원 초과 3억원 이하</td>
						<td>38%</td>
					</tr>
					<tr>
						<td>3억원 초과 5억원 이하</td>
						<td>40%</td>
					</tr>
					<tr>
						<td>5억원 초과</td>
						<td>42%</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<strong>I.산출세액 (G*H)</strong>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row brdt">
			<div class="column">
				<label>
					<aside class="left">
						<span>J.공제감면세액</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>K.가산세</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>L.기납부세액 공제</span>
						<i class="fa fa-plus-square"></i>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
			<div class="column info hide animated speed">
				<p>
					중간예납세액, 원천징수세액
				</p>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>M.차감납부세액 (I-J+K-L)</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>N.지방소득세</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" numberonly data-io="ip" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<input type="hidden" name="calc_arr">
	</section>
	
	<div class="btnCenter">
		<button class="btnBlue resultBtn"><a data-code="income_rs"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;계산하기</a></button>
		<button class="btnGray resetBtn"><a><i class="fa fa-refresh"></i>&nbsp;&nbsp;재입력</a></button>
	</div>
	
</div>

<div class="detail-area view-area animated speed fadeInRight">
	<div class="detail-tit view-tit">
		<span class="arrow">
			<i class="fa fa-angle-double-down"></i>
		</span>
		&nbsp;<strong></strong>&nbsp;<span>상세입력창</span>
	</div>
	<section class="detail-content view-content income_b animated flipInX">
		<form action="" method="post">
			<div class="row"><div class="column">
				<label><aside class="left"><span>매입비용</span></aside>
				<aside class="right"><input type="text" name="income_b0" inputmode="numeric" pattern="[0-9]*" numberonly value="0"><span class="ip-inner">원</span></aside></label>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><span>임차료</span></aside>
				<aside class="right"><input type="text" name="income_b1" inputmode="numeric" pattern="[0-9]*" numberonly value="0"><span class="ip-inner">원</span></aside></label>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><span>인건비</span></aside>
				<aside class="right"><input type="text" name="income_b2" inputmode="numeric" pattern="[0-9]*" numberonly value="0"><span class="ip-inner">원</span></aside></label>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><span>기타경비</span></aside>
				<aside class="right"><input type="text" name="income_b3" inputmode="numeric" pattern="[0-9]*" numberonly value="0"><span class="ip-inner">원</span></aside></label>
			</div></div>
		</form>
	</section>
	<section class="detail-content view-content income_f animated flipInX">
		<form action="" method="post">
			<div class="row"><div class="column">
				<label><aside class="left"><span>기본공제(본인·부양가족)</span><i class="fa fa-plus-square"></i></aside>
				<aside class="right"><input type="text" name="income_f0" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="1,500,000"><span class="ip-inner">원</span>
					<label>&nbsp;<i class="fa fa-check-square" style="font-size:14px"></i><input style="display:none;" type="checkbox" data-io="ip" checked="checked" disabled="disabled" /><span>&nbsp;&nbsp;본인&nbsp;&nbsp;&nbsp;</span></label>
					<label><input type="checkbox" data-io="ip"/><span>배우자&nbsp;&nbsp;</span></label><br/>
					<label><input type="checkbox"/><span>직계존속&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label><br>
					<label><input type="checkbox"/><span>직계비속&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label>
				</aside></label>
			</div><div class="column info hide animated speed">
				<p>
					1) 직계존속 : 60세 이상<br>
					2) 직계비속 : 20세 이하 
				</p>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><span>추가공제</span><i class="fa fa-plus-square"></i></aside>
				<aside class="right"><input type="text" name="income_f1" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"><span class="ip-inner">원</span><br/>
					<label><input type="checkbox" data-io="ip"/><span>한부모</span></label><br>
					<label><input type="checkbox" data-io="ip"/><span>부녀자</span></label><br>
					<label><input type="checkbox"/><span>장애인&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label><br>
					<label><input type="checkbox"/><span>경로우대&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label><br>
					<label><input type="checkbox"/><span>자녀양육비&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label><br>
					<label><input type="checkbox"/><span>출산,입양&nbsp;&nbsp;</span>
						<input type="text" max="99" inputmode="numeric" pattern="[0-9]*" numberonly min="0" maxlength="2" data-io="ip" oninput="maxLengthCheck(this)" disabled="disabled" placeholder="0"/>&nbsp;명</label>
				</aside></label>
			</div><div class="column info hide animated speed">
				<p>
					1) 한부모 공제 : 배우자 없는 사람으로 공제대상 직계비속<br>
					2) 부녀자 공제 : 여성근로자 (부양가족이 있는 경우)<br>
					3) 장애인 공제 <br>
					4) 경로우대공제 : 70세 이상인 경우<br>
					5) 자녀양육비공제 : 6세 이하 자녀가 있는 경우<br>
					6) 출산,입양공제 : 출산 및 입양이 잇는 경우
				</p>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><span>다자녀 추가공제</span><i class="fa fa-plus-square"></i></aside>
				<aside class="right"><input type="text" name="income_f2" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"><span class="ip-inner">원</span></aside></label>
			</div><div class="column info hide animated speed">
				<p>
					* 기본공제대상 자녀 2인이상인 경우<br>
					1) 2인 : 1,000,000원<br>
					2) 3인 : 3,000,000원<br>
					3) 4인이상 : 5,000,000원
				</p>
			</div></div>
			<div class="row"><div class="column">
				<label><aside class="left"><strong>소득공제 총합</strong></aside>
				<aside class="right"><input type="text" name="income_f3" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="1,500,000"><span class="ip-inner">원</span></aside></label>
			</div></div>
		</form>
	</section>
	<div class="btnCenter">
		<button class="btnBlue inputBtn"><a><i class="fa fa-check"></i>&nbsp;&nbsp;입력(수정)</a></button>
		<button class="btnGray beforeBtn"><a><i class="fa fa-undo"></i>&nbsp;&nbsp;이전</a></button>
	</div>
</div>