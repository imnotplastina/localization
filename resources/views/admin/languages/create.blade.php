@extends('layouts.admin')

@section('admin.title', 'Языки')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Создать язык
            </h5>

            @include('admin.languages.form', [
                'action' => route('admin.languages.store'),
                'method' => 'post',
            ])
        </div>
    </div>
@endsection
