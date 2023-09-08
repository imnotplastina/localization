@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="ps-3 mb-0 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
