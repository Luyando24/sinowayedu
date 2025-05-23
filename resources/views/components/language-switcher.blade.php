<div class="dropdown">
  <button class="btn btn-sm btn-outline-light dropdown-toggle py-0" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.8rem;">
    @if(app()->getLocale() == 'en')
      <span class="fi fi-gb"></span> {{ __('messages.english') }}
    @elseif(app()->getLocale() == 'ru')
      <span class="fi fi-ru"></span> {{ __('messages.russian') }}
    @elseif(app()->getLocale() == 'fr')
      <span class="fi fi-fr"></span> {{ __('messages.french') }}
    @endif
  </button>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ url('lang/en') }}">
        <span class="fi fi-gb"></span> {{ __('messages.english') }}
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}" href="{{ url('lang/ru') }}">
        <span class="fi fi-ru"></span> {{ __('messages.russian') }}
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ url('lang/fr') }}">
        <span class="fi fi-fr"></span> {{ __('messages.french') }}
      </a>
    </li>
  </ul>
</div>





