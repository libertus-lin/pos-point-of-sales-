<!-- ======== Preloader =========== -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ request()->is('categories') ? 'active' : '' }}" href="{{ url('categories') }}">
                        <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ url('products') }}">
                        <i class="bi bi-circle"></i><span>Products</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Transaction</li>

        <li class="nav-item">
            <a class="nav-link  {{ request()->is('orders') ? 'active' : '' }}" href="{{ url('orders') }}">
                <i class="bi bi-cart"></i>
                <span>Orders</span>
            </a>
        </li><!-- End Orders Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li><!-- End Users Page Nav -->

        <li class="nav-heading">About</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ url('profile') }}">
                <i class="bi bi-person"></i>
                <span>About Me</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside>
<!-- ======== sidebar-nav end =========== -->
