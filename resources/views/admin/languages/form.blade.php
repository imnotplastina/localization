<form action="{{ $action }}" method="POST">
    @csrf @method($method)

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">ID языка</label>
                <input type="text" name="id" value="{{ old('id', $language->id) }}" class="form-control" autofocus>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label class="form-label">Название языка</label>
                <input type="text" name="name" value="{{ old('name', $language->name) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" name="active" value="1" @checked(old('active', $language->active)) class="form-check-input"
                id="active">
            <label class="form-check-label" for="active">
                Показывать на сайте
            </label>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" name="default" value="1" @checked(old('default', $language->default)) class="form-check-input"
                id="default">
            <label class="form-check-label" for="default">
                По-умолчанию
            </label>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" name="fallback" value="1" @checked(old('fallback', $language->fallback)) class="form-check-input"
                id="fallback">
            <label class="form-check-label" for="fallback">
                Резервный
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
</form>
