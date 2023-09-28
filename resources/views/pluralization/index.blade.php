@extends('layouts.main')

@section('main.title', trans('pluralization.title'))

@section('main.content')
    {{ trans_choice('pluralization.content', 3) }}
@endsection
