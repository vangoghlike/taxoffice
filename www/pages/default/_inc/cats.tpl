{ ? CATS.size_ > 1 }
<div class="tabType01 { ? BOARD_TYPE == 'knowledge' }kl-type{ / }">
	{ ? BOARD_TYPE == 'knowledge' }
	<div class="kl-cate-wr">
		<ul>
			<li { ? KL_CATS_IDNO == ''}class="on"{ / }><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?">Han-Page</a></li>
			<li class="qna_li">
				<a href="{ BASE_URL }/544/619/write?">질문함</a>
			</li>
		</ul>
	</div>
	<ul>
		{ @ CATS }
		<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / }><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
		{ / }
	</ul>
	{ : }
	<ul>
		{ @ CATS }
		<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / } style="width:{ =(100 / sizeof(CATS)) }%"><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
		{ / }
	</ul>
	{ / }
</div>
{ / }
