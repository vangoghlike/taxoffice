{ ? CATS.size_ > 1 }
			<div class="tabType01">
				<ul>
				{ @ CATS }
					<li{ ? .key_ == CATEGORY_IDNO } class="on"{ / } style="width:{ =(100 / sizeof(CATS)) }%"><a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS_NO }/?category_idno={ .key_ }">{ .value_ }</a></li>
				{ / }
				</ul>
			</div>
{ / }
