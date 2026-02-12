{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ CONTENTS['head_contents'] }

				{ ? LIST.size_ }
				<div class="faqList">
					<ul>
					{ @ LIST }
						<li>
							<div class="qustion">
								<a href="javascript:;">{ ? .category_title }[{ .category_title }] { / }{ .subject }</a>
							</div>
							<div class="answer">
								{ .contents }
							</div>
						</li>
					{ / }
					</ul>
				</div>
				{ : }
				<div class="noData">등록된 게시물이 없습니다.</div>
				{ / }

{ CONTENTS['footer_contents'] }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
