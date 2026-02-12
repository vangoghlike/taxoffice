{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ CONTENTS['head_contents'] }

			<div class="knowView">

				<div class="top">
					<div class="tit">{ DATA['subject'] }</div>
					<div class="info">
						<span>글쓴이 : { DATA['writer_name'] }</span>
						<span>등록일 : { DATA['reg_day'] }</span>
						<span>조회수 : { DATA['hits'] }</span>
					</div>
				</div>

				<div class="cont">
				{ ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
				</div>
				{ ? CONF['use_file_yn'] == 'Y' }
				<div>
				{ @ DATA['file'] }
					<div><a href="#" class="btnDownload file-download" data-part="{ CONF['board_code'] }" data-encname="{ .file_name_saved }" data-filename="{ .file_name }">{ .icon }{ .file_name }</a></div>
				{ / }
				</div>
				{ / }

			</div>

{ CONTENTS['footer_contents'] }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
