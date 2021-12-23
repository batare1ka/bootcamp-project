<nav class="navbar navbar-expand-lg navbar-light bg-white py-1 fixed-top shadow">
<div class="container">
    <img src="{{ URL('assets/images/logo.png') }}" alt="no-image" height="100" />
    <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
    <span id="bar"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" aria-current="page" href="{{ route('shop') }}">Shop</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" aria-current="page" href="{{ route('blog') }}">Blog</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" aria-current="page" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" aria-current="page" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
        <i class="fas fa-search"></i>
        </li>
        <li class="nav-item">
            @if (request()->path() === 'shop')
               <span id="total-items">0</span>
            @endif
        <a id="cart" class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a>
        </li>
    </ul>
    </div>
</div>
</nav>