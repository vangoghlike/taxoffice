$(function(){
    // input value
    const IP_TJ_USER_VAL = 'val_y';

    // input value
    var ip_val_title = function(){
        $('.resume_input input').each( function( index, item ) {
            if ( $('.resume_input input:eq(' + index +  ')').val() != "" ) {
                $('.resume_input input:eq(' + index +  ')').closest('.resume_input').addClass( IP_TJ_USER_VAL );
            }
        });
    }
    ip_val_title();
    $('.resume_input input').on('change', function(){
        ip_val_title();
    });

    $('input[name=career_cd]').on('change', function() {
        if ( $(this).attr('id') == 'career_cd_2' && $(this).attr('checked', 'checked') ) {
            $('#career_template').fadeIn();
        } else {
            $('#career_template').fadeOut();
        }
    });

    $('input:not([type=radio]), textarea').on('change', function() {
        if ($(this).val() != null || $(this).val() != "") {
            $(this).siblings('label').hide();
        }
    });
    $('input:not([type=radio]), textarea').focus( function() {
        if ($(this).val() != null || $(this).val() != "") {
            $(this).siblings('label').hide();
        }
    });
    $('input:not([type=radio]), textarea').blur( function() {
        if ($(this).val() == null || $(this).val() == "") {
            $(this).siblings('label').show();
        }
    });

    // input focus and blur
    $('.resume_input input').focus( function() {
        if ( $(this).val() != null || $(this).val() != "" ) {
            $(this).closest('.resume_input').addClass('focus');
        }
    });
    $('.resume_input input').blur( function() {
        if ( $(this).val() != null || $(this).val() != "" ) {
            $(this).closest('.resume_input').removeClass('focus');
        }
        if ( $(this).val() == null || $(this).val() == "" ) {
            $(this).closest('.resume_input').removeClass( IP_TJ_USER_VAL );
        }
    });




    // job select
    $('.sri_select').on('click', function(){
        $(this).find('.list_opt').slideToggle();
    });
    $('.sri_select .list_opt a').on('click', function(){
        var _text_value = $(this).text();
        $(this).closest('.list_opt').siblings('label.bar_title').text( _text_value );
        $(this).closest('.list_opt').siblings('label.bar_title').show();
        $(this).closest('.list_opt').siblings('input[name=jobhunting_st]').val( _text_value );
        $('.sri_select button.selected').text("");
    });

    // tell and phone
    $('#same_cell').on('change', function(){
        if ( $(this).attr('checked','checked') ) {
            $('#user_tel').val( $('#user_phone').val() );
            ip_val_title();
        }
    });

    // adddress
    $('#new_address, #post_code').on('click', function(){
        sample2_execDaumPostcode();
    });
    $('#layer').on('click', function(){
        closeDaumPostcode();
    });

    // 우편번호 찾기 화면을 넣을 element
    var element_layer = document.getElementById('layer');

    function closeDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_layer.style.display = 'none';
    }

    function sample2_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("new_address").value = extraAddr;

                } else {
                    document.getElementById("new_address").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('post_code').value = data.zonecode;
                document.getElementById("new_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("new_address_extra").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_layer.style.display = 'none';

                // input value
                ip_val_title();
            },
            width : '100%',
            height : '100%',
            maxSuggestItems : 5
        }).embed(element_layer);

        // iframe을 넣은 element를 보이게 한다.
        element_layer.style.display = 'block';

        // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
        initLayerPosition();
    }

    // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
    // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
    // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
    function initLayerPosition(){
        var width = 300; //우편번호서비스가 들어갈 element의 width
        var height = 400; //우편번호서비스가 들어갈 element의 height
        var borderWidth = 5; //샘플에서 사용하는 border의 두께

        // 위에서 선언한 값들을 실제 element에 넣는다.
        element_layer.style.width = width + 'px';
        element_layer.style.height = height + 'px';
        element_layer.style.border = borderWidth + 'px solid';
        // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
        element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
        element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
    }


    // my introduce
    $('#license .area_add_btn').on('click', function(){
        var _license_copy = $('#license .tpl_row').clone();
        $('#license .resume_write_add').append( _license_copy );
    });


    // img preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".box_photo").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function fileCheck(obj) {
        pathpoint = obj.value.lastIndexOf('.');
        filepoint = obj.value.substring(pathpoint+1,obj.length);
        filetype = filepoint.toLowerCase();
        if(filetype=='jpg' || filetype=='gif' || filetype=='png' || filetype=='jpeg' || filetype=='bmp') {
            readURL(obj);
        } else {
            alert('이미지 파일만 선택할 수 있습니다.');
            parentObj  = obj.parentNode;
            node = parentObj.replaceChild(obj.cloneNode(true),obj);
            return false;
        }
        if(filetype=='bmp') {
            upload = confirm('BMP 파일은 웹상에서 사용하기엔 적절한 이미지 포맷이 아닙니다.\n그래도 계속 하시겠습니까?');
            if(!upload) return false;
        }
    }
    $("#mngr_pic_ip").change(function() {
        fileCheck(this);
    });

});


