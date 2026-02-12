{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ CONTENTS['head_contents'] }

					<script src="/webedit/cheditor.js"></script>
					<form id="frm_write" name="frm_write" method="post" action="?" enctype="multipart/form-data" >
					<input type="hidden" name="act" value="save" />
					<input type="hidden" name="s" value="{ SITE_INFO['idno'] }" />
					<input type="hidden" name="m" value="{ MENU_NO }" />
					<input type="hidden" name="c" value="{ CONTENTS_NO }" />
					<input type="hidden" name="qs" value="{ QS }" />
					<input type="hidden" name="p_idno" value="{ RDATA['idno'] }" />
					<input type="hidden" name="idno" value="{ DATA['idno'] }" />
					{ ? CONF['board_type'] == 'qna_dep' }
					<input type="hidden" name="sendmail" value="" />
					{ / }
					{ ? CATEGORY_IDNO }<input type="hidden" name="category_idno" value="{ CATEGORY_IDNO }" />{ / }
					<div class="tblType03 { ? CONF['board_type'] == 'qna_dep' }qna_dep_tbl{ / }" style="margin-bottom:10px;">
						{ ? CONF['board_type'] == 'qna_dep' }
						<div class="qna_pic">
							<img src="" />
						</div>
						{ / }
						<table>
{*							<colgroup>*}
{*								<col style="width:105px" />*}
{*								<col style="width:200px"  />*}
{*								<col style="width:120px" />*}
{*								<col  />*}
{*							</colgroup>*}
							<tbody>
								{ ? CATS.size_ > 1 }
								<tr>
									<th>Category</th>
									<td colspan="3">
										<select name="category_idno" class="sel01 req" title="Please select a item." { ? CATEGORY_IDNO } disabled="disabled"{ / }>
										{ @ CATS }
											<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>
										{ / }
										</select>
									</td>
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'qna_dep' }
								<tr style="display: none;">
									<th>Manager</th>
									<td colspan="3">
										<span class="qna_ta"></span>
									</td>
								</tr>
								{ / }
								<tr>
									<th>Subject</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req ip_sbj" name="subject" value="{ DATA['subject'] }" maxlength="100" title="Please enter the Subject." />
										{ ? CAN_NOTICE == 'Y' && !RDATA['idno'] }
										<label><input type="checkbox" name="notice_yn" value="Y" { ? DATA['notice_yn'] == 'Y' } checked="checked"{ / } title="Please select whether or not to announce." /> Notice</label>
										{ / }
										{ ? CAN_SECRET == 'Y' && !RDATA['idno'] }
										<label><input type="radio" class="" title="공개" name="secret_yn" value="N" { ? DATA['secret_yn'] == 'N' }checked="checked"{ / } />Open</label>
										<label><input type="radio" class="" title="비공개" name="secret_yn" value="N" { ? DATA['secret_yn'] != 'N' }checked="checked"{ / } />Private</label>
										{ / }
									</td>
								</tr>
								{ ? CONF['auth_write'] == 'N' }
								{ ? CONF['board_type'] != 'qna_dep' &&	CONF['board_type'] != 'qna' }
								<tr>
									<th>Password</th>
									<td>
										<input type="password" class="ipTxt02 req" name="passwd" value="" maxlength="10" title="Please enter the Password." />
									</td>
									<th>Confirm Password</th>
									<td>
										<input type="password" class="ipTxt02 req" name="passwd_conf" value="" maxlength="10" title="Please enter the Confirm Password." />
									</td>
								</tr>
								{ / }
								<tr class="mb_col_tf mb_col_wr">
									<th>Name</th>
									<td class="mb_col_wr_td">
										<input type="text" class="ipTxt02 req" name="writer_name" value="{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }" maxlength="100" title="Please enter your Name." />
									</td>
									<th class="mb_col_move">Email</th>
									<td class="mb_col_move">
										<div class="for-mailform" data-name="email" data-class="ipTxt02 req,ipTxt02 req,sel01" data-attr="" >{ DATA['email'] }</div>
									</td>
								</tr>
								<tr class="mb_col_st mb_col_em">

								</tr>
								{ : }
								<tr>
									<th>Name</th>
									<td colspan="3">
										{ ? USERINFO['user_id'] == 'admin' }
										Manager
										{ : }
										{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }
										{ / }
									</td>
								</tr>
								{ / }
								<tr>
									<th>Contents</th>
									<td colspan="3">
										<textarea id="contents" name="contents" title="Please enter the Contents." class="req{ ? CONF['use_editor_yn'] == 'Y' } editor{ / }">{ DATA['contents'] }</textarea>
										<input type="hidden" name="editor_yn" value="{ CONF['use_editor_yn'] }" />
									</td>
								</tr>
								{ ? CONF['use_file_yn'] == 'Y' && CAN_FILE == 'Y' }
								<tr>
									<th>File</th>
									<td colspan="3" id="files" data-iname="file">
										<div class="info_tr">※ The maximum size of the file is { CONF['file_size_limit'] }Mb.</div>
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[]" value=""></input> <a class="btn_s act_file_add" href="#" data-max="{ CONF['file_limit'] }">add</a> <a class="btn_s del act_file_del" href="#" style="display:none">delete</a></div>
										<div class="filelist"></div>
										{ FILE_LIST_SCRIPT }
									</td>
								</tr>
								{ / }
							</tbody>
						</table>
						{ ? CONF['auth_write'] == 'N' && !DATA['idno'] }
						{ #captcha }
						{ / }
					</div>
					</form>

					<div class="btnBbs bbNone ">
						{ ? CONF['board_type'] != 'qna' && CONF['board_type'] != 'qna_dep' }
						<div class="left">
							<a href="./?{ QS }">List</a>
						</div>
						{ / }

						{ ? CONF['board_type'] == 'qna_dep' }
						<div class="right qna_dep_btn off">
							<a href="#" class="act_save">Submit</a>
							<a href="#" class="act_back">Cancel</a>
						</div>
						{ : }
						<div class="right">
							<a href="#" class="act_save">Submit</a>
							<a href="#" class="act_back">Cancel</a>
						</div>
						{ / }


					</div>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
