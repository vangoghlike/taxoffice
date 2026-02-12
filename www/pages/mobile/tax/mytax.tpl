{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }
		<!-- 세목구분 (class) -->
		<!-- 	mt01 : 증여세
				mt02 : 양도세
				mt03 : 상속세
				mt04 : 종소세
				mt05 : 부가가치세 (일반)
				mt06 : 부가가치세 (간이)	-->

		<!-- subContainer -->
<?php
	$calc_form = explode("?", { NOW_DIR });
	
	switch($calc_form[1]){
		case 'mt01' : ?>{ #calc_form01 }<?php break;
		case 'mt02' : ?>{ #calc_form02 }<?php break;
		case 'mt03' : ?>{ #calc_form03 }<?php break;
		case 'mt04' : ?>{ #calc_form04 }<?php break;
		case 'mt05' : ?>{ #calc_form05 }<?php break;
		case 'mt06' : ?>{ #calc_form06 }<?php break;
		default: 	break;
	}
	
?>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
