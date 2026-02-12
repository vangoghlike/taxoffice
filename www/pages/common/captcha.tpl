						<!-- 자동방지 -->
						<div class="automatic_wrap clearfix">
							<div class="automatic_img_wrap">
								<div>
									<img id="captcha" class="captcha" src="/common/securimage/securimage_show.php?{ =md5(uniqid(time)) }" alt="자동입력 방지 문자 이미지"/>
								</div>
								<div class="btn_area">
									<a tabindex="-1" style="display:inline-block;margin-bottom:5px;" href="#" title="Refresh Image" onclick="document.getElementById('captcha').src = '/common/securimage/securimage_show.php?' + Math.random(); captcha_image_audioObj.refresh(); this.blur(); return false">
										<img height="35" width="126" src="/common/securimage/btn_automatic_reset.png" alt="Refresh Image" onclick="this.blur()" style="border: 0px; vertical-align: bottom" />
									</a>
									<div id="captcha_image_audio_div" style="display:block;max-height:37px;overflow:hidden;">
										<audio id="captcha_image_audio" preload="none" style="display: none;">
											<source id="captcha_image_source_wav" src="/common/securimage/securimage_play.php?id={ CONTENTS_NO }" type="audio/wav" />
											<object type="application/x-shockwave-flash" data="/common/securimage/securimage_play.swf?bgcol=%23ffffff&amp;icon_file=%2Fcommon%2Fsecurimage%2Fbtn_automatic_voice.png&amp;audio_file=%2Fcommon%2Fsecurimage/securimage_play.php?id={ CONTENTS_NO }" height="126" width="126">
												<param name="movie" value="/common/securimage/securimage_play.swf?bgcol=%23ffffff&amp;icon_file=%2Fcommon%2Fsecurimage%2Fbtn_automatic_voice.png&amp;audio_file=%2Fcommon%2Fsecurimage%2Fsecurimage_play.php?id={ CONTENTS_NO }" />
											</object>
										</audio>
									</div>
									<div id="captcha_image_audio_controls">
										<a tabindex="-1" class="captcha_play_button" href="/common/securimage/securimage_play.php?id={ CONTENTS_NO }" onclick="return false">
											<img class="captcha_play_image" height="35" width="126" src="/common/securimage/btn_automatic_voice.png" alt="Play CAPTCHA Audio" style="border: 0px">
											<img class="captcha_loading_image rotating" height="32" width="32" src="/common/securimage/images/loading.png" alt="Loading audio" style="display: none">
										</a>
										<noscript>Enable Javascript for audio controls</noscript>
									</div>
									<script type="text/javascript" src="/common/securimage/securimage.js"></script>
									<script type="text/javascript">
										captcha_image_audioObj = new SecurimageAudio({ audioElement: 'captcha_image_audio', controlsElement: 'captcha_image_audio_controls' });
									</script>
								</div>
							</div>
							<div class="automatic_input_wrap">
								<div>
									<p>{ ? SITE_INFO['lang_code'] == 'ko' }자동입력 방지 숫자를 입력하여 주세요.{ : }Please input numbers to prevent automatic input.{ / }</p>
									<input type="text" name="captcha_code" maxlength="6" title="{ ? SITE_INFO['lang_code'] == 'ko' }자동입력 방지 숫자를 입력하여 주세요.{ : }Please input numbers to prevent automatic input.{ / }" class="ipTxt02 req" />
								</div>
							</div>
						</div>
						<!-- //자동방지 -->
