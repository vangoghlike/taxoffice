{ ? CATS.size_ > 1 }
			<div class="tabType01 { ? BOARD_TYPE == 'knowledge' }kl-type{ / }">
				{ ? BOARD_TYPE == 'knowledge' }
					{ ? BOARD_KL_TYPE == 'csl' }
				<div class="kl-cate-wr">
					<ul>
						<li { ? KL_CATS_IDNO == ''}class="on"{ / }><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?">Han-Page</a></li>
						<li class="qna_li">
							<a href="{ BASE_URL }/411/485/write?">질문함</a>
						</li>

						<li>
							<a href="http://www.taxcallcenter.com/498">상담센터</a>
						</li>
					</ul>
				</div>
					{ / }
				{ / }

				{ ? BOARD_KL_TYPE != 'qna' }
				<ul class="{ ? BOARD_TYPE == 'job' }jb-tab{ / }">

				{ ? BOARD_TYPE == 'knowledge'}
					{ @ CATS }
					<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / }><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
					{ / }
				{ : }
					{ @ CATS }
					{ ? BOARD_TYPE == 'job' }
					<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / } style="width:16%"><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
					{ : }
					<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / } style="width:{ =(100 / sizeof(CATS)) }%"><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
					{ / }
					{ / }
				{ / }
				</ul>
				{ / }
			</div>
{ / }
