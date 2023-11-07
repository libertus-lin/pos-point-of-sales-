{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> --}}
<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <img src="{{ asset('favicon.png') }}" alt="logo" width="50">
            Codelin<b class="text-primary">Store</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">
                    <i class='bx bx-home'></i>
                    {{ __('Beranda') }}
                </a>
                <a class="nav-link {{ request()->is('category') ? 'active' : '' }}" href="{{ url('category') }}">
                    <i class='bx bx-category'></i>
                    {{ __('Category') }}
                </a>
                <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ url('cart') }}">
                    {{ __('Cart') }}
                    <span class="badge badge-pill bg-primary cartCount">0</span>
                </a>
                <a class="nav-link {{ request()->is('wishlist') ? 'active' : '' }}" href="{{ url('wishlist') }}">
                    {{ __('Wishlist') }}
                    <span class="badge badge-pill bg-success wishlistCount">0</span>
                </a>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                                <i class='bx bx-log-in' ></i>
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">
                                <i class='bx bx-user' ></i>
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('my-orders') }}">{{ __('My Orders') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <!-- End Authentication Links -->

            </div>
        </div>
    </div>
</nav>
