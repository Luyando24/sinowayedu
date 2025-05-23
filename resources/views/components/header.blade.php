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
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/why-us')}}">Why Us</a>
          </li>
          @if(auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{url('/programs')}}">Programs</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('/register')}}">Programs</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{url('/universities')}}">Universities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/careers')}}">Career Opportunities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/news')}}">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('about')}}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact-us')}}">Contact</a>
          </li>
        </ul>
      </div>

      <!-- Right-end Button -->
      <div class="d-none d-lg-flex">
        @guest
            <a href="{{ url('login') }}" class="btn primary-button">Login / Register</a>
        @else
            <a href="{{ url('programs') }}" class="btn primary-button">All Programs</a>
        @endguest
    </div>
    
    
    
    
    </div>
  </nav>
</header>
<!-- Bootstrap Bundle (includes Popper for dropdowns) -->

