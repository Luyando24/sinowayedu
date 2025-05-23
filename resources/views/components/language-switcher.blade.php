@props(['darkMode' => false])

<div class="dropdown">
  <button class="btn {{ $darkMode ? 'btn-outline-light' : 'btn-outline-secondary' }} btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    @if(app()->getLocale() == 'en')
      <span class="fi fi-gb"></span> {{ t('english') }}
    @elseif(app()->getLocale() == 'ru')
      <span class="fi fi-ru"></span> {{ t('russian') }}
    @elseif(app()->getLocale() == 'fr')
      <span class="fi fi-fr"></span> {{ t('french') }}
    @endif
  </button>
  <ul class="dropdown-menu" aria-labelledby="languageDropdown">
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('language.switch', 'en') }}">
        <span class="fi fi-gb"></span> {{ t('english') }}
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}" href="{{ route('language.switch', 'ru') }}">
        <span class="fi fi-ru"></span> {{ t('russian') }}
      </a>
    </li>
    <li>
      <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ route('language.switch', 'fr') }}">
        <span class="fi fi-fr"></span> {{ t('french') }}
      </a>
    </li>
  </ul>
</div>

