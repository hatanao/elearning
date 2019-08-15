@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 m-auto">
            <form method="post" action="/user/update/{{Auth::user()->id}}" enctype="multipart/form-data">
            @csrf
            <div class="avatar text-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($is_image)
                <figure>
                    <img src="/storage/profile_images/{{ Auth::id() }}.jpg" class="rounded-circle" style="width: 75px;">
                    <figcaption>現在のプロフィール画像</figcaption>
                </figure>
                @endif
                <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 75px;">
                <div class="py-2">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group" >
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" value="{{ $user->name }}" name="new_name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="new_email">
            </div>
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection