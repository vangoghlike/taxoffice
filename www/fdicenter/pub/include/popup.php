<div id="pop_layer" class="pop_layer">
    <div class="pop_container">
        <div class="inner">
            <img src="/images/pop/pop_newyear_2025.jpg" alt="2025년 새해 복 많이 받으세요. 세림세무법인"/>
        </div>
    </div>
    <div class="pop_bottom">
        <a class="pop_today_close">24시간 동안 닫기</a>
        <a class="pop_close">닫기</a>
    </div>
</div>


<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
    $(function(){
		$('.pop_layer').draggable();
        $('.pop_close').on('click', function(){
           $(this).closest('.pop_layer').slideToggle();
        });
        $('#pop_layer .pop_today_close').on('click',function(){
            pop_close_today();
        });
        $('#pop_layer2 .pop_today_close').on('click',function(){
            pop_close_today2();
        });

        // var pop_close_today = function(){
        //     setCookie('close','Y',1);   //기간( ex. 1은 하루, 7은 일주일)
        //     $('#pop_layer').slideUp();
        // }
        // var pop_close_today2 = function(){
        //     setCookie('close2','Y',1);   //기간( ex. 1은 하루, 7은 일주일)
        //     $('#pop_layer2').slideUp();
        // }

        var cookiedata = document.cookie;
        console.log('aa',cookiedata);
        // if(cookiedata.indexOf('close=Y')<0){
        //     $('#pop_layer').slideDown();
        // }else{
        //     $('#pop_layer').hide();
        // }
        // if(cookiedata.indexOf('close2=Y')<0){
        //     $('#pop_layer2').slideDown();
        // }else{
        //     $('#pop_layer2').hide();
        // }

        // 쿠키 가져오기
        var getCookie = function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
            }
            return "";
        }

        // 24시간 기준 쿠키 설정하기
        var setCookie = function (cname, cvalue, exdays) {
            var todayDate = new Date();
            todayDate.setTime(todayDate.getTime() + (exdays*24*60*60*1000));
            var expires = "expires=" + todayDate.toUTCString(); // UTC기준의 시간에 exdays인자로 받은 값에 의해서 cookie가 설정 됩니다.
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        $('.pop_layer .pop_link a.allview_btn').on('click', function(){
            if ( $(this).hasClass('full-pop') ) {
                $('.pop_layer').removeClass('full-pop');
                $(this).removeClass('full-pop');
                $(this).text('전체 펼치기');
            } else {
                $('.pop_layer').addClass('full-pop');
                $(this).addClass('full-pop');
                $(this).text('팝업 줄이기');
            }
        });
    });
</script>