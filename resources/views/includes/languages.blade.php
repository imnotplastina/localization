@php($languages = App\Models\Language::getActive())

<li class="nav-item dropdown">
    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        {{ $languages->firstWhere('id', app()->getLocale())?->name }}
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        @foreach($languages as $language)
            @if($language->id !== app()->getLocale())
                <li><a href="{{ route('language', $language) }}" class="dropdown-item">{{ $language->name }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
