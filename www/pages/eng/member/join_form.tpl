					  <fieldset>
					      <legend class="sr-only">Sign up Form</legend>
					      <div class="text">
						<p>Required information</p>
						<p class="right-text"><span class="red">*</span> Required.</p>
					      </div>
					      <table class="input_table">
						  <caption>ID, Password, Confirm Password, Name, Email, Cell phone number.</caption>
						  <colgroup>
						      <col style="width:123px">
						      <col>
						  </colgroup>
						  <tbody>
						  { ? SNSINFO }
						    <tr>
							<th>
							    <label>Easy Sign</label>
							</th>
							<td height="39">{ SNSINFO['type'] }</td>
						    </tr>
						    <tr>
							<th>
							    <label>Name</label>
							</th>
							<td height="39">{ SNSINFO['name'] }</td>
						    </tr>
						  { : }
						  { ? USER['user_id'] }
						    <tr>
							<th>
							    <label>ID</label>
							</th>
							<td height="39">{ USER['user_id'] }</td>
						    </tr>
						  { : }
						    <tr>
							<th>
							    <label for="newid">ID<div class="red">*<span class="sr-only">Required</span></div></label>
							</th>
							<td>
							    <input id="newid" type="text" name="user_id" size="49" class="req" value="" maxlength="16" title="Please enter your ID (English / number combination 6 ~ 16 characters)" data-pattern="id" data-minlen="6" required="required"/>
							    <button type="button" class="check_id act_id_check">ID duplication</button>
							</td>
						    </tr>
						  { / }
						    <tr>
							<th>
							    <label for="newpw">password{ ? !USER['user_id'] }<div class="red">*<span class="sr-only">Required</span></div>{ / }</label>
							</th>
							<td>
							    <input id="newpw" type="password" name="passwd" size="49" value="" maxlength="12" title="Please enter your password (English / number combination 4 ~ 12 characters)" data-pattern="wordnum" data-minlen="4"{ ? !USER['user_id'] } class="req" required="required"{ / }/>{ ? USER['user_id'] } (Enter at change){ / }
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="newpw2">password confirm{ ? !USER['user_id'] }<div class="red">*<span class="sr-only">Required</span></div>{ / }</label>
							</th>
							<td>
							    <input id="newpw2" type="password" name="passwd_conf" size="49" value="" maxlength="12" title="Please enter your password."{ ? !USER['user_id'] } class="req" required="required"{ / }/>
							</td>
						    </tr>
						  { ? USER['user_id'] }
						      <tr>
							  <th>
							      <label for="name">Name</label>
							  </th>
							  <td height="39">{ USER['user_name'] }</td>
						      </tr>
						  { : }
						      <tr>
							  <th>
							      <label for="name">Name<div class="red">*<span class="sr-only">Required</span></div></label>
							  </th>
							  <td>
							      <input id="name" type="text" name="user_name" maxlength="10" size="18" class="req" value="" title="Please enter your name" required="required"/>
							  </td>
						      </tr>
						  { / }
						  { / }
						      <tr>
							  <th>
							      <label for="email">Email<div class="red">*<span class="sr-only">Required</span></div></label>
							  </th>
							  <td>
								<div class="for-mailform" data-name="email" data-class="req,req," data-attr="required,required," >{ USER['email'] }</div>
							  </td>
						      </tr>
						      <tr>
							  <th>
							      <label for="askTell">Cell phone<div class="red">*<span class="sr-only">Required</span></div></label>
							  </th>
							  <td>
								<div class="for-phoneform" data-name="phone" data-class="tel,tel,tel" data-attr="required,required,required" >{ USER['phone'] }</div>
							  </td>
						      </tr>
						  </tbody>
					      </table>
					      <table class="input_table mt40" style="display:none;">
						  <caption>It is a membership registration form in the order of company name, phone number, address, occupation.</caption>
						  <colgroup>
						      <col style="width:123px">
						      <col>
						  </colgroup>
						  <tbody>
						    <tr>
							<th>
							    <label for="companyName">기업명</label>
							</th>
							<td>
							    <input id="companyName" type="text" name="company" size="49" value="{ USER['company'] }" maxlength="50" title="기업명을 입력해주세요." />
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="askTell2">전화번호</label>
							</th>
							<td>
								<div class="for-telform" data-name="tel" data-class="tel,tel,tel" data-attr="" >{ USER['tel'] }</div>
							</td>
						    </tr>
						      <tr>
							  <th>
							      <label for="adress">주소</label>
							  </th>
							  <td>
							      <input id="adress" type="text" class="postcode" name="postcode" size="18" value="{ USER['postcode'] }" readonly="readonly" />
							      <button type="button" class="search_adress search_address">우편번호</button>
							      <br>
							      <input type="text" name="addr1" value="{ USER['addr1'] }" size="50" class="mt5 addr1" readonly="readonly"> <span class="ml5">기본주소</span>
							      <br>
							      <input type="text" name="addr2" value="{ USER['addr2'] }" size="50" class="mt5 addr2" maxlength="100"> <span class="ml5">나머지주소</span>
							  </td>
						      </tr>
						      <tr>
							  <th>
							      <label for="userJob">직업</label>
							  </th>
							  <td>
							      <input id="userJob" type="text" name="job" size="50" value="{ USER['job'] }" maxlength="100" />
							  </td>
						      </tr>
						  </tbody>
					      </table>
					  </fieldset>
					  <div class="btns_wrap mt30 pt25 text-center borer-none">
					      <input class="join_blue_btn join_Btn mr10" type="submit" value="OK">
					      <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">Cancel</button>
					      
					      { ? USER['user_id'] }
					      { ? USER['user_id'] != 'admin' }
					      <div style="float:right"><button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/userleave'">탈퇴하기</button></div>{ / }
					      { / }
					  </div>
