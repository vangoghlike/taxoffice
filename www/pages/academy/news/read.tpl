{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }

        <!-- contStart -->
        <div class="contStart">


            { CONTENTS['head_contents'] }

            { ? _GET.idno }

            <div class="viewWrap">
                <div class="line">
                    <div class="left">
                        <div class="box">
                            <div class="tit">제목</div>
                            <div class="txt bold" id="title"></div>
                        </div>
                    </div>
                    <div class="right ">
                        <div class="box">
                            <div class="tit">조회수</div>
                            <div class="txt" id="read"></div>
                        </div>
                    </div>
                    <div class="right mr50">
                        <div class="box">
                            <div class="tit">날짜</div>
                            <div class="txt" id="regtime"></div>
                        </div>
                    </div>
                </div>
                <div class="viewContent joseContent" id="content">
                    ... 게시물을 불러오는 중입니다 ...
                </div>
            </div>


            <div class="btnBbs bbNone ">
                <div class="left">
                    <a href="?page={ _GET.page }">목록</a>
                </div>
            </div>

            <script>
                $(function() {
                    $(document).ready(function() {
                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            data: {'id':'<?=$_REQUEST['idno']?>', 'news_code':'{ NEWS_CODE }'},
                            url: '/common/board/ajax_joseilbo.php',
                            success: function(resp) {
                                console.log(resp);
                                $('#title').append(resp.title);
                                $('#read').append(resp.read);
                                $('#regtime').append(resp.regtime.substr(0,4)+'-'+resp.regtime.substr(4,2)+'-'+resp.regtime.substr(6,2)+' '+resp.regtime.substr(8,2)+':'+resp.regtime.substr(10,2));
                                $('#content').empty().append(resp.content);
                                /*
                                    alert('존재하지 않는 게시물입니다.');
                                    location.href = '?page=<?=$_REQUEST['page']?>';
                                */
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
                    });
                });
            </script>

            { / }

            { CONTENTS['footer_contents'] }

        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->
{ #footer }
