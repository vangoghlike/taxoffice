{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ CONTENTS['head_contents'] }

			<div class="oneQustion">
				{ ? CONF['board_type'] == 'qna' }
				<div class="tab">
					<a href="{BASE_URL}/{MENU_NO}/{CONTENTS_NO}" class="active">문의하기</a>
					<a href="{BASE_URL}/{MENU_NO}/{CONTENTS_NO}/list">문의내역확인</a>
				</div>
				{ / }
				<div class="colBox">
				<form id="frm_write" name="frm_write" method="post" action="?" enctype="multipart/form-data" >
				<input type="hidden" name="act" value="save" />
				<input type="hidden" name="s" value="{ SITE_INFO['idno'] }" />
				<input type="hidden" name="m" value="{ MENU_NO }" />
				<input type="hidden" name="c" value="{ CONTENTS_NO }" />
				<input type="hidden" name="qs" value="{ QS }" />
				<input type="hidden" name="p_idno" value="{ RDATA['idno'] }" />
				<input type="hidden" name="idno" value="{ DATA['idno'] }" />
				{ ? CATEGORY_IDNO }<input type="hidden" name="category_idno" value="{ CATEGORY_IDNO }" />{ / }
				{ ? CATS.size_ > 1 }
				<div class="selType01">
					<div id="select_box">
						<label for="color">- 구분 선택 -</label>
						<select id="color" name="category_idno" class="req" title="구분 항목을 선택해주세요." { ? CATEGORY_IDNO } disabled="disabled"{ / }>
						{ @ CATS }
							<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>
						{ / }
						</select>
					</div>
				</div>
				{ / }
				<div class="ipBox line">
					<input type="text" name="subject" value="{ DATA['subject'] }" maxlength="100" title="제목을 입력해주세요." placeholder="제목을 입력해주세요." />
				</div>
				<div class="textZone mb10">
					<textarea id="contents" name="contents"{ ? CONF['board_type'] == 'qna' } placeholder="문의하실 내용을 입력해주세요.&#13;&#10;최대한 빠른 시일내에 답변 드리겠습니다."{ / }>{ DATA['contents'] }</textarea><input type="hidden" name="editor_yn" value="N" />
				</div>
				</form>

				<div class="btn01">
					<a href="#" class="act_save">문의하기</a>
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
