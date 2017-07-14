<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Qs &amp; As <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="" href="{{ route('posts.all') }}">All Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="" href="">Kidney Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Liver Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Heart Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Lungs Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Bladder Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Pancreas Questions</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Others</a></li>
                  </ul>
                </li>
                <li><a href="">Health Tips</a></li>
                <li><a href="{{ route('user.all') }}">Users</a></li>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('user.dashboard')}}"> Dashboard</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('user.profile') }} ">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('user.settings') }} ">Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>