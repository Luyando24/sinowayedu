<!-- Top Bar -->
<div class="bg-dark text-white py-2">
  <div class="container d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center">

    <!-- Left + Center Links (merge for inline layout) -->
    <div class="d-flex flex-wrap flex-md-nowrap gap-3 align-items-center">
      <a href="{{url('why-us')}}" class="text-white text-decoration-none small">Why Us</a>
      <!--<a href="#" class="text-white text-decoration-none small">Scholarships</a>-->
      <a href="{{url('cities')}}" class="text-white text-decoration-none small">Cities</a>
      <a href="{{url('careers')}}" class="text-white text-decoration-none small">Career Opportunities</a>
      @if(auth()->check())
      <a href="{{ url('programs') }}" class="text-white text-decoration-none fw-semibold small">Programs</a>
      @else
      <a href="{{ url('membership-notice') }}" class="text-white text-decoration-none small">Programs</a>
      @endif
    </div>

    <!-- Right: Email (desktop only) + Logout -->
    <div class="d-flex align-items-center gap-3 text-end mt-2 mt-md-0 ms-auto">
      <a href="mailto:info@sinowayedu.com" class="text-white text-decoration-none small d-none d-md-inline">info@sinowayedu.com</a>

      @auth
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-light small px-3 py-1">Logout</button>
        </form>
      @endauth
    </div>

  </div>
</div>
