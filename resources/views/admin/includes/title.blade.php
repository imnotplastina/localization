<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">@yield('admin.title')</h1>

    @hasSection('admin.create')
        <a href="@yield('admin.create')" class="btn btn-primary btn-sm">
            Создать
        </a>
    @endif
</div>
