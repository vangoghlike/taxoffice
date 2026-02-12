{ ? sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) > 1 && sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) < 8 }

	{ ? MENU_ORD_NO == '2' }
	<div class="subNav subNavType2 threeTab">
		<ul>
			{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
			<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
			{ / }
		</ul>
	</div>
	{ : }
	<!-- subNav -->
	<div class="subNav tp{ =sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) }">
		<ul>
			{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
			{ ? .lev_show_yn == 'Y' }
			{ ? USERINFO['user_auth'] != null }
			<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
			{ / }
			{ : }
			<li class="menu{ .idno }"><a href="{ BASE_URL }/{ ? .idno == '411'}{ .idno }/485/write?{ : }{ .idno }{ / }">{ .menu_title }</a></li>
			{ / }
			{ / }
		</ul>
	</div>
	{ / }

{ : sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) >= 8 }

<div class="subNav subNavType2">
	<ul>
		{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
		<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
		{ / }
	</ul>
</div>
{ : }
{ ? TABS.size_ > 1 }
<div class="subNav subNavType2">
	<ul>
		{ @ TABS }
		<li{ ? .key_ == CONTENTS_NO } class="on"{ / } style="width:{ ? sizeof(TABS) % 5 == 0 }20{ : }25{ / }%"><a href="{ BASE_URL }/{ MENU_NO }/{ .key_ }">{ .value_ }</a></li>
		{ / }
	</ul>
</div>
{ / }
{ / }

