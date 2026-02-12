<div class="subContainer myTax mt06" id="se_calc">
	<input class="se_sort" type="hidden" value="부가가치세 (간이)"/>
	<article><!-- script --></article>
	
	<div class="cst-se_cate"><span>과세표준 및 매출세액</span></div>
	<div>
		<label>세금계산서 발급분</label>
		<div>
			<input type="text" class="ip01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<input type="radio" id="se-deduct01" name="ip01" value="600000000" checked/><label for="se-deduct01">&nbsp;전기·가스·증기 및 수도사업</label><br>
			<input type="radio" id="se-deduct02" name="ip01" value="50000000"/><label for="se-deduct02">&nbsp;소매업,판매업,음식점업</label><br>
			<input type="radio" id="se-deduct03" name="ip01" value="50000000"/><label for="se-deduct03">&nbsp;제조,농·임·어업,숙박·운수·통신</label><br>
			<input type="radio" id="se-deduct04" name="ip01" value="10000000"/><label for="se-deduct04">&nbsp;건설,부동산임대,그밖 서비스업</label><br>
		</div>
	</div>
	<div>
		<label>영세율적용분</label>
		<div>
			<input type="text" class="ip02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>공제세액</span></div>
	<div>
		<label>매입세금계산서,수취세액</label>
		<div>
			<input type="text" class="op01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>의제매입세액공제</label>
		<div>
			<input type="text" class="op02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>매입자발행세금계산서</label>
		<div>
			<input type="text" class="op03" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>전자신고세액공제</label>
		<div>
			<input type="text" class="op04" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>신용카드매출전표 등</label>
		<div>
			<input type="text" class="op05" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>기타</label>
		<div>
			<input type="text" class="op06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>기납부세액</span></div>
	<div>
		<label>납부특례 기납부세액</label>
		<div>
			<input type="text" class="op07" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>가산세액</span></div>
	<div>
		<label>미등록 및 허위등록 가산세</label>
		<div>
			<input type="text" class="op01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>무신고(일반)</label>
		<div>
			<input type="text" class="op02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>무신고(부당)</label>
		<div>
			<input type="text" class="op03" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>과소신고(일반)</label>
		<div>
			<input type="text" class="op04" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>과소신고(부당)</label>
		<div>
			<input type="text" class="op05" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>납부불성실가산세</label>
		<div>
			<input type="text" class="op06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>매입세액 공제 가산세</label>
		<div>
			<input type="text" class="op06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label class="ltm1">영세율 과세표준 신고 불성실</label>
		<div>
			<input type="text" class="op06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	
	<!--
	<div class="cst-se_cate"><span>경감·공제새액</span></div>
	<div>
		<label>그밖 경감·공제세액</label>
		<div>
			<input type="text" class="op08" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>신용카드매출전표 등</label>
		<div>
			<input type="text" class="op09" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>그 외 세액</span></div>
	<div>
		<label>예정신고미환급세액</label>
		<div>
			<input type="text" class="op10" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>예정고지세액</label>
		<div>
			<input type="text" class="op11" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>대리납부 기납부세액</label>
		<div>
			<input type="text" class="op12" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>납부특혜기납부세액</label>
		<div>
			<input type="text" class="op13" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>가산세액계</label>
		<div>
			<input type="text" class="ip09" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div> -->

	<button id="cst-se_calc"><span></span> 계산</button>
	
	<div id="cst-se_result" class="off">
		<strong>예상 납부 세액</strong><span id="resVal"></span><br>
		<p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>
	</div>
	<button id="cst-se_list" class="off"><a href="{BASE_URL}/calclist">세액 계산 목록</a></button>



</div>