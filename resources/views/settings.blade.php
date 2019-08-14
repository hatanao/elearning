@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 m-auto">
            <form method="post" action="/user/update/{{Auth::user()->id}}">
            @csrf
            <div class="avatar text-center">
                <img src="/img/{{ Auth::user()->avatar }}" class="rounded-circle">
                <div class="py-2">
                    <a href="user/edit/{{Auth::user()->id}}" class="btn btn-primary">Change Image</a>
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
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection