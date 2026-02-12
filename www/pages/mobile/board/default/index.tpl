{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ CONTENTS['head_contents'] }

			<div class="cosultWrap">

				{ ? LIST.size_ }
				<div class="consultList2 know">
					<ul>
					{ @ LIST }
						<li>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" class="{ ? CAN_REPLY != 'Y' }{ ? CAN_READ == 'Y' && (CONF['auth_write'] == 'N' || .secret_yn != 'Y' || .reg_user_id == USERINFO['user_id'] || .top_user_id == USERINFO['user_id']) }{ ? CONF['auth_write'] == 'N' && .secret_yn == 'Y' }board_secretY{ / }{ : }no_auth{ / }{ / }" data-idno="{ .idno }">
								<div class="tit">{ ? .category_title }[{ .category_title }] { / }{ .subject }</div>
								<div class="info">
									<span class="name">{ .writer_name }</span>
									<span class="date">{ .reg_day }</span>
								</div>
							</a>
						</li>
					{ / }
					</ul>
				</div>
				{ : }
				<div class="noData">등록된 게시물이 없습니다.</div>
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
