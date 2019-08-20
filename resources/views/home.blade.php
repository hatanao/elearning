@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">


    @if (isset($success))
        <div class="alert alert-success">
            <ul>
                <li>{{$success}}</li>
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-4">
            <div class="panel user-profile bg-white p-3">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 10vw;height: 10vw;">
                        </div>

                        <div class="py-2">
                            <h2>{{ Auth::user()->name }}</h2>
                            <a href="/user/edit/{{Auth::user()->id}}" class="btn btn-primary">Edit profile</a>
                        </div>

                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <div>following</div>
                                <strong><a href="/user/followingList">{{Auth::user()->following()->count()}}</a></strong>
                            </div>
                            <div class="col-sm-6">
                                <div>followers</div>
                                <strong><a href="/user/followerList">{{Auth::user()->followers()->count()}}</a></strong>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
