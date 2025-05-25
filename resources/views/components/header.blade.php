<header class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="SinoWay" height="40">
      </a>
      
      <!-- Hamburger Menu Button -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Navigation Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto text-end">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ lang('home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('universities*') ? 'active' : '' }}" href="{{ url('/universities') }}">{{ lang('universities') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('programs*') ? 'active' : '' }}" href="{{ url('/programs') }}">{{ lang('programs') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('why-us*') ? 'active' : '' }}" href="{{ url('/why-us') }}">{{ lang('why_us') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('careers*') ? 'active' : '' }}" href="{{url('/careers')}}">{{ lang('careers') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}" href="{{url('/news')}}">{{ lang('news') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact-us*') ? 'active' : '' }}" href="{{url('contact-us')}}">{{ lang('contact') }}</a>
          </li>
        </ul>
      </div>

      <!-- Right-end Button -->
      <div class="d-none d-lg-flex ms-3">
        @guest
            <a href="{{ url('login') }}" class="btn primary-button">{{ lang('login') }} / {{ lang('register') }}</a>
        @else
            <a href="{{ url('programs') }}" class="btn primary-button">{{ lang('all_programs') }}</a>
        @endguest
      </div>
    </div>
  </nav>
</header>

<style>
@media (max-width: 991.98px) {
  .navbar-collapse {
    padding: 1rem 0;
  }
  
  .navbar-nav .nav-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.05);
  }
  
  .navbar-nav .nav-item:last-child {
    border-bottom: none;
  }
}
</style>
<!-- Bootstrap Bundle (includes Popper for dropdowns) -->




