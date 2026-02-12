{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ CONTENTS['head_contents'] }


			<div class="oneQustion">
				<div class="tab">
					<a href="{BASE_URL}/{MENU_NO}/{CONTENTS_NO}">문의하기</a>
					<a href="{BASE_URL}/{MENU_NO}/{CONTENTS_NO}/list" class="active">문의내역확인</a>
				</div>

				<div class="oneQustionView ">
					<div class="topQus">
						<div class="tit">{ DATA['subject'] }</div>
						<div class="date">등록일 : { DATA['reg_day'] }</div>
						<div class="text">
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
					{ ? sizeof(DATA['answer']) }
					{ @ DATA['answer'] }
					<div class="topAnswer">
						<div class="tit"><span>[답변]</span>{ .subject }</div>
						<div class="date">등록일 : { .reg_day }</div>
						<div class="text">
						{ ? .editor_yn == 'Y' }{ .contents }{ : }{ =nl2br(.contents) }{ / }
						</div>
					</div>
					{ / }
					{ / }
				</div>

			</div>

{ CONTENTS['footer_contents'] }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
