<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          B 2 B</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.home')</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-folder"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.products.name')</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('layout_sidebar_topbar.sidebar.products.actions'):</h6>
                <!-- <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a> -->
                <a class="collapse-item" href="{{route('products.all')}}">@lang('layout_sidebar_topbar.sidebar.products.all')</a>
            </div>
        </div>
    </li>



     @can('able_to_manage_orders')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStorages"
            aria-expanded="true" aria-controls="collapseStorages">
            <i class="fas fa-boxes"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.storages.name')</span>
        </a>
        <div id="collapseStorages" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('layout_sidebar_topbar.sidebar.storages.actions'):</h6>
                <a class="collapse-item" href="{{route('storages.all')}}">@lang('layout_sidebar_topbar.sidebar.storages.all_for_company', ['company' => auth()->user()->company_name])</a>
            </div>
        </div>
    </li>
            @endcan
            @can('able_to_manage_content_storages')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStorages"
            aria-expanded="true" aria-controls="collapseStorages">
            <i class="fas fa-boxes"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.storages.name')</span>
        </a>
        <div id="collapseStorages" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('layout_sidebar_topbar.sidebar.storages.actions'):</h6>
                <a class="collapse-item" href="{{route('storages.all')}}">@lang('layout_sidebar_topbar.sidebar.storages.all_for_company', ['company' => auth()->user()->company_name])</a>
            </div>
        </div>
    </li>
            @endcan
            @can('admin')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStorages"
            aria-expanded="true" aria-controls="collapseStorages">
            <i class="fas fa-boxes"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.storages.name')</span>
        </a>
        <div id="collapseStorages" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('layout_sidebar_topbar.sidebar.storages.actions'):</h6>
                <a class="collapse-item" href="{{route('storages.all')}}">@lang('layout_sidebar_topbar.sidebar.storages.all_for_company', ['company' => auth()->user()->company_name])</a>
            </div>
        </div>
    </li>
            @endcan


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
            aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-shopping-cart"></i>
            <span>@lang('layout_sidebar_topbar.sidebar.orders.name')</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">@lang('layout_sidebar_topbar.sidebar.orders.actions'):</h6>
            @can('able_to_order')
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.all')</a>
            <!-- <a class="collapse-item" href="{{route('cart.show')}}">@lang('layout_sidebar_topbar.sidebar.orders.cart')</a>
            <a class="collapse-item" href="{{route('wishlist.show')}}">@lang('layout_sidebar_topbar.sidebar.orders.wishlist')</a> -->
            @endcan
            @can('able_to_manage_orders')
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.all_for_company', ['company' => auth()->user()->company_name])</a>
            @endcan
            @can('able_to_manage_content_storages')
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.all_for_company', ['company' => auth()->user()->company_name])</a>
            @endcan
            @can('admin')
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.all')</a>
            <!-- <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.cart')</a>
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.wishlist')</a> -->
            <a class="collapse-item" href="{{route('orders.all')}}">@lang('layout_sidebar_topbar.sidebar.orders.all_for_company', ['company' => auth()->user()->company_name])</a>
            @endcan
            </div>
        </div>
    </li>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->

</ul>
<!-- End of Sidebar -->
