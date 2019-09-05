@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="" style="margin-top:-24px; margin-bottom:-24px;">


    @if (isset($success))
        <div class="alert alert-success">
            <ul>
                <li>{{$success}}</li>
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <div class="panel user-profile card p-3" style="height: -webkit-fill-available;">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 15vh;height: 15vh;">
                        </div>

                        <div class="py-3">
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
        <div class="col-md-9 col-lg-9 mb-4">
            <div class="row">
            @foreach($completeLessons as $completeLesson)
                <div class="col-sm-12 col-md-6 col-lg-4 m-2">
                    <div class="card text-center">
                        <img src="{{$completeLesson->user->avatar}}" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">{{$completeLesson->lesson->title}}</h2>
                            <a href="/user/answerQuiz/" class="btn btn-block btn-primary">Start</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
