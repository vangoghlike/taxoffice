{ ? sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) > 1 }

		<!-- subNav -->
{*			<div class="subNav">*}
{*				<ul>*}
{*				{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }*}
{*					<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>*}
{*				{ / }*}
{*				</ul>*}
{*			</div>*}
		{ ?  MENU_ORD_NO == '1' }			<!-- subNav -->
		<div class="subNav subNavType2 fiveTab">
			<ul>
				{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
				<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
				{ / }
			</ul>
		</div>
		{ :  MENU_ORD_NO == '2' }			<!-- subNav -->
		<div class="subNav subNavType2 fourTab">
			<ul>
				{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
				<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
				{ / }
			</ul>
		</div>
		{ :  MENU_ORD_NO == '3' }			<!-- subNav -->
		<div class="subNav subNavType2 threeTab">
			<ul>
				{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
				<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
				{ / }
			</ul>
		</div>
		{ : }
		<div class="subNav subNavType2">
			<ul>
				{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
				<li class="menu{ .idno }"{ ? MENU_ORD_NO == '0' }style="width:33.3%;"{ / }><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
				{ / }
			</ul>
		</div>
		<!-- //subNav -->
		{ / }
{ / }
