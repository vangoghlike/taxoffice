$(function(){
	/* 	세목구분
        mt01 : 증여세
        mt02 : 양도세
        mt03 : 상속세
        mt04 : 종부세
        mt05 : 부가가치세 */

	$mtSet = '';
	$sortVal = '';
	$payVal = '';
	$payValAdd = '';
	$saleVal = '';
	$resultVal = '';
	$resultVal2 = '';
	$resultVal3 = '';
	$resultArea = $('#cst-se_result span#resVal');
	$resultArea2 = $('#cst-se_result span#resVal2');
	$resultArea3 = $('#cst-se_result span#resVal3');
	$resultDiv = $('#cst-se_result');
	$resultDivAdd = $('#cst-se_result p');
	$listBtn = $('#cst-se_list');
	$setPayLb = '';
	$bwDate = '';

	$ip01 = 0,		$ip02 = 0,		$ip03 = 0,		$ip04 = 0,		$ip05 = 0,
		$ip06 = 0,		$ip07 = 0,		$ip08 = 0,		$ip09 = 0,		$ip10 = 0,
		$ip11 = 0,		$ip12 = 0,		$ip13 = 0,		$ip14 = 0,		$ip15 = 0;
	$op01val = 0,	$op02val = 0,	$op03val = 0,	$op04val = 0,	$op05val = 0,
		$op06val = 0,	$op07val = 0,	$op08val = 0,	$op09val = 0,	$op10val = 0,
		$op11val = 0,	$op12val = 0,	$op13val = 0,	$op14val = 0,	$op15val = 0;
	// 양도세 구분 변수
	$op02val_add = '';


	$('.myTax article').text($('.myTax .se_sort').val());

	$('.qt-mark').on('click', function(){
		if($(this).hasClass('poRel')){
			$(this).parent().parent().parent().find('section').slideToggle(150);
		}else{
			$(this).parent().parent().find('section').slideToggle(150);
		}
	});

	$se_sort = jQuery('#se_calc .se_sort').val();

	$(document).on("input", "input:text[numberOnly]", function() {
		var value = $(this).val();
		var regReg = /\d*/gi;
		var return_val = regReg.exec(value);
		//console.log(return_val);
		$(this).val(return_val[0]);
	});

	$(function() {
		$( "input[type=text].selim-date" ).datepicker({
			changeMonth: true, //  월 변경가능
			changeYear: true, //  년 변경가능
			dateFormat: "yy-mm-dd",
			maxDate: "0"

		});
	});

	$(document).on("change", "#se_calc input", function() {
		switch ($se_sort){
			case "증여세"	: 	$mtSet = 'mt01'; 	break;
			case "양도세"	:	$mtSet = 'mt02';	break;
			case "상속세"	:	$mtSet = 'mt03';	break;
		}
		mt_auto($mtSet);
	});

	$(document).on("click", "#selim-alert > div button", function() {
		$("#selim-alert").fadeOut(400);
		$('.mt02 .ip05').val($('.mt02 .ip06').val());
	});

	function mt_auto(mtTxt){
		switch(mtTxt){
			case 'mt01'	: /* 증여세 시작 */
				$ip01 = $('.'+mtTxt+' .ip01').val() ? parseInt($('.'+mtTxt+' .ip01').val()) : 0 ;
				$ip02 = $('.'+mtTxt+' .ip02').val() ? parseInt($('.'+mtTxt+' .ip02').val()) : 0 ;
				$ip03 = $('.'+mtTxt+' .ip03').val() ? parseInt($('.'+mtTxt+' .ip03').val()) : 0 ;
				$ip04 = $('.'+mtTxt+' input[name=ip04]:checked').val() ? parseInt($('.'+mtTxt+' input[name=ip04]:checked').val()) : 0 ;
				$ip04bool = $('.'+mtTxt+' input[name=ip04]#se-deduct02:checked').prop("checked");
				$ip04bool_add = $('.'+mtTxt+' input#se-deduct02-add:checked').prop("checked");
				if($ip04bool == true){
					$("#se-deduct02-add").attr("disabled",false);
				}else{
					$("#se-deduct02-add").attr("disabled",true);
				}
				if($ip04bool == true && $ip04bool_add == true){
					$ip04 = 20000000;
				}
				$ip05 = $('.'+mtTxt+' .ip05').val() ? parseInt($('.'+mtTxt+' .ip05').val()) : 0 ;

				$op01val = ($ip01+$ip02)-$ip03;
				$op02val = $op01val-$ip04;
				if($op02val < 0){
					$op02val = 0;
				}
				if( $op02val <= 100000000){
					$op03val = 10;
					$op04val = 0;
				}else if($op02val <= 500000000 && $op02val > 100000000){
					$op03val = 20;
					$op04val = 10000000;
				}else if($op02val <= 1000000000 && $op02val > 500000000){
					$op03val = 30;
					$op04val = 60000000;
				}else if($op02val <= 3000000000 && $op02val > 1000000000){
					$op03val = 40;
					$op04val = 160000000;
				}else if($op02val > 3000000000){
					$op03val = 50;
					$op04val = 460000000;
				}
				$op05val = ($op02val * ($op03val/100)) - $op04val;
				$op06bool_add = $('.'+mtTxt+' input#op06-add:checked').prop("checked");
				$op06val = $op06bool_add ? $op05val * 1.3 : $op05val;
				$op07val = ($op06val - $ip05) * (3/100);

				$('.'+mtTxt+' .op01').val($op01val);
				$('.'+mtTxt+' .op02').val($op02val);
				$('.'+mtTxt+' .op03').val($op03val);
				$('.'+mtTxt+' .op04').val($op04val);
				$('.'+mtTxt+' .op05').val($op05val);
				$('.'+mtTxt+' .op06').val($op06val);
				$('.'+mtTxt+' .op07').val($op07val);
				break;	/* 증여세 끝 */

			case 'mt02'	: 	/* 양도세 시작 */
				$ip01 = $('.'+mtTxt+' .ip01').val() ? parseInt($('.'+mtTxt+' .ip01').val()) : 0 ;
				$ip02 = $('.'+mtTxt+' .ip02').val() ? parseInt($('.'+mtTxt+' .ip02').val()) : 0 ;
				$ip03 = $('.'+mtTxt+' .ip03').val() ? parseInt($('.'+mtTxt+' .ip03').val()) : 0 ;
				$ip04 = $('.'+mtTxt+' input[name=ip04]:checked').val();
				$ip05 = $('.'+mtTxt+' .ip05').val() ? $('.'+mtTxt+' .ip05').val() : 0 ;
				// $ip05 = parseInt($ip05.replace(/\-/g,''));
				$ip05 = new Date($ip05);
				$ip06 = $('.'+mtTxt+' .ip06').val() ? $('.'+mtTxt+' .ip06').val() : 0 ;
				// $ip06 = parseInt($ip06.replace(/\-/g,''));
				$ip06 = new Date($ip06);
				console.log('$ip06 : '+$ip06);
				$ip07 = $('.'+mtTxt+' .ip07').val() ? parseInt($('.'+mtTxt+' .ip07').val()) : 0 ;

				$ip08 = $('.'+mtTxt+' .ip08').val() ? parseInt($('.'+mtTxt+' .ip08').val()) : 0 ;
				$ip09 = $('.'+mtTxt+' .ip09').val() ? parseInt($('.'+mtTxt+' .ip09').val()) : 0 ;
				$ip10 = $('.'+mtTxt+' .ip10').val() ? parseInt($('.'+mtTxt+' .ip10').val()) : 0 ;

				$op01val = ($ip01-$ip02)-$ip03;
				$bwDate = ($ip05.getTime() - $ip06.getTime()) / (1000*60*60*24);
				$bwDate = $bwDate / 365.25;
				console.log('$bwDate : '+$bwDate);
				if($bwDate < 0){
					$("#selim-alert").show();
				}
				$op02val_add = 0;
				if($ip04 == 0){
					if($bwDate < 3)							{$op02val_add = 0;}
					else if($bwDate < 4 && $bwDate >= 3)	{$op02val_add = 10;}
					else if($bwDate < 5 && $bwDate >= 4)	{$op02val_add = 12;}
					else if($bwDate < 6 && $bwDate >= 5)	{$op02val_add = 15;}
					else if($bwDate < 7 && $bwDate >= 6)	{$op02val_add = 18;}
					else if($bwDate < 8 && $bwDate >= 7)	{$op02val_add = 21;}
					else if($bwDate < 9 && $bwDate >= 8)	{$op02val_add = 24;}
					else if($bwDate < 10 && $bwDate >= 9)	{$op02val_add = 27;}
					else if($bwDate >= 10)					{$op02val_add = 30;}
				}else if($ip04 == 1){
					if($bwDate < 3)							{$op02val_add = 0;}
					else if($bwDate < 4 && $bwDate >= 3)	{$op02val_add = 24;}
					else if($bwDate < 5 && $bwDate >= 4)	{$op02val_add = 32;}
					else if($bwDate < 6 && $bwDate >= 5)	{$op02val_add = 40;}
					else if($bwDate < 7 && $bwDate >= 6)	{$op02val_add = 48;}
					else if($bwDate < 8 && $bwDate >= 7)	{$op02val_add = 56;}
					else if($bwDate < 9 && $bwDate >= 8)	{$op02val_add = 64;}
					else if($bwDate < 10 && $bwDate >= 9)	{$op02val_add = 72;}
					else if($bwDate >= 10)					{$op02val_add = 80;}
				}
				$op02val = $op01val * ($op02val_add / 100);
				console.log('bw : '+$bwDate);
				console.log('$op02val_add : '+$op02val_add);
				console.log('$op02val : '+$op02val);
				$op03val = $op01val-$op02val;
				$op04val = 2500000 ;
				$op05val = $op03val-$op04val;
				$op06val = $op05val;
				if( $op06val <= 12000000){
					$op06val = 6;
					$op07val = 0;
				}else if($op06val <= 46000000 && $op06val > 12000000){
					$op06val = 15;
					$op07val = 720000;
				}else if($op06val <= 88000000 && $op06val > 46000000){
					$op06val = 24;
					$op07val = 5820000;
				}else if($op06val <= 150000000 && $op06val > 88000000){
					$op06val = 35;
					$op07val = 15900000;
				}else if($op06val <= 500000000 && $op06val > 150000000){
					$op06val = 38;
					$op07val = 37600000;
				}else if($op06val > 500000000){
					$op06val = 40;
					$op07val = 170600000;
				}
				$op08val = ($op05val*($op06val/100))-$op07val;
				$op09val = $op08val-$ip07;

				$('.'+mtTxt+' .op01').val($op01val);
				$('.'+mtTxt+' .op02').val($op02val);
				$('.'+mtTxt+' .op03').val($op03val);
				$('.'+mtTxt+' .op04').val($op04val);
				$('.'+mtTxt+' .op05').val($op05val);
				$('.'+mtTxt+' .op06').val($op06val);
				$('.'+mtTxt+' .op07').val($op07val);
				$('.'+mtTxt+' .op08').val($op08val);
				$('.'+mtTxt+' .op09').val($op09val);
				break;	/* 양도세 끝 */

			case 'mt03'	: 	/* 상속세 시작 */
				$ip01 = $('.'+mtTxt+' .ip01').val() ? parseInt($('.'+mtTxt+' .ip01').val()) : 0 ;
				$ip02 = $('.'+mtTxt+' .ip02').val() ? parseInt($('.'+mtTxt+' .ip02').val()) : 0 ;
				$ip03 = $('.'+mtTxt+' .ip03').val() ? parseInt($('.'+mtTxt+' .ip03').val()) : 0 ;
				$ip04 = $('.'+mtTxt+' .ip04').val() ? parseInt($('.'+mtTxt+' .ip04').val()) : 0 ;
				$ip05 = $('.'+mtTxt+' .ip05').val() ? parseInt($('.'+mtTxt+' .ip05').val()) : 0 ;
				$ip06 = $('.'+mtTxt+' .ip06').val() ? parseInt($('.'+mtTxt+' .ip06').val()) : 0 ;
				$ip07 = $('.'+mtTxt+' .ip07').val() ? parseInt($('.'+mtTxt+' .ip07').val()) : 0 ;
				$ip08 = $('.'+mtTxt+' .ip08').val() ? parseInt($('.'+mtTxt+' .ip08').val()) : 0 ;
				$ip09 = $('.'+mtTxt+' .ip09').val() ? parseInt($('.'+mtTxt+' .ip09').val()) : 0 ;

				$op01val = ($ip01+$ip02)-$ip03-$ip04;
				$op02val = 500000000;
				$op03val = $ip05;
				if($op03val <= 20000000){
					$op03val = $op03val;
				}else if($op03val <= 100000000 && $op03val > 20000000){
					$op03val = 20000000;
				}else if($op03val > 100000000){
					if(($op03val*0.2) > 200000000){
						$op03val = 200000000;
					}else{
						$op03val = $op03val*0.2;
					}
				}
				$op04val = ($op01val-$op02val)-$ip05;
				$op05val = $op04val;
				if( $op05val <= 100000000){
					$op05val = 10;
					$op06val = 0;
				}else if($op05val <= 500000000 && $op05val > 100000000){
					$op05val = 20;
					$op06val = 10000000;
				}else if($op05val <= 1000000000 && $op05val > 500000000){
					$op05val = 30;
					$op06val = 60000000;
				}else if($op05val <= 3000000000 && $op05val > 1000000000){
					$op05val = 40;
					$op06val = 160000000;
				}else if($op05val > 3000000000){
					$op05val = 50;
					$op06val = 460000000;
				}
				$op07val = ($op04val * ($op05val / 100)) - $op06val;

				$ip07bool_add = $('.'+mtTxt+' input#ip07-add:checked').prop("checked");
				$ip07val = $ip07bool_add ? $op07val * 0.03 : 0;

				$('.'+mtTxt+' .op01').val($op01val);
				$('.'+mtTxt+' .op02').val($op02val);
				$('.'+mtTxt+' .op03').val($op03val);
				$('.'+mtTxt+' .op04').val($op04val);
				$('.'+mtTxt+' .op05').val($op05val);
				$('.'+mtTxt+' .op06').val($op06val);
				$('.'+mtTxt+' .op07').val($op07val);
				$('.'+mtTxt+' .ip07').val($ip07val);
				break;	/* 상속세 끝 */

			case 'mt04'	: 	/* 종소세 시작 */
				break;	/* 종소세 끝 */

			case 'mt05'	: 	/* 부가가치세(일반) 시작 */
				break;	/* 부가가치세(일반) 끝 */

			case 'mt06'	: 	/* 부가가치세(간이) 시작 */
				break;	/* 부가가치세(간이) 끝 */
		}
	}

	$('#cst-se_calc').on('click', function(){
		$se_sort = jQuery('#se_calc .se_sort').val();
		$resultDiv.addClass('on').removeClass('off');
		switch($se_sort){
			case '증여세':
				$resultVal = $op06val-$ip05-$op07val;
				break;
			case '양도세':
				$resultVal = $op09val+$ip08+$ip09-$ip10;
				console.log($resultVal);
				break;
			case '상속세':
				$resultVal = $op07val-$ip06-$ip07-$ip08-$ip09;
				console.log($op07val + "/" +$ip06+ "/" +$ip07+ "/" +$ip08+ "/" +$ip09 + "/" + $resultVal);
				break;
			case '종소세':
				break;
			case '부가가치세(일반)':
				break;
			case '부가가치세(간이)':
				break;
			default :
				break;
		}
		if( $resultVal < 0 ){
			$resultVal = 0;
			console.log("free");
		}
		$resultVal = Math.round($resultVal);
		switch($se_sort){
			case '양도세':
				$resultVal2 = Math.round($resultVal / 10);
				$resultVal3 = $resultVal+$resultVal2;
				$resultVal = String($resultVal);
				$resultVal2 = String($resultVal2);
				$resultVal3 = String($resultVal3);
				$resultVal = comma($resultVal);
				$resultVal2 = comma($resultVal2);
				$resultVal3 = comma($resultVal3);
				$resultVal = $resultVal + ' 원 ';
				$resultVal2 = $resultVal2 + ' 원 ';
				$resultVal3 = $resultVal3 + ' 원 ';
				$resultArea.text($resultVal);
				$resultArea2.text($resultVal2);
				$resultArea3.text($resultVal3);
				break;
			default :
				$resultVal = String($resultVal);
				$resultVal = comma($resultVal);
				$resultVal = $resultVal + ' 원 ';
				$resultArea.text($resultVal);
				break;
		}
		var onTxt = function(){
			$resultDivAdd.fadeIn(1200);
		}
		setTimeout(onTxt, 400);
		// $listBtn.removeClass('off');

		var offset = $("#cst-se_calc").offset();
		$('html, body').animate({scrollTop : (offset.top+200)}, 400);
	});

	function comma($val){
		$commaVal = $val.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
		return $commaVal;
	}

	// function addCommas(x){
	// 	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");
	// }
	//
	// $("input:text[numberOnly]").on("keyup",function(){
	// 	$(this).val(addCommas($(this).val().replace(/[^0-9]/g,"")));
	// });
});
