	{ ? MENU_ORD_NO == '1' }
	<!-- subTop -->
	<div class="subTop company">
		<div class="text cont__taxfiling"><span>"세무상담, OnBiz Network 세무사들이</span><br>
			<span>도와드리겠습니다."</span><br>
			<span>믿고 맡겨주세요~</span>
		</div>
	</div>
	<!-- //subTop -->
	{ : MENU_ORD_NO == '2' }
	<!-- subTop -->
	<div class="subTop company">
		<div class="text cont__taxfiling"><span>"세금신고, OnBiz Network 세무사들이</span><br>
			<span>도와드리겠습니다."</span><br>
			<span>믿고 맡겨주세요~</span>
		</div>
	</div>
	<!-- //subTop -->
	{ : }
	<!-- subTop -->
	<div class="subTop company">
		{ ? CONTENTS['menu_idno'] == '302' }
		<div class="text cont__userBbs"><strong>Good Business Chance</strong><br>
			<span>Online상으로 새로운 업무의 창을 하나 더 개설하십시오.</span><br>
			<span>세무사님께 더 많은 기회가 될 것입니다!</span>
		</div>
		{ : }
			{ ? BOARD_KL_TYPE == 'qna' }
		<div class="text cont__userBbs qna_txt" style="line-height: 1.6;">세금에 관한 어떠한 궁금함도 "질문함"에 넣어주세요.<br>
			한페이지로 정리하여 Topic별로 "한페이지 세무정보"에서<br>
			확인할 수 있도록 하겠습니다.
		</div>
			{ : }
		<div class="text">
			세금에 관한 모든 궁금한 사항을<br>
			한페이지로 답 해드립니다.<br>
			세금, 세무정보는 한페이지!

		</div>
			{ / }
		{ / }
	</div>
	<!-- //subTop -->
	{ / }


{#dep2}
