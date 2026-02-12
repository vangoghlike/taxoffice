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
						{ @MY_JOB }
						<li class="consulting_1li" style="border:1px solid #988;">
							<a href="./tj_user_read?idno={ .idno }">
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
									등록된 이력이 없습니다 세무 회계 일자리를 원하시면 이력을 작성해주세요!
								</p>
							</li>
						{ / }
						</ul>


						<br>
						<br>
						<br>

						<div class="btnBbs ar">
							<div class="right">
								<a href="/taxjob/tj_user_write?">이력 작성하기</a>
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
