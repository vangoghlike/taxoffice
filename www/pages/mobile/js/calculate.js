$(function(){
	// 상수값 설정
	const HIDE_AREA = 0;
	const SHOW_AREA = 1;
	const DETAIL_BTN_TXT = 'detailBtn';
	const RESULT_BTN_TXT = 'resultBtn';
	const RECALC_BTN_TXT = 'recalcBtn';
	const RESET_BTN_TXT = 'resetBtn';
	const BEFORE_BTN_TXT = 'beforeBtn'
	const INPUT_BTN_TXT = 'inputBtn'
	const SAVE_BTN_TXT = 'saveBtn'
	const CALC_LIST_URL = '/m/calclist';
	
	const BACK_BTN = jQuery('.btnBack');
	const INFO_BTN = jQuery('aside.left i');
	const CALCULATE_AREA = jQuery('.subContainer.calculate');
	const DETAIL_AREA = jQuery('.detail-area.view-area');
	const DETAIL_CONTENT = jQuery('.detail-area.view-area .detail-content');
	const DETAIL_TITLE = jQuery('.detail-area.view-area .detail-tit strong');
	const RESULT_AREA = jQuery('.result-area.view-area');
	const RESULT_CONTENT = jQuery('.result-area.view-area .result-content');
	const RESULT_TITLE = jQuery('.result-area.view-area .result-tit strong');
	const HIDDEN_FIELD = jQuery('.subContainer.calculate input:hidden');
	const INPUT_FIELD = jQuery('.subContainer.calculate input:text[numberonly]');
	const IP_FIELD = jQuery('.subContainer.calculate input:text[numberonly][data-io=ip]');
	const OP_FIELD = jQuery('.subContainer.calculate input:text[numberonly][data-io=op]');
	
	// 변수 설정
	let onoff = HIDE_AREA;
	let infoColumn = null;
	let c_feature = null;
	let c_feature_arr = new Array();
	let c_code = null;
	let c_id = null;
	let c_sort = null;
	let c_title = null;
	let c_result = null;
	let mode = null;
	let c_input = null;
	let calc_arr = new Array();
	let dt_ip_field = null;
	let dt_op_field = null;
    let dt_chk_field = null;
    let dt_radio_field = null;
	let dt_ip_val = new Array();
	let c_tax = null;

	// 상단바 뒤로가기 설정
	BACK_BTN.children('a').attr('href','javascript:history.pushState(null,null,\''+CALC_LIST_URL+'\')');
	BACK_BTN.children('a').on('click',function(){
		window.location.href = CALC_LIST_URL;
	});
	
	// 참고사항 버튼 설정
	INFO_BTN.on('click', function(){
		infoColumn = $(this).parents('.column').siblings('.column.info');
		infoColumn.slideToggle('fast');
		
		if(infoColumn.hasClass('hide')){
			infoColumn.removeClass('hide').addClass('show');
		}else if(infoColumn.hasClass('show')){
			infoColumn.removeClass('show').addClass('hide');
		}
	});
	
	// input 콤마(,) 표시
	$(document).on('keyup', 'input:text[numberonly]', function() {
		$('input:text[numberonly]').number(true);
	});
	
	// input value hidden(calc_arr)에 저장
	$(document).on("change", ".subContainer.calculate input:text[numberonly]", function() {
		if(c_sort == null)
			c_sort = (c_sort == null ? CALCULATE_AREA.attr('data-sort') : c_sort);
		
		calc_auto();
		save_calc_data();
	});
	
	// input value 변환 함수
	let calc_auto = () => {
		switch(c_sort){		
			case 'income' :
				// C.소득금액
				IP_FIELD.eq(1).val( IP_FIELD.eq(1).val() != '' ? IP_FIELD.eq(1).val() : 0 );
				OP_FIELD.eq(0).val( parseInt(IP_FIELD.eq(0).val()) - parseInt(IP_FIELD.eq(1).val()) );
				// D.타소득합산		
				IP_FIELD.eq(2).val( IP_FIELD.eq(2).val() != '' ? IP_FIELD.eq(2).val() : 0 );
				IP_FIELD.eq(3).val( IP_FIELD.eq(3).val() != '' ? IP_FIELD.eq(3).val() : 0 );
				IP_FIELD.eq(4).val( IP_FIELD.eq(4).val() != '' ? IP_FIELD.eq(4).val() : 0 );
				IP_FIELD.eq(5).val( IP_FIELD.eq(5).val() != '' ? IP_FIELD.eq(5).val() : 0 );
				OP_FIELD.eq(1).val( parseInt(IP_FIELD.eq(2).val()) + (IP_FIELD.eq(3).val() >= 20000000 ? parseInt(IP_FIELD.eq(3).val()) : 0) + parseInt(IP_FIELD.eq(4).val()) + (IP_FIELD.eq(5).val() >= 3000000 ? parseInt(IP_FIELD.eq(5).val()) : 0) );
				// E.소득금액합계	
				OP_FIELD.eq(2).val( parseInt(OP_FIELD.eq(0).val()) + parseInt(OP_FIELD.eq(1).val()) );
				// G.과세표준
				IP_FIELD.eq(6).val( IP_FIELD.eq(6).val() != '' ? IP_FIELD.eq(6).val() : 1500000 );
				OP_FIELD.eq(3).val( parseInt(OP_FIELD.eq(2).val()) - parseInt(IP_FIELD.eq(6).val()) );
				// H.세율
				if( OP_FIELD.eq(3).val() == 0){
					OP_FIELD.eq(4).val(0);
				}else if( OP_FIELD.eq(3).val() <= 12000000 && OP_FIELD.eq(3).val() > 0 ){
					OP_FIELD.eq(4).val(6);
				}else if( OP_FIELD.eq(3).val() <= 46000000 && OP_FIELD.eq(3).val() > 12000000 ){
					OP_FIELD.eq(4).val(15);
				}else if( OP_FIELD.eq(3).val() <= 88000000 && OP_FIELD.eq(3).val() > 46000000 ){
					OP_FIELD.eq(4).val(24);
				}else if( OP_FIELD.eq(3).val() <= 150000000 && OP_FIELD.eq(3).val() > 88000000 ){
					OP_FIELD.eq(4).val(35);
				}else if( OP_FIELD.eq(3).val() <= 300000000 && OP_FIELD.eq(3).val() > 150000000 ){
					OP_FIELD.eq(4).val(38);
				}else if( OP_FIELD.eq(3).val() <= 500000000 && OP_FIELD.eq(3).val() > 300000000 ){
					OP_FIELD.eq(4).val(40);
				}else if( OP_FIELD.eq(3).val() > 500000000 ){
					OP_FIELD.eq(4).val(42);
				}
				// I.산출세액
				OP_FIELD.eq(5).val( parseInt(OP_FIELD.eq(3).val()) * ( parseInt(OP_FIELD.eq(4).val()) * 0.01 ) );
				// M.차감납부세액
				IP_FIELD.eq(7).val( IP_FIELD.eq(6).val() != '' ? IP_FIELD.eq(7).val() : 0 );
				IP_FIELD.eq(8).val( IP_FIELD.eq(6).val() != '' ? IP_FIELD.eq(8).val() : 0 );
				IP_FIELD.eq(9).val( IP_FIELD.eq(6).val() != '' ? IP_FIELD.eq(9).val() : 0 );
				OP_FIELD.eq(6).val( parseInt(OP_FIELD.eq(5).val()) - parseInt(IP_FIELD.eq(7).val()) + parseInt(IP_FIELD.eq(8).val()) - parseInt(IP_FIELD.eq(9).val()) );
				
				IP_FIELD.eq(10).val( IP_FIELD.eq(10).val() != '' ? IP_FIELD.eq(10).val() : 0 );
			break;
			case 'gift' :
				// D.증여세 과세가액
				IP_FIELD.eq(0).val( IP_FIELD.eq(0).val() != '' ? IP_FIELD.eq(0).val() : 0 );
				IP_FIELD.eq(1).val( IP_FIELD.eq(1).val() != '' ? IP_FIELD.eq(1).val() : 0 );
				IP_FIELD.eq(2).val( IP_FIELD.eq(2).val() != '' ? IP_FIELD.eq(2).val() : 0 );
				OP_FIELD.eq(0).val( parseInt(IP_FIELD.eq(0).val()) + parseInt(IP_FIELD.eq(1).val()) -  parseInt(IP_FIELD.eq(2).val()) );
				// E.증여재산공제액
				IP_FIELD.eq(3).val( IP_FIELD.eq(3).val() != '' ? IP_FIELD.eq(3).val() : 600000000 );
				// F.과세표준
				( ( parseInt(OP_FIELD.eq(0).val()) - parseInt(IP_FIELD.eq(3).val()) )  > 0) ? OP_FIELD.eq(1).val( parseInt(OP_FIELD.eq(0).val()) - parseInt(IP_FIELD.eq(3).val()) ) : OP_FIELD.eq(1).val(0);
				// G.적용세율, H.누진공제액
				if( OP_FIELD.eq(1).val() == 0){
					OP_FIELD.eq(2).val(0);
					OP_FIELD.eq(3).val(0);
				}else if( OP_FIELD.eq(1).val() <= 100000000 && OP_FIELD.eq(1).val() > 0 ){
					OP_FIELD.eq(2).val(10);
					OP_FIELD.eq(3).val(0);
				}else if( OP_FIELD.eq(1).val() <= 500000000 && OP_FIELD.eq(1).val() > 100000000 ){
					OP_FIELD.eq(2).val(20);
					OP_FIELD.eq(3).val(10000000);
				}else if( OP_FIELD.eq(1).val() <= 1000000000 && OP_FIELD.eq(1).val() > 500000000 ){
					OP_FIELD.eq(2).val(30);
					OP_FIELD.eq(3).val(60000000);
				}else if( OP_FIELD.eq(1).val() <= 3000000000 && OP_FIELD.eq(1).val() > 1000000000 ){
					OP_FIELD.eq(2).val(40);
					OP_FIELD.eq(3).val(160000000);
				}else if( OP_FIELD.eq(3).val() > 3000000000 ){
					OP_FIELD.eq(2).val(50);
					OP_FIELD.eq(3).val(460000000);
				}
				// I.산출세액
				OP_FIELD.eq(4).val( parseInt(OP_FIELD.eq(2).val()) * ( parseInt(OP_FIELD.eq(3).val()) * 0.01 ) );
				// J.기납부세액공제
				IP_FIELD.eq(4).val( IP_FIELD.eq(4).val() != '' ? IP_FIELD.eq(4).val() : 0 );
				// K.신고세액공제
				OP_FIELD.eq(5).val( ( parseInt(OP_FIELD.eq(4).val()) - parseInt(IP_FIELD.eq(4).val()) ) * 0.05 );
			break;
		}
	};
	
	// input value hidden(calc_arr)에 저장 함수
	let save_calc_data = () => {
		INPUT_FIELD.each(function(index, item){
			calc_arr[index] = $(item).val();
		});
		HIDDEN_FIELD.val(calc_arr);
	};
	
	// input value (detail-content) 변환 값 저장
	$(document).on("change", ".view-content input:text[numberonly], .view-content input:checkbox, .view-content input:radio", function() {
		if(c_sort == null)
			c_sort = (c_sort == null ? CALCULATE_AREA.attr('data-sort') : c_sort);
			
		dtvw_calc_auto();
	});
	
	let dtvw_calc_auto = () => {
		dt_ip_field = jQuery('.view-content.'+c_sort+'_'+c_id+' input[data-io=ip]');
		dt_op_field = jQuery('.view-content.'+c_sort+'_'+c_id+' input[data-io=op]');
        dt_chk_field = jQuery('.view-content.'+c_sort+'_'+c_id+' input:checkbox');
        dt_radio_field = jQuery('.view-content.'+c_sort+'_'+c_id+' input:radio');
		
		switch(c_sort){		
			case 'income' :
				switch(c_id){
					case 'f':
						// 기본공제
						dt_ip_field.eq(0).val(1500000);
						dt_chk_field.eq(1).prop('checked') ? dt_ip_field.eq(1).val(1500000) : dt_ip_field.eq(1).val(0);
						dt_chk_field.eq(2).prop('checked') ? dt_chk_field.eq(2).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(2).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(2).prop('checked') ? ( dt_ip_val[2] = dt_ip_field.eq(2).val() != '' ? dt_ip_field.eq(2).val() : 0 ) : dt_ip_val[2] = 0
						dt_chk_field.eq(3).prop('checked') ? dt_chk_field.eq(3).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(3).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(3).prop('checked') ? ( dt_ip_val[3] = dt_ip_field.eq(3).val() != '' ? dt_ip_field.eq(3).val() : 0 ) : dt_ip_val[3] = 0;
						dt_op_field.eq(0).val( parseInt(dt_ip_field.eq(0).val()) + parseInt(dt_ip_field.eq(1).val()) + 1500000*parseInt(dt_ip_val[2]) + 1500000*parseInt(dt_ip_val[3]) );
						// 추가공제
						dt_chk_field.eq(4).prop('checked') ? dt_ip_field.eq(4).val(1000000) : dt_ip_field.eq(4).val(0);
						dt_chk_field.eq(5).prop('checked') ? dt_ip_field.eq(5).val(500000) : dt_ip_field.eq(5).val(0);
						dt_chk_field.eq(6).prop('checked') ? dt_chk_field.eq(6).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(6).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(6).prop('checked') ? ( dt_ip_val[6] = dt_ip_field.eq(6).val() != '' ? dt_ip_field.eq(6).val() : 0 ) : dt_ip_val[6] = 0
						dt_chk_field.eq(7).prop('checked') ? dt_chk_field.eq(7).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(7).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(7).prop('checked') ? ( dt_ip_val[7] = dt_ip_field.eq(7).val() != '' ? dt_ip_field.eq(7).val() : 0 ) : dt_ip_val[7] = 0;
						dt_chk_field.eq(8).prop('checked') ? dt_chk_field.eq(8).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(8).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(8).prop('checked') ? ( dt_ip_val[8] = dt_ip_field.eq(8).val() != '' ? dt_ip_field.eq(8).val() : 0 ) : dt_ip_val[8] = 0
						dt_chk_field.eq(9).prop('checked') ? dt_chk_field.eq(9).siblings('input:text[numberonly]').attr('disabled', false) : dt_chk_field.eq(9).siblings('input:text[numberonly]').attr('disabled', true);
						dt_chk_field.eq(9).prop('checked') ? ( dt_ip_val[9] = dt_ip_field.eq(9).val() != '' ? dt_ip_field.eq(9).val() : 0 ) : dt_ip_val[9] = 0;
						dt_op_field.eq(1).val( parseInt(dt_ip_field.eq(4).val()) + parseInt(dt_ip_field.eq(5).val()) + 2000000*parseInt(dt_ip_val[6]) + 1000000*parseInt(dt_ip_val[7]) + 1000000*parseInt(dt_ip_val[8]) + 2000000*parseInt(dt_ip_val[9]) );
						// 다자녀 추가공제
						if(dt_ip_val[3] < 2){
							dt_op_field.eq(2).val(0);
						}else if(dt_ip_val[3] > 1 && dt_ip_val[3] < 3){
							dt_op_field.eq(2).val(1000000);
						}else if(dt_ip_val[3] > 2 && dt_ip_val[3] < 4){
							dt_op_field.eq(2).val(3000000);
						}else if(dt_ip_val[3] > 3){
							dt_op_field.eq(2).val(5000000);
						}
						// 총 소득공제
						dt_op_field.eq(3).val( parseInt(dt_op_field.eq(0).val()) + parseInt(dt_op_field.eq(1).val()) + parseInt(dt_op_field.eq(2).val()) );
					break;
				}
            break;
            case 'gift' :
				switch(c_id){
					case 'e':
						// 증여세 공제
                        dt_op_field.eq(0).val(60000000);
                        let applyValue = jQuery('.view-content.'+c_sort+'_'+c_id+' input[name=gift_e1]:checked').val();
                        dt_radio_field.eq(1).prop('checked') ? dt_radio_field.eq(1).siblings('input:checkbox').attr('disabled', false) : dt_radio_field.eq(1).siblings('input:checkbox').attr('disabled', true);
                        
                        if( dt_radio_field.eq(1).prop('checked') && dt_radio_field.eq(1).siblings('input:checkbox').prop('checked') )
                        	dt_op_field.eq(0).val( parseInt(20000000) );
                        else
                        	dt_op_field.eq(0).val( parseInt(applyValue) );
					break;
				}
			break;
		}
	}

	// 각각의 버튼 클릭 이벤트
	$(document).on('click', '.subContainer.calculate button a, .view-area button a', function() {
		c_feature = $(this).parent().attr('class');
		c_feature_arr = c_feature.split(' ');
		c_code = $(this).attr('data-code');
		c_title = $(this).parents('aside.right').siblings('aside.left').children('span').text();
		mode = $(this).attr('data-mode');
		
		switch (true){
			case (c_feature_arr.indexOf(DETAIL_BTN_TXT) != -1) :
				$('.subContainer.calculate').hide();
				$('.btnBack').hide();
				$('.detail-area').show();
				c_input = $(this);
				$.ajax({
					type: 'post',
					dataType: 'json',
					data: {code:c_code, mode:mode},
					url: '/common/calc/calculate.php',
					success: function(resp) {
						"use strict";
						DETAIL_TITLE.text(c_title);
						$.each(resp, function(index, item){
							switch(index){
								case 'num': c_id = item; 
									break;
								case 'code': c_sort = item; 
									break;
								case 'mode': mode = item; 
									break;
								default :
									break;
							}
						});
						DETAIL_CONTENT.parent().find('section.'+c_sort+'_'+c_id).show();
						$('input:text[numberonly]').number(true);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('error');
					}
				});
				break;
			case (c_feature_arr.indexOf(INPUT_BTN_TXT) != -1) :
				let myData = jQuery('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id).children('form').serializeArray();
				let myJson = JSON.stringify(myData);
				$.ajax({
					type: 'post',
					dataType: 'json',
					data: {data:myJson, id:c_id, sort:c_sort},
					url: '/common/calc/apply.php',
					success: function(resp) {
						$.each(resp, function(index, item){
							switch(index){
								case 'mode': c_input.attr('data-mode',item); 
									break;
								case 'sum' : c_input.parent().siblings('input').val(item);
									break;
								default	: 
									break;
							}
						});
						DETAIL_CONTENT.parent().find('section.'+c_sort+'_'+c_id).hide();
						$('.view-area').hide();
						BACK_BTN.show();
						$('.subContainer.calculate').show().addClass('fadeInLeft');	
						calc_auto();
						save_calc_data();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('error');
					}
				});
				break;
			case (c_feature_arr.indexOf(RESULT_BTN_TXT) != -1) :
				if(HIDDEN_FIELD.val() != ''){
					let rsData = HIDDEN_FIELD.val().split(',');
					let rsJson = JSON.stringify(rsData);
					$('.subContainer.calculate').hide();
					$('.btnBack').hide();
					$('.result-area').show();
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: {data:rsJson, sort:c_code},
						url: '/common/calc/result.php',
						success: function(resp) {
							RESULT_CONTENT.append('<form action="" method="post"></form>');
							$.each(resp, function(index, item){
								switch(index){
									case 'mode': mode = item; 
										break;
									default :
										RESULT_CONTENT.children().append(
											'<div class="row">'+
												'<div class="column">'+
													'<label>'+
														'<aside class="left">'+
															'<span>'+item.title+'</span>'+
														'</aside>'+
														'<aside class="right">'+
															'<input type="'+item.type+'" name="'+c_code+index+'" pattern="[0-9]*" '+item.readonly+' numberonly value="'+item.value+'"/>'+
															'<span class="ip-inner">'+item.inner+'</span>'+
														'</aside>'+
													'</label>'+
												'</div>'+
											'</div>'
										);
										break;
								}
							});
							$('input:text[numberonly]').number(true);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('error');
						}
					});
				}else{
					alert('입력된 값이 없습니다.');
					return false;
				}
				break;
			case (c_feature_arr.indexOf(BEFORE_BTN_TXT) != -1) :
				DETAIL_CONTENT.parent().find('section.'+c_sort+'_'+c_id).hide();
				RESULT_CONTENT.empty();
				
				DETAIL_TITLE.text('');
				
				$('.view-area').hide();
				BACK_BTN.show();
				$('.subContainer.calculate').show().addClass('fadeInLeft');	
				break;
			case (c_feature_arr.indexOf(RECALC_BTN_TXT) != -1) :
				$('.result-area').hide();
				RESULT_CONTENT.empty();
				BACK_BTN.show();
				$('.subContainer.calculate').show().addClass('fadeInLeft');
				$('.subContainer.calculate input:text[numberonly]').val('');
				calc_reset(true);
				HIDDEN_FIELD.val('');
				break;
			case (c_feature_arr.indexOf(SAVE_BTN_TXT) != -1) :
				c_tax = $('.result-content form').serializeArray();
				c_tax_json = JSON.stringify(c_tax);
				$.ajax({
					type: 'post',
					dataType: 'json',
					data: {tax:c_tax_json, code:c_sort},
					url: '/common/calc/save.php',
					success: function(resp) {
                        "use strict";
                        if(resp == true){
                            alert('정상적으로 저장되었습니다.');
                        }else if(resp == false){
                            alert('오류입니다. 재진행 요청드립니다');
                        }
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('error');
					}
				});

				break;	
			default :
				return;
				break;
		}
	});
	// 계산 초기화
	$(document).on('click', '.resetBtn', function(){
		if(HIDDEN_FIELD.val() != ''){
			let opts = '진행중이던 계산을 초기화하시겠습니까?';
			let resp = confirm(opts);
			
			calc_reset(resp);
		}else{
			calc_reset(false);
		}
	});
	let calc_reset = (num) => {
		if(num == true){
			$('input:text[numberonly]').val('');
			$('input:checkbox').attr('checked', false);
			switch(c_sort){		
				case 'income' :
					IP_FIELD.eq(6).val(1500000);
					$('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id+' input[data-io=op]').eq(0).val(1500000);
					$('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id+' input[data-io=op]').eq(3).val(1500000);
					$('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id+' input:checkbox').eq(0).attr('checked', true);
				break;
				case 'gift' :
					IP_FIELD.eq(3).val(600000000);
					$('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id+' input[data-io=op]').eq(0).val(600000000);
					$('.detail-area.view-area .detail-content.'+c_sort+'_'+c_id+' input:radio').eq(0).attr('checked', true);
				break;
			}
			HIDDEN_FIELD.val('');
		}
		$('html,body').animate({scrollTop:0},'500');
		
		infoColumn = $('.column.info');
		infoColumn.each(function(index, item){
			$(item).slideUp('fast');
			if($(item).hasClass('show'))
				$(item).removeClass('show').addClass('hide');
		});
		return false;
	}
	
});
// number max값 제한
function maxLengthCheck(object){
	if (object.value.length > object.maxLength){
		object.value = object.value.slice(0, object.maxLength);
	}    
}