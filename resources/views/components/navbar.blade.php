<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="SinoWay" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ lang('home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('universities*') ? 'active' : '' }}" href="{{ url('universities') }}">{{ lang('universities') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('programs*') ? 'active' : '' }}" href="{{ url('programs') }}">{{ lang('programs') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}" href="{{ url('about') }}">{{ lang('about') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ url('contact') }}">{{ lang('contact') }}</a>
        </li>
      </ul>
      
      <!-- Language Switcher -->
      <div class="me-3">
        <x-language-switcher />
      </div>
      
      <!-- Authentication Links -->
      @guest
        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ lang('login') }}</a>
        <a href="{{ route('register') }}" class="btn btn-primary">{{ lang('register') }}</a>
      @else
        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ url('dashboard') }}">{{ lang('dashboard') }}</a></li>
            <li><a class="dropdown-item" href="{{ url('profile') }}">{{ lang('profile') }}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">{{ lang('logout') }}</button>
              </form>
            </li>
          </ul>
        </div>
      @endguest
    </div>
  </div>
</nav>


