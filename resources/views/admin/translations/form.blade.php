<form action="{{ $action }}" method="POST">
    @csrf @method($method)

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">Группа</label>
                <input type="text" name="group" value="{{ old('group', $translation->group) }}" class="form-control" autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">Ключ</label>
                <input type="text" name="key" value="{{ old('key', $translation->key) }}" class="form-control">
            </div>
        </div>
    </div>

    @foreach(App\Models\Language::query()->get() as $language)
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label">Текст ({{ $language->name }})</label>
                <textarea name="text[{{ $language->id }}]" class="form-control" rows="2">{{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }}</textarea>
            </div>
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
</form>
