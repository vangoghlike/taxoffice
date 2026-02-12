{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer" id="se_calc">
		
			<div id="cst-se_title">
				<label for="se_sort">의뢰 세목</label>
				<div>
					<select id="se_sort">
						<option value="tax_yd">양도세</option>
						<option value="tax_ss">상속세</option>
						<option value="tax_jy">증여세</option>
						<option value="tax_b1">부가가치세</option>
						<option value="tax_b2">부가가치세(간이)</option>
					</select>
				</div>
			</div>
			
			<div id="cst-se_pay">
				<label for="se_pay">금액 입력</label>
				<div>
					<input type="text" id="se_pay" numberOnly maxlength="16" placeholder="0"/>
					<span>원</span>
				</div>
			</div>
			
			<div id="cst-se_sale">
				<label for="se_sale">할인율</label>
				<div>
					<select id="se_sale">
						<option value="0">0%</option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
					</select>
				</div>
				<p>(상담시 협의된 할인율을 적용합니다.)</p>
			</div>
		
			<button id="cst-se_calc">업무보수 계산</button>
			
			<div id="cst-se_result" class="off">
				<strong>적용 보수</strong><span id="resVal"></span><br>
				<p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>
			</div>
			<button id="cst-se_ref" class="off">새로고침</button>
		
		
		
		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
