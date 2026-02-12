$(function(){
/* 	세목구분
	mt01 : 증여세
	mt02 : 양도세
	mt03 : 상속세
	mt04 : 종합소득세
	mt05 : 부가가치세(일반)
	mt06 : 부가가치세(간이)*/
	
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
	$ip16 = 0,		$ip17 = 0,		$ip18 = 0,		$ip19 = 0,		$ip20 = 0;
	$ip21 = 0,		$ip22 = 0,		$ip23 = 0,		$ip24 = 0,		$ip25 = 0;
	$ip26 = 0,		$ip27 = 0,		$ip28 = 0,		$ip29 = 0,		$ip30 = 0;
	$op01val = 0,	$op02val = 0,	$op03val = 0,	$op04val = 0,	$op05val = 0,	
	$op06val = 0,	$op07val = 0,	$op08val = 0,	$op09val = 0,	$op10val = 0,
	$op11val = 0,	$op12val = 0,	$op13val = 0,	$op14val = 0,	$op15val = 0;
	$op16val = 0,	$op17val = 0,	$op18val = 0,	$op19val = 0,	$op30val = 0;
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
	
	$(document).on("keyup", "input:text[numberOnly]", function() {
		$('input:text[numberOnly]').number(true);
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
			case "증여세"			: 	$mtSet = 'mt01'; 	break;
			case "양도세"			:	$mtSet = 'mt02';	break;
			case "상속세"			:	$mtSet = 'mt03';	break;
			case "종합소득세"		:	$mtSet = 'mt04';	break;
			case "부가가치세 (일반)"	:	$mtSet = 'mt05';	break;
			case "부가가치세 (간이)"	:	$mtSet = 'mt06';	break;
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
$op07val = ($op06val - $ip05) * (5/100);

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
$op07val = ($op04val * ($op05val / 100))- $op06val;
$('.'+mtTxt+' .op01').val($op01val);
$('.'+mtTxt+' .op02').val($op02val);
$('.'+mtTxt+' .op03').val($op03val);
$('.'+mtTxt+' .op04').val($op04val);
$('.'+mtTxt+' .op05').val($op05val);
$('.'+mtTxt+' .op06').val($op06val);
$('.'+mtTxt+' .op07').val($op06val);
			break;	/* 상속세 끝 */
			
			case 'mt04'	: 	/* 종합소득세 시작 */
$ip01 = $('.'+mtTxt+' .ip01').val() ? parseInt($('.'+mtTxt+' .ip01').val()) : 0 ;
$ip02 = $('.'+mtTxt+' .ip02').val() ? parseInt($('.'+mtTxt+' .ip02').val()) : 0 ;	
$ip03 = $('.'+mtTxt+' .ip03').val() ? parseInt($('.'+mtTxt+' .ip03').val()) : 0 ;
$ip04 = $('.'+mtTxt+' .ip04').val() ? parseInt($('.'+mtTxt+' .ip04').val()) : 0 ;
$ip05 = $('.'+mtTxt+' .ip05').val() ? parseInt($('.'+mtTxt+' .ip05').val()) : 0 ;
$ip06 = $('.'+mtTxt+' .ip06').val() ? parseInt($('.'+mtTxt+' .ip06').val()) : 0 ;
$ip07 = $('.'+mtTxt+' .ip07').val() ? parseInt($('.'+mtTxt+' .ip07').val()) : 0 ;
$ip08 = $('.'+mtTxt+' .ip08').val() ? parseInt($('.'+mtTxt+' .ip08').val()) : 0 ;
$ip09 = $('.'+mtTxt+' .ip09').val() ? parseInt($('.'+mtTxt+' .ip09').val()) : 0 ;		
$ip10 = $('.'+mtTxt+' .ip10').val() ? parseInt($('.'+mtTxt+' .ip10').val()) : 0 ;	
$ip11 = $('.'+mtTxt+' .ip11').val() ? parseInt($('.'+mtTxt+' .ip11').val()) : 0 ;
$ip12 = $('.'+mtTxt+' .ip12').val() ? parseInt($('.'+mtTxt+' .ip12').val()) : 0 ;
$ip13 = $('.'+mtTxt+' .ip13').val() ? parseInt($('.'+mtTxt+' .ip13').val()) : 0 ;
$ip14 = $('.'+mtTxt+' .ip14').val() ? parseInt($('.'+mtTxt+' .ip14').val()) : 0 ;		
$ip15 = $('.'+mtTxt+' .ip15').val() ? parseInt($('.'+mtTxt+' .ip15').val()) : 0 ;
$ip16 = $('.'+mtTxt+' .ip16').val() ? parseInt($('.'+mtTxt+' .ip16').val()) : 0 ;
$ip17 = $('.'+mtTxt+' .ip17').val() ? parseInt($('.'+mtTxt+' .ip17').val()) : 0 ;
$ip18 = $('.'+mtTxt+' .ip18').val() ? parseInt($('.'+mtTxt+' .ip18').val()) : 0 ;
$ip19 = $('.'+mtTxt+' .ip19').val() ? parseInt($('.'+mtTxt+' .ip19').val()) : 0 ;
$ip20 = $('.'+mtTxt+' .ip20').val() ? parseInt($('.'+mtTxt+' .ip20').val()) : 0 ;
$ip21 = $('.'+mtTxt+' .ip21').val() ? parseInt($('.'+mtTxt+' .ip21').val()) : 0 ;
$ip22 = $('.'+mtTxt+' .ip22').val() ? parseInt($('.'+mtTxt+' .ip22').val()) : 0 ;
$ip23 = $('.'+mtTxt+' .ip23').val() ? parseInt($('.'+mtTxt+' .ip23').val()) : 0 ;
$ip24 = $('.'+mtTxt+' .ip24').val() ? parseInt($('.'+mtTxt+' .ip24').val()) : 0 ;
$ip25 = $('.'+mtTxt+' .ip25').val() ? parseInt($('.'+mtTxt+' .ip25').val()) : 0 ;

$op01val = $ip01-$ip02;
$('.'+mtTxt+' .op01').val($op01val);
$op02val = $ip03+$ip04+$ip05+$ip06;
$('.'+mtTxt+' .op02').val($op02val);
$op03val = $op01val+$op02val;
$('.'+mtTxt+' .op03').val($op03val);

$ip07bool = $('.'+mtTxt+' input#se-ip07:checked').prop("checked");
if($ip07bool == true){$op05valOne = 1500000;}
else{$op05valOne = 0;}

$ip08bool = $('.'+mtTxt+' input#se-ip08:checked').prop("checked");
if($ip08bool == true){
	$('.'+mtTxt+' .ip08').attr("disabled",false);
	$('.'+mtTxt+' .ip15').attr("disabled",false);
	$op05valTwo = 1500000 * $ip08;
}else{
	$('.'+mtTxt+' .ip08').attr("disabled",true);
	$('.'+mtTxt+' .ip15').attr("disabled",true);
	$op05valTwo = 0;
}
$op05val = $op05valOne + $op05valTwo;
$('.'+mtTxt+' .op05').val($op05val);	

$ip09bool = $('.'+mtTxt+' input#se-ip09:checked').prop("checked");
if($ip09bool == true){$op06valOne = 1000000;}
else{$op06valOne = 0;}

$ip10bool = $('.'+mtTxt+' input#se-ip10:checked').prop("checked");
if($ip10bool == true){$op06valTwo = 500000;}
else{$op06valTwo = 0;}

$ip11bool = $('.'+mtTxt+' input#se-ip11:checked').prop("checked");
if($ip11bool == true){
	$('.'+mtTxt+' .ip11').attr("disabled",false);
	$op06valThr = 2000000 * $ip11;
}else{
	$('.'+mtTxt+' .ip11').attr("disabled",true);
	$op06valThr = 0;
}

$ip12bool = $('.'+mtTxt+' input#se-ip12:checked').prop("checked");
if($ip12bool == true){
	$('.'+mtTxt+' .ip12').attr("disabled",false);
	$op06valFour = 1000000 * $ip12;
}else{
	$('.'+mtTxt+' .ip12').attr("disabled",true);
	$op06valFour = 0;
}

$ip13bool = $('.'+mtTxt+' input#se-ip13:checked').prop("checked");
if($ip13bool == true){
	$('.'+mtTxt+' .ip13').attr("disabled",false);
	$op06valFive = 1000000 * $ip13;
}else{
	$('.'+mtTxt+' .ip13').attr("disabled",true);
	$op06valFive = 0;
}

$ip14bool = $('.'+mtTxt+' input#se-ip14:checked').prop("checked");
if($ip14bool == true){
	$('.'+mtTxt+' .ip14').attr("disabled",false);
	$op06valSix = 2000000 * $ip14;
}else{
	$('.'+mtTxt+' .ip14').attr("disabled",true);
	$op06valSix = 0;
}
$op06val = $op06valOne+$op06valTwo+$op06valThr+$op06valFour+$op06valFive+$op06valSix;
$('.'+mtTxt+' .op06').val($op06val);	

$op07val = 0;
if($ip08bool == true && $ip15 > $ip08){
	$('.'+mtTxt+' .ip15').val($ip08);
}else if($ip08bool == true && $ip15 <= $ip08){
	switch ($ip15){
		case 0 : 
		case 1 : $op07val = 0; break;
		case 2 : $op07val = 1000000; break;
		case 3 : $op07val = 3000000; break;
		default : $op07val = 5000000; break;
	}
}
$('.'+mtTxt+' .op07').val($op07val);	
$op08val = $ip16+$ip17;
$op09val = $ip18+$ip19;
$op10val = $op04val+$op05val+$op06val+$op07val+$op08val+$op09val;
$('.'+mtTxt+' .op10').val($op10val);

$op11val = ($op03val)-($op04val+$op05val+$op06val+$op07val+$op10val);
$('.'+mtTxt+' .op11').val($op11val);

if( $op11val == 0){
	$op12val = 0;
	$op13val = 0;
}else if( $op11val <= 12000000 && $op11val > 0){
	$op12val = 6;
	$op13val = 0;
}else if($op11val <= 46000000 && $op11val > 12000000){
	$op12val = 15;
	$op13val = 1080000;
}else if($op11val <= 88000000 && $op11val > 46000000){
	$op12val = 24;
	$op13val = 5220000;
}else if($op11val <= 150000000 && $op11val > 88000000){
	$op12val = 35;
	$op13val = 14900000;
}else if($op11val <= 300000000 && $op11val > 150000000){
	$op12val = 38;
	$op13val = 19400000;
}else if($op11val <= 500000000 && $op11val > 300000000){
	$op12val = 40;
	$op13val = 25400000;
}else if($op11val > 500000000){
	$op12val = 42;
	$op13val = 35400000;
}
$('.'+mtTxt+' .op12').val($op12val);
$('.'+mtTxt+' .op13').val($op13val);

$op14val = (($op11val*$op12val/100)-$op13val);	
$('.'+mtTxt+' .op14').val($op14val);

$op15val = $ip20-$ip21;	
$('.'+mtTxt+' .op15').val($op15val);

// $op01val = $ip01+$ip02+$ip03+$ip04+$ip05+$ip06+$ip07;
// $('.'+mtTxt+' .op01').val($op01val);
// 
// $op02val = $ip08+$ip09+$ip10;
// $('.'+mtTxt+' .op02').val($op02val);
// 
// $ip11bool = $('.'+mtTxt+' input#se-ip11:checked').prop("checked");
// if($ip11bool == true){$op04valOne = 1500000;}
// else{$op04valOne = 0;}
// 
// $ip12bool = $('.'+mtTxt+' input#se-ip12:checked').prop("checked");
// if($ip12bool == true){
	// $('.'+mtTxt+' .ip12').attr("disabled",false);
	// $('.'+mtTxt+' .ip19').attr("disabled",false);
	// $op04valTwo = 1500000 * $ip12;
// }else{
	// $('.'+mtTxt+' .ip12').attr("disabled",true);
	// $('.'+mtTxt+' .ip19').attr("disabled",true);
	// $op04valTwo = 0;
// }
// $op04val = $op04valOne + $op04valTwo;
// $('.'+mtTxt+' .op04').val($op04val);	
// 
// $ip13bool = $('.'+mtTxt+' input#se-ip13:checked').prop("checked");
// if($ip13bool == true){$op05valOne = 1000000;}
// else{$op05valOne = 0;}
// 
// $ip14bool = $('.'+mtTxt+' input#se-ip14:checked').prop("checked");
// if($ip14bool == true){$op05valTwo = 500000;}
// else{$op05valTwo = 0;}
// 
// $ip15bool = $('.'+mtTxt+' input#se-ip15:checked').prop("checked");
// if($ip15bool == true){
	// $('.'+mtTxt+' .ip15').attr("disabled",false);
	// $op05valThr = 2000000 * $ip15;
// }else{
	// $('.'+mtTxt+' .ip15').attr("disabled",true);
	// $op05valThr = 0;
// }
// 
// $ip16bool = $('.'+mtTxt+' input#se-ip16:checked').prop("checked");
// if($ip16bool == true){
	// $('.'+mtTxt+' .ip16').attr("disabled",false);
	// $op05valFour = 1000000 * $ip16;
// }else{
	// $('.'+mtTxt+' .ip16').attr("disabled",true);
	// $op05valFour = 0;
// }
// 
// $ip17bool = $('.'+mtTxt+' input#se-ip17:checked').prop("checked");
// if($ip17bool == true){
	// $('.'+mtTxt+' .ip17').attr("disabled",false);
	// $op05valFive = 1000000 * $ip17;
// }else{
	// $('.'+mtTxt+' .ip17').attr("disabled",true);
	// $op05valFive = 0;
// }
// 
// $ip18bool = $('.'+mtTxt+' input#se-ip18:checked').prop("checked");
// if($ip18bool == true){
	// $('.'+mtTxt+' .ip18').attr("disabled",false);
	// $op05valSix = 2000000 * $ip18;
// }else{
	// $('.'+mtTxt+' .ip18').attr("disabled",true);
	// $op05valSix = 0;
// }
// $op05val = $op05valOne+$op05valTwo+$op05valThr+$op05valFour+$op05valFive+$op05valSix;
// $('.'+mtTxt+' .op05').val($op05val);	
// 
// $op06val = 0;
// if($ip12bool == true && $ip19 > $ip12){
	// $('.'+mtTxt+' .ip19').val($ip12);
// }else if($ip12bool == true && $ip19 <= $ip12){
	// switch ($ip19){
		// case 0 : 
		// case 1 : $op06val = 0; break;
		// case 2 : $op06val = 1000000; break;
		// case 3 : $op06val = 3000000; break;
		// default : $op06val = 5000000; break;
	// }
// }
// $('.'+mtTxt+' .op06').val($op06val);	
// $op07val = $ip20+$ip21;
// $op08val = $ip22+$ip23;
// $op09val = $op03val+$op04val+$op05val+$op06val+$op07val+$op08val;
// $('.'+mtTxt+' .op09').val($op09val);
// $op10val = ($op01val-$op02val)-($op03val+$op04val+$op05val+$op06val+$op09val);
// $('.'+mtTxt+' .op10').val($op10val);
// 
// if( $op10val == 0){
	// $op11val = 0;
	// $op12val = 0;
// }else if( $op10val <= 12000000 && $op10val > 0){
	// $op11val = 6;
	// $op12val = 0;
// }else if($op10val <= 46000000 && $op10val > 12000000){
	// $op11val = 15;
	// $op12val = 1080000;
// }else if($op10val <= 88000000 && $op10val > 46000000){
	// $op11val = 24;
	// $op12val = 5220000;
// }else if($op10val <= 150000000 && $op10val > 88000000){
	// $op11val = 35;
	// $op12val = 14900000;
// }else if($op10val <= 300000000 && $op10val > 150000000){
	// $op11val = 38;
	// $op12val = 19400000;
// }else if($op10val <= 500000000 && $op10val > 300000000){
	// $op11val = 40;
	// $op12val = 25400000;
// }else if($op10val > 500000000){
	// $op11val = 42;
	// $op12val = 35400000;
// }
// $('.'+mtTxt+' .op11').val($op11val);
// $('.'+mtTxt+' .op12').val($op12val);
// 
// $op13val = (($op10val*$op11val/100)-$op12val);	
// $('.'+mtTxt+' .op13').val($op13val);
// 
// $op14val = $ip24-$ip25;	
// $('.'+mtTxt+' .op14').val($op14val);
			break;	/* 종소세 끝 */
			
			case 'mt05'	: 	/* 부가가치세(일반) 시작 */
$ip01 = $('.'+mtTxt+' .ip01').val() ? parseInt($('.'+mtTxt+' .ip01').val()) : 0 ;
$ip02 = $('.'+mtTxt+' .ip02').val() ? parseInt($('.'+mtTxt+' .ip02').val()) : 0 ;	
$ip03 = $('.'+mtTxt+' .ip03').val() ? parseInt($('.'+mtTxt+' .ip03').val()) : 0 ;
$ip04 = $('.'+mtTxt+' .ip04').val() ? parseInt($('.'+mtTxt+' .ip04').val()) : 0 ;
$ip05 = $('.'+mtTxt+' .ip05').val() ? parseInt($('.'+mtTxt+' .ip05').val()) : 0 ;
$ip06 = $('.'+mtTxt+' .ip06').val() ? parseInt($('.'+mtTxt+' .ip06').val()) : 0 ;
$ip07 = $('.'+mtTxt+' .ip07').val() ? parseInt($('.'+mtTxt+' .ip07').val()) : 0 ;
$ip08 = $('.'+mtTxt+' .ip08').val() ? parseInt($('.'+mtTxt+' .ip08').val()) : 0 ;	
$ip09 = $('.'+mtTxt+' .ip09').val() ? parseInt($('.'+mtTxt+' .ip09').val()) : 0 ;		
$ip10 = $('.'+mtTxt+' .ip10').val() ? parseInt($('.'+mtTxt+' .ip10').val()) : 0 ;
$ip11 = $('.'+mtTxt+' .ip11').val() ? parseInt($('.'+mtTxt+' .ip11').val()) : 0 ;		
$ip12 = $('.'+mtTxt+' .ip12').val() ? parseInt($('.'+mtTxt+' .ip12').val()) : 0 ;
$ip13 = $('.'+mtTxt+' .ip13').val() ? parseInt($('.'+mtTxt+' .ip13').val()) : 0 ;		
$ip14 = $('.'+mtTxt+' .ip14').val() ? parseInt($('.'+mtTxt+' .ip14').val()) : 0 ;		
$ip15 = $('.'+mtTxt+' .ip15').val() ? parseInt($('.'+mtTxt+' .ip15').val()) : 0 ;
$ip16 = $('.'+mtTxt+' .ip16').val() ? parseInt($('.'+mtTxt+' .ip16').val()) : 0 ;	
$ip17 = $('.'+mtTxt+' .ip17').val() ? parseInt($('.'+mtTxt+' .ip17').val()) : 0 ;
$ip18 = $('.'+mtTxt+' .ip18').val() ? parseInt($('.'+mtTxt+' .ip18').val()) : 0 ;
$ip19 = $('.'+mtTxt+' .ip19').val() ? parseInt($('.'+mtTxt+' .ip19').val()) : 0 ;
$ip20 = $('.'+mtTxt+' .ip20').val() ? parseInt($('.'+mtTxt+' .ip20').val()) : 0 ;
$ip21 = $('.'+mtTxt+' .ip21').val() ? parseInt($('.'+mtTxt+' .ip21').val()) : 0 ;
$ip22 = $('.'+mtTxt+' .ip22').val() ? parseInt($('.'+mtTxt+' .ip22').val()) : 0 ;

$op01val = ($ip01/10)+($ip02/10)+($ip03/10)+($ip04/10)+$ip07+$ip08;	
$('.'+mtTxt+' .op01').val($op01val);

$op02val = ($ip09-$ip10)+$ip11+$ip12+$ip13+$ip14;	
$('.'+mtTxt+' .op02').val($op02val);
		
$op03val = $op02val-$ip15;
$('.'+mtTxt+' .op03').val($op03val);

$op04val = $op01val-$op03val;
$('.'+mtTxt+' .op04').val($op04val);

$op05val = $ip16+$ip17;
$('.'+mtTxt+' .op05').val($op05val);

$op06val = $op05val+$ip18+$ip19+$ip20+$ip21-$ip22;
$('.'+mtTxt+' .op06').val($op06val);
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
				$resultVal = $op06val-$ip05-$op07val;	break;
			case '양도세':
				$resultVal = $op09val+$ip08+$ip09-$ip10;	break;
			case '상속세':
				$resultVal = $op06val-$ip06-$ip07-$ip08-$ip09;	break;
			case '종합소득세':
				$resultVal = $op14val;	break;
				break;
			case '부가가치세 (일반)':
				$resultVal = $op04val+$op06val;	break;
				break;
			case '부가가치세 (간이)':
				break;
			default :
			break;
		}
		if( $se_sort != '부가가치세 (간이)' && $se_sort != '부가가치세 (일반)' && $resultVal < 0 )	$resultVal = 0;
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
			case '종합소득세':
				$resultVal2 = Math.round($op15val);
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
			case '부가가치세 (일반)':
				if($resultVal < 0){
					$('#cst-se_result strong').text('예상 환급세액');
					$resultVal = String($resultVal);
					$resultVal = $resultVal.replace('-','');
				}else{
					$resultVal = String($resultVal);
					$('#cst-se_result strong').text('예상 납부세액');
				}
				$resultVal = comma($resultVal);
				$resultVal = $resultVal + ' 원 ';
				$resultArea.text($resultVal);
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
		$listBtn.removeClass('off');
		
		var offset = $("#cst-se_calc").offset();
		$('html, body').animate({scrollTop : (offset.top+200)}, 400);
	});
	
	function comma($val){		
		$commaVal = $val.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
		return $commaVal;
	}
	
	
});
// number max값 제한
function maxLengthCheck(object){
	if (object.value.length > object.maxLength){
		object.value = object.value.slice(0, object.maxLength);
	}    
}