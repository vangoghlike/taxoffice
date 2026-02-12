<!-- Container -->
<script type="text/javascript" src="/pub/js/jquery-3.3.1.min.js"></script>
<div class="container" id="container">
	<!-- subContent -->
	<div class="subContent">
	<!-- contStart -->
		<div class="contStart">
			<div class="side mb20">
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
			<div class="page_navi">
				<div class="paging paging_group">
					<a href="#" class="first pn_first"><span class="skip">처음 페이지</span></a>
					<a href="#" class="prev pn_prev"><span class="skip">이전 페이지</span></a>
					<span class="num">
					<a href="#" class="pn_paging_set pn_paging pn_page on">1</a>
					<a href="#" class="pn_paging_set pn_paging pn_page">2</a><a href="#" class="pn_paging_set pn_paging pn_page">3</a><a href="#" class="pn_paging_set pn_paging pn_page">4</a><a href="#" class="pn_paging_set pn_paging pn_page">5</a></span>
					<a href="#" class="next pn_next"><span class="skip">다음 페이지</span></a>
					<a href="#" class="last pn_last"><span class="skip">마지막 페이지</span></a>
				</div>
			</div>
		</div>
	<!-- //contStart -->
	</div>
	<!-- //subContent -->
</div>
<!-- //Container -->
<script>
	$(function() {
		$(document).ready(function() {
			get_list(<?=$_REQUEST['page'] != "" ? $_REQUEST['page'] : '1'?>);
			$(document).on('click', '.pn_paging,.pn_first,.pn_prev,.pn_next,.pn_last', function() {
				if (!$(this).closest('.pagination').data('gofunc')) go_page($(this).data('page'));
				else eval($(this).closest('.pagination').data('gofunc')+'('+$(this).data('page')+')');
				return false;
			});
		});
		function set_page_navi($cont, count, page_size, page, block_size, gofunc) {
			if (!block_size || block_size == 0) block_size = 10;
			if (gofunc) $cont.data('gofunc', gofunc);

			var block = Math.ceil(page / block_size);
			var total_page = (Math.ceil(count / page_size) ? Math.ceil(count / page_size) : 1);
			var total_block = (Math.ceil(total_page / block_size) ? Math.ceil(total_page / block_size) : 1);

			var start_page = (block - 1) * block_size + 1;
			var end_page = block * block_size;

			var prev_block_page = start_page - 1;
			var next_block_page = end_page + 1;

			// first
			if ($cont.find('.pn_first').length > 0) $cont.find('.pn_first').data('page', 1);
			// previous
			if ($cont.find('.pn_prev').length > 0) $cont.find('.pn_prev').data('page', prev_block_page < 1 ? 1 : prev_block_page);
			// loop
			if ($cont.find('.pn_paging_set').length > 0) {
				$cont.find('.pn_paging_set:gt(0)').remove();
				var paging_html = $cont.find('.pn_paging_set').html();
				$list = $cont.find('.pn_paging_set').parent();
				for(var i = start_page; i <= end_page && i <= total_page; i++) {
					$temp = (i == start_page ? $cont.find('.pn_paging_set:first') : $cont.find('.pn_paging_set:first').clone().appendTo($list));
					$temp = $temp.find('.pn_paging').length > 0 ? $temp.find('.pn_paging') : $temp;
					$temp.data('page', i);
					if (i == page) $temp.addClass('on'); else $temp.removeClass('on');
					$temp = $temp.find('.pn_page').length > 0 ? $temp.find('.pn_page') : $temp;
					$temp.empty().append(i);
				}
			}
			// next
			if ($cont.find('.pn_next').length > 0) $cont.find('.pn_next').data('page', next_block_page > total_page ? total_page : next_block_page);
			// last
			if ($cont.find('.pn_last').length > 0) $cont.find('.pn_last').data('page', total_page);
		}
		function go_page(page) {
			var curr_loc = location.href.replace(/\?page=[0-9]+|\&page=[0-9]+/g,'');
			location.href = curr_loc+(curr_loc.indexOf('?') >= 0 ? '&' : '?')+'page='+page;
		}
		function get_list(page) {
			$('#list').empty().append('<tr class="allmerge"><td colspan="4">... 게시물을 불러오는 중입니다 ...</td></tr>');
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {'page':page, 'news_code':'<?=$news_id?>'},
				url: '/module/news/ajax_joseNews.php',
				success: function(resp) {
					$('#list').empty();
					if (resp.data.length > 0) {
						var total = parseInt(resp.total.count.toString());
						$('#total').empty().append(total);
						$.each(resp.data, function(idx, data) {
							$('#list').append('<tr>'+
							'<td>'+data.id+'</td>'+
							'<td class="subject"><a href="?cat_no='+<?=$_REQUEST["cat_no"]?>+'&page='+page+'&idx='+data.id+'">'+data.title+'</a></td>'+
							'<td>'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</td>'+
							'<td>'+data.read+'</td>'+
							'</tr>'
							);
						});
						set_page_navi($('.page_navi'), total, 10, page, 5);
					}else {
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