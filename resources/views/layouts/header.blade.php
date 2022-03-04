<nav class="navbar navbar-expand-lg navbar-light bg-white py-1 fixed-top shadow">
    <div class="container">
        <img src="{{ \Illuminate\Support\Facades\Storage::url("./images/logo.png") }}" alt="no-image" height="100" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span id="bar"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item" id="header-search">
                    <i class="fas fa-search"></i>
                </li>
                <li class="nav-item">
                    <span id="total-items">0</span>
                    <a id="cart" class="nav-link {{ request()->is('cart') ? 'active' : '' }}"
                        href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                </li>
                @auth
                <li class="nav-item ms-1" id="register">
                    <div class="btn-group">
                        <button class="btn dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="true" aria-expanded="false">
                            <i class="far fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                            <li>
                                <p class="px-1">{{ auth()->user()->name }}</p>
                                <form method="POST" action="/logout" class="text-center">
                                    @csrf
                                    <button class="logout-btn" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </li>
                @else
                <li class="nav-item ms-1" id="register">
                    <div class="btn-group">
                        <button class="btn dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="true" aria-expanded="false">
                            <i class="far fa-sign-in"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                            <li><a class="dropdown-item" href="/login">Log in</a></li>
                            <li><a class="dropdown-item" href="/register">Register</a></li>
                        </ul>
                    </div>

                </li>
                @endauth
            </ul>
        </div>
        <x-search-bar />
    </div>
</nav>
<script>
    let cartIcon = document.getElementById("total-items");
    if(localStorage.getItem("cart") && localStorage.getItem("cart") != "[]"){
        cartIcon.textContent = JSON.parse(localStorage.getItem("cart")).length;
    }else{
        cartIcon.textContent = 0;
        cartIcon.style.display = "none";
    }
    
</script>