$(function(){
    $('.hanpage_cate_onoff').on('click',function(){
        $('.hanpage_cate_wr').slideToggle(300);
        if ( $('.hanpage_cate_onoff').find('strong').text() == '전체 카테고리 펼치기' ) {
            $('.hanpage_cate_onoff strong').text('카테고리 닫기');
        } else {
            $('.hanpage_cate_onoff strong').text('전체 카테고리 펼치기');
        }
    });
});