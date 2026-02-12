{ #header }
		<link rel="stylesheet" type="text/css" href="/pages/taxjob/taxjob/css/taxjob_con.css"  media="all" />
		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">

{ #breadcrumbs }
				<!-- contStart -->
				<div class="contStart">


					<div>
						<ul>
							{ @MY_INCRUIT }
							<li class="consulting_1li" style="border:1px solid #988;">
								<a href="./tj_cpny_read?idno={ .idno }">
									<div class="topInfo">
										<div class="selView">
											<div class="txt">
												<div class="tit01">{ .user_name }</div>
												<div class="tit02">“{ .cont_title }”</div>
											</div>
											<!--<div class="viewBtn open">
                                                <img src="{ TYPE_URL }/images/counsel/open_view.png" alt="세무사정보 보기" />
                                            </div>-->
										</div>
									</div>
								</a>
							</li>
							{ : }
							<li>
								<p class="tac mt20">
									등록된 구인 등록 없습니다 세무 회계 구직자를 원하시면 구인등록해주세요!
								</p>
							</li>
							{ / }
						</ul>


						<br>
						<br>
						<br>

						<div class="btnBbs ar">
							<div class="right">
								<a href="/tj_cpny_write?">구인 등록</a>
							</div>
						</div>
					</div>





				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
