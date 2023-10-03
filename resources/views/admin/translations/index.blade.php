@extends('layouts.admin')

@section('admin.title', 'Тексты')
@section('admin.create', route('admin.translations.create'))

@section('admin.content')
    @include('admin.translations.filter')
    @include('admin.translations.table')
@endsection
