<!-- Top Bar -->
<div class="top-bar bg-dark text-white py-2">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <!-- Left + Center Links (merge for inline layout) -->
    <div class="d-none d-md-flex flex-wrap flex-md-nowrap gap-3 align-items-center">
      <a href="{{url('why-us')}}" class="text-white text-decoration-none small">{{ lang('why_us') }}</a>
      <a href="{{url('cities')}}" class="text-white text-decoration-none small">{{ lang('cities') }}</a>
      <a href="{{url('careers')}}" class="text-white text-decoration-none small">{{ lang('careers') }}</a>
      @if(auth()->check())
      <a href="{{ url('programs') }}" class="text-white text-decoration-none fw-semibold small">{{ lang('programs') }}</a>
      @else
      <a href="{{ url('membership-notice') }}" class="text-white text-decoration-none small">{{ lang('programs') }}</a>
      @endif
    </div>

    <!-- Right: Language Switcher + Email + Logout -->
    <div class="d-flex align-items-center gap-3 text-end ms-auto">
      <!-- Language Switcher -->
      <div class="text-white">
        <x-language-switcher />
      </div>
      
      <a href="mailto:info@sinowayedu.com" class="text-white text-decoration-none small d-none d-md-inline">info@sinowayedu.com</a>

      @auth
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-light small px-3 py-1">{{ __('messages.logout') }}</button>
        </form>
      @endauth
    </div>
  </div>
</div>








