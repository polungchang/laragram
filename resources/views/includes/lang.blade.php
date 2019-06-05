<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ config('languages')[App::getLocale()] }}
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach(config('languages') as $lang => $language)
            <a href="{{ route('lang.switch', $lang) }}" 
               class="dropdown-item 
               @if($lang == App::getLocale())
                   active
               @endif"
               >
                {{ $language }}
            </a>
        @endforeach
    </div>
</li>