
<div class="subContainer calculate animated speed" data-sort="gift">
	<div class="calc-tit">
		<span class="arrow">
			<i class="fa fa-angle-double-down"></i>
		</span>
		&nbsp;<strong>증여세</strong>&nbsp;<span>조건을 입력해주세요</span>
	</div>
	
	<section class="calc-sec">
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>A.증여재산가액</span>
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
						<span>B.기증여재산가액(10년내)</span>
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
						<span>C.채무부담액</span>
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
						<span>D.증여세 과세가액</span>
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
						<span>E.증여재산공제액</span>
					</aside>
					<aside class="right">
                        <div class="before">
							<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="ip" placeholder="600,000,000"/>
							<span class="money">원</span>
							<button class="detailBtn"><a data-code="gift_e" data-mode="write">상세입력</a></button>
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
						<strong>F.과세표준</strong>
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
						<span>G.적용세율</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">%</span>
					</aside>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<label>
					<aside class="left">
						<span>H.누진공제액</span>
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
						<strong>I.산출세액</strong>
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
						<span>J.기납부세액공제</span>
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
						<span>K.신고세액공제(5%)</span>
					</aside>
					<aside class="right">
						<input type="text" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="0"/>
						<span class="money">원</span>
					</aside>
				</label>
			</div>
		</div>
		<input type="hidden" name="calc_arr">
	</section>
	
	<div class="btnCenter">
		<button class="btnBlue resultBtn"><a data-code="gift_rs"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;계산하기</a></button>
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
	<section class="detail-content view-content gift_e animated flipInX">
		<form action="" method="post">
			<div class="row"><div class="column">
				<label><aside class="left"><span>증여재산 공제액</span><i class="fa fa-plus-square"></i></aside>
				<aside class="right"><input type="text" name="gift_e0" inputmode="numeric" pattern="[0-9]*" readonly numberonly data-io="op" placeholder="600,000,000"><span class="ip-inner">원</span>
					<label><input type="radio" checked="checked" name="gift_e1" value="600000000"/><span class="fullSpan">&nbsp;배우자&nbsp;&nbsp;&nbsp;</span></label><br/>
					<label><input type="radio" name="gift_e1" value="50000000"/><span class="fullSpan">&nbsp;직계존속</span>&nbsp;&nbsp;
						<input type="checkbox" id="giftChk" disabled="disabled"/><label for="giftChk">&nbsp;미성년자</label></label><br/>
					<label><input type="radio" name="gift_e1" value="50000000"/><span class="fullSpan">&nbsp;직계비속</span></label><br>
					<label><input type="radio" name="gift_e1" value="10000000"/><span class="fullSpan">&nbsp;기타친족</span></label>
				</aside></label>
			</div><div class="column info hide animated speed">
				<div>
					<strong>증여재산공제 (증여자와의 관계)</strong><br>
					<table>
					<colgroup>
						<col width="140px"/>
						<col width="*"/>
						<col width="90px"/>
					</colgroup>
					<thead>
						<tr>
							<th>증여자 선택</th>
							<th>공제</th>
							<th>비고</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>배우자</td>
							<td>600,000,000</td>
							<td>-</td>
						</tr>
						<tr>
							<td>직계존속(부모,조부모)</td>
							<td>50,000,000</td>
							<td>(미성년:2천만원)</td>
						</tr>
						<tr>
							<td>직계비속(자녀)</td>
							<td>50,000,000</td>
							<td>-</td>
						</tr>
						<tr>
							<td>기타친족</td>
							<td>10,000,000</td>
							<td>-</td>
						</tr>
					</tbody>
					</table>
				</div>
			</div></div>
		</form>
	</section>
	<div class="btnCenter">
		<button class="btnBlue inputBtn"><a><i class="fa fa-check"></i>&nbsp;&nbsp;입력(수정)</a></button>
		<button class="btnGray beforeBtn"><a><i class="fa fa-undo"></i>&nbsp;&nbsp;이전</a></button>
	</div>
</div>