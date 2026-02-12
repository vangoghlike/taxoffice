$(function(){
	
	$sortVal = '';
	$payVal = '';
	$payValAdd = '';
	$saleVal = '';
	$resultVal = '';
	$resultArea = $('#cst-se_result span');
	$resultDiv = $('#cst-se_result');
	$resultDivAdd = $('#cst-se_result p');
	$refreshBtn = $('#cst-se_ref');
	$setPayLb = '';
	
	function setPayLabel(){
		$sortVal = $('#se_sort').val();
		
		switch($sortVal){
			case 'tax_yd':
				$setPayLb = '양도가액';
				break;
			case 'tax_ss':
				$setPayLb = '상속재산가액';
				break;
			case 'tax_jy':
				$setPayLb = '증여재산가액';
				break;
			case 'tax_b1':
			case 'tax_b2':
				$setPayLb = '매출금액';
				break;
			default :
			break;
		}
		$('#cst-se_pay label').text($setPayLb);
	}
	setPayLabel();
	$('#se_sort').on('change', function(){
		setPayLabel();
	});
	
	$(document).on("keyup", "input:text[numberOnly]", function() {
		$(this).number(true);
	});

	$('#cst-se_calc').on('click', function(){
		$sortVal = $('#se_sort').val();
		$payVal = $('#se_pay').val();
		$saleVal = $('#se_sale').val();
		
		if($payVal < 100000){
			alert("10만원 이상의 금액을 입력해주세요");
			return false;
		}
		
		$resultDiv.addClass('on').removeClass('off');
		$refreshBtn.addClass('on').removeClass('off');
		
		switch($sortVal){
			case 'tax_yd':
				rateTwo();
				$payVal = $payVal / 2;	break;
			case 'tax_ss':
			case 'tax_jy':
				rateTwo();
				$payVal = $payVal;	break;
			case 'tax_b1':
				rateThr();
				$payVal = $payVal / 2;	break;
			case 'tax_b2':
				rateThr();
				$payVal = $payVal * (3/10); break;
			default :
			break;
		}
		$resultVal = Math.round($payVal - ( $payVal * ($saleVal/100)));
		$resultVal = String($resultVal);
		comma($resultVal);
		$resultVal = $resultVal + ' 원 (부가세 별도)';
		$resultArea.text($resultVal);
	
		var onTxt = function(){
			$resultDivAdd.fadeIn(1200);
		}
		setTimeout(onTxt, 400);
	});
	
	$refreshBtn.on('click', function(){
		$sortVal = $('#se_sort').val('tax_yd');
		$payVal = $('#se_pay').val('');
		$saleVal = $('#se_sale').val(0);
		
		$resultDiv.addClass('off').removeClass('on');
		$resultDivAdd.css({'display':'none'});
		$refreshBtn.addClass('off').removeClass('on');
		setPayLabel();
	});
	
	function comma($val){
		console.log('1. '+$val);
		$resultVal = $val.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
		console.log('2. '+$val);
		return $resultVal;
	}
	
	function rateTwo(){
		if( $payVal < 200000000){
			$payVal = 300000;
		}else if($payVal < 500000000 && $payVal >= 200000000){
			$payValAdd = $payVal - 200000000;
			$payVal = 300000 + ($payValAdd * (300/100000));
		}else if($payVal < 1000000000 && $payVal >= 500000000){
			$payValAdd = $payVal - 500000000;
			$payVal = 1200000 + ($payValAdd * (250/100000));
		}else if($payVal < 3000000000 && $payVal >= 1000000000){
			$payValAdd = $payVal - 100000000;
			$payVal = 2450000 + ($payValAdd * (200/100000));
		}else if($payVal < 5000000000 && $payVal >= 3000000000){
			$payValAdd = $payVal - 300000000;
			$payVal = 6450000 + ($payValAdd * (150/100000));
		}else if($payVal < 10000000000 && $payVal >= 5000000000){
			$payValAdd = $payVal - 5000000000;
			$payVal = 9450000 + ($payValAdd * (50/100000));
		}else if($payVal < 50000000000 && $payVal >= 10000000000){
			$payValAdd = $payVal - 10000000000;
			$payVal = 11250000 + ($payValAdd * (25/10000));
		}else if($payVal >= 50000000000){
			$payValAdd = $payVal - 50000000000;
			$payVal = 21950000 + ($payValAdd * (10/10000));
		}
	}		
	function rateThr(){
		if( $payVal < 100000000){
			$payVal = 350000;
		}else if($payVal < 500000000 && $payVal >= 100000000){
			$payValAdd = $payVal - 100000000;
			$payVal = 350000 + ($payValAdd * (140/100000));
		}else if($payVal < 1000000000 && $payVal >= 500000000){
			$payValAdd = $payVal - 500000000;
			$payVal = 910000 + ($payValAdd * (70/100000));
		}else if($payVal < 5000000000 && $payVal >= 1000000000){
			$payValAdd = $payVal - 100000000;
			$payVal = 1260000 + ($payValAdd * (50/100000));
		}else if($payVal < 10000000000 && $payVal >= 5000000000){
			$payValAdd = $payVal - 500000000;
			$payVal = 3260000 + ($payValAdd * (32/100000));
		}else if($payVal < 50000000000 && $payVal >= 10000000000){
			$payValAdd = $payVal - 10000000000;
			$payVal = 4860000 + ($payValAdd * (16/100000));
		}else if($payVal < 100000000000 && $payVal >= 50000000000){
			$payValAdd = $payVal - 100000000000;
			$payVal = 11260000 + ($payValAdd * (12/10000));
		}else if($payVal >= 100000000000){
			$payValAdd = $payVal - 100000000000;
			$payVal = 17260000 + ($payValAdd * (6/10000));
		}
	}

	
});
