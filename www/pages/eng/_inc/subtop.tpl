
			<!-- subTop -->
			<div class="subTop company">
				<div class="text">We welcome your investments in Korea.<br/>We will provide you with the best service.</div>
			</div>
			<!-- //subTop -->

{#dep2}

{ ? TABS.size_ > 1 }
			<div class="subNav subNavType2">
				<ul>
				{ @ TABS }
					<li{ ? .key_ == CONTENTS_NO } class="on"{ / } style="width:33.33%"><a href="{ BASE_URL }/{ MENU_NO }/{ .key_ }">{ .value_ }</a></li>
				{ / }
				</ul>
			</div>
{ / }
