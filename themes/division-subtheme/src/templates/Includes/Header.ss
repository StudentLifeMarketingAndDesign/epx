<div class="header__container header__container--{$DarkLight} header__container--{$HeaderType}">
	<% include DivisionBar %>
	<header id="header" class="header header--{$DarkLight} header--{$HeaderType}" role="banner">

		<div itemscope="" class="hide-for-medium" itemtype="http://schema.org/Organization">
			<h1 class="header__site-title"><a href="$AbsoluteBaseURL" class="header__link--{$DarkLight}" itemprop="url"><span class="show-for-sr" itemprop="name">$SiteConfig.Title</span><img src="{$ThemeDir}/src/images/epx-logo--{$DarkLight}.png" width="240" class="nav__logo" alt="" role="presentation" /></a></h1>
		</div>

		<div class="nav__toggle nav__toggle--menu show-for-small hide-for-medium">
			<button class="nav__link nav__link--{$DarkLight} nav__link--mobile-toggle" aria-controls="nav__wrapper"><span class="nav__menu-icon nav__menu-icon--{$DarkLight}" id="nav__menu-icon"></span><span class="nav__menu-text nav__menu-text--{$DarkLight}" id="nav__menu-text">Menu</span></button>
		</div>

		<div class="nav__toggle nav__toggle--search show-for-small hide-for-medium">
			<button class="nav__link nav__link--{$DarkLight}">
				<span class="show-for-sr">search</span>
				<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
			</button>
		</div>

	</header>
	<div class="nav-collapse">
		<% include Navigation %>
	</div>
</div>