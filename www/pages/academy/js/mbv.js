
$(function(){

    $(".seCst #select_box label").text("예약시간 선택하기");

    var select = $("select#color");

    select.change(function(){
        var select_name = $(this).children("option:selected").text();
        $(this).siblings("label").text(select_name);
    });

    //FAQ
    $('.faqList .qustion a').on('click',function(){
        $(this).parents('li').toggleClass('on');
        $(this).parent().siblings('.answer').slideToggle('fast');
        $(this).parents('li').siblings().removeClass('on').find('.answer').slideUp('fast');
    });

    $('.topInfo .selView .viewBtn').on('click',function(){
        if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(this).addClass("close");
        }else if($(this).hasClass("close")){
            $(this).removeClass("close");
            $(this).addClass("open");
        }
        $(this).parent().parent().siblings('.viewInfo').slideToggle('fast');
        $(this).parent().parents('li').siblings().find('.viewInfo').slideUp('fast');
        $(this).parent().parents('li').siblings().find('.close').removeClass("close").addClass("open");
    });
    // $('.teslList2 .topInfo .selView .viewBtn').on('click',function(){
    // $open_img = "/pages/mobile/images/open_view.png";
    // $close_img = "/pages/mobile/images/close_view.png";
    // if($(this).hasClass("open")){
    // $(this).removeClass("open");
    // $(this).addClass("close");
    // $(this).find("img").attr("src", $close_img);
    // }else if($(this).hasClass("close")){
    // $(this).removeClass("close");
    // $(this).addClass("open");
    // $(this).find("img").attr("src", $open_img);
    // }
    // $(this).parent().parent().siblings('.viewInfo').slideToggle('fast');
    // $(this).parent().parents('li').siblings().find('.viewInfo').slideUp('fast');
    // });

    // 상담구분
    $('.selectBtns >div label').on('click', function(){
        if($(this).hasClass('call') || $(this).hasClass('mail') ){
            $('.option li.cst-se-hdMn').removeClass('block').addClass('none');
        }else if($(this).hasClass('visit')){
            $('.option li.cst-se-hdMn').removeClass('none').addClass('block');
        }
    });
    var onVisit = function(){
        var bool = $('.selectBtns >div input#select2').prop('checked');
        if(bool == true){
            $('.option li.cst-se-hdMn').removeClass('none').addClass('block');
        }
    }
    setTimeout(onVisit, 100)


    $(document).on('click', '.act_logout', function() {
        if (confirm('로그아웃 하시겠습니까?')) location.href = '/common/member/logout.php?url=/m/';
        return false;
    });
    $(document).on('keyup', 'input[name=phone]', function() {
        $(this).val($(this).val().toTel());
    });


});

//메뉴 활성화
function gnbActive(idx){
    $('.gnb ul li').eq(idx).addClass('on');
}


//팝업 열기
function popArea(){
    $('.popArea').show();
}

//팝업 닫기
function popAreaClose(){
    $('.popArea').hide();
}