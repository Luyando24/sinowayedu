<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="SinoWay Education" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ t('home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('universities*') ? 'active' : '' }}" href="{{ url('/universities') }}">{{ t('universities') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('programs*') ? 'active' : '' }}" href="{{ url('/programs') }}">{{ t('programs') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}" href="{{ url('/about') }}">{{ t('about') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('careers*') ? 'active' : '' }}" href="{{ url('/careers') }}">{{ t('careers') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">{{ t('contact_us') }}</a>
        </li>
      </ul>
      
      <div class="d-flex align-items-center">
        <!-- Language Switcher -->
        <div class="me-3">
          <x-language-switcher />
        </div>
        
        <!-- Authentication Links -->
        @guest
          <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ t('login') }}</a>
          <a href="{{ route('register') }}" class="btn primary-button">{{ t('register') }}</a>
        @else
          <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ t('profile') }}</a></li>
              @if(Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route('filament.admin.pages.dashboard') }}">{{ t('admin_dashboard') }}</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">{{ t('logout') }}</button>
                </form>
              </li>
            </ul>
          </div>
        @endguest
      </div>
    </div>
  </div>
</nav>