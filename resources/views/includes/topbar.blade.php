<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="@lang('layout_sidebar_topbar.search.placeholder')"
                aria-label="@lang('layout_sidebar_topbar.search.name')" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="@lang('layout_sidebar_topbar.search.placeholder')" aria-label="@lang('layout_sidebar_topbar.search.name')"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">0</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    @lang('layout_sidebar_topbar.notifications.header')
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">@lang('layout_sidebar_topbar.notifications.all')</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">0</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    @lang('layout_sidebar_topbar.messages.header')
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="/img/undraw_profile_1.svg"
                            alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="/img/undraw_profile_2.svg"
                            alt="">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="/img/undraw_profile_3.svg"
                            alt="">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                            alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">@lang('layout_sidebar_topbar.messages.all')</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown">
          <!-- <a href="#" class="dropdown-toggle pr-2 pl-2 pr-sm-4 pl-sm-4" data-toggle="dropdown">
              <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
              <span class="name d-none d-sm-inline">{{ mb_strtoupper(LaravelLocalization::getCurrentLocale()) }}</span> <b class="caret"></b>
          </a>
          <div class="dropdown-menu">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item"><span class="flag-icon flag-icon-{{$localeCode}}" title="{{$localeCode}}"></span> {{ $properties['native'] }}</a>
          @endforeach
          </div> -->


            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">En</span> -->

                @switch(LaravelLocalization::getCurrentLocale())
                    @case('uk')
                    <span class="flag-icon flag-icon-ua" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                     @break
                    @case('en')
                    <span class="flag-icon flag-icon-us" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                     @break
                    @case('ru')
                    <span class="flag-icon flag-icon-ru" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                     @break
                    @default
                    <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                @endswitch
                <span class="name d-none d-sm-inline">{{ mb_strtoupper(LaravelLocalization::getCurrentLocale()) }}</span> <b class="caret"></b>
                <!-- <img class="img-profile rounded-circle"
                    src="/img/undraw_profile.svg"> -->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#"> -->
                    <!-- <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> -->

                <!-- </a> -->
                <!-- <a class="dropdown-item" href="#"> -->
                    <!-- <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> -->

                <!-- </a> -->
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="dropdown-item">
                        @switch($localeCode)
                            @case('uk')
                            <span class="flag-icon flag-icon-ua" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                             @break
                            @case('en')
                            <span class="flag-icon flag-icon-us" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                             @break
                            @case('ru')
                            <span class="flag-icon flag-icon-ru" title="{{ LaravelLocalization::getCurrentLocale() }}"></span>
                             @break
                            @default
                            <span class="flag-icon flag-icon-{{$localeCode}}" title="{{$localeCode}}"></span>
                        @endswitch
                        {{ $properties['native'] }}</a>
                @endforeach
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle"
                    src="/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    @lang('layout_sidebar_topbar.user_info.profile')
                </a>
                <a class="dropdown-item" href="{{ route('user.settings') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    @lang('layout_sidebar_topbar.user_info.settings')
                </a>
                <a class="dropdown-item" href="{{ route('user.log') }}">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    @lang('layout_sidebar_topbar.user_info.activity_log')
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    @lang('layout_sidebar_topbar.user_info.logout')
                </a>
            </div>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('miscellaneous.logout_modal.header')</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">@lang('miscellaneous.logout_modal.info')</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang('miscellaneous.logout_modal.cancel_button')</button>
                            <a class="btn btn-primary" href="{{route('logout')}}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">@lang('miscellaneous.logout_modal.logout_button')</a>
                        </div>
                    </div>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
