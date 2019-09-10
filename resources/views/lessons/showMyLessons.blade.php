@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container in-front">
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="/user/lessons">All Lessons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/myLessons/{{Auth::user()->id}}">My Lessons</a>
        </li>
    </ul>
    <div class="row" style="justify-content: flex-end;">
    <div class="text-right pr-5 mb-3">
        <a href="/user/addLesson/{{Auth::user()->id}}" class="btn btn-primary" style>add lesson</a>
    </div>
    </div>
    <div class="row">
        @foreach($lessons as $lesson)
        <div class="col-sm-12 col-md-6 col-lg-4  mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{$lesson->user->avatar}}" class="card-img-top" alt="steve jobs">
                <div class="card-body">
                    <h5 class="card-title"><a href="/user/viewQuizzes/{{$lesson->id}}">{{$lesson->title}}</a></h5>
                    <p class="card-text">{{$lesson->description}}</p>
                    <div class="">
                        <a href="#" class="btn btn-primary">Start</a>
                        <a href="/user/editLesson/{{$lesson->id}}" class="btn btn-secondary btn-sm">Edit</a>      
                        <a href="/user/delete/{{$lesson->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection('content')