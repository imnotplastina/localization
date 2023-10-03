<div class="bg-light rounded p-3">
    <form action="{{ route('admin.translations.index') }}" method="GET">
        <div class="row">
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="mb-3">
                    <select name="group" class="form-control form-control-sm">
                        <option value="">Все группы</option>

                        @foreach (App\Models\Translation::query()->distinct()->pluck('group') as $group)
                            <option value="{{ $group }}" @selected(old('group', request('group')) === $group)>
                                {{ $group }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="mb-3">
                    <input type="text" name="key" value="{{ old('key', request('key')) }}"
                           class="form-control form-control-sm" placeholder="Ключ">
                </div>
            </div>

            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <div class="mb-3">
                    <input type="text" name="text" value="{{ old('text', request('text')) }}"
                           class="form-control form-control-sm" placeholder="Поиск">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    Применить
                </button>
            </div>

            <div class="col-12 col-md-3">
                <a href="{{ route('admin.translations.index') }}" class="btn btn-sm btn-secondary w-100">
                    Очистить
                </a>
            </div>
        </div>
    </form>
</div>
