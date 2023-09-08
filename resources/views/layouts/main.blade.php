@extends('layouts.base')

@section('content')
    @include('includes.navbar')

    <section>
        <div class="container">
            <h1 class="h3">@yield('main.title')</h1>

            @yield('main.content')
        </div>
    </section>
@endsection
