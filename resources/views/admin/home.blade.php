@extends('layouts.app')

@section('page-title', 'Admin')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{ session('needLogin') }}</h2>
@endif
@section('content')
    {{-- {{dd($data)}} --}}
    <div class="tab">

        <div class="container">
            <div class="tab-title">
                <a href="#users" class="btn btn-outline-primary">Sinh viên</a>
                <a href="#courses" class="btn btn-outline-primary">Khóa học</a>
            </div>
        </div>
        <div id="users" class="tab-ct">
            @include('admin.users')
        </div>
        
        <div id="courses" class="tab-ct">
            @include('admin.courses');
        </div>

    </div>

@endsection
