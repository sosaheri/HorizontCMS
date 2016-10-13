<nav class="navbar navbar-default navbar-fixed-top">
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
                 <a class='navbar-brand' href="{{url(Config::get('horizontcms.backend_prefix'))}}">
                    <img src="{{ url(config('horizontcms.admin_logo')) }}" style='max-height:170%;margin-top:-7px;float:left;'> <!--HorizontCMS <!-- SatelliteCMS -->
                  </a>
                  <div class='visible-xs navbar-brand' style='color:white;text-align:center;'>HorizontCMS</div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  @include(config('laravel-menu.views.bootstrap-items'), array('items' => $MainMenu->roots()))
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url(Config::get('horizontcms.backend_prefix').'/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url(Config::get('horizontcms.backend_prefix').'/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>