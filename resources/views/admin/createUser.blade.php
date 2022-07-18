@extends('layouts.app')

@section('page-title', 'Đăng nhập')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{session('needLogin')}}</h2>    
@endif
@section('content')
    <div class="container">

        <h1 style="text-align:center;">Thêm học sinh</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="form-label">
                Username
            </label>
            <input type="text" name="name" id="title" class="form-control" placeholder="" value="">

            <label for="title" class="form-label">
                Email
            </label>
            <input type="text" name="email" id="title" class="form-control" placeholder="" value="">

            <label for="content" class="form-label">
                Password
            </label>
            <input type="text" name="password" id="content" class="form-control" placeholder="" value="">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary mg-t-10">Đăng nhập</button>
        </form>
        
    </div>
@endsection