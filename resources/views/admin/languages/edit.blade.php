@extends('layouts.admin')

@section('admin.title', 'Языки')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Изменить язык
            </h5>

            @include('admin.languages.form', [
                'action' => route('admin.languages.update', $language),
                'method' => 'put',
            ])
        </div>
    </div>
@endsection
