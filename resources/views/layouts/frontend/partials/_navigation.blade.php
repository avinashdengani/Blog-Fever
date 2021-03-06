
<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{asset('/')}}">
                <img src="{{asset('frontend/assets/img/logo/logo-default.png')}}" alt="logo" style="width: 30px; height: 30px;">
                Blog-Fever
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="{{asset('/')}}" class="nav-link">Home</a>
                </li>
                @if (auth()->check())
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}">Login </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Sign Up</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
