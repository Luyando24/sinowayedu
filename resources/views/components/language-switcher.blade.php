<div class="dropdown">
  <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    @if(app()->getLocale() == 'en')
      <span class="fi fi-gb"></span> English
    @elseif(app()->getLocale() == 'ru')
      <span class="fi fi-ru"></span> Russian
    @elseif(app()->getLocale() == 'fr')
      <span class="fi fi-fr"></span> French
    @endif
  </button>
  <ul class="dropdown-menu" aria-labelledby="languageDropdown">
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('language.switch', 'en') }}">
        <span class="fi fi-gb"></span> English
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}" href="{{ route('language.switch', 'ru') }}">
        <span class="fi fi-ru"></span> Russian
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ route('language.switch', 'fr') }}">
        <span class="fi fi-fr"></span> French
      </a>
    </li>
  </ul>
</div>


