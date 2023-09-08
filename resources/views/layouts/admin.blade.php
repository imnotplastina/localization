@extends('layouts.base')

@section('content')
    @include('admin.includes.navbar')

    <section>
        <div class="container">
            @include('admin.includes.title')
            @include('admin.includes.errors')
            @yield('admin.content')
        </div>
    </section>
@endsection
