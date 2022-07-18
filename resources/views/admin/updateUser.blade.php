@extends('layouts.app')

@section('page-title', 'Cập nhật')
@if (session('needLogin'))
    <h2 style="text-align=center;">{{session('needLogin')}}</h2>    
@endif
@section('content')
    <div class="container">

        <h1 style="text-align:center;">Cập nhật học sinh</h1>
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
        <form action="{{route('users.update', $data->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="title" class="form-label">
                Username
            </label>
            <input type="text" name="name" id="title" class="form-control" placeholder="{{ $data->name }}" value="{{ $data->name }}">

            <label for="title" class="form-label">
                Email
            </label>
            <input type="text" name="email" id="title" class="form-control" placeholder="{{ $data->email }}" value="{{ $data->email }}">

            <label for="content" class="form-label">
                Password
            </label>
            <input type="password" name="password" id="content" class="form-control" placeholder="" value="">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary mg-t-10">Cập nhật</button>
        </form>
        
    </div>
@endsection