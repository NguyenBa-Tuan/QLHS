@extends('layouts.app')

@section('page-title', 'Admin')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{ session('needLogin') }}</h2>
@endif
@section('content')

    <div class="container">
        {{-- {{dd($courses)}} --}}
        @if (session('exist_user'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{session('exist_user')}}</li>
                </ul>
            </div>
        @endif
        @if (session('count'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{session('count')}}</li>
                </ul>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 style="text-align:center;">Đăng kí khóa học</h1>
        <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data" class="form-select-course">
            @csrf
            <h2>
                Tên khóa học
            </h2>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-2">
                        <label for="course{{$course->id}}" class="form-label">
                            <input type="checkbox" value="{{$course->id}}" name="course" id="course{{$course->id}}">
                            {{$course->name}}
                        </label>
                    </div>
                @endforeach
            </div>
            {{-- <input type="text" name="name" id="title" class="form-control" placeholder="" value=""> --}}
            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary mg-t-10">Đăng kí khóa học</button>
        </form>

    </div>

    <div class="container list">
        {{-- {{dd(Auth::user()->id)}} --}}
        <h2>Thông tin các khóa học</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên khóa học</th>
                <th scope="col">Tên sv đăng kí</th>
                <th scope="col">Tổng số sv đã đăng kí</th>
            </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $key => $value)
                    {{-- {{dd($value)}} --}}
                    <tr>
                        <th scope="row"> @php
                            echo $value->id;
                        @endphp</th>
                        <td>{{$value->course_name}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->count_student}}</td>
                        {{-- <td>
                            <form role="form" action="{{route('users.destroy', $value->id)}}" method="post">
                                @method('DELETE')
                                <button type="submit" class="btn btn-default">Xóa <i class="bi bi-x"></i></button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </td>
                        <td><a href="{{route('users.edit', $value->id)}}" class="btn btn-info">Sửa <i class="bi bi-arrow-counterclockwise"></i></a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {         
                $('input:checkbox').click(function() {
                    $('input:checkbox').not(this).prop('checked', false);
                    console.log('test')
                });  
            });
        })(jQuery);
    </script>
@endsection

