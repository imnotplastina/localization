<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ active_link('admin.home', 'text-primary') }}"
                        aria-current="page">
                        Главная
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.languages.index') }}"
                        class="nav-link {{ active_link('admin.languages*', 'text-primary') }}" aria-current="page">
                        Языки
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.translations.index') }}"
                        class="nav-link {{ active_link('admin.translations*', 'text-primary') }}" aria-current="page">
                        Тексты
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @include('includes.languages')
            </ul>
        </div>
    </div>
</nav>
