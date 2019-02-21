<!-- header
   ================================================== -->
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="/">
            <img src="images/logo.svg" alt="Builders & Co-Creators">
        </a>
    </div> <!-- end header__logo -->

    <a class="header__search-trigger" href="#0"></a>
    <div class="header__search">

        <form role="search" method="get" class="header__search-form" action="#">
            <label>
                <span class="hide-content">Search for:</span>
                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

    </div>  <!-- end header__search -->

    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="/" title="">Home</a></li>
            <li><a href="#" title="">About Us</a></li>
            <li><a href="#" title="">Blogs</a></li>
            @if (Auth::check())
                <li><a href="{{ route('dashboard') }}" class="text-primary" title="">| Dashboard |</a></li>
            @else
                <li><a href="{{ route('login') }}" title="">Login</a></li>
            @endif
        </ul> <!-- end header__nav -->

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end header__nav-wrap -->

</header> <!-- s-header -->