{ #header }

<!-- Wrap -->
	<div class="wrap">

{ #subtop }


<?php
	$calc_form = explode("?", { NOW_DIR });
	
	switch($calc_form[1]){
		case 'gift_tax' : ?>{ #GIFT_TAX }<?php break;
		case 'income_tax' : ?>{ #INCOME_TAX }<?php break;
		default: 	break;
	}
	
?>

<div class="result-area view-area animated speed fadeInDown">
	<div class="result-tit view-tit">
		<span class="arrow">
			<i class="fa fa-angle-double-down"></i>
		</span>
		&nbsp;<strong></strong>&nbsp;<span>납부세액 결과</span>
	</div>
	<section class="result-content view-content animated flipInX">
		
	</section>
	<div class="btnCenter">
		<button class="btnBlue recalcBtn"><a><i class="fa fa-calculator"></i>&nbsp;&nbsp;재계산</a></button>
		<button class="btnGray beforeBtn"><a><i class="fa fa-undo"></i>&nbsp;&nbsp;수정</a></button>
		<button class="btnGray emphasis saveBtn"><a><i class="fa fa-save"></i>&nbsp;&nbsp;저장</a></button>
	</div>
	
	<div class="btnCenter linkCenter" style="width:100%;">
		<p style="margin:40px 0 16px;padding:10px;background:#fff;border-radius:4px;font-size:1.0rem;">
			더욱 자세한 사항은 세림세무법인에 상담신청하시면 <br>정성껏 답변드리겠습니다.
		</p>
		<button class="btnGray" style="width:100%;"><a href="{BASE_URL}/tax1"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;업무의뢰 상담예약</a></button>
	</div>
</div>


{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
