<div class="mobile-nav d-md-none">
    <nav class="navbar fixed-bottom bg-white shadow-lg py-2">
        <div class="container-fluid px-0">
            <div class="row w-100 text-center mx-0">
                <div class="col">
                    <a href="{{ url('/') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home fa-lg mb-1"></i>
                        <span class="small">{{ lang('home') }}</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('programs') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('programs*') ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap fa-lg mb-1"></i>
                        <span class="small">{{ lang('programs') }}</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('universities') }}" class="d-flex flex-column align-items-center text-decoration-none {{ request()->is('universities*') ? 'active' : '' }}">
                        <i class="fas fa-university fa-lg mb-1"></i>
                        <span class="small">{{ lang('universities') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
.mobile-nav {
    z-index: 1030;
}

.mobile-nav .navbar {
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    padding-bottom: env(safe-area-inset-bottom) !important;
}

.mobile-nav a {
    color: #6c757d;
    transition: color 0.2s ease;
}

.mobile-nav a.active {
    color: #3EA2A4;
}

.mobile-nav a:hover {
    color: #3EA2A4;
}

/* Add padding to the bottom of the page content to prevent the navbar from covering content */
@media (max-width: 767.98px) {
    body {
        padding-bottom: 70px;
    }
}
</style>