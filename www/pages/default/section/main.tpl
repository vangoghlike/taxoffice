{ #header }

		<!-- Container -->
		<div class="container" id="container">

			<!-- mainSlide -->
			<div class="mainSlide">
				<div class="in">
					<ul>
					{ @ S_BANNER[1] }
						<li>{ .contents }</li>
					{ / }
					</ul>
				</div>
			</div>
			<!-- //mainSlide -->

			<!-- mainContent -->
			<div class="mainContent">
			
				<!-- mainLink -->
				<div class="mainLink">
					<ul>
					{ @ range(1,6) }
						<li><a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+1 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a></li>
					{ / }
					</ul>
				</div>
				<!-- //mainLink -->

				<!-- mainTab -->
				<div class="mainTab">

					<div class="left">
						<div class="tabList">
							<div class="tabTit">
								<ul>
								<li class="on"><a href="#">조세 및 경제뉴스</a></li>
								{ @ range(1,5) }
									{ ? S_BOARD[.value_]['NAME'] }<li><a href="#">{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
								{ / }
								</ul>
							</div>

							<div class="tabContent">
								<div class="tabCont">
									<ul id="list">
										<li>... 게시물을 불러오는 중입니다 ...</li>
									</ul>
								</div>
							{ @ range(1,5) }
								<div class="tabCont">
									<ul>
									{ @ S_BOARD[.value_]['LIST'] }
									{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
											<span class="date">{ ..reg_day }</span>
										</li>
									{ / }
									{ / }
									</ul>
								</div>
							{ / }
							</div>
						</div>
					</div>

					<div class="right">
						<div class="customerBox">
							<div class="tit">세림세무법인 고객안내</div>
							<div class="phon"><img src="{TYPE_URL}/images/main/phon01.png" alt="02-854-2100" /></div>
							<div class="phon"><img src="{TYPE_URL}/images/main/phon02.png" alt="02-501-2155" /></div>
							<div class="dam">{ S_LINK[7]['SUB'] }</div>
							<div class="btnGo"><a href="{ S_LINK[7]['URL'] }" { ? S_LINK[7]['TARGET'] } target="{ S_LINK[7]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{TYPE_URL}/images/main/btnQus.png" alt="문의하기"></a></div>
						</div>
					</div>

				</div>
				<!-- //mainTab -->

				<!-- infoList -->
				<div class="infoList">
					<ul>
					{ @ range(1,4) }
						<li>{ S_CONTENTS[.value_]['CONT'] }</li>
					{ / }
					</ul>
				</div>
				<!-- //infoList -->

			</div>
			<!-- //mainContent -->

		</div>
		<!-- //Container -->

<script>
$(function() {
	$(document).ready(function() {
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'page':1},
			url: '/common/board/ajax_joseilbo.php',
			success: function(resp) {
				if (resp.data.length > 0) {
					$('#list').empty();
					var total = parseInt(resp.total.count.toString());
					$.each(resp.data, function(idx, data) {
						if (idx >= 5) return false;
						$('#list').append('<li>'+
							'<a href="/news?page=1&idno='+data.id+'">'+data.title+'</a>'+
							'<span class="date">'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</span>'+
							'</li>'
						);
					});
				}
				else {
					//$('#list').append('');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
});
</script>
{ #footer }
