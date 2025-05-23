<header class="bg-white shadow-sm border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
        <img src="{{ url('images/logo.png') }}" alt="Logo">
        <span class="ms-2">Sinowayedu</span>
      </a>      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{ lang('home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/why-us')}}">{{ lang('why_us') }}</a>
          </li>
          @if(auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{url('/programs')}}">{{ lang('programs') }}</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('/register')}}">{{ lang('programs') }}</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{url('/universities')}}">{{ lang('universities') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/careers')}}">{{ lang('careers') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/news')}}">{{ lang('news') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('about')}}">{{ lang('about') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact-us')}}">{{ lang('contact') }}</a>
          </li>
        </ul>
      </div>

      <!-- Right-end Button -->
      <div class="d-none d-lg-flex">
        @guest
            <a href="{{ url('login') }}" class="btn primary-button">{{ lang('login') }} / {{ lang('register') }}</a>
        @else
            <a href="{{ url('programs') }}" class="btn primary-button">{{ lang('all_programs') }}</a>
        @endguest
      </div>
    
    
    
    
    </div>
  </nav>
</header>
<!-- Bootstrap Bundle (includes Popper for dropdowns) -->



