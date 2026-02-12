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
						<div class="viewContent" id="content">
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
			data: {'id':'<?=$_REQUEST['idno']?>'},
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
{ : }

					<div class="side">
						<div class="left">
							<div class="countTotal">
							Total : <span id="total">0</span>
							</div>
						</div>
					</div>

					<div class="bbs">
						<div class="blist">
							<table cellpadding="0" cellspacing="0" summary="게시판입니다.">
								<colgroup>
										<col width="9%">
										<col width="*">
										<col width="11%">
										<col width="11%">
								</colgroup>
								<thead>
									<tr>
										<th scope="col" class="bgNo">번호</th>
										<th scope="col">제목</th>
										<th scope="col">날짜</th>
										<th scope="col">조회수</th>
									</tr>
								</thead>
								<tbody id="list">
								</tbody>
							</table>
						</div>
						<!-- //blist -->
					</div>


					<div class="page_navi" >
{ #paging }
					</div>

{ / }

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

<script>
$(function() {
	$(document).ready(function() {
		get_list(<?=(int)$_REQUEST['page'] ? (int)$_REQUEST['page'] : '1'?>);
	});
	function get_list(page) {
		$('#list').empty().append('<tr class="allmerge"><td colspan="4">... 게시물을 불러오는 중입니다 ...</td></tr>');
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'page':page},
			url: '/common/board/ajax_joseilbo.php',
			success: function(resp) {
				$('#list').empty();
				if (resp.data.length > 0) {
					var total = parseInt(resp.total.count.toString());
					$('#total').empty().append(total);
					$.each(resp.data, function(idx, data) {
						$('#list').append('<tr>'+
							'<td>'+data.id+'</td>'+
							'<td class="subject"><a href="?page='+page+'&idno='+data.id+'">'+data.title+'</a></td>'+
							'<td>'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</td>'+
							'<td>'+data.read+'</td>'+
							'</tr>'
						);
					});
					set_page_navi($('.page_navi'), total, 10, page, 5);
				}
				else {
					$('#list').append('<tr class="allmerge"><td colspan="4">등록된 게시물이 없습니다.</td></tr>');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	}
});
</script>
{ #footer }
