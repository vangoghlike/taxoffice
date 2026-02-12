<script type="text/javascript" src="/pub/js/jquery-3.3.1.min.js"></script>
<div class="container" id="container">
	<div class="subContent">
		<div class="contStart">
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
					<a class="bbs_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
				</div>
				<div class="viewContent joseContent" id="content">
					... 게시물을 불러오는 중입니다 ...
				</div>
			</div>
			<div class="btnBbs bbNone ">
				<div class="left">
					<a href="?cat_no=<?= $_GET["cat_no"]?>&page=<?= $_GET["page"]?>">목록</a>
				</div>
			</div>
			<script>
			$(function() {
				$(document).ready(function() {
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: {'id':'<?=$_REQUEST['idx']?>', 'news_code':'<?=$news_id?>'},
						url: '/module/news/ajax_joseNews.php',
						success: function(resp) {
							console.log(resp);
							$('#title').append(resp.title);
							$('#read').append(resp.read);
							$('#regtime').append(resp.regtime.substr(0,4)+'-'+resp.regtime.substr(4,2)+'-'+resp.regtime.substr(6,2)+' '+resp.regtime.substr(8,2)+':'+resp.regtime.substr(10,2));
							$('#content').empty().append(resp.content);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						}
					});
				});
			});
			</script>
		</div>
		<!-- //contStart -->
	</div>
	<!-- //subContent -->
</div>
<!-- //Container -->