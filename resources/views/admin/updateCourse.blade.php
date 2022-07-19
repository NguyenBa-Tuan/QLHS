@extends('layouts.app')

@section('page-title', 'Cập nhật')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{session('needLogin')}}</h2>    
@endif
@section('content')
    <div class="container">

        <h1 style="text-align:center;">Cập nhật khóa học</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- {{ dd($data->name)}} --}}
        <form action="{{route('courses.update', $data->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="title" class="form-label">
                Tên khóa học
            </label>
            <input type="text" name="name" id="title" class="form-control" placeholder="{{$data->name}}" value="{{$data->name}}">

            <label for="title" class="form-label">
                Số lượng sinh viên
            </label>
            <input type="number" name="count_student_max" id="count_student_max" class="form-control" placeholder="{{$data->count_student_max}}" value="{{$data->count_student_max}}">
            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary mg-t-10">Cập nhật</button>
        </form>
        
    </div>
@endsection