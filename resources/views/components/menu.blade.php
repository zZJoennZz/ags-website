<nav class="j-nav" aria-label="menu" style="padding: 1rem 0;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#website-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('home') }}" class="logo"><img src="img/logo-ft.png" alt="" width="200px"></a>
        </div>

        <div class="collapse navbar-collapse" id="website-menu">
            <ul class="nav navbar-nav navbar-right" style="font-size: 2rem; padding-top: 2rem;">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('agent.job') }}">Agent Job</a></li>
                <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
{{--
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('home') }}" class="logo"><img src="img/logo-ft.png" alt="" width="100%"></a>
                    <ul class="nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="#apply">Agent Job</a></li>
                        <li><a href="../Contact/contact us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header> --}}