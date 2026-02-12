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

				      <form class="joinStep3" id="frm_leave" name="frm_leave" method="post" action="">
				      <input type="hidden" name="act" value="out" />

					  <fieldset>
					      <legend class="sr-only">회원탈퇴 양식테이블입니다.</legend>
					      <table class="input_table">
						  <caption>탈퇴사유 입력내용입니다.</caption>
						  <colgroup>
						      <col style="width:123px">
						      <col>
						  </colgroup>
						  <tbody>
						      <tr>
							  <th>
							      <label for="out_reason">탈퇴사유<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							  </th>
							  <td>
							      <input id="out_reason" type="text" name="out_reason" maxlength="300" size="110" class="req" value="" title="탈퇴사유를 입력해주세요." required="required"/>
							  </td>
						      </tr>
						  </tbody>
					      </table>
					  </fieldset>
					  <div class="btns_wrap mt30 pt25 text-center borer-none">
					      <input class="join_blue_btn join_Btn mr10" type="submit" value="확인">
					      <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">취소</button>
					  </div>

				      </form>

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
