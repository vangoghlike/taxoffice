
jQuery(document).ready(function(){	
		// ���콺������ �̹��� ��ȯ
	jQuery("img.rollover").mouseover(function(){
		jQuery(this).attr("src",jQuery(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/, "$1_on$2"));
	}).mouseout(function(){
		jQuery(this).attr("src",jQuery(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1_off$2"));
	});

	// ��
	jQuery(".tab_content").hide();
	jQuery("ul.tabe>li:first").addClass("active").show(); 	
	jQuery(".tab_content:first").show();

	jQuery("ul.tabe>li").click(function(e) {
		e.preventDefault();

		jQuery("ul.tabe>li").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".tab_content").hide();		
		
		jQuery("ul.tabe>li").find('img').attr("src" ,function(iIndex,sSrc){
			return sSrc.replace('_on.gif', '_off.gif');
		});

		jQuery("ul.tabe>li.active").find('img').attr("src",function(iIndex,sSrc){
			return sSrc.replace('_off.gif', '_on.gif');
		});
		
		var activeTab = jQuery(this).find("a").attr("href");
		jQuery(activeTab).fadeIn();
		return false;
	});


	var line_val_length = 0;
	jQuery('.line_plus_btn').on('click', function(){
		line_val_length = jQuery('.ip_wr.line_val_wr label').length;
		if ( line_val_length < 5 ) {
			jQuery('.ip_wr.line_val_wr label:last-child').clone().appendTo('.ip_wr.line_val_wr');
			jQuery('.ip_wr.line_val_wr label:last-child input[name="work_request_num[]"]').val(1);
		} else {
			alert('더이상 추가할 수 없습니다.');
		}
		return true;
	});
	jQuery('.line_minus_btn').on('click', function(){
		line_val_length = jQuery('.ip_wr.line_val_wr label').length;
		if ( line_val_length > 1 ) {
			jQuery('.ip_wr.line_val_wr label:last-child').remove();
		} else {
			alert('더이상 삭제할 수 없습니다.');
		}
		return true;
	});

	var mngr_val_length = jQuery('.ip_wr.mngr_val_wr label').length;
	var standard_mngr_select = jQuery('.ip_wr.mngr_val_wr label:first-child select:first-child');
	var line_val = 0;
	var line_val_now = 0;
	jQuery('.num_set_btn').on('click', function(){
		line_val_length = jQuery('.ip_wr.line_val_wr label').length;
		mngr_val_length = jQuery('.ip_wr.mngr_val_wr label').length;

		if ( line_val_length < mngr_val_length ) {
			for (var i = line_val_length; i < mngr_val_length; i++) {
				jQuery('.ip_wr.mngr_val_wr label:nth-child('+(i+1)+')').remove();
			}
		} else {
			for (var i = 0; i < line_val_length; i++) {
				line_val = jQuery('.ip_wr.line_val_wr label:nth-child('+(i+1)+') input').val();
				line_val_now = jQuery('.ip_wr.mngr_val_wr label:nth-child('+(i+1)+') select').length;

				if ( line_val <= 0 ) {
					jQuery('.ip_wr.line_val_wr label:nth-child('+(i+1)+') input').focus();
					break;
				} else {
					if ( line_val_length > mngr_val_length) {
						jQuery('.ip_wr.mngr_val_wr').append('<label></label>');
					}
					if ( line_val >= line_val_now) {
						for (var j = 0; j < (line_val-line_val_now); j++) {
							jQuery('.ip_wr.mngr_val_wr label:nth-child('+(i+1)+')').append(standard_mngr_select.clone());
						}
					} else {
						console.log('lv',line_val);
						console.log('lv2',line_val_now);

						for (var j = line_val_now; j > line_val; j--) {
							jQuery('.ip_wr.mngr_val_wr label:nth-child('+(i+1)+') select:nth-child('+j+')').remove();
						}
					}
				}
			}
		}
		return true;
	});





});//end	