@extends('layouts.app')

@section('page-title', 'Admin')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{ session('needLogin') }}</h2>
@endif
@section('content')
    {{-- {{dd($data)}} --}}
    @include('admin.users')

@endsection
