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
					{ @ range(1,4) }
						<li><a href="{ S_LINK[.value_]['URL'] }" { ? S_LINK[.value_]['TARGET'] } target="{ S_LINK[.value_]['TARGET'] }" title="새 창으로 열립니다."{ / }><img src="{ ? S_LINK[.value_]['IMAGE'] }/common/imageload.php?type=menu&file={ S_LINK[.value_]['IMAGE'] }{ : }{TYPE_URL}/images/main/mainLink{ =sprintf('%02d', .index_+2 ) }.png{ / }" alt="{ S_LINK[.value_]['TITLE'] }"></a></li>
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
								{ @ range(1,5) }
									{ ? S_BOARD[.value_]['NAME'] }<li class="{ ? .index_ == 0 }on{ / }"><a>{ S_BOARD[.value_]['NAME'] }</a></li>{ / }
								{ / }
								</ul>
							</div>

							<div class="tabContent">
							{ @ range(1,1) }
								<div class="tabCont">
									<ul>
									{ @ S_BOARD[.value_]['LIST'] }
									{ ? ..index_ < 5 }
										<li>
											<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject } <img src="{TYPE_URL}/images/sub/icon_new.png" alt="New" class="b_icon" /></a>
											<span class="date">{ ..reg_day }</span>
										</li>
									{ / }
									{ / }
									</ul>
								</div>
							{ / }
							{ @ range(2,5) }
							<div class="tabCont">
								<ul>
									{ @ S_BOARD[.value_]['LIST'] }
									{ ? ..index_ < 5 }
									<li>
										<a href="{ S_BOARD[.value_]['URL'] }read?idno={ ..idno }">{ ..subject }</a>
										<span class="date tag updated">Updated</span>
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
							<div class="tit">Quick Contack</div>
{*							<div class="phon">02-854-2100 (Headquarters 1)</div>*}
{*							<div class="phon">02-501-2155 (Headquarters 2)</div>*}
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
		$('.tabList .tabTit ul li a').on('click', function() {
			var tab_idx = $(this).closest('li').index();
			$('.tabContent > div').hide();
			$('.tabContent > div:eq(' + tab_idx + ')').show();
			$('.tabList .tabTit ul li').removeClass('on');
			$(this).closest('li').addClass('on');

		});

	});
</script>
{ #footer }
