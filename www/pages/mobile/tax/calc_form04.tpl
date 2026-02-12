<div class="subContainer myTax mt04" id="se_calc">
	<input class="se_sort" type="hidden" value="종합소득세"/>
	<article><!-- script --></article>
	
	<div class="cst-se_cate"><span>종합소득금액</span></div>
	<div>
		<label>A.사업소득 수익금액</label>
		<div>
			<input type="text" class="ip01" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label>B.필요경비</label>
		<div>
			<input type="text" class="ip02" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="bdgray">
		<label><strong>C.소득금액 (A-B)</strong></label>
		<div>
			<input type="text" class="op01" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="bdgray">
		<label><strong>D.타소득합산</strong></label>
		<div>
			<input type="text" class="op02" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>┗&nbsp;&nbsp;타 사업소득</label>
		<div>
			<input type="text" class="ip03" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>┗&nbsp;&nbsp;금융소득(이자,배당)</label>
		<div>
			<input type="text" class="ip04" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>┗&nbsp;&nbsp;근로소득</label>
		<div>
			<input type="text" class="ip05" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label>┗&nbsp;&nbsp;기타소득</label>
		<div>
			<input type="text" class="ip06" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label><strong>E.소득금액 합계 (C+D)</strong></label>
		<div>
			<input type="text" class="op03" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>종합소득공제 항목</span></div>
	<div>
		<label>기본공제(본인)</label>
		<div>
			<input type="text" class="op04" readonly numberOnly maxlength="16" placeholder="0" value="1,500,000"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label class="ltm1">기본공제(배우자·부양가족)</label>
		<div>
			<input type="text" class="op05" readonly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<input type="checkbox" class="ip07" id="se-ip07"/><label for="se-ip07">배우자</label><br>
			<label for="se-ip08"><input type="checkbox" id="se-ip08"/>부양가족&nbsp;&nbsp;
				<input type="number" class="ip08" name="ip08" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명&nbsp;
			(자녀)&nbsp;<input type="number" class="ip15" name="ip15" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명</label>
		</div>
	</div>
	<div class="bdgray">
		<label>추가공제</label>
		<div>
			<input type="text" class="op06" readonly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
			<input type="checkbox" id="se-ip09" class="ip09" name="ip09"/><label for="se-ip09">한부모</label><br>
			<input type="checkbox" id="se-ip10" class="ip10" name="ip10"/><label for="se-ip10">부녀자</label><br>
			<label for="se-ip11"><input type="checkbox" id="se-ip11"/>장애인&nbsp;&nbsp;
				<input type="number" class="ip11" name="ip11" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명</label><br>
			<label for="se-ip12"><input type="checkbox" id="se-ip12"/>경로우대&nbsp;&nbsp;
				<input type="number" class="ip12" name="ip12" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명</label><br>
			<label for="se-ip13"><input type="checkbox" id="se-ip13"/>자녀양육비&nbsp;&nbsp;
				<input type="number" class="ip13" name="ip13" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명</label><br>
			<label for="se-ip14"><input type="checkbox" id="se-ip14"/>출산,입양&nbsp;&nbsp;
				<input type="number" class="ip14" name="ip14" max="99" min="0" maxlength="2" oninput="maxLengthCheck(this)" disabled="disabled" value="1"/>&nbsp;명</label><br>
		</div>
	</div>
	<div class="bdgray">
		<label>다자녀 추가공제</label>
		<div>
			<input type="text" class="op07" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>국민연금보험 공제액</label>
		<div>
			<input type="text" class="ip16" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label>기타 보험료 공제액</label>
		<div>
			<input type="text" class="ip17" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label class="ltm1">소기업 상공인 공제부금 공제</label>
		<div>
			<input type="text" class="ip18" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label>기타 공제액</label>
		<div>
			<input type="text" class="ip19" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label><strong>F.소득공제 총액</strong></label>
		<div>
			<input type="text" class="op10" readOnly numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
		
	<div class="cst-se_cate"><span>과세표준</span></div>
	<div class="bdgray">
		<label>과세표준</label>
		<div>
			<input type="text" class="op11" numberOnly readOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label>누진공제액</label>
		<div>
			<input type="text" class="op13" numberOnly readOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div class="bdgray">
		<label><strong>세율</strong></label>
		<div>
			<input type="text" class="op12" numberOnly readOnly maxlength="16" placeholder="0"/>
			<span>%</span>
		</div>
	</div>
	<div>
		<label><strong>결정세액</strong></label>
		<div>
			<input type="text" class="op14" numberOnly readOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<div class="cst-se_cate"><span>가산세 및 기납부세액</span></div>
	<div>
		<label>가산세 (+)</label>
		<div>
			<input type="text" class="ip20" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	<div>
		<label>기납부세액 (-)</label>
		<div>
			<input type="text" class="ip21" numberOnly maxlength="16" placeholder="0"/>
			<span>원</span>
		</div>
	</div>
	
	<button id="cst-se_calc"><span></span> 계산</button>
	
	<div id="cst-se_result" class="off">
		<strong>결정 세액</strong><span id="resVal"></span><br>
		<strong>차감 세액</strong><span id="resVal2"></span><br>
		<strong>예상 납부 세액</strong><span id="resVal3"></span>&nbsp;&nbsp;&nbsp;<i style="color:#666;text-decoration:underline;">(결정세액+차감세액)</i><br> 
		<p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>	
	</div>
	<button id="cst-se_list" class="off"><a href="{BASE_URL}/calclist">세액 계산 목록</a></button>



</div>